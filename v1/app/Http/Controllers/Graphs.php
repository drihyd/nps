<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
use App\Models\Surveys;
use App\Models\SurveyPerson;
use App\Models\RatingOfDepartment;
use App\Models\RatingOfDepActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Graphs extends Controller
{
	
	
	 public function _nps_graph(Request $request)
    {

		
		try {
	
			
			$pageTitle="Net Promoter Score (NPS)";
			$total_nps_scores=$this->get_nps_scores($request);
			
		
			$collection = collect($total_nps_scores);		
			$monthnames=$collection->implode('month',',');	
			$detractors_count=$collection->implode('detractors',',');		
			$passives_count=$collection->implode('passives',',');
			$promotors_count=$collection->implode('promotors',',');
			$nps_count=$collection->implode('nps_score',',');		
			return view('admin.graphs.nps-graph',compact('pageTitle','monthnames','detractors_count','passives_count','promotors_count','nps_count'));         
    
	
			}		
		catch (RequestException $exception) {		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
			}			
			}			
			// You can check for whatever error status code you need 
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {		
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
		}
	
	}  
	
	public function _feedback_composition(Request $request)
    {

		
		try {
	
			
			$pageTitle="Feedback Composition";
			$total_nps_scores=$this->get_nps_scores($request);
			
		
			$collection = collect($total_nps_scores);		
			$monthnames=$collection->implode('month',',');	
			$detractors_count=$collection->implode('detractors',',');		
			$passives_count=$collection->implode('passives',',');
			$promotors_count=$collection->implode('promotors',',');
			$nps_count=$collection->implode('nps_score',',');		
			return view('admin.graphs.feedback-composition',compact('pageTitle','monthnames','detractors_count','passives_count','promotors_count','nps_count'));         
    
	
			}		
		catch (RequestException $exception) {		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
			}			
			}			
			// You can check for whatever error status code you need 
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {		
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
		}
	
	} 
	
	public function _primary_drivers(Request $request)
    {

		
		try {
	
			
			$pageTitle="Drivers NPS Process (Primary)";
			
			
		$total_departmentwise_scores=$this->get_departmentwise_scores($request);
		
	
		
	
		$collection_department_score = collect($total_departmentwise_scores);	
		
		$_departmentname= "'" .$collection_department_score->implode('departmentname',"','",)."'";
		$_dep_detractors_count=$collection_department_score->implode('detractors',',');	
		$_dep_passives_count=$collection_department_score->implode('passives',',');	
		$_dep_promotors_count=$collection_department_score->implode('promotors',',');
		
		
		$_dep_scors=[
		$_departmentname,
		$_dep_detractors_count,
		$_dep_passives_count,
		$_dep_promotors_count		
		];

		
			return view('admin.graphs.graphs_primary_drivers',compact('pageTitle','_dep_scors'));         
    
	
			}		
		catch (RequestException $exception) {		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
			}			
			}			
			// You can check for whatever error status code you need 
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {		
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
		}
	
	}
	
	
	public function _secondary_drivers(Request $request)
    {

		
		try {
	
			
			$pageTitle="Drivers NPS Process (Secondary)";
			
			
		$activities_scores=$this->get_department_activities_scores($request);
	
	
	$_dep_act_name= "'" .$activities_scores->implode('departmentname',"','",)."'";
	$_dep_act_detractors_count=$activities_scores->implode('detractors',',');	
	$_dep_act_passives_count=$activities_scores->implode('passives',',');	
	$_dep_act_promotors_count=$activities_scores->implode('promotors',',');
	

	
		$_dep_act_scors=[
		$_dep_act_name,
		$_dep_act_detractors_count,
		$_dep_act_passives_count,
		$_dep_act_promotors_count		
		];

		
			return view('admin.graphs.graphs_secondary_drivers',compact('pageTitle','_dep_act_scors'));         
    
	
			}		
		catch (RequestException $exception) {		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
			}			
			}			
			// You can check for whatever error status code you need 
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {		
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
		}
	
	}
	
	
    public function graphs_list(Request $request)
    {
		
		
	
		$pageTitle="Graphs";	
			
		
		$department_statistics=$this->show_department_statistics($request);	


		
		$datareport=$this->get_monthwise_opened_closed($request);
		$collection = collect($datareport);		
		$monthnames=$collection->implode('month',',');		
		$action_count=$collection->implode('action_count', ',');
		$closed_action_count=$collection->implode('closed_action_count', ',');
		
		
		
		return view('admin.graphs.graphs_lists',compact('pageTitle','monthnames','action_count','closed_action_count','department_statistics'));         
    }
	
	function custom_array_merge($array1, $array2) {
    $result = Array();
    foreach ($array1 as $key_1 => $value_1) {
        // if($value['name'])
        foreach ($array2 as $key_1 => $value_2) {
            if($value_1['month'] ==  $value_2['month']) {
				
                $result[] = array_merge($value_1,$value_2);
				
				
            }
        }

    }
    return $result;
	
	}
	
	public function get_monthwise_opened_closed($request){
		
		
			$role=auth()->user()->role??0;
		
	
			if($request->from_date &&  $request->to_date) {
			$from_date = $request->from_date;
			$to_date = $request->to_date;			
			}		
			else{

				$from_date = date('Y-01-01');
				$to_date = date('Y-12-t');

			}
			
			
		if(isset($request->team)) {					
		$QuestionOptions=QuestionOptions::select()
		->where('option_value',$request->team)
		->pluck('id');				
		}		
		else{
		$QuestionOptions=QuestionOptions::pluck('id');				
		}
	
		
		
		
			$users = SurveyAnswered::select('id', 'created_at')
			
	
			
			->whereIn('survey_answered.ticket_status',['opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back']) 
			 
			->where(function($users) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
			$users->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
			$users->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})
			
			
			->where(function($users) use ($role){				
			if($role==2){
				
				$users->where('survey_answered.department_name_id','0');
				
			}
			else if($role==3){				
				if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
					$users->whereIn('survey_answered.department_name_id',$q_departments);	
				}				
							
			}			
			else if($role==4){				
				$users->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}
			else{
				
			}
			
			})
			
			->where(function($users) use ($QuestionOptions,$role){	
			if($role==3 || $role==4) {
				$users->whereIn('survey_answered.answerid',$QuestionOptions);				
				$users->where('survey_answered.answeredby_person','!=','');	
			}				
		
			
			})
			
			
			
			

			->get()
			->groupBy(function ($date) {
			return Carbon::parse($date->created_at)->format('m');
			},'person_id'
			
			);

			$usermcount = [];
			$userArr = [];

			foreach ($users as $key => $value) {
			$usermcount[(int)$key] = count($value);
			}

			$month = [
			"'January'",
			"'February'",
			"'March'",
			"'April'",
			"'May'",
			"'June'",
			"'July'",
			"'August'",
			"'September'",
			"'October'",
			"'November'",
			"'December'",
	];

			for ($i = 1; $i <= 12; $i++) {
			if (!empty($usermcount[$i])) {
			$userArr[$i]['action_count'] = $usermcount[$i];
			} else {
			$userArr[$i]['action_count'] = 0;
			}
			$userArr[$i]['month'] = $month[$i - 1];
			}
			
			
	
			

		
	
			
			/*** closed actions***/
			$_users = SurveyAnswered::select('id', 'created_at')
		
			->whereIn('survey_answered.ticket_status',['closed_satisfied','closed_unsatisfied','patient_level_closure','process_level_closure']) 
			 
			->where(function($_users) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
			$_users->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
			$_users->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})
			
			->where(function($_users) use ($QuestionOptions,$role){	
			
			if($role==3 || $role==4) {
				$_users->whereIn('survey_answered.answerid',$QuestionOptions);				
				$_users->where('survey_answered.answeredby_person','!=','');
			}				
		
			
			})
			
			
			->where(function($_users) use ($role){				
			if($role==2){
				$_users->where('survey_answered.department_name_id','0');
			}
			else if($role==3){				
				if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
					$_users->whereIn('survey_answered.department_name_id',$q_departments);	
				}				
							
			}			
			else if($role==4){				
				$_users->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}
			else{
				
			}
			
			})

			->get()
			->groupBy(function ($date) {
			return Carbon::parse($date->created_at)->format('m');
			},'person_id'
			
			);
			
			
			

			$_usermcount = [];
			$_userArr = [];

			foreach ($_users as $key => $value) {
			$_usermcount[(int)$key] = count($value);
			}

			$month = [
			"'January'",
			"'February'",
			"'March'",
			"'April'",
			"'May'",
			"'June'",
			"'July'",
			"'August'",
			"'September'",
			"'October'",
			"'November'",
			"'December'",
			
			
			];

			for ($i = 1; $i <= 12; $i++) {
			if (!empty($_usermcount[$i])) {
			$_userArr[$i]['closed_action_count'] = $_usermcount[$i];
			} else {
			$_userArr[$i]['closed_action_count'] = 0;
			}
			$_userArr[$i]['month'] = $month[$i - 1];
			}
			
			
			


