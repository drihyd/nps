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

class ResponsesController extends Controller
{
    public function response_list(Request $request)
    {   
        $responses_data=SurveyPerson::where('organization_id',Auth::user()->organization_id)		
		->where('survey_persons.logged_user_id',auth()->user()->id??0)
		->get();
        // echo '<pre>'; print_r($responses_data); exit();

        foreach ($responses_data as $key => $value) {
        $responses_data[$key]->qoptions = SurveyAnswered::select('question_options.option_value as answer')
         ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
         ->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
        ->where('survey_persons.organization_id',Auth::user()->organization_id)
        ->where('survey_answered.question_id',1)
       ->where('survey_answered.person_id',$value->id)
        ->orderBy('survey_persons.created_at','DESC')
        ->get();   
        }

        //dd($responses_data);

        // echo '<pre>'; print_r($responses_data); exit();

        // $responses_data=SurveyAnswered::select('question_options.option_value','survey_persons.firstname','survey_persons.email','survey_persons.mobile','survey_persons.created_at')
        //  ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
        //  ->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
        // ->where('survey_persons.organization_id',Auth::user()->organization_id)
        // ->where('survey_answered.question_id',1)
        // ->orderBy('survey_persons.created_at','DESC')
        // ->get();
		
		
		
		
		if($request->from_date &&  $request->to_date) {
			$from_date = $request->from_date;
			$to_date = $request->to_date;			
		}		
		else{
			
			$from_date = date('Y-m-01');
			$to_date = date('Y-m-t');
			
		}
		
		
		
		
				if($request->team) {					
				$QuestionOptions=QuestionOptions::select()
				->where('option_value',$request->team)
				->pluck('id');				
				}		
				else{
				$QuestionOptions='';
				
				
				}
		
		
		
		
			$Detractors = SurveyAnswered::select('survey_persons.*','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->where('survey_persons.organization_id',Auth::user()->organization_id)
				
			->whereIn('survey_answered.rating',[0,1,2,3,4,5,6])
			->where('survey_persons.logged_user_id',auth()->user()->id??0)			
			->where(function($Detractors) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
				$Detractors->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
				$Detractors->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})

			->where(function($Detractors) use ($QuestionOptions){	
			if($QuestionOptions){		
				$Detractors->whereIn('survey_answered.answerid',$QuestionOptions);				
				$Detractors->where('survey_answered.answeredby_person','!=','');				
			}	
			else{
			$Detractors->where('survey_answered.question_id',1);	
			}
			
			})
			
			->orderBy('survey_persons.created_at','DESC')
			->get();
			
		
			$Passives = SurveyAnswered::select('survey_persons.*','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->where('survey_persons.organization_id',Auth::user()->organization_id)
			//->where('survey_answered.question_id',1)		
			->whereIn('survey_answered.rating',[7,8])
			->where('survey_persons.logged_user_id',auth()->user()->id??0)			
			->where(function($Passives) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
				$Passives->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
				$Passives->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})
			
			->where(function($Passives) use ($QuestionOptions){	
			if($QuestionOptions){		
				$Passives->whereIn('survey_answered.answerid',$QuestionOptions);
			   $Passives->where('survey_answered.answeredby_person','!=','');					
			}	
			else{
			$Passives->where('survey_answered.question_id',1);	
			}
			
			})
			
			->orderBy('survey_persons.created_at','DESC')
			->get(); 
			
			
			
			$Promoters = SurveyAnswered::select('survey_persons.*','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->where('survey_persons.organization_id',Auth::user()->organization_id)
			//->where('survey_answered.question_id',1)		
			->whereIn('survey_answered.rating',[9,10])
			->where('survey_persons.logged_user_id',auth()->user()->id??0)			
			->where(function($Promoters) use ($from_date,$to_date){	
			if($from_date &&  $to_date){		
				$Promoters->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
				$Promoters->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
			}		
			})		


			->where(function($Promoters) use ($QuestionOptions){	
			if($QuestionOptions){		
				$Promoters->whereIn('survey_answered.answerid',$QuestionOptions);	
				$Promoters->where('survey_answered.answeredby_person','!=','');				
			}
			else{
				$Promoters->where('survey_answered.question_id',1);	
			}
			
			})
			
			->orderBy('survey_persons.created_at','DESC')
			->get();
			
			
			
	
		
		
		
        $pageTitle="Responses";  
		$pickteam=$request->team??'';		
        return view('admin.responses.responses_list', compact('pageTitle','responses_data','Detractors','Passives','Promoters','pickteam'))
        ->withInput('i', (request()->input('page', 1) - 1) * 5);  
    }
    public function response_view($per_id)
    { 
        $person_id = Crypt::decryptString($per_id);
        $person_data= SurveyPerson::where('organization_id',Auth::user()->organization_id)->where('id',$person_id)->get()->first();

        $person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
        ->where('survey_answered.organization_id',Auth::user()->organization_id)
        ->where('survey_answered.person_id',$person_id)
        ->get(['survey_answered.*','question_options.option_value as option_value']);
        // $person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        // ->join('questions', 'survey_answered.question_id', '=', 'questions.id')
        // ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
        // ->join('departments', 'departments.id', '=', 'question_options.department_id')
        // ->where('survey_answered.organization_id',Auth::user()->organization_id)
        // ->where('survey_answered.person_id',$person_id)
        // ->get(['survey_answered.*','questions.label as question_label','question_options.option_value as option_value','departments.department_name as department_name']);
        // dd($person_data);
        $person_responses_status_data = UpdateStatusResponseLog::where('logged_user_id',Auth::user()->id)->where('person_id',$person_id)->orderBy('created_at','DESC')->get();
        // dd($person_responses_status_data);
        
        $pageTitle= Str::title($person_data->firstname??'')." Response";    
        return view('admin.responses.responses_view', compact('pageTitle','person_responses_data','person_data','person_responses_status_data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);  
    }
    public function frontend_response_list()
    {   
        
        $responses_data=SurveyPerson::where('logged_user_id',Auth::user()->id)->get();


        foreach ($responses_data as $key => $value) {
        $responses_data[$key]->qoptions = SurveyAnswered::select('question_options.option_value as answer')
         ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
         ->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
        ->where('survey_persons.logged_user_id',Auth::user()->id)
        ->where('survey_answered.question_id',1)
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
        $person_data= SurveyPerson::where('logged_user_id',Auth::user()->id)->where('id',$person_id)->get()->first();
        $person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        ->join('questions', 'survey_answered.question_id', '=', 'questions.id')
        ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
        ->where('survey_answered.logged_user_id',Auth::user()->id)
        ->where('survey_answered.person_id',$person_id)
        ->get(['survey_answered.*','questions.label as question_label','question_options.option_value as option_value']);

        $person_responses_status_data = UpdateStatusResponseLog::where('logged_user_id',Auth::user()->id)->where('person_id',$person_id)->orderBy('created_at','DESC')->get();
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

    public function response_update_status(Request $request)
    { 
        $request->validate([
            'ticket_status' => 'required', 
            'ticket_remarks' => 'required',        
        ]); 

        
        SurveyAnswered::where('person_id', $request->id)
            ->update(
            [  
                "ticket_status"=>$request->ticket_status??'',
                "ticket_remarks"=>$request->ticket_remarks??'',
            ]
            ); 


       	UpdateStatusResponseLog::insert([
            [
                "organization_id"=>$request->organization_id??'',
                "logged_user_id"=>$request->logged_user_id??'',
                "survey_id"=>$request->survey_id??'',
                "person_id"=>$request->id??'',
                "ticket_status"=>$request->ticket_status??'',
                "ticket_remarks"=>$request->ticket_remarks??'',
            ]  
        ]);
        return redirect()->back()->with('success', "Success! Status are updated successfully"); 
    }

}
