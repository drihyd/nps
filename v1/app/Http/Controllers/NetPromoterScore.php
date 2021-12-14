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
use App\Models\Organizations;
use App\Models\Questions;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
use App\Models\Surveys;
use App\Models\SurveyPerson;
use Illuminate\Support\Facades\Crypt;
use Config;
use Mail;
use App\Mail\FeedbackSurvey;

class NetPromoterScore extends Controller
{



    public function nps_score_factor_count()
    {
		
		
		
		$organization_id=auth()->user()->organization_id;		
		$Promoters=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)
		->where('survey_answered.question_id',1)
		->where('survey_answered.logged_user_id',auth()->user()->id??0)
		->whereIn('question_options.option_value',[9,10])
		->count();
		$Neutral=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)
		->where('survey_answered.question_id',1)
		->where('survey_answered.logged_user_id',auth()->user()->id??0)
		->whereIn('question_options.option_value',[7,8])
		->count();
		$Detractors=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)
		->where('survey_answered.question_id',1)
		->where('survey_answered.logged_user_id',auth()->user()->id??0)
		->whereIn('question_options.option_value',[0,1,2,3,4,5,6])
		->count();
		
		$total_feedbacks=$Promoters+$Neutral+$Detractors;
		
		
		
				if($total_feedbacks){
				$NPS = (((($Promoters-$Detractors)/$total_feedbacks)*100)*1);
				}
				else{
				$NPS = (((($Promoters-$Detractors)/1)*100)*1);
				}
		$final_score=
			[
				"Promoters"=>$Promoters,
				"Neutral"=>$Neutral,
				"Detractors"=>$Detractors,
				"total_feedbacks"=>$total_feedbacks,
				"NPS"=>$NPS,
			];
			
		return json_encode($final_score);
		


    }

    public function nps_login()
    {
        $pageTitle="Login"; 
        $page=false;
		$user  = auth()->user();       
        if ($user && $user->role==3) {           
            return redirect('user/dashboard')->with('success', 'Successfully logged in.');

        }
        else if ($user && $user->role==4) {         
            return redirect('user/dashboard')->with('success', 'Successfully logged in.');
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
public function picksurvey_method($param=false)
{
	

	if(auth()->user())
	{
		
		$surveyid=Crypt::decryptString($param);
		$Surveys=Surveys::select('*')->where('id',$surveyid)->get();
		$page=false;
		return view('frontend.survey.survey_method',compact('page','Surveys'));
	}
	else
	{
		return redirect()->back()->with('error', 'User not logged in.');  
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

public function store_survey_personinfo(Request $request){



	if($request){
		
		
		
			if($request->survey_id){
				
				

				/* Duplicate Survey Person */
				//$SurveyPerson=SurveyPerson::where('organization_id',$request->organization_id)->where('survey_id',$request->survey_id)->where('email',$request->email)->where('logged_user_id',auth()->user()->id)->delete();
				/* End */
		
	
				$Organizations=Organizations::select('*')->where('id',$request->organization_id??0)->get();	
				

				$input = [
				"firstname"=>$request->firstname??0,
				"email"=>$request->email??0,
				"mobile"=>$request->phone??0,
				"organization_id"=>$request->organization_id??0,
				"survey_id"=>$request->survey_id??'',
				"logged_user_id"=>auth()->user()->id??0,
				];

				$user = SurveyPerson::create($input);
				Session::put('person_id', $user->id);
				Session::put('comapny_name',$Organizations[0]->company_name??'');
		
		
		


if($request->sendlink_email){
	

	
	if(auth()->user()->role==2){
		$prefix=Config::get('constants.admin');
	}
	else{
		$prefix=Config::get('constants.user');
	}
	
		try{
		$offer = [		
		'name' =>$request->firstname,
		'email' =>$request->email,
		'prefix' =>$prefix,
		'surveyid' =>Crypt::encryptString($request->survey_id),
		'loggedid' =>Crypt::encryptString(auth()->user()->id),
		'personid' =>Crypt::encryptString($user->id),

		];
		Mail::to($request->email)->send(new FeedbackSurvey($offer));
		}
		catch (\Exception $exception) {
		} 
		
		
		return redirect()->back()->with('success', 'Feedback survey url sent to entered email id.');
				
}
else{


			


		
			if(auth()->user()->role==2){
				return redirect(Config::get('constants.admin').'/takesurvey/'.Crypt::encryptString($request->survey_id))->with('info', 'Start survey');
			}
			else{
				
				return redirect(Config::get('constants.user').'/takesurvey/'.Crypt::encryptString($request->survey_id))->with('info', 'Start survey');
			}
			
}
				
				//return redirect('user/picksurveymethod/'.Crypt::encryptString($request->survey_id))->with('info', 'Start survey');
				
				
			}	
			else{
				
				return redirect()->back()->with('error', 'Something went wrong.');
			}
		}
		else{
			
			return redirect()->back()->with('error', 'Something went wrong.');
		}
	
}



public function first_question_offline($sid=false,$logid=false,$pid=false)
{

	$surveyid=Crypt::decryptString($sid);
	$logid=Crypt::decryptString($logid);
	$pid=Crypt::decryptString($pid);	
	
	Session::put('person_id',$pid);		
	Session::put('logged_user_id',$logid);
				
	
				
	$Questions=Questions::select('questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('sequence_order',1)->where('survey_id',$surveyid)->get();		 
	foreach ($Questions as $key => $value) {
	$Questions[$key]->qoptions = QuestionOptions::select('question_options.option_value as qpvalue','question_options.id as qoptionid')
	->where('question_id', $value->qid)
	->orderBy('id','asc')
	->get();	
	}		
	$page=false;		

	return view('frontend.survey.first_question',compact('page','Questions'));
}



public function first_question($param=false)
{

	$surveyid=Crypt::decryptString($param);
	$Questions=Questions::select('questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('sequence_order',1)->where('survey_id',$surveyid)->get();		 
	foreach ($Questions as $key => $value) {
	$Questions[$key]->qoptions = QuestionOptions::select('question_options.option_value as qpvalue','question_options.id as qoptionid')
	->where('question_id', $value->qid)
	->orderBy('id','asc')
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
	 $delete_exist_answered=SurveyAnswered::where('survey_id',$request->survey_id)->where('organization_id',$request->organization_id)->where('logged_user_id',auth()->user()->id??Session::get('logged_user_id'))->where('person_id',Session::get('person_id'))->delete();
			
			$nextquestion=$this->set_next_question($request->first_questin_range);
		}		
		$page=false;		
	
	
	
	if(empty($request->organization_id) || empty($request->survey_id) || empty($request->question_id))
	{
		return redirect()->back()->with('error', 'Something went wrong.');  
	}
	else{
		
		
		
		if($request->first_questin_range){
		
		
		
	/* Duplicate answered question */
	$delete_exist_answered=SurveyAnswered::where('question_id',$request->question_id)->where('survey_id',$request->survey_id)->where('organization_id',$request->organization_id)->where('logged_user_id',auth()->user()->id??Session::get('logged_user_id'))->where('person_id',Session::get('person_id'))->delete();
	
	if(is_array($request->first_questin_range))
	{
		
		foreach($request->first_questin_range as $key=>$value){
			
		$first_questionans=SurveyAnswered::insert([
            [
                "organization_id"=>$request->organization_id??0,
                "survey_id"=>$request->survey_id??0,
                "question_id"=>$request->question_id??0,
                "answerid"=>$value??0,
                "answeredby_person"=>$request->answerdbyperson??'',
                "person_id"=>Session::get('person_id')??0,
				"logged_user_id"=>auth()->user()->id??Session::get('logged_user_id'),
            ]  
        ]); 
			
		}
		
		$selected_departments=$request->first_questin_range??'';
		
		
		

$departments = QuestionOptions::select('question_options.option_value as qpvalue','question_options.id as qoptionid')
->whereIn('id', $selected_departments)
->get();
		

	
	}
	else{
		
		
		if(is_array($request->answerdbyperson)){
			
			
			
		foreach($request->answerdbyperson as $key=>$value){

			$first_questionans=SurveyAnswered::insert([
			[
			"organization_id"=>$request->organization_id??0,
			"survey_id"=>$request->survey_id??0,
			"question_id"=>$request->question_id??0,
			"answerid"=>$key??'',
			"answeredby_person"=>$value??'',
			 "person_id"=>Session::get('person_id')??0,
			 "logged_user_id"=>auth()->user()->id??Session::get('logged_user_id'),
			]  
			]); 


		}
					
	
			
		}
		else{
			
				


if($request->is_pick_slider){	



$getoptid = QuestionOptions::select('question_options.id as qoptionid')
->where('option_value', $request->first_questin_range)
->where('question_id',1)
->get()->first();


			
        $first_questionans=SurveyAnswered::insert([
            [
                "organization_id"=>$request->organization_id??0,
                "survey_id"=>$request->survey_id??0,
                "question_id"=>$request->question_id??0,
                "answerid"=>$getoptid->qoptionid??0,
                "answeredby_person"=>$request->answerdbyperson??'',
				 "person_id"=>Session::get('person_id')??0,
				 "logged_user_id"=>auth()->user()->id??Session::get('logged_user_id'),
            ]  
        ]);		
		
}
else{
	
	        $first_questionans=SurveyAnswered::insert([
            [
                "organization_id"=>$request->organization_id??0,
                "survey_id"=>$request->survey_id??0,
                "question_id"=>$request->question_id??0,
                "answerid"=>$request->first_questin_range??0,
                "answeredby_person"=>$request->answerdbyperson??'',
				 "person_id"=>Session::get('person_id')??0,
				 "logged_user_id"=>auth()->user()->id??Session::get('logged_user_id'),
            ]  
        ]);	
	
}
		
		}

		
		$selected_departments='';
		$departments='';
		
	}
		
		
		$Questions=Questions::select('questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('sequence_order',$nextquestion)->get();		 
		foreach ($Questions as $key => $value) {
		$Questions[$key]->qoptions = QuestionOptions::select('question_options.option_value as qpvalue','question_options.id as qoptionid')
		->where('question_id', $value->qid)
		->get();	
		}	
		
		
		
		
		
		
		
		return view('frontend.survey.first_question',compact('page','Questions','selected_departments','departments'));
		
	
	
	
	
	
		}
		
		else{
			return redirect()->back()->with('error', 'Please enter value.');  
		}
	
	
	}
	
	
	
	
	
		
		//return view('frontend.survey.second_question',compact('page'));
		}
		else{
			return redirect()->back()->with('error', 'Please select score number.');  
		}
    }

	
	
	public function set_next_question($score=false) {
	
	switch ($score) {
		case '0':
		$next_question='4';
		break;	
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