$graph_data_statics=$this->custom_array_merge($userArr,$_userArr);


return $graph_data_statics;
//return response()->json(array_values($_userArr??[]));		
	
}



public function show_department_statistics(Request $request)
{   





if($request->from_date &&  $request->to_date) {
$from_date = $request->from_date;
$to_date = $request->to_date;			
}		
else{

$from_date = date('Y-01-01');
$to_date = date('Y-12-t');

}


$responses_data = SurveyAnswered::select(
"survey_answered.department_name_id",



DB::raw('count(IF(survey_answered.ticket_status="opened", 1, NULL)) as alerts_came_in'),
DB::raw('count(IF(survey_answered.ticket_status in ("closed_satisfied"), 1, NULL)) as alerts_closed'),
DB::raw('count(IF(survey_answered.ticket_status in ("phone_ringing_no_response"), 1, NULL)) as alerts_still_opened'),

)

->where(function($responses_data) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$responses_data->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
$responses_data->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
}		
})
			
->whereIn('survey_answered.question_id',[1,11])
->groupBy('survey_answered.department_name_id')
->get();




return $responses_data;






if($request->from_date &&  $request->to_date) {
$from_date = $request->from_date;
$to_date = $request->to_date;			
}		
else{
$from_date = date('Y-01-01');
$to_date = date('Y-12-t');
}			

