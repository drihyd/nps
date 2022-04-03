<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;
use Auth;
use Session;
use Config;
use App\Models\Questions;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
use App\Models\Surveys;
use App\Models\SurveyPerson;
use App\Models\UpdateStatusResponseLog;
use Illuminate\Support\Facades\Crypt;
use App\Exports\ResponsesExport;
use App\Imports\ResponsesImport;
use App\Exports\PerformitorExport;
use Maatwebsite\Excel\Facades\Excel;


class Reports extends Controller
{
	
	
	public function __construct() {
		$this->role = auth()->user()->role??0;
	  }
    public function reports_response_list(Request $request)
    {   

		$role=auth()->user()->role??0;
        $responses_data=SurveyPerson::where('survey_persons.logged_user_id',auth()->user()->id??0)
		->get();


        foreach ($responses_data as $key => $value) {
        $responses_data[$key]->qoptions = SurveyAnswered::select('question_options.option_value as answer','survey_answered.updated_at as last_status_updated_at','survey_answered.ticket_remarks as s_ticket_remarks')
         ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
         ->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
		->whereIn('survey_answered.question_id',[1,11])
	     ->where('survey_answered.person_id',$value->id)
        ->orderBy('survey_persons.created_at','DESC')
        ->get();   
        }

      
		
		
		
		
		if($request->from_date &&  $request->to_date) {
			$from_date = $request->from_date;
			$to_date = $request->to_date;			
		}		
		else{
			
			$from_date = date('Y-01-01');
			$to_date = date('Y-m-t');
			
		}
		
		
		
		
				if($request->team) {					
					$QuestionOptions=QuestionOptions::select()
					->where('option_value',$request->team)
					->pluck('id');				
				}		
				else{
					$QuestionOptions=QuestionOptions::pluck('id');				
				}
		
				if($request->question_id) {                    
				$Question=$request->question_id;

				}       
				else{
				$Question='';              
				}


			if($request->ticket_status) {                    
			$status=$request->ticket_status;

			}       
			else{
			$status='';                

			}
 
		
		
		
		
			$Detractors = SurveyAnswered::select('survey_persons.*','survey_answered.rating as rating','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title','survey_answered.person_id')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
						
				
		

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
			
			
			
			->where(function($Detractors) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
				$Detractors->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
				$Detractors->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
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
            ->where(function($Detractors) use ($status){  

			
            if($status=='all'){		
				$Detractors->whereIn('survey_answered.ticket_status',['opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied']);
			}elseif($status=='new-cases'){		
				$Detractors->where('survey_answered.ticket_status','opened');
			}elseif($status == 'assigned-cases'){
            	$Detractors->whereIn('survey_answered.ticket_status',['phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back']);
            }elseif($status == 'closed-cases'){
            	$Detractors->whereIn('survey_answered.ticket_status',['closed_satisfied','closed_unsatisfied']);
            }
			
			elseif($status == 'end-action-comments'){
            	$Detractors->where('survey_answered.ticket_status','!=','opened');
            }
			
			
			elseif($status == 'patient-process-closer-cases'){	
			
            	$Detractors->wherein('survey_answered.ticket_status',['patient_level_closure','process_level_closure']);				
            }
			
			else{
				
				$Detractors->where('survey_answered.ticket_status','=',$status);
			}
			
			
            })
			
			->orderBy('survey_persons.created_at','DESC')
			->get();
			
		
        $pageTitle=Str::title(Str::replace('-', ' ', $request->ticket_status))." report";  
		$Passives=$Promoters="";
		$pickteam=$request->team??'';	
		$quetion=$request->question_id??'';	
		$status=$request->ticket_status??'';	
        return view('admin.reports.responses_reports_list', compact('pageTitle','responses_data','Detractors','Passives','Promoters','pickteam','quetion','status'))
        ->withInput('i', (request()->input('page', 1) - 1) * 5);  
    }


public function export(Request $request) 
{ 
	$data=['ticket_status'=>$request->ticket_status];
	
	
	
	return Excel::download(new ResponsesExport($data), 'responses_report.xlsx');
}
	
	
	

public function show_performitor_reports(Request $request)
{   


if($request->from_date &&  $request->to_date) {
$from_date = $request->from_date;
$to_date = $request->to_date;			
}		
else{

$from_date = date('Y-m-01');
$to_date = date('Y-m-t');

}

$responses_data = SurveyAnswered::select(
"survey_answered.organization_id",
DB::raw("
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.rating in (0,1,2,3,4,5,6) and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59')  as Total_Detractors,
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.rating in (7,8) and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59')  as Total_Passives,
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.rating in (9,10) and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59')  as Total_Promoters,
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.rating in (0,1,2,3,4,5,6,7,8,9,10) and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59')  as Total_Feedback_Collected,
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.question_id in (11) and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59')  as Total_Patient_Discharged
")
)

->where(function($responses_data) use ($from_date,$to_date){	
if($from_date &&  $to_date){		
$responses_data->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
$responses_data->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
}		
})
			
->whereIn('survey_answered.question_id',[1,11])

->groupBy('survey_answered.organization_id')
->get();





$role=auth()->user()->role??0;
$pickteam=$request->team??'';	
$quetion=$request->question_id??'';	
$Data=[];
return view('admin.reports.performitor_reports_list', compact('responses_data','Data'))
->withInput('i', (request()->input('page', 1) - 1) * 5);  

}


public function _performitor_export(Request $request) 
{
	return Excel::download(new PerformitorExport, 'performitor_report.xlsx');
}
	



}
