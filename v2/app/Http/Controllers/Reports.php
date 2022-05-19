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
use App\Exports\EscalationMatrixExport;
use App\Exports\ResponsesExport;
use App\Imports\ResponsesImport;
use App\Exports\PerformitorExport;
use App\Exports\NABHExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Departments;
use App\Models\Departments_Users;
use App\Models\RatingOfDepartment;


class Reports extends Controller
{
	
	
	public function __construct() {
		$this->role = auth()->user()->role??0;
	  }
    public function reports_response_list(Request $request)
    {   
	
	


		$role=auth()->user()->role??0;
		$user_mapped_departments=Departments_Users::where('user_id',auth()->user()->id??0)->get()->pluck('department_id');
    	$responses_data="";





			$select_period=$request->select_period??'thismonth';
	
	
	if($select_period=="thismonth"){
		$from_date = date('Y-m-01');
		$to_date = date('Y-m-t');		
	}	
	else if($select_period=="lastthreemonth")
	{
		
				
		$dateS = Carbon::now()->startOfMonth()->subMonth(3);		
		$lastthmonthsdate=date('Y-m-d', strtotime($dateS));
		$from_date = $lastthmonthsdate;
		$to_date = date('Y-m-t');
		
	}
	
	else{
		
		if($request->from_date &&  $request->to_date) {
		$from_date = $request->from_date;
		$to_date = $request->to_date;			
		}		
		else{

		$from_date = date('Y-m-01');
		$to_date = date('Y-m-t');

		}
	
	}

		
		
		
    
if(isset($request->team)) {					
$selected_department=$request->team;
}
else{
$selected_department="";				
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
	if($request->ticketing_status) {                    
		$ticketing_status=$request->ticketing_status;
	}       
	else{
		$ticketing_status='';
	}
			
			$Detractors = SurveyAnswered::select('users.firstname as assigned_user','survey_persons.*','survey_answered.rating as rating','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title','survey_answered.person_id')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
			->leftJoin('users','survey_persons.assigned_ticket', '=', 'users.id')
			->whereIn('survey_answered.rating',[0,1,2,3,4,5,6])	
			->where(function($Detractors) use ($role,$user_mapped_departments){	
			if($role==2){			
			}
			else if($role==3){			
					$Detractors->whereIn('survey_answered.department_name_id',$user_mapped_departments);	
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

			->where(function($Detractors) use ($Question){   
            if($Question){       
                $Detractors->where('survey_answered.survey_id','=',$Question);                
            }
            })
			
		 ->where(function($Detractors) use ($status){			
            if($status=='all'){			
			}elseif($status=='new-cases'){		
				$Detractors->where('survey_answered.ticket_status','opened');
			}elseif($status == 'assigned-cases'){
            	$Detractors->whereIn('survey_answered.ticket_status',['assigned']);
            }elseif($status == 'closed-cases'){
            	$Detractors->whereIn('survey_answered.ticket_status',['closed_satisfied','closed_unsatisfied']);
            }			
			elseif($status == 'end-action-comments'){
            	$Detractors->where('survey_answered.ticket_status','!=','opened');
			}			
			elseif($status == 'patient-process-closer-cases'){				
            	$Detractors->wherein('survey_answered.department_status',['patient_level_closure','process_level_closure']);				
            }			
			elseif($status == 'transferred-cases'){			
            	$Detractors->wherein('survey_answered.ticket_status',['transferred']);	
            }		
			elseif($status == 'process-closure'){			
            	$Detractors->wherein('survey_answered.department_status',['process_level_closure']);	
            }	
			elseif($status == 'process-pending'){	
            	$Detractors->wherein('survey_answered.department_status',['process_closure_req']);	
            }			
			else{				
				$Detractors->where('survey_answered.ticket_status','=',$status);
			}			
			
            })	 
			->where(function($Detractors) use ($ticketing_status){			
           		
			if($ticketing_status == 'process_level_closure'){			
            	$Detractors->wherein('survey_answered.department_status',['process_level_closure']);	
            }	
			elseif($ticketing_status == 'process-pending'){	
            	$Detractors->wherein('survey_answered.department_status',['process_closure_req']);	
            }			
			elseif($ticketing_status == 'patient_level_closure'){	
            	$Detractors->wherein('survey_answered.department_status',['patient_level_closure']);	
            }			
			else{		
				if($ticketing_status){
					$Detractors->where('survey_answered.ticket_status','=',$ticketing_status);
				}
			}			
			
            })	
			
			
			->where(function($Detractors) use ($selected_department){			
			if($selected_department){
				$Detractors->where('survey_answered.department_name_id', $selected_department);	
			}			
			})
			
			->orderBy('survey_persons.created_at','DESC')			
			->get();
			
			
			$myCollection = collect($Detractors);
			$uniqueCollection = $myCollection->unique('id');
			$uniqueCollection->all();
			$Detractors=$uniqueCollection;

			
		

	
		
			$Passives = SurveyAnswered::select('users.firstname as assigned_user','survey_persons.*','survey_answered.rating as rating','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title','survey_answered.person_id')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
			->leftJoin('users','survey_persons.assigned_ticket', '=', 'users.id')			
			->whereIn('survey_answered.rating',[7,8])		
			->where(function($Passives) use ($role,$user_mapped_departments){
			if($role==2){			
			}
			else if($role==3){	
				$Passives->whereIn('survey_answered.department_name_id',$user_mapped_departments);				
			}			
			else if($role==4){				
				$Passives->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}
			else{				
			}	
			
			})			
			->where(function($Passives) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
				$Passives->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
				$Passives->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})

			->where(function($Passives) use ($Question){   
            if($Question){       
                $Passives->where('survey_answered.survey_id','=',$Question);                
            }
            })
			
			
			
			->where(function($Passives) use ($status){  

			
            if($status=='all'){		
				
			}elseif($status=='new-cases'){		
				$Passives->where('survey_answered.ticket_status','opened');
			}elseif($status == 'assigned-cases'){
            	$Passives->whereIn('survey_answered.ticket_status',['phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back']);
            }elseif($status == 'closed-cases'){
            	$Passives->whereIn('survey_answered.ticket_status',['closed_satisfied','closed_unsatisfied']);
            }			
			elseif($status == 'end-action-comments'){
            	$Passives->where('survey_answered.ticket_status','!=','opened');
            }			
			elseif($status == 'patient-process-closer-cases'){			
            	$Passives->wherein('survey_answered.ticket_status',['patient_level_closure','process_level_closure']);				
            }			
			elseif($status == 'transferred-cases'){				
            	$Passives->wherein('survey_answered.ticket_status',['transferred']);				
            }
			elseif($status == 'process-pending'){	
            	$Passives->wherein('survey_answered.department_status',['process_closure_req']);	
            }			
			else{				
				$Passives->where('survey_answered.ticket_status','=',$status);
			}			
            })	

			->where(function($Passives) use ($ticketing_status){			
           		
			if($ticketing_status == 'process_level_closure'){			
            	$Passives->wherein('survey_answered.department_status',['process_level_closure']);	
            }	
			elseif($ticketing_status == 'process-pending'){	
            	$Passives->wherein('survey_answered.department_status',['process_closure_req']);	
            }			
			elseif($ticketing_status == 'patient_level_closure'){	
            	$Passives->wherein('survey_answered.department_status',['patient_level_closure']);	
            }			
			else{		
				if($ticketing_status){			
						$Passives->where('survey_answered.ticket_status','=',$ticketing_status);
				}
			}			
			
            })	
			
			->where(function($Passives) use ($selected_department){			
			if($selected_department){
				$Passives->where('survey_answered.department_name_id', $selected_department);	
			}			
			})

			
			->orderBy('survey_persons.created_at','DESC')			
			->get(); 
			
			
			
			$myCollection = collect($Passives);
			$uniqueCollection = $myCollection->unique('id');
			$uniqueCollection->all();
			$Passives=$uniqueCollection;
			
			
			$Promoters = SurveyAnswered::select('users.firstname as assigned_user','survey_persons.*','survey_answered.rating as rating','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title','survey_answered.person_id')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
			->leftJoin('users','survey_persons.assigned_ticket', '=', 'users.id')			
			->whereIn('survey_answered.rating',[9,10])			
			->where(function($Promoters) use ($role,$user_mapped_departments){			
			if($role==2){							
			}
			else if($role==3){					
				$Promoters->whereIn('survey_answered.department_name_id',$user_mapped_departments);				
			}			
			else if($role==4){				
				$Promoters->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}
			else{				
			}			
			})		
			->where(function($Promoters) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
				$Promoters->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
				$Promoters->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})
			->where(function($Promoters) use ($Question){   
            if($Question){       
                $Promoters->where('survey_answered.survey_id','=',$Question);                
            }
            })			
			 ->where(function($Promoters) use ($status){			
            if($status=='all'){		
				
			}elseif($status=='new-cases'){		
				$Promoters->where('survey_answered.ticket_status','opened');
			}elseif($status == 'assigned-cases'){
            	$Promoters->whereIn('survey_answered.ticket_status',['phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back']);
            }elseif($status == 'closed-cases'){
            	$Promoters->whereIn('survey_answered.ticket_status',['closed_satisfied','closed_unsatisfied']);
            }			
			elseif($status == 'end-action-comments'){
            	$Promoters->where('survey_answered.ticket_status','!=','opened');
            }			
			elseif($status == 'patient-process-closer-cases'){			
            	$Promoters->wherein('survey_answered.ticket_status',['patient_level_closure','process_closure_req','process_closure_notreq']);				
            }			
			elseif($status == 'transferred-cases'){				
            	$Promoters->wherein('survey_answered.ticket_status',['transferred']);				
            }
			elseif($status == 'process-pending'){	
            	$Promoters->wherein('survey_answered.department_status',['process_closure_req']);	
            }			
			else{				
				$Promoters->where('survey_answered.ticket_status','=',$status);
			}			
            })		
			
			->where(function($Promoters) use ($ticketing_status){			
           		
				
			if($ticketing_status == 'process_level_closure'){			
            	$Promoters->wherein('survey_answered.department_status',['process_level_closure']);	
            }	
			elseif($ticketing_status == 'process-pending'){	
            	$Promoters->wherein('survey_answered.department_status',['process_closure_req']);	
            }			
			elseif($ticketing_status == 'patient_level_closure'){	
            	$Promoters->wherein('survey_answered.department_status',['patient_level_closure']);	
            }			
			else{	

				if($ticketing_status){
				$Promoters->where('survey_answered.ticket_status','=',$ticketing_status);
				}
			}			
			
            })	
			
			
			
			->where(function($Promoters) use ($selected_department){			
			if($selected_department){
				$Promoters->where('survey_answered.department_name_id', $selected_department);	
			}			
			})
			
			->orderBy('survey_persons.created_at','DESC')
			->get();
			
			

	$myCollection = collect($Promoters);
	$uniqueCollection = $myCollection->unique('id');
	$uniqueCollection->all();
	$Promoters=$uniqueCollection;
	
	

	
	
$Detractors= collect($Detractors);
$merged_array = $Detractors->merge($Passives);
$twomrged=$merged_array->all();
$promoters_array= collect($twomrged);
$merged_array_three = $promoters_array->merge($Promoters);
$Detractors=$merged_array_three->all();



	$myCollection = collect($Detractors);
	$uniqueCollection = $myCollection->unique('id');
	$uniqueCollection->all();
	$Detractors=$uniqueCollection;




		
        $pageTitle="Responses";  
		$pickteam=$request->team??'';	
		$quetion=$request->question_id??'';	
		$status=$request->ticket_status??'';




		
        return view('admin.reports.responses_reports_list', compact('pageTitle','responses_data','Detractors','Passives','Promoters','pickteam','quetion','status','ticketing_status','request'))
        ->withInput('i', (request()->input('page', 1) - 1) * 5);  
    }


public function export(Request $request) 
{ 
	$data=['ticket_status'=>$request->ticket_status,'department'=>$request->team,'interviewtype'=>$request->question_id];		
	return Excel::download(new ResponsesExport($data), $request->ticket_status.'-tickets.xlsx');
}
	
	
	

public function show_performitor_reports(Request $request)
{   
	$Post_DischargeID=Surveys::select('id')->pluck('id')->last();
	$Post_DischargeID=$Post_DischargeID??0;

if($request->from_date &&  $request->to_date) {
$from_date = $request->from_date;
$to_date = $request->to_date;			
}		
else{

$from_date = date('Y-m-01');
$to_date = date('Y-m-t');

}


$responses_data=Surveys::get();
 foreach ($responses_data as $key => $value) {
        $responses_data[$key]->all_category_data=SurveyAnswered::select(
		"survey_answered.organization_id",
		DB::raw("
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.rating in (0,1,2,3,4,5,6) and survey_id=$value->id)  as Total_Detractors,
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.rating in (7,8) and survey_id=$value->id)  as Total_Passives,
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.rating in (9,10) and survey_id=$value->id)  as Total_Promoters,
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.rating in (0,1,2,3,4,5,6,7,8,9,10) and survey_id=$value->id)  as Total_Feedback_Collected,
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.survey_id in ($Post_DischargeID) and survey_id=$value->id)  as Total_Patient_Discharged
		")
		)

->where(function($responses_data) use ($from_date,$to_date){	
if($from_date &&  $to_date){		
$responses_data->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
$responses_data->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
}		
})
			
->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
->where("survey_answered.survey_id",$value->id)
->groupBy('survey_answered.organization_id')
->get();

 }





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