$ViewAttendance = RatingOfDepActivity::select("rating_of_dep_activities.activity_name","rating_of_dep_activities.activity_name as departmentname",
DB::raw('count(IF(rating_of_dep_activities.rating between 0 and 6, 1, NULL)) as detractors'),
DB::raw('count(IF(rating_of_dep_activities.rating between 7 and 8, 1, NULL)) as passives'),
DB::raw('count(IF(rating_of_dep_activities.rating between 9 and 10, 1, NULL)) as promotors'),
)

->where(function($ViewAttendance) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$ViewAttendance->whereDate('rating_of_dep_activities.created_at', '>=', "$from_date 00:00:00");
$ViewAttendance->whereDate('rating_of_dep_activities.created_at', '<=',"$to_date 23:59:59");
}		
})

->orderBy("rating_of_dep_activities.activity_name","asc")
->groupBy("rating_of_dep_activities.activity_name","rating_of_dep_activities.activity_id")
->get();
return $ViewAttendance;





}

public function graphs_list_inpatient(Request $request)
    {
		
		
	
		$pageTitle="Graphs- In Patient";	
		
		
		$total_nps_scores=$this->get_nps_scores($request);
		

		$collection = collect($total_nps_scores);	
		
	$monthnames=$collection->implode('month',',');	
	$detractors_count=$collection->implode('detractors',',');		
	$passives_count=$collection->implode('passives',',');
	$promotors_count=$collection->implode('promotors',',');
	$nps_count=$collection->implode('nps_score',',');		
		
		
		
		
		
		$total_departmentwise_scores=$this->get_departmentwise_scores($request);
		
		
		
		$collection_department_score = collect($total_departmentwise_scores);	
		
		$_departmentname= "'" .$collection_department_score->implode('departmentname',"','",)."'";
		$_dep_detractors_count=$collection_department_score->implode('detractors',',');	
		$_dep_passives_count=$collection_department_score->implode('passives',',');	
		$_dep_promotors_count=$collection_department_score->implode('promotors',',');
		
		
		$_dep_scors=[
		$_departmentname,
		$_dep_detractors_count,
		$_dep_passives_count,
		$_dep_promotors_count		
		];
	
	
	$activities_scores=$this->get_department_activities_scores($request);
	
	
	$_dep_act_name= "'" .$activities_scores->implode('departmentname',"','",)."'";
	$_dep_act_detractors_count=$activities_scores->implode('detractors',',');	
	$_dep_act_passives_count=$activities_scores->implode('passives',',');	
	$_dep_act_promotors_count=$activities_scores->implode('promotors',',');
	

	
		$_dep_act_scors=[
		$_dep_act_name,
		$_dep_act_detractors_count,
		$_dep_act_passives_count,
		$_dep_act_promotors_count		
		];
		

		
		
		
		$patient_process=$this->get_department_patient_process_closures($request);
		
		

		$_ticket_status= "'" .$patient_process->implode('ticket_status',"','",)."'";
		$_patient_level_closure_count=$patient_process->implode('patient_level_closure',',');	
		$_process_level_closure_count=$patient_process->implode('process_level_closure',',');	
	
	

	
		$_patient_process=[
		$_ticket_status,
		$_patient_level_closure_count,
		$_process_level_closure_count			
		];

		
		
		$process_cat_closur=$this->get_department_process_category_closures($request);
		
		
		$_cat_process_status= "'" .$process_cat_closur->implode('category_process_level',"','",)."'";
		$_cat_process_status_count=$process_cat_closur->implode('total',',');	

	
	

	
		$_category_process=[
		$_cat_process_status,
		$_cat_process_status_count
			
		];
		

		
	
		
		
		
		return view('admin.graphs.graphs_lists_inpatient',compact('pageTitle','monthnames','detractors_count','passives_count','promotors_count','nps_count','total_departmentwise_scores','_dep_scors','_dep_act_scors','_patient_process','_category_process'));         
    }
	
	
	
