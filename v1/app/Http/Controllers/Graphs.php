<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
use App\Models\Surveys;
use App\Models\SurveyPerson;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Graphs extends Controller
{
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
		
		
	
			if($request->from_date &&  $request->to_date) {
			$from_date = $request->from_date;
			$to_date = $request->to_date;			
			}		
			else{

				$from_date = date('Y-01-01');
				$to_date = date('Y-12-t');

			}
	
		
		
		
			$users = SurveyAnswered::select('id', 'created_at')
			->whereIn('survey_answered.question_id',[1,11])
			->whereIn('survey_answered.ticket_status',['opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back']) 
			 
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
			$userArr[$i]['action_count'] = $usermcount[$i];
			} else {
			$userArr[$i]['action_count'] = 0;
			}
			$userArr[$i]['month'] = $month[$i - 1];
			}
			
			
	
			

		
	
			
			/*** closed actions***/
			$_users = SurveyAnswered::select('id', 'created_at')
			->whereIn('survey_answered.question_id',[1,11])
			->whereIn('survey_answered.ticket_status',['closed_satisfied','closed_unsatisfied']) 
			 
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


$responses_data = DB::table("survey_answered")
->select(
"survey_answered.department_name_id",
DB::raw("
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.ticket_status in ('closed_satisfied','closed_unsatisfied','opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back') and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59' )  as alerts_came_in,
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.ticket_status in ('closed_satisfied','closed_unsatisfied') and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59' )  as alerts_closed,
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.ticket_status in ('phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back') and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59' )  as alerts_still_opened

")
)

->where(function($responses_data) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$responses_data->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
$responses_data->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
}		
})
			
->whereNotIn('survey_answered.question_id',[1,11])
->whereNotIn('survey_answered.department_name_id',[21])
->whereNotNull('survey_answered.department_name_id')
->groupBy('survey_answered.department_name_id')
->get();


return $responses_data;


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

		
		
		
		
		return view('admin.graphs.graphs_lists_inpatient',compact('pageTitle','monthnames','detractors_count','passives_count','promotors_count'));         
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
			->whereIn('survey_answered.question_id',[1,11])
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
			->whereIn('survey_answered.question_id',[1,11])
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
			} else {
			$_userArr[$i]['passives'] = 0;
			}
			$_userArr[$i]['month'] = $month[$i - 1];
			}
			
			
			
			
			/*** promotors actions***/
			$__users = SurveyAnswered::select('id', 'created_at')
			->whereIn('survey_answered.question_id',[1,11])
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


$graph_data_statics=$this->custom_array_merge($userArr,$_userArr);
$graph_data_statics=$this->custom_array_merge($graph_data_statics,$__userArr);
return $graph_data_statics;


		
		
	}



}


