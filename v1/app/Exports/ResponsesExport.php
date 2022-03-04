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
			'Process',
			'Department',
			'Doctor',
			'UHID',
			'NPS Score',
			'Status',
			'Comments',
			'Reasons for NPS',
			'Known about OMNI Hospitals',
			'Suggestions',
			'Feedback was given by',
			'Completed Date',
			'Filled By',
			'History/log',
			'Final Action'
		];
        return $final_heading;
    }
	
	public function collection()
    {



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
		$Detractors = SurveyAnswered::select('users.firstname as feedbackby','survey_persons.*','survey_answered.rating as rating','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title','survey_answered.ticket_remarks as s_ticket_remarks')
		->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
		->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
		->leftJoin('users','users.id', '=', 'survey_persons.logged_user_id')
		->where('survey_persons.organization_id',Auth::user()->organization_id)   

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
				$Detractors->whereIn('survey_answered.ticket_status',['opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied']);
			}elseif($status=='new-cases'){		
				$Detractors->where('survey_answered.ticket_status','opened');
			}elseif($status == 'assigned-cases'){
            	$Detractors->whereIn('survey_answered.ticket_status',['phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back']);
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
		"",
		"",
		"",
		Str::title($feedback_data->rating),
		Str::title($feedback_data->ticket_status),
		Str::title($feedback_data->s_ticket_remarks),
		"",
		"",
		Str::title($feedback_data->feedbackby),
		"",		
		"",
		"",
		""
		];

	
    }
    
	
	
	
	
	
}