public function get_department_patient_process_closures($request){


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


if($request->from_date &&  $request->to_date) {
$from_date = $request->from_date;
$to_date = $request->to_date;			
}		
else{
$from_date = date('Y-01-01');
$to_date = date('Y-12-t');
}			

$ViewAttendance = SurveyAnswered::select("survey_answered.person_id","survey_answered.ticket_status",
DB::raw('count(IF(survey_answered.ticket_status="patient_level_closure", 1, NULL)) as patient_level_closure'),
DB::raw('count(IF(survey_answered.ticket_status="process_level_closure", 1, NULL)) as process_level_closure'),

)

->where(function($ViewAttendance) use ($Question){   
if($Question){       
	$ViewAttendance->where('survey_answered.survey_id','=',$Question);                
}
})

->where(function($ViewAttendance) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$ViewAttendance->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
$ViewAttendance->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
}		
})

->where(function($ViewAttendance) use ($role){				
if($role==2){

}
else if($role==3){				
if(auth()->user()->department){
	$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
	$ViewAttendance->whereIn('survey_answered.department_name_id',$q_departments);	
}				

}			
else if($role==4){				
	$ViewAttendance->where('survey_answered.logged_user_id',auth()->user()->id??0);
}
else{

}

})

->where(function($ViewAttendance) use ($QuestionOptions){			
	$ViewAttendance->whereIn('survey_answered.department_name_id',$QuestionOptions);	
	$ViewAttendance->where('survey_answered.answeredby_person','!=','');
})

->groupBy("survey_answered.ticket_status","survey_answered.person_id")
->get();
return $ViewAttendance;


}




