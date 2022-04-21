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
use App\Models\User;
use App\Models\RatingOfDepartment;
use App\Models\RatingOfDepActivity;
use App\Models\Departments;

use Illuminate\Support\Facades\Crypt;




class ResponsesController extends Controller
{
	
	
	public function __construct() {
		$this->role = auth()->user()->role??0;
	  }
    public function response_list(Request $request)
    {   
		
		$role=auth()->user()->role??0;

	/*
        $responses_data=SurveyPerson::where('organization_id',Auth::user()->organization_id)		
		->where('survey_persons.logged_user_id',auth()->user()->id??0)
		->get();


        foreach ($responses_data as $key => $value) {
        $responses_data[$key]->qoptions = SurveyAnswered::select('question_options.option_value as answer','survey_answered.updated_at as last_status_updated_at')
         ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
         ->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
        ->where('survey_persons.organization_id',Auth::user()->organization_id)      
		->whereIn('survey_answered.question_id',[1,11])
       ->where('survey_answered.person_id',$value->id)
        ->orderBy('survey_persons.created_at','DESC')
        ->get();   
        }

*/
      
		$responses_data="";
		
		
		
		if($request->from_date &&  $request->to_date) {
			$from_date = $request->from_date;
			$to_date = $request->to_date;			
		}		
		else{
			
			$from_date = date('Y-m-01');
			$to_date = date('Y-m-t');
			
		}
		
		
		
		
				if($request->team) {					
				$QuestionOptions=QuestionOptions::where('option_value',$request->team)
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
		
		
		
		
			$Detractors = SurveyAnswered::select('users.firstname as assigned_user','survey_persons.*','survey_answered.rating as rating','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title','survey_answered.person_id')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
			->leftJoin('users','survey_persons.assigned_ticket', '=', 'users.id')			
			->whereIn('survey_answered.rating',[0,1,2,3,4,5,6])	
			->where(function($Detractors) use ($role){				
			
			if($role==2){

					$Detractors->where('survey_answered.department_name_id','0');					
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
			
			else if($role==7){				
				$Detractors->where('survey_persons.assigned_ticket',auth()->user()->id??0);
			
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

			->where(function($Detractors) use ($QuestionOptions,$role){

			
		
				if($role==3 || $role==4) {
					
				$Detractors->whereIn('survey_answered.answerid',$QuestionOptions);		
				$Detractors->where('survey_answered.answeredby_person','!=','');
				
				}
			
			
			
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

			
			
	
		
			$Passives = SurveyAnswered::select('users.firstname as assigned_user','survey_persons.*','survey_answered.rating as rating','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title','survey_answered.person_id')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
			->leftJoin('users','survey_persons.assigned_ticket', '=', 'users.id')			
			->whereIn('survey_answered.rating',[7,8])		
			->where(function($Passives) use ($role){

				
				if($role==2){

				$Passives->where('survey_answered.department_name_id','0');				
			}
			else if($role==3){				
				if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
				}				
				$Passives->whereIn('survey_answered.department_name_id',$q_departments??0);				
			}			
			else if($role==4){				
				$Passives->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}
			
			else if($role==7){				
				$Passives->where('survey_persons.assigned_ticket',auth()->user()->id??0);			
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
			
			->where(function($Passives) use ($QuestionOptions,$role){	
			
				if($role==3 || $role==4) {
					
				$Passives->whereIn('survey_answered.answerid',$QuestionOptions);
			    $Passives->where('survey_answered.answeredby_person','!=','');
				
				}				
			
			
			})
			->where(function($Passives) use ($Question){   
            if($Question){       
                $Passives->where('survey_answered.survey_id','=',$Question);                
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
			->where(function($Promoters) use ($role){	
			
			if($role==2){

				$Promoters->where('survey_answered.department_name_id','0');				
			}
			else if($role==3){				
				if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
				}				
				$Promoters->whereIn('survey_answered.department_name_id',$q_departments??0);				
			}			
			else if($role==4){				
				$Promoters->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}
			
			else if($role==7){				
				$Promoters->where('survey_persons.assigned_ticket',auth()->user()->id??0);			
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


			->where(function($Promoters) use ($QuestionOptions,$role){	
			
				if($role==3 || $role==4) {
				$Promoters->whereIn('survey_answered.answerid',$QuestionOptions);	
				$Promoters->where('survey_answered.answeredby_person','!=','');	
				}				

			
			})
			->where(function($Promoters) use ($Question){   
            if($Question){       
                $Promoters->where('survey_answered.survey_id','=',$Question);                
            }
            })
			
			
			->orderBy('survey_persons.created_at','DESC')
			->get();
			
			

	$myCollection = collect($Promoters);
	$uniqueCollection = $myCollection->unique('id');
	$uniqueCollection->all();
	$Promoters=$uniqueCollection;
		
	
		
        $pageTitle="Responses";  
		$pickteam=$request->team??'';	
		$quetion=$request->question_id??'';	
        return view('admin.responses.responses_list', compact('pageTitle','responses_data','Detractors','Passives','Promoters','pickteam','quetion'))
        ->withInput('i', (request()->input('page', 1) - 1) * 5);  
    }
    public function response_view($per_id)
    { 
	
	try{
		
        $person_id = Crypt::decryptString($per_id);		
        $person_data= SurveyPerson::where('id',$person_id)->get()->first();
	
		
		if(isset($person_data)) {
		
        $voice_message= DB::table('persons_voice_message')->where('person_id',$person_id??0)->get();
        $person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
        ->where('survey_answered.person_id',$person_id)
        ->get(['survey_answered.*','question_options.option_value as option_value','survey_persons.ticker_final_number','survey_persons.assigned_ticket']);
        // $person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        // ->join('questions', 'survey_answered.question_id', '=', 'questions.id')
        // ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
        // ->join('departments', 'departments.id', '=', 'question_options.department_id')
        // ->where('survey_answered.organization_id',Auth::user()->organization_id)
        // ->where('survey_answered.person_id',$person_id)
        // ->get(['survey_answered.*','questions.label as question_label','question_options.option_value as option_value','departments.department_name as department_name']);
        // dd($person_data);
        $person_responses_status_data = UpdateStatusResponseLog::where('person_id',$person_id)->orderBy('created_at','DESC')->get();
        //dd($person_responses_status_data);
        
        $pageTitle= Str::title($person_data->firstname??'')." Response"; 


        return view('admin.responses.responses_view', compact('pageTitle','person_responses_data','person_data','person_responses_status_data','voice_message'))
        ->with('i', (request()->input('page', 1) - 1) * 5);  
		
		}
		else{
			return redirect()->back()->with('error', "Something went wrong.");
		}
		
		
		}catch (RequestException $exception) {
		return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {		
		return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		
		
		
    }
    public function frontend_response_list()
    {   
        
        $responses_data=SurveyPerson::where('logged_user_id',Auth::user()->id)->get();


        foreach ($responses_data as $key => $value) {
        $responses_data[$key]->qoptions = SurveyAnswered::select('question_options.option_value as answer')
         ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
         ->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
        ->where('survey_persons.logged_user_id',Auth::user()->id)   
		
       ->where('survey_answered.person_id',$value->id)
        ->orderBy('survey_persons.created_at','DESC')
        ->get();   
        }
        // echo '<pre>'; print_r($responses_data); exit();
        $pageTitle="Responses";    
        return view('admin.responses.responses_list', compact('pageTitle','responses_data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);  
    }
    public function frontend_response_view($per_id)
    { 
	
	
        $person_id = Crypt::decryptString($per_id);
        $person_data= SurveyPerson::where('id',$person_id)->get()->first();
        $person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        ->join('questions', 'survey_answered.question_id', '=', 'questions.id')
        ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')       
        ->where('survey_answered.person_id',$person_id)
        ->get(['survey_answered.*','questions.label as question_label','question_options.option_value as option_value','survey_persons.ticker_final_number']);

        $person_responses_status_data = UpdateStatusResponseLog::where('person_id',$person_id)->orderBy('created_at','DESC')->get();
        // dd($person_responses_status_data);
        $pageTitle= Str::title($person_data->firstname??'')." Response";    
        return view('admin.responses.responses_view', compact('pageTitle','person_responses_data','person_data','person_responses_status_data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);  
    }

    public function delete_responses($per_id)
    {
        $ID = Crypt::decryptString($per_id);
            $data=SurveyAnswered::where('person_id',$ID)->delete();
            $data=SurveyPerson::where('id',$ID)->delete();
            // dd($data);
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
    public function feedback_list()
    {     
        $pageTitle="Feedback";    
        return view('admin.feedback.feedback_list', compact('pageTitle'));  
    }



public function ticket_status_update($request=false){
try{
	

$Ticket_Status=SurveyAnswered::where('person_id', $request->id)
	->update(
	[  
		"ticket_status"=>$request->ticket_status??'',
		"ticket_remarks"=>$request->ticket_remarks??'',
		"category_process_level"=>$request->category_process??'',
		"process_level_closure"=>$request->process_level_closure??'',
	]
	); 

}catch (RequestException $exception) {
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
catch (\Exception $exception) {		
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
}


	
public function ticket_status_logging($request=false){
try{
	

if($request->ticket_status=="assigned")
{
	$user_data= User::where('id',$request->assigned??0)->get('firstname')->first();
	if($user_data){
		$remarks=$request->ticket_remarks." (Assigned to ".$user_data->firstname.")";
	}
	
}

else if($request->ticket_status=="transferred")
{
	$user_data= User::where('id',$request->hod_user??0)->get('firstname')->first();
	if($user_data){
		$remarks=$request->ticket_remarks." (Transferred to ".$user_data->firstname.")";
	}
	
}
else{	

	$user_data= User::where('id',Auth::user()->id??0)->get('firstname')->first();
	if($user_data){
		$remarks=$request->ticket_remarks." (Updated by ".$user_data->firstname.")";
	}
}


$Ticket_Logging=UpdateStatusResponseLog::insert([
		[
			"organization_id"=>$request->organization_id??'',
			"logged_user_id"=>$request->logged_user_id??'',
			"survey_id"=>$request->survey_id??'',
			"person_id"=>$request->id??'',
			"ticket_status"=>$request->ticket_status??'',
			"ticket_remarks"=>$remarks??'',
			"process_level_closure"=>$request->process_level_closure??'',
			"category_process_level"=>$request->category_process??'',
			"assigned_user_id"=>$request->assigned??0,
			"created_at"=>Carbon::now(),
			"updated_at"=>Carbon::now(),
		]  
	]);

}catch (RequestException $exception) {
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
catch (\Exception $exception) {		
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
}


public function ticket_department_status_update($request=false,$QuestionOptions=false){
try{
	

$Ticket_Status=SurveyAnswered::where('person_id', $request->id)->whereIn('department_name_id',$QuestionOptions)
	->update(
	[  
		"department_status"=>$request->ticket_status??'',
		"ticket_remarks"=>$request->ticket_remarks??'',
		"category_process_level"=>$request->category_process??'',
		"process_level_closure"=>$request->process_level_closure??'',
	]
	); 

}catch (RequestException $exception) {
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
catch (\Exception $exception) {		
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
}
public function verify_all_department_taken_action($request=false){
try{
	
	
$NotNull=SurveyAnswered::where('person_id', $request->id)->whereNotIn('department_name_id', [0,21,154])->whereNotNull('department_status')->count();
$AllDepartments=SurveyAnswered::where('person_id', $request->id)->whereNotIn('department_name_id', [0,21,154])->count();

if($AllDepartments==$NotNull){
$Ticket_Status=SurveyAnswered::where('person_id', $request->id)
	->update(
	[  
		"ticket_status"=>'closed_satisfied',
		"ticket_remarks"=>$request->ticket_remarks??'',
		"category_process_level"=>$request->category_process??'',
		"process_level_closure"=>$request->process_level_closure??'',
	]
	); 
	
}
else{
	return redirect()->back()->with('warning', "Still pending action of other departments for close ticket.");
}

}catch (RequestException $exception) {
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
catch (\Exception $exception) {		
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
}

public function response_update_status(Request $request)
{ 








$request->validate([
'ticket_status' => 'required', 
'ticket_remarks' => 'required',        
]); 

if(isset($request)) {
	
if($request->ticket_status=="assigned")
{
	$this->assigned_ticket_support_team($request);
	$this->ticket_status_update($request);
	$this->ticket_status_logging($request);

}
else if($request->ticket_status=="transferred")
{
	$this->transferred_ticket($request);
	$this->ticket_status_update($request);
	$this->ticket_status_logging($request);

}

else if($request->ticket_status=="process_level_closure")
{
	$QuestionOptions=QuestionOptions::where('department_id',Auth::user()->department)->pluck('id');
	$this->ticket_department_status_update($request,$QuestionOptions);
	$this->ticket_status_logging($request);
	$this->verify_all_department_taken_action($request);
}

else if($request->ticket_status=="patient_level_closure")
{
	$QuestionOptions=QuestionOptions::where('department_id',Auth::user()->department)->pluck('id');
	$this->ticket_department_status_update($request,$QuestionOptions);
	$this->ticket_status_logging($request);	
	$this->verify_all_department_taken_action($request);
}


else{	

	$this->ticket_status_update($request);
	$this->ticket_status_logging($request);
}
/* Ticket status and log update */




/*** End ***/
return redirect()->back()->with('success', "Success! Status are updated successfully."); 
}
else{
return redirect()->back()->with('error', "Something went wrong."); 
}
        
}



public function transferred_ticket($request=false){
try{
	
	
$logged_user_data= User::select('firstname','department')->where('id',auth()->user()->id??0)->get()->first();
$transferred_user_data= User::select('firstname','department')->where('id',$request->hod_user??0)->get()->first();
$Departments=Departments::where('id',$transferred_user_data->department??0)->get('department_name')->first();
$old_department_id=$logged_user_data->department??0;
$new_department_id=$transferred_user_data->department??0;
$ticket_id=$request->id??0;
$new_department_name=$Departments->department_name??'';
$old_q_departments=QuestionOptions::where('department_id',$old_department_id??0)->get()->pluck('id');
$new_q_departments=QuestionOptions::where('department_id',$new_department_id??0)->get()->pluck('id');






/*** Update HOD User Id after transferred ***/


$Transferred_Ticket=SurveyPerson::where('id',$request->id??0)
->update(
[  
"transferred_ticket"=>$request->hod_user??0,
]
);




foreach($old_q_departments as $key=>$value){


$SurveyAnswered=SurveyAnswered::where('department_name_id',$value??0)->where('person_id',$request->id??0)
->update(
	[  
		"answerid"=>$new_q_departments[$key]??0,
		"department_name_id"=>$new_q_departments[$key]??0,
	]
);


$RatingOfDepartment=RatingOfDepartment::where('department_id',$value??0)->where('person_id',$request->id??0)
->update(
	[  
		"department_id"=>$new_q_departments[$key]??0,
		"department_name"=>$new_department_name??0,
	]
);


$RatingOfDepActivity=RatingOfDepActivity::where('department_id',$value??0)->where('person_id',$request->id??0)
->update(
	[  
		"department_id"=>$new_q_departments[$key]??0,
		
	]
);



}






}catch (RequestException $exception) {
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
catch (\Exception $exception) {		
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
}


	
	


	
public function assigned_ticket_support_team($request=false){
try{
$Assigned_Ticket=SurveyPerson::where('id',$request->id??0)
->update(
[  
"assigned_ticket"=>$request->assigned??0,
]
);

}catch (RequestException $exception) {
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
catch (\Exception $exception) {		
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
}
}
		
		

}
