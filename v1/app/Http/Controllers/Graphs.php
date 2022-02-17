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
		$datareport=$this->get_monthwise_opened_closed($request);		
		$department_statistics=$this->show_department_statistics($request);			
		
	
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
(SELECT count(survey_answered.id) FROM survey_answered WHERE survey_answered.ticket_status in ('opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back') and survey_answered.created_at >='$from_date 00:00:00' and survey_answered.created_at<='$to_date 23:59:59' )  as alerts_still_opened

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
->groupBy('survey_answered.department_name_id','person_id')
->get();


return $responses_data;


}





}