public function get_department_process_category_closures($request){


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


if($request->from_date &&  $request->to_date) {
$from_date = $request->from_date;
$to_date = $request->to_date;			
}		
else{
$from_date = date('Y-01-01');
$to_date = date('Y-12-t');
}			

$ViewAttendance = SurveyAnswered::select("survey_answered.person_id","survey_answered.category_process_level",DB::raw('count(*) as total') )

->where(function($ViewAttendance) use ($Question){   
if($Question){       
	$ViewAttendance->where('survey_answered.survey_id','=',$Question);                
}
})

->where(function($ViewAttendance) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$ViewAttendance->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
$ViewAttendance->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
}		
})

->where(function($ViewAttendance) use ($role){				
if($role==2){

}
else if($role==3){				
if(auth()->user()->department){
	$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
	$ViewAttendance->whereIn('survey_answered.department_name_id',$q_departments);	
}				

}			
else if($role==4){				
	$ViewAttendance->where('survey_answered.logged_user_id',auth()->user()->id??0);
}
else{

}

})

->where(function($ViewAttendance) use ($QuestionOptions){			
	$ViewAttendance->whereIn('survey_answered.department_name_id',$QuestionOptions);	
	$ViewAttendance->where('survey_answered.answeredby_person','!=','');
})

->whereNotnull('survey_answered.category_process_level')
->groupBy("survey_answered.category_process_level","survey_answered.person_id")
->get();

return $ViewAttendance;


}
	
	
public function get_departmentwise_scores($request){
	
	
	
$role=auth()->user()->role??0;	

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
DB::raw('count(IF(rating_of_departments.rating between 0 and 6, 1, NULL)) as detractors'),
DB::raw('count(IF(rating_of_departments.rating between 7 and 8, 1, NULL)) as passives'),
DB::raw('count(IF(rating_of_departments.rating between 9 and 10, 1, NULL)) as promotors'),
)
->where(function($ViewAttendance) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$ViewAttendance->whereDate('rating_of_departments.created_at', '>=', "$from_date 00:00:00");
$ViewAttendance->whereDate('rating_of_departments.created_at', '<=',"$to_date 23:59:59");
}		
})


->where(function($ViewAttendance) use ($role){				
if($role==2){

}

else if($role==3){				
if(auth()->user()->department){
	$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
	$ViewAttendance->whereIn('rating_of_departments.department_id',$q_departments);	
}				

}			
else if($role==4){				
	$ViewAttendance->where('rating_of_departments.logged_user_id',auth()->user()->id??0);
}
else{

}

})


->where(function($ViewAttendance) use ($QuestionOptions){	

$ViewAttendance->whereIn('rating_of_departments.department_id',$QuestionOptions);				



})




->orderBy("rating_of_departments.department_name","asc")
->groupBy("rating_of_departments.department_name")
->get();
return $ViewAttendance;
}


public function get_department_activities_scores($request){


$role=auth()->user()->role??0;

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

$ViewAttendance = RatingOfDepActivity::select("rating_of_dep_activities.activity_name","rating_of_dep_activities.activity_name as departmentname",
DB::raw('count(IF(rating_of_dep_activities.rating between 0 and 6, 1, NULL)) as detractors'),
DB::raw('count(IF(rating_of_dep_activities.rating between 7 and 8, 1, NULL)) as passives'),
DB::raw('count(IF(rating_of_dep_activities.rating between 9 and 10, 1, NULL)) as promotors'),
)



->where(function($ViewAttendance) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$ViewAttendance->whereDate('rating_of_dep_activities.created_at', '>=', "$from_date 00:00:00");
$ViewAttendance->whereDate('rating_of_dep_activities.created_at', '<=',"$to_date 23:59:59");
}		
})

->where(function($ViewAttendance) use ($role){				
if($role==2){

}
else if($role==3){				
if(auth()->user()->department){
	$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
	$ViewAttendance->whereIn('rating_of_dep_activities.department_id',$q_departments);	
}				

}			
else if($role==4){				
	$ViewAttendance->where('rating_of_dep_activities.logged_user_id',auth()->user()->id??0);
}
else{

}

})

->where(function($ViewAttendance) use ($QuestionOptions){
$ViewAttendance->whereIn('rating_of_dep_activities.department_id',$QuestionOptions);				
})




