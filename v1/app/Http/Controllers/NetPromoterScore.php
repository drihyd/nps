<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;
use Auth;
use Session;
use App\Models\Questions;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
use App\Models\Surveys;
use Illuminate\Support\Facades\Crypt;

class NetPromoterScore extends Controller
{

    public function nps_login()
    {
        $pageTitle="Login"; 
        $page=false;
		$user  = auth()->user();       
        if ($user && $user->role==3) {           
            return redirect('survey/first')->with('success', 'Successfully logged in.');

        }
        else if ($user && $user->role==4) {         
            return redirect('survey/first')->with('success', 'Successfully logged in.');
        }
        
        else{
           
           return view('frontend.survey.login',compact('pageTitle','page'));
        } 
    }
    public function Loginsubmit(Request $request)
    {
    
   
   
   
   	$credentials = $request->only('email', 'password');		
		
        if (Auth::attempt($credentials)) {  
        	$user  = auth()->user();
				switch(Auth::user()->role){
				case '3':
				return redirect('survey/first')->with('success', 'Successfully logged in.');
				break;
				case '4':
				return redirect('survey/first')->with('success', 'Successfully logged in.');
				break;
				
				default:
				Auth::logout();
				Session::flush();
				return redirect('/')->with('error', 'Failed to logged in.'); 
				}			


		
        }
        else{
	        return redirect('/')->with('error', 'Failed to logged in.');
	    }
   

    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('error', 'You have been successfully logged out!'); 
    }
	
	 public function survey_names()
    {
		
	
		
		if(auth()->user()){
			
		$organization_id=auth()->user()->organization_id;
		$Surveys=Surveys::select('*')->where('organization_id',$organization_id??0)->get();	
		$page=false;			
		return view('frontend.survey.survey_names',compact('page','Surveys'));
		}
		else{
			return redirect()->back()->with('error', 'Something went wrong.');  
		}
    }		
public function take_person_onfo($param=false)
{
	if(auth()->user())
	{
		try{
		$surveyid=Crypt::decryptString($param);
		$organization_id=auth()->user()->organization_id;
		$Surveys=Surveys::select('*')->where('id',$surveyid)->get();
		if($Surveys){		
		$page=false;			
		return view('frontend.survey.person_info',compact('page','Surveys'));
		}else{
		return redirect()->back()->with('error', 'Undefined survey.'); 
		}
		}
		catch (\Exception $exception){
		//return redirect()->back()->with('error', 'Something went wrong.');
		//$this->survey_names();
		}
	}
	else
	{
		return redirect()->back()->with('error', 'User not logged in.');  
	}
}	
	 public function first_question()
    {
		

		$Questions=Questions::select('questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('sequence_order',1)->get();		 
		foreach ($Questions as $key => $value) {
		$Questions[$key]->qoptions = QuestionOptions::select('question_options.option_value as qpvalue','question_options.id as qoptionid')
		->where('question_id', $value->qid)
		->get();	
		}		
		$page=false;		
	
		return view('frontend.survey.first_question',compact('page','Questions'));
    }
	
	public function second_question()
    {
		$page=false;
        return view('frontend.survey.second_question',compact('page'));
    }	
	public function surveyone_post(Request $request)
    {
		
		
		$Questions=Questions::select('questions.next_qustion_id as qnq','questions.sequence_order as qseq','questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('sequence_order',$request->question_id)->get()->first();		 
		$qseq=$Questions->qseq;		
		if($request->first_questin_range){			
		if($qseq!=1){		
		$nextquestion=$Questions->qnq;
		}
		else{
			/* Duplicate survey question and answered */
	$delete_exist_answered=SurveyAnswered::where('survey_id',$request->survey_id)->where('organization_id',$request->organization_id)->delete();
			
			$nextquestion=$this->set_next_question($request->first_questin_range);
		}		
		$page=false;		
	
	
	
	if(empty($request->organization_id) || empty($request->survey_id) || empty($request->question_id))
	{
		return redirect()->back()->with('error', 'Something went wrong.');  
	}
	else{
		
	/* Duplicate answered question */
	$delete_exist_answered=SurveyAnswered::where('question_id',$request->question_id)->where('survey_id',$request->survey_id)->where('organization_id',$request->organization_id)->delete();
	
	
		
        $first_questionans=SurveyAnswered::insert([
            [
                "organization_id"=>$request->organization_id??0,
                "survey_id"=>$request->survey_id??0,
                "question_id"=>$request->question_id??0,
                "answerid"=>$request->first_questin_range??0,
                "answeredby_person"=>$request->answerdbyperson??'',
            ]  
        ]); 
		
		
		$Questions=Questions::select('questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('sequence_order',$nextquestion)->get();		 
		foreach ($Questions as $key => $value) {
		$Questions[$key]->qoptions = QuestionOptions::select('question_options.option_value as qpvalue','question_options.id as qoptionid')
		->where('question_id', $value->qid)
		->get();	
		}	
		
		

		
		
		return view('frontend.survey.first_question',compact('page','Questions'));
		
	}
		
		//return view('frontend.survey.second_question',compact('page'));
		}
		else{
			return redirect()->back()->with('error', 'Please select score number.');  
		}
    }
	
	
	public function set_next_question($score=false) {
	
	switch ($score) {
		case '1':
		$next_question='4';
		break;
		case '2':
		$next_question='4';
		break;
		case '3':
		$next_question='4';
		break;
		case '4':
		$next_question='4';
		break;
		case '5':
		$next_question='4';
		break;		 
		case '6':
		$next_question='4';
		break;  
		case '7':
		$next_question='3';
		break;	
		case '8':
		$next_question='3';
		break;
		case '9':
		$next_question='2';
		break;
		case '10':
		$next_question='2';
		break;
		default:
		$next_question='2';
}

return $next_question;
	
}
    
    
}