public function _nabhreport_export(Request $request) 
{
	return Excel::download(new NABHExport, 'nabh_report.xlsx');
}
	
public function _escalation_matrix(Request $request) 
{	
	$data=['requests'=>$request];
	return Excel::download(new EscalationMatrixExport(), 'escalation_matrix.xlsx');
}
public function _nabh_report(Request $request) 
{
	
$PageTitle="NABH Reports";
$role=auth()->user()->role??0;	
$user_mapped_departments=Departments_Users::where('user_id',auth()->user()->id??0)->get()->pluck('department_id');

if(isset($request->team)) {					
$QuestionOptions=QuestionOptions::select()
->where('option_value',$request->team)
->pluck('id');				
}		
else{
$QuestionOptions=QuestionOptions::pluck('id');				
}


if($request->from_date &&  $request->to_date) {
$from_date = $request->from_date;
$to_date = $request->to_date;			
}		
else{
$from_date = date('Y-01-01');
$to_date = date('Y-12-t');
}			
$ViewAttendance = RatingOfDepartment::select("rating_of_departments.department_name as departmentname",
DB::raw('count(IF(rating_of_departments.rating between 0 and 8, 1, NULL)) as Total_Detractors'),
DB::raw('count(IF(rating_of_departments.rating between 9 and 10, 1, NULL)) as Total_Promoters'),
)
->where(function($ViewAttendance) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$ViewAttendance->whereDate('rating_of_departments.created_at', '>=', "$from_date 00:00:00");
$ViewAttendance->whereDate('rating_of_departments.created_at', '<=',"$to_date 23:59:59");
}		
})


->where(function($ViewAttendance) use ($role,$user_mapped_departments){				
if($role==2){

}

else if($role==3){	
	$ViewAttendance->whereIn('rating_of_departments.department_id',$user_mapped_departments);	
}			
else if($role==4){				
	$ViewAttendance->where('rating_of_departments.logged_user_id',auth()->user()->id??0);
}
else{

}

})
->orderBy("rating_of_departments.department_name","asc")
->groupBy("rating_of_departments.department_name")
->get();
$Restul_Data=$ViewAttendance;
return view('admin.reports.nabh_reports', compact('PageTitle','Restul_Data'));  
}


}