->orderBy("rating_of_dep_activities.activity_name","asc")
->groupBy("rating_of_dep_activities.activity_name")
->get();
return $ViewAttendance;
}








	
	

	
	
	
	
	public function get_nps_scores($request){
		
		
		
	if($request->from_date &&  $request->to_date) {
			$from_date = $request->from_date;
			$to_date = $request->to_date;			
			}		
			else{

				$from_date = date('Y-01-01');
				$to_date = date('Y-12-t');

			}
	
		
		
		/*** detractors count****/
			$users = SurveyAnswered::select('id', 'created_at')
			->whereIn('survey_answered.question_id',[1,11,33,40])
			->whereIn('survey_answered.rating',[0,1,2,3,4,5,6]) 
			 
			->where(function($users) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
			$users->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
			$users->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})

			->get()
			->groupBy(function ($date) {
			return Carbon::parse($date->created_at)->format('m');
			},'person_id'
			
			);

			$usermcount = [];
			$userArr = [];

			foreach ($users as $key => $value) {
			$usermcount[(int)$key] = count($value);
			}

			$month = [
			"'January'",
			"'February'",
			"'March'",
			"'April'",
			"'May'",
			"'June'",
			"'July'",
			"'August'",
			"'September'",
			"'October'",
			"'November'",
			"'December'",
	];

			for ($i = 1; $i <= 12; $i++) {
			if (!empty($usermcount[$i])) {
			$userArr[$i]['detractors'] = $usermcount[$i];
			} else {
			$userArr[$i]['detractors'] = 0;
			}
			$userArr[$i]['month'] = $month[$i - 1];
			}
			
			
	
			

		
	
			
			/*** passives actions***/
			$_users = SurveyAnswered::select('id', 'created_at')
			->whereIn('survey_answered.question_id',[1,11,33,40])
			->whereIn('survey_answered.rating',[7,8])
			 
			->where(function($_users) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
			$_users->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
			$_users->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})

			->get()
			->groupBy(function ($date) {
			return Carbon::parse($date->created_at)->format('m');
			},'person_id'
			
			);
			
			
			
	
			
			
			

			$_usermcount = [];
			$_userArr = [];

			foreach ($_users as $key => $value) {
			$_usermcount[(int)$key] = count($value);
			}

			$month = [
			"'January'",
			"'February'",
			"'March'",
			"'April'",
			"'May'",
			"'June'",
			"'July'",
			"'August'",
			"'September'",
			"'October'",
			"'November'",
			"'December'",
			
			
			];

			for ($i = 1; $i <= 12; $i++) {
			if (!empty($_usermcount[$i])) {
			$_userArr[$i]['passives'] = $_usermcount[$i];
			$_userArr[$i]['nps_score'] = $_usermcount[$i];
			} else {
			$_userArr[$i]['passives'] = 0;
			$_userArr[$i]['nps_score'] = 0;
			}
			$_userArr[$i]['month'] = $month[$i - 1];
			}
			
			
			
			
			/*** promotors actions***/
			$__users = SurveyAnswered::select('id', 'created_at')
			->whereIn('survey_answered.question_id',[1,11,33,40])
			->whereIn('survey_answered.rating',[9,10])
			 
			->where(function($__users) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
			$__users->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
			$__users->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})

			->get()
			->groupBy(function ($date) {
			return Carbon::parse($date->created_at)->format('m');
			},'person_id'
			
			);
			
			
			
			
			/** Convert mapToGroups **/

			
			

			$__usermcount = [];
			$__userArr = [];

			foreach ($__users as $key => $value) {
			$__usermcount[(int)$key] = count($value);
			}

			$month = [
			"'January'",
			"'February'",
			"'March'",
			"'April'",
			"'May'",
			"'June'",
			"'July'",
			"'August'",
			"'September'",
			"'October'",
			"'November'",
			"'December'",
			
			
			];

			for ($i = 1; $i <= 12; $i++) {
			if (!empty($__usermcount[$i])) {
			$__userArr[$i]['promotors'] = $__usermcount[$i];
			} else {
			$__userArr[$i]['promotors'] = 0;
			}
			$__userArr[$i]['month'] = $month[$i - 1];
			}





					/*** NPS Score actions***/
			$___users = SurveyAnswered::select('id', 'created_at')
			->whereIn('survey_answered.question_id',[1,11,33,40])
			->whereIn('survey_answered.rating',[0,1,2,3,4,5,6,7,8,9,10])
			 
			->where(function($___users) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
			$___users->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
			$___users->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})

			->get()
			->groupBy(function ($date) {
			return Carbon::parse($date->created_at)->format('m');
			},'person_id'
			
			);
			
			
			
			$___usermcount = [];
			$___userArr = [];

			foreach ($___users as $key => $value) {
			$___usermcount[(int)$key] = count($value);
			}

			$month = [
			"'January'",
			"'February'",
			"'March'",
			"'April'",
			"'May'",
			"'June'",
			"'July'",
			"'August'",
			"'September'",
			"'October'",
			"'November'",
			"'December'",
			
			
			];

			for ($i = 1; $i <= 12; $i++) {
			if (!empty($___usermcount[$i])) {
			$___userArr[$i]['nps_score'] = $___usermcount[$i];
			} else {
			$___userArr[$i]['nps_score'] = 0;
			}
			$___userArr[$i]['month'] = $month[$i - 1];
			}
			


