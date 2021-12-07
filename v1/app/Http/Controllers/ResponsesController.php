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
use Illuminate\Support\Facades\Crypt;

class ResponsesController extends Controller
{
    public function response_list()
    {   
        
        $responses_data=SurveyPerson::where('organization_id',Auth::user()->organization_id)->get();
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
        $pageTitle="Responses";    
        return view('admin.responses.responses_list', compact('pageTitle','responses_data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);  
    }
    public function response_view($per_id)
    { 
        $person_id = Crypt::decryptString($per_id);
        $person_data= SurveyPerson::where('organization_id',Auth::user()->organization_id)->where('id',$person_id)->get()->first();
        $person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        ->join('questions', 'survey_answered.question_id', '=', 'questions.id')
        ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
        ->where('survey_answered.organization_id',Auth::user()->organization_id)
        ->where('survey_answered.person_id',$person_id)
        ->get(['survey_answered.*','questions.label as question_label','question_options.option_value as option_value']);
        // dd($person_responses_data);
        $pageTitle= Str::title($person_data->firstname??'')." Response";    
        return view('admin.responses.responses_view', compact('pageTitle','person_responses_data','person_data'))
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
        return view('frontend.responses.responses_list', compact('pageTitle','responses_data'))
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
        // dd($person_responses_data);
        $pageTitle= Str::title($person_data->firstname??'')." Response";    
        return view('frontend.responses.responses_view', compact('pageTitle','person_responses_data','person_data'))
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

}
