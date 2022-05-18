<?php
namespace App\Exports;
use App\Models\Questions;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
use App\Models\Surveys;
use App\Models\SurveyPerson;
use App\Models\UpdateStatusResponseLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
Use Exception;
use Validator;
use Auth;
use Session;
use Config;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class ResponsesExport implements FromCollection,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
	private $data;
	
	public function __construct(array $data = [])
	{

		//dd($data);
	$this->data = $data; 
	}
	
	 public function headings(): array
    {
        $addition_params=$this->data;       
		$final_heading=[		
			'Date of Consultation',
			'Month Name',
			'Ticket No.',
			'Name',
			'Email',
			'Phone',
			'Interview type',	
			'Doctor',
			'Bed Number',
			'Ward Name',
			'UHID',
			'IP#',
			'NPS Score',
			'Status',
			'Comments',
			'Reasons for NPS',
			'Known about OMNI Hospitals',
			'Feedback was given by',
			'Completed Date',
			'Filled By',
			'Final Action',
			'Assigned',
		];
        return $final_heading;
    }
	
	public function collection()
    {

$addition_params=$this->data; 



		$role=auth()->user()->role??0;
		
		
				if(isset($request->team)) {					
					$QuestionOptions=QuestionOptions::select()
					->where('option_value',$request->team)
					->pluck('id');				
				}		
				else{
					$QuestionOptions=QuestionOptions::pluck('id');				
				}
				
				
				if(isset($request->question_id)) {                    
				$Question=$request->question_id;

				}       
				else{
				$Question='';              
				}
		

		$addition_params=$this->data;
		$category_id=$addition_params['category_id']??'';
		$from_date=$addition_params['fd']??'';
		$to_date=$addition_params['td']??'';
		$status=$addition_params['ticket_status']??'';	

		
		$Detractors = SurveyAnswered::select('wards.name as w_name','doctors.doctor_name as doctor_name','users.firstname as assigned_user','users.firstname as feedbackby','survey_persons.*','survey_answered.rating as rating','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title','survey_answered.ticket_remarks as s_ticket_remarks')
		->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
		->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
		->leftJoin('users','survey_persons.assigned_ticket', '=', 'users.id')
		->leftJoin('doctors','survey_persons.doctor_id', '=', 'doctors.id')
		->leftJoin('wards','survey_persons.ward_id', '=', 'wards.id')
	


		->where(function($Detractors) use ($role){	
			
			
	
			
			
				
			if($role==2){				
			}
			else if($role==3){				
				if(auth()->user()->department){
					
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');					
					$Detractors->whereIn('survey_answered.department_name_id',$q_departments);	
				}				
							
			}			
			else if($role==4){				
				$Detractors->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}
			else{
				
			}	
			
			
			
			
			
			
			
			})
		
		
		->where(function($Detractors) use ($status){
			if($status=='all'){		
				//$Detractors->whereIn('survey_answered.ticket_status',['opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied']);
			}elseif($status=='new-cases'){		
				$Detractors->where('survey_answered.ticket_status','opened');
			}elseif($status == 'assigned-cases'){
            	$Detractors->whereIn('survey_answered.ticket_status',['assigned']);
            }elseif($status == 'closed-cases'){
            	$Detractors->whereIn('survey_answered.ticket_status',['closed_satisfied','closed_unsatisfied']);
            }elseif($status == 'end-action-comments'){
            	$Detractors->where('survey_answered.ticket_status','!=','opened');
            }			
			elseif($status == 'patient-process-closer-cases'){			
            	$Detractors->wherein('survey_answered.ticket_status',['patient_level_closure','process_level_closure']);			
            }	
	
			else{
				
				$Detractors->where('survey_answered.ticket_status','=',$status);
			}
			
			})
			
			
				->where(function($Detractors) use ($QuestionOptions){	
			
				$Detractors->whereIn('survey_answered.answerid',$QuestionOptions);				
				$Detractors->where('survey_answered.answeredby_person','!=','');				
		
			
			})
			
			
				->where(function($Detractors) use ($Question){   
            if($Question){       
                $Detractors->where('survey_answered.survey_id','=',$Question);                
            }
            })
			
		->orderBy('survey_persons.created_at','DESC')
		->get();
		
			$myCollection = collect($Detractors);
			$uniqueCollection = $myCollection->unique('id');
			$uniqueCollection->all();
			$Detractors=$uniqueCollection;
		
		
		return $Detractors;
	
    }
	
   public function map($feedback_data=null): array
    {

		/* Payment data get from the collection function */
		return [
		
		date('d-m-Y', strtotime($feedback_data->created_at)),	
		date('M', strtotime($feedback_data->created_at)),
		Str::title($feedback_data->ticker_final_number),
		Str::title($feedback_data->firstname),
		Str::title($feedback_data->email),
		Str::title($feedback_data->mobile),
		Str::title($feedback_data->survey_title),
		Str::title($feedback_data->doctor_name),
		Str::title($feedback_data->bed_name),
		Str::title($feedback_data->w_name),
		Str::title($feedback_data->uhid),
		Str::title($feedback_data->inpatient_id),
		Str::title($feedback_data->rating),
		Str::title($feedback_data->ticket_status),
		Str::title($feedback_data->s_ticket_remarks),
		"",
		Str::title($this->howtoknowhospital($feedback_data->know_about_hospital)),
		Str::title($feedback_data->feedback_was_givenby),	
		"",
		"",
		"",
		Str::title($feedback_data->assigned_user),		
		];

	
    }
	
	public function howtoknowhospital($value=false){
		

		switch ($value) {
		case 1:
		$restuls="I'm an existing patient and am happy with the hospital";
		break;
		case 2:
		$restuls="I was referred here by family/friend";
		break;
		case 3:
		$restuls="I heard/read good things about the hospital in my community/social media";
		break;		
		case 4:
		$restuls="My doctor referred me to this hospital";
		break;		
		case 5:
		$restuls="It was an emergency and this was the nearest hospital";
		break;
		default:
		$restuls="";
		}
		
		return $restuls;
		
		
		
	}
    
	
	
	
	
	
}