$graph_data_statics=$this->custom_array_merge($userArr,$_userArr);
$graph_data_statics=$this->custom_array_merge($graph_data_statics,$__userArr);


$collection = collect($graph_data_statics);

$multiplied = $collection->map(function ($item, $key) {
	
	$NPS=round($item['promotors']-$item['detractors']);
	
	/*
	if($NPS<=0){
		
		$NPS=0;
	}
	else{
		$NPS=$NPS;
	}
	*/
	
	$tfeedback=$item['detractors']+$item['passives']+$item['promotors'];
	if($tfeedback>0)
	{
		$tfeedback=$tfeedback;
	}
	else{
		$tfeedback=1;
	}
    return 
	[
	
	
	"month"=>$item['month'],
	"detractors"=>$item['detractors'],
	"passives"=>$item['passives'],
	"promotors"=>$item['promotors'],
	//"nps_score"=>round((($item['promotors']-$item['detractors'])/($tfeedback))*100),
	
	"nps_score"=>$NPS,	
	
	]
	
	;
});





return $multiplied;


		
		
	}


	public function graphs_nps_grpah(Request $request)
    {
		
		
	
		$pageTitle="Graphs- In Patient";	
		
		
		$total_nps_scores=$this->get_nps_scores($request);
		

		$collection = collect($total_nps_scores);	
		
	$monthnames=$collection->implode('month',',');	
	$detractors_count=$collection->implode('detractors',',');		
	$passives_count=$collection->implode('passives',',');
	$promotors_count=$collection->implode('promotors',',');
	$nps_count=$collection->implode('nps_score',',');		
		
		
		
		
		
		$total_departmentwise_scores=$this->get_departmentwise_scores($request);
		
		
		
		$collection_department_score = collect($total_departmentwise_scores);	
		
		$_departmentname= "'" .$collection_department_score->implode('departmentname',"','",)."'";
		$_dep_detractors_count=$collection_department_score->implode('detractors',',');	
		$_dep_passives_count=$collection_department_score->implode('passives',',');	
		$_dep_promotors_count=$collection_department_score->implode('promotors',',');
		
		
		$_dep_scors=[
		$_departmentname,
		$_dep_detractors_count,
		$_dep_passives_count,
		$_dep_promotors_count		
		];
	
	
	$activities_scores=$this->get_department_activities_scores($request);
	
	
	$_dep_act_name= "'" .$activities_scores->implode('departmentname',"','",)."'";
	$_dep_act_detractors_count=$activities_scores->implode('detractors',',');	
	$_dep_act_passives_count=$activities_scores->implode('passives',',');	
	$_dep_act_promotors_count=$activities_scores->implode('promotors',',');
	

	
		$_dep_act_scors=[
		$_dep_act_name,
		$_dep_act_detractors_count,
		$_dep_act_passives_count,
		$_dep_act_promotors_count		
		];
		

		
		
		
		$patient_process=$this->get_department_patient_process_closures($request);
		
		

		$_ticket_status= "'" .$patient_process->implode('ticket_status',"','",)."'";
		$_patient_level_closure_count=$patient_process->implode('patient_level_closure',',');	
		$_process_level_closure_count=$patient_process->implode('process_level_closure',',');	
	
	

	
		$_patient_process=[
		$_ticket_status,
		$_patient_level_closure_count,
		$_process_level_closure_count			
		];

		
		
		$process_cat_closur=$this->get_department_process_category_closures($request);
		
		
		$_cat_process_status= "'" .$process_cat_closur->implode('category_process_level',"','",)."'";
		$_cat_process_status_count=$process_cat_closur->implode('total',',');	

	
	

	
		$_category_process=[
		$_cat_process_status,
		$_cat_process_status_count
			
		];
		
		return view('admin.graphs.nps-graph',compact('pageTitle','monthnames','detractors_count','passives_count','promotors_count','nps_count','total_departmentwise_scores','_dep_scors','_dep_act_scors','_patient_process','_category_process'));         
    }



	public function graphs_primary_drivers(Request $request)
    {
		
		
	
		$pageTitle="Graphs- In Patient";	
		
		
		$total_nps_scores=$this->get_nps_scores($request);
		

		$collection = collect($total_nps_scores);	
		
	$monthnames=$collection->implode('month',',');	
	$detractors_count=$collection->implode('detractors',',');		
	$passives_count=$collection->implode('passives',',');
	$promotors_count=$collection->implode('promotors',',');
	$nps_count=$collection->implode('nps_score',',');		
		
		
		
		
		
		$total_departmentwise_scores=$this->get_departmentwise_scores($request);
		
		
		
		$collection_department_score = collect($total_departmentwise_scores);	
		
		$_departmentname= "'" .$collection_department_score->implode('departmentname',"','",)."'";
		$_dep_detractors_count=$collection_department_score->implode('detractors',',');	
		$_dep_passives_count=$collection_department_score->implode('passives',',');	
		$_dep_promotors_count=$collection_department_score->implode('promotors',',');
		
		
		$_dep_scors=[
		$_departmentname,
		$_dep_detractors_count,
		$_dep_passives_count,
		$_dep_promotors_count		
		];
	
	
	$activities_scores=$this->get_department_activities_scores($request);
	
	
	$_dep_act_name= "'" .$activities_scores->implode('departmentname',"','",)."'";
	$_dep_act_detractors_count=$activities_scores->implode('detractors',',');	
	$_dep_act_passives_count=$activities_scores->implode('passives',',');	
	$_dep_act_promotors_count=$activities_scores->implode('promotors',',');
	

	
		$_dep_act_scors=[
		$_dep_act_name,
		$_dep_act_detractors_count,
		$_dep_act_passives_count,
		$_dep_act_promotors_count		
		];
		

		
		
		
		$patient_process=$this->get_department_patient_process_closures($request);
		
		

		$_ticket_status= "'" .$patient_process->implode('ticket_status',"','",)."'";
		$_patient_level_closure_count=$patient_process->implode('patient_level_closure',',');	
		$_process_level_closure_count=$patient_process->implode('process_level_closure',',');	
	
	

	
		$_patient_process=[
		$_ticket_status,
		$_patient_level_closure_count,
		$_process_level_closure_count			
		];

		
		
		$process_cat_closur=$this->get_department_process_category_closures($request);
		
		
		$_cat_process_status= "'" .$process_cat_closur->implode('category_process_level',"','",)."'";
		$_cat_process_status_count=$process_cat_closur->implode('total',',');	

	
	

	
		$_category_process=[
		$_cat_process_status,
		$_cat_process_status_count
			
		];
		
		return view('admin.graphs.graphs_primary_drivers',compact('pageTitle','monthnames','detractors_count','passives_count','promotors_count','nps_count','total_departmentwise_scores','_dep_scors','_dep_act_scors','_patient_process','_category_process'));         
    }




}


