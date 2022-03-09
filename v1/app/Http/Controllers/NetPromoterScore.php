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
use App\Models\CustomerFieldsConfigurable;
use Illuminate\Support\Facades\Crypt;
use Config;
use Mail;
use App\Mail\FeedbackSurvey;
use App\Mail\TicketOpened;
use App\Mail\HodMails;
use App\Mail\EsclationMails;
use App\Models\Activities;
use App\Models\Departments;
use Log;
use Illuminate\Support\Collection;


class NetPromoterScore extends Controller
{





    public function nps_score_factor_count()
    {
		
		
		
		
	
		try{

		$organization_id=auth()->user()->organization_id;	
		
		$role=auth()->user()->role??0;
		
		
		
			if(isset($request->team)) {					
				$QuestionOptions=QuestionOptions::where('option_value',$request->team)
				->pluck('id');				
				}		
				else{
					$QuestionOptions=QuestionOptions::pluck('id');
				
				
				}
				
		

		
		$Promoters=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)		
		
				
		->where(function($Promoters) use ($role){	
		if($role==2){	

		}
		elseif($role==3){	
		
		if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
					
					$Promoters->whereIn('survey_answered.department_name_id',$q_departments);	
				}	

		}
		else{
		$Promoters->where('survey_answered.logged_user_id',auth()->user()->id??0);
		}	
		})
		
		->where(function($Promoters) use ($QuestionOptions){
		$Promoters->whereIn('survey_answered.answerid',$QuestionOptions);		
		$Promoters->where('survey_answered.answeredby_person','!=','');		
		})
		
		

		->whereIn('question_options.option_value',[9,10])
		->count();
		

		
		
		$Neutral=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)
	
		
		->where(function($Neutral) use ($role){	
		if($role==2){	

		}
		elseif($role==3){	
		
		if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
					
					$Neutral->whereIn('survey_answered.department_name_id',$q_departments);	
				}	

		}
		else{
		$Neutral->where('survey_answered.logged_user_id',auth()->user()->id??0);
		}	
		})


			->where(function($Neutral) use ($QuestionOptions){
		$Neutral->whereIn('survey_answered.answerid',$QuestionOptions);		
		$Neutral->where('survey_answered.answeredby_person','!=','');		
		})
		->whereIn('question_options.option_value',[7,8])
		->count();
		
		
		$Detractors=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)
	
		->where(function($Detractors) use ($role){	
		if($role==2){	

		}
		elseif($role==3){	
		
		if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
					
					$Detractors->whereIn('survey_answered.department_name_id',$q_departments);	
				}	

		}
		else{
		$Detractors->where('survey_answered.logged_user_id',auth()->user()->id??0);
		}	
		})
		
		
		->where(function($Detractors) use ($QuestionOptions){
		$Detractors->whereIn('survey_answered.answerid',$QuestionOptions);		
		$Detractors->where('survey_answered.answeredby_person','!=','');		
		})

		
		
		->whereIn('question_options.option_value',[0,1,2,3,4,5,6])
		->count();

		
		
	
		$Promoters_lastweek=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)
	
		->where(function($Promoters_lastweek) use ($role){	
		if($role==2){	

		}
		elseif($role==3){	
		
		if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
					
					$Promoters_lastweek->whereIn('survey_answered.department_name_id',$q_departments);	
				}	

		}
		else{
		$Promoters_lastweek->where('survey_answered.logged_user_id',auth()->user()->id??0);
		}	
		})
		->whereDate('survey_answered.created_at', '>=',Carbon::now()->subDays(7))
		->whereIn('question_options.option_value',[9,10])
		->where(function($Promoters_lastweek) use ($QuestionOptions){
		$Promoters_lastweek->whereIn('survey_answered.answerid',$QuestionOptions);		
		$Promoters_lastweek->where('survey_answered.answeredby_person','!=','');		
		})
		
		
		->count();
		$Neutral_lastweek=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)
		
		->where(function($Neutral_lastweek) use ($role){	
		if($role==2){	

		}
		elseif($role==3){	
		
		
		if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
					
					$Neutral_lastweek->whereIn('survey_answered.department_name_id',$q_departments);	
				}	

		}
		else{
		$Neutral_lastweek->where('survey_answered.logged_user_id',auth()->user()->id??0);
		}	
		})
		->whereDate('survey_answered.created_at', '>=',Carbon::now()->subDays(7))
		->whereIn('question_options.option_value',[7,8])
		
		->where(function($Neutral_lastweek) use ($QuestionOptions){
		$Neutral_lastweek->whereIn('survey_answered.answerid',$QuestionOptions);		
		$Neutral_lastweek->where('survey_answered.answeredby_person','!=','');		
		})
		
		->count();
		
		
		$Detractors_lastweek=SurveyAnswered::select('id')
		 ->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
		->where('survey_answered.organization_id',$organization_id)	
		->where(function($Detractors_lastweek) use ($role){	
		if($role==2){	

		}
		elseif($role==3){	
		
			if(auth()->user()->department){
					$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
					
					$Detractors_lastweek->whereIn('survey_answered.department_name_id',$q_departments);	
				}	

		}
		else{
		$Detractors_lastweek->where('survey_answered.logged_user_id',auth()->user()->id??0);
		}	
		})
		->whereDate('survey_answered.created_at', '>=',Carbon::now()->subDays(7))
		->whereIn('question_options.option_value',[0,1,2,3,4,5,6])
		
		->where(function($Detractors_lastweek) use ($QuestionOptions){
		$Detractors_lastweek->whereIn('survey_answered.answerid',$QuestionOptions);		
		$Detractors_lastweek->where('survey_answered.answeredby_person','!=','');		
		})
		->count();
		
		
		$Lastoneweek=$Promoters_lastweek+$Neutral_lastweek+$Detractors_lastweek;
		
		
		
		
		
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
				"lastoneweek"=>$Lastoneweek,
			];	
		return json_encode($final_score);
		
		}
		
catch (\Exception $exception){	
	abort(401);

}
		


    }

    public function nps_login()
    {
		
        $pageTitle="Login"; 
        $page=false;
		$user  = auth()->user();       
        if ($user && $user->role==3) {           
            return redirect('hod/dashboard')->with('success', 'Successfully logged in.');

        }
		
		    else if ($user && $user->role==2) {         
            return redirect('admin/dashboard')->with('success', 'Successfully logged in.');
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
    
   
   try{
   
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
catch (\Exception $exception){
abort(401);
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
		
		try{
			if(auth()->user()){
			$organization_id=auth()->user()->organization_id;
			$Surveys=Surveys::select('*')->where('organization_id',$organization_id??0)->where('isopen','yes')->get();	
			$page=false;			
			return view('frontend.survey.survey_names',compact('page','Surveys'));
			}
			else{
			return redirect()->back()->with('error', 'Something went wrong.');  
			}

			}
			catch (\Exception $exception){
			abort(401);
		}
		
		
    }		
public function picksurvey_method($param=false)
{
	
	try{
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
	catch (\Exception $exception){
	abort(401);
	}
	
	
}	

public function take_person_onfo($param=false)
{
	
	try{
		
		if(auth()->user())
		{
		try{
		$surveyid=Crypt::decryptString($param);
		
		Session::put('selected_survey_id',$surveyid);


		$organization_id=auth()->user()->organization_id;
		$Surveys=Surveys::select('*')->where('id',$surveyid)->get();
		
		$custom_fields=CustomerFieldsConfigurable::select('*')->where('organization_id',$organization_id)->where('is_display','yes')->get();
		if($Surveys){		
		$page=false;			
		return view('frontend.survey.person_info',compact('page','Surveys','custom_fields'));
		}else{
		return redirect()->back()->with('error', 'Undefined survey.'); 
		}
		}
		catch (\Exception $exception){
		abort(401);
		}
		}
		else
		{
		return redirect()->back()->with('error', 'User not logged in.');  
		}

	}
		catch (\Exception $exception){
		abort(401);
		}
}	


/** Generate Ticket series number **/

public function getNextTicketNumber()
{
  #Store Unique Order/Product Number
	try{
		$unique_no = SurveyPerson::orderBy('id', 'DESC')->pluck('ticket_series_number')->first();
		if($unique_no == null or $unique_no == ""){
		#If Table is Empty
		$unique_no = 1;
		}
		else{
		#If Table has Already some Data
		$unique_no = $unique_no + 1;
		}
		return $unique_no;

	}
		catch (\Exception $exception){
		abort(401);
	}
}

public function store_survey_personinfo(Request $request){


try{
	
	if($request){	
		
		
			if($request->survey_id){			
				

				/* Duplicate Survey Person */
				//$SurveyPerson=SurveyPerson::where('organization_id',$request->organization_id)->where('survey_id',$request->survey_id)->where('email',$request->email)->where('logged_user_id',auth()->user()->id)->delete();
				/* End */
		
	
				$Organizations=Organizations::select('*')->where('id',$request->organization_id??0)->get();	
				$ticketnumber=$this->getNextTicketNumber();

				$input = [
				"firstname"=>$request->firstname??0,
				"email"=>$request->email??0,
				"mobile"=>$request->phone??0,
				"gender"=>$request->gender??null,
				"bed_name"=>$request->bed_name??null,
				"uhid"=>$request->uhid??null,
				"discharge_date"=>$request->discharge_date??null,
				"organization_id"=>$request->organization_id??0,
				"survey_id"=>$request->survey_id??'',
				"logged_user_id"=>auth()->user()->id??0,
				"ticket_series_number"=>$ticketnumber,
				"ticker_final_number"=>"#".Carbon::now()->format('y')."".sprintf ("%02d",$ticketnumber),
				];

				$user = SurveyPerson::create($input);
				Session::put('person_id', $user->id);
				Session::put('survey_id', $request->survey_id??0);
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
		'ticket_number' =>Carbon::now()->format('y')."".sprintf ("%02d",$ticketnumber),
		'subjectline' =>"Feedback Survey #".Carbon::now()->format('y')."".sprintf ("%02d",$ticketnumber),

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
			elseif(auth()->user()->role==3){
				return redirect(Config::get('constants.hod').'/takesurvey/'.Crypt::encryptString($request->survey_id))->with('info', 'Start survey');
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
		catch (\Exception $exception){
		abort(401);
	}
	
}



public function first_question_offline($sid=false,$logid=false,$pid=false)
{
	
	
try{
	$surveyid=Crypt::decryptString($sid);
	$logid=Crypt::decryptString($logid);
	$pid=Crypt::decryptString($pid);	
	
	Session::put('person_id',$pid??0);		
	Session::put('logged_user_id',$logid??0);
	Session::put('survey_id',$surveyid??0);
	
				
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
		catch (\Exception $exception){
		abort(401);
	}
}



public function first_question($param=false)
{

try{
	
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
		catch (\Exception $exception){
		abort(401);
	}
}
	
	public function second_question()
    {
		
		try{
		$page=false;
		return view('frontend.survey.second_question',compact('page'));

		}
		catch (\Exception $exception){
		abort(401);
		}
    }	
	
	
	
public function surveyone_post(Request $request)
{

try{
	
	
	
	
		$Questions=Questions::select('questions.next_qustion_id as qnq','questions.sequence_order as qseq','questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('id',$request->question_id)->where('survey_id',$request->survey_id??0)->get()->first();		 
		
		
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
	
	
	if(is_array($request->first_questin_range))
	{
		
		
	
		$remove_exist_person=DB::table('passing_departments')->where('person_id',Session::get('person_id')??0)->delete();
		$remove_exist_person=DB::table('rating_of_departments')->where('person_id',Session::get('person_id')??0)->delete();
		
		
		foreach($request->first_questin_range as $key=>$value){	
		
		
		
		$delete_exist_answered=SurveyAnswered::where('question_id',$request->question_id)->where('survey_id',$request->survey_id)->where('organization_id',$request->organization_id)->where('logged_user_id',auth()->user()->id??Session::get('logged_user_id'))->where('person_id',Session::get('person_id'))->where('answerid',$value??0)->delete();
		
		$first_questionans=SurveyAnswered::insert([
            [
                "organization_id"=>$request->organization_id??0,
                "survey_id"=>$request->survey_id??0,
				"rating"=>Session::get('rating')??0,
				"ticket_status"=>$this->checking_ticket_action(Session::get('rating')??''),
                "question_id"=>$request->question_id??0,
                "answerid"=>$value??0,
				"department_name_id"=>$value??0,
                "answeredby_person"=>$request->answerdbyperson??'',
                "person_id"=>Session::get('person_id')??0,
				"logged_user_id"=>auth()->user()->id??Session::get('logged_user_id'),
				'created_at' =>Carbon::now(),
				'updated_at' =>Carbon::now(),
            ]  
        ]); 
		
		
		if($key==0){
			$sorting="ready";
		}
		else{
			$sorting="no";
		}
		
DB::table('passing_departments')->insert(
[
'person_id' => Session::get('person_id')??0, 
'sorting' =>$key,
'department_id' => $value,
'passing_page' =>$sorting,
'survey_id' =>$request->survey_id??0,
'created_at' =>Carbon::now(),
'updated_at' =>Carbon::now(),

]
);








$department_name=DB::table('question_options')->where('id',$value??0)->get()->first();





DB::table('rating_of_departments')->insert(
[
'person_id' => Session::get('person_id')??0, 
'survey_id' =>$request->survey_id??0,
'created_at' =>Carbon::now(),
'updated_at' =>Carbon::now(),
'department_name' =>$department_name->option_value??'',
'department_id' =>$value??'',
'rating' =>Session::get('rating')??0,
'organization_id' =>$request->organization_id??0,
'logged_user_id' =>auth()->user()->id??Session::get('logged_user_id')??0,

]
);






			
		}
		
		
DB::table('passing_departments')->insert(
[
'person_id' => Session::get('person_id')??0, 
'sorting' =>30,
'department_id' => 21,
'passing_page' =>"no",
'survey_id' =>$request->survey_id??0,
'created_at' =>Carbon::now(),
'updated_at' =>Carbon::now(),

]
);

		
		$selected_departments=$request->first_questin_range??'';
		
		

	$firstdata=DB::table('passing_departments')->where('person_id',Session::get('person_id')??0)->where('passing_page','!=','passed')->first(); 

	$departments = QuestionOptions::select('question_options.department_id as department_id','question_options.option_value as qpvalue','question_options.id as qoptionid')
		->whereIn('id', $selected_departments)
		->where('question_options.id',$firstdata->department_id??0)
		->get();
		
		
	foreach($departments as $key=>$value){			
		$departments[$key]->activities=Activities::select('activity_name as activity_name','id as activityid')
		->where('department_id', $value->department_id)
		->get();
		
		}
		
		
		
		

	
	}
	else{
		
		
		if(is_array($request->answerdbyperson)){
			
			


	
			
		foreach($request->answerdbyperson as $key=>$value){
			
			
			$delete_exist_answered=SurveyAnswered::where('question_id',$request->question_id)->where('survey_id',$request->survey_id)->where('organization_id',$request->organization_id)->where('logged_user_id',auth()->user()->id??Session::get('logged_user_id'))->where('person_id',Session::get('person_id'))->where('answerid',$key??0)->delete();

			$first_questionans=SurveyAnswered::insert([
			[
			"organization_id"=>$request->organization_id??0,
			"survey_id"=>$request->survey_id??0,
			"rating"=>Session::get('rating')??0,
			"ticket_status"=>$this->checking_ticket_action(Session::get('rating')??''),
			"question_id"=>$request->question_id??0,
			"answerid"=>$key??'',
			"answeredby_person"=>$value??'',
			 "person_id"=>Session::get('person_id')??0,
			 "logged_user_id"=>auth()->user()->id??Session::get('logged_user_id'),
			 "department_activities"=>implode(",",$request->first_activities??[]),
			 "department_name_id"=>$key??0,
			'created_at' =>Carbon::now(),
			'updated_at' =>Carbon::now(),
			]  
			]); 
			
			
			
			
		if($request->first_activities ){	
		
		
		$remove_exist_person=DB::table('rating_of_dep_activities')->where('person_id',Session::get('person_id')??0)->delete();
			
foreach($request->first_activities as $fkey=>$fvalue){
			
			


DB::table('rating_of_dep_activities')->insert(
[
'person_id' => Session::get('person_id')??0, 
'survey_id' =>$request->survey_id??0,
'created_at' =>Carbon::now(),
'updated_at' =>Carbon::now(),
'activity_name' =>$fvalue??'',
'activity_id' =>$fkey??'',
'department_id' =>$key??0,
'department_name' =>'',
'rating' =>Session::get('rating')??0,
'organization_id' =>$request->organization_id??0,
'logged_user_id' =>auth()->user()->id??Session::get('logged_user_id')??0,

]
);

}

		}
			
			
			
			
			
			
/* Passing departments*/		
DB::table('passing_departments')->where('person_id',Session::get('person_id')??0)->where('department_id',$key??0)->update(array(
'passing_page'=>'passed',
));
			





		}
					
	
	$selected_departments=$request->first_questin_range??'';
	
	$firstdata=DB::table('passing_departments')->where('person_id',Session::get('person_id')??0)->where('passing_page','!=','passed')->first(); 
	
	
	$departments = QuestionOptions::select('question_options.department_id as department_id','question_options.option_value as qpvalue','question_options.id as qoptionid')
		
		->where('question_options.id',$firstdata->department_id??0)
		->get();
		
		
		foreach($departments as $key=>$value){			
		$departments[$key]->activities=Activities::select('activity_name as activity_name','id as activityid')
		->where('department_id', $value->department_id)
		->get();
		
		}
		
		
		
		
	

			
		}
		else{
			
				


if($request->is_pick_slider){	

$remove_exist_person=DB::table('passing_departments')->where('person_id',Session::get('person_id')??0)->delete();

Session::put('rating',$request->first_questin_range);

$getoptid = QuestionOptions::select('question_options.id as qoptionid')
->where('option_value', $request->first_questin_range)
->where('question_id',$request->survey_id??0)
->get()->first();


			
        $first_questionans=SurveyAnswered::insert([
            [
                "organization_id"=>$request->organization_id??0,
                "survey_id"=>$request->survey_id??0,
                "rating"=>Session::get('rating')??0,
				"ticket_status"=>$this->checking_ticket_action(Session::get('rating')??''),
                "question_id"=>$request->question_id??0,
                "answerid"=>$getoptid->qoptionid??0,    
                "answeredby_person"=>$request->answerdbyperson??'',
				 "person_id"=>Session::get('person_id')??0,
				 "logged_user_id"=>auth()->user()->id??Session::get('logged_user_id'),
				'created_at' =>Carbon::now(),
				'updated_at' =>Carbon::now(),
            ]  
        ]);		
		
}
else{
	
	        $first_questionans=SurveyAnswered::insert([
            [
                "organization_id"=>$request->organization_id??0,
                "survey_id"=>$request->survey_id??0,
				"rating"=>Session::get('rating')??0,
				"ticket_status"=>$this->checking_ticket_action(Session::get('rating')??''),
                "question_id"=>$request->question_id??0,
                "answerid"=>$request->first_questin_range??0,
                "answeredby_person"=>$request->answerdbyperson??'',
				 "person_id"=>Session::get('person_id')??0,
				 "logged_user_id"=>auth()->user()->id??Session::get('logged_user_id'),
				'created_at' =>Carbon::now(),
				'updated_at' =>Carbon::now(),
            ]  
        ]);	
	
}


$selected_departments='';
		$departments='';
		
		
		
		
		}

		
		
		
	}
		
		
		
		
		
		
		$firstdata=DB::table('passing_departments')->where('person_id',Session::get('person_id')??0)->where('passing_page','!=','passed')->first(); 
		
		
		
		
		
		if(isset($firstdata->passing_page)){
			
			if(Session::get('rating')<=6){
				$nextquestion=7;
			}
			else if(Session::get('rating')>=7 && Session::get('rating')<=8){
				$nextquestion=6;				
			}
			else{				
				$nextquestion=5;
			}
		$Questions=Questions::select('questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('sequence_order',$nextquestion)->where('survey_id',$request->survey_id??0)->get();		 
		foreach ($Questions as $key => $value) {
		$Questions[$key]->qoptions = QuestionOptions::select('question_options.option_value as qpvalue','question_options.id as qoptionid')
		->where('question_id', $value->qid)
		->get();	
		}	
		
		
		
		}
		else{
			
			$Questions=Questions::select('questions.organization_id as qorgid','questions.id as qid','questions.survey_id as qsurvey_id','questions.label as qlabel','questions.sublabel as qsublabel','questions.input_type as qinput_type')->where('sequence_order',$nextquestion)->where('survey_id',$request->survey_id??0)->get();		 
		foreach ($Questions as $key => $value) {
		$Questions[$key]->qoptions = QuestionOptions::select('question_options.option_value as qpvalue','question_options.id as qoptionid')
		->where('question_id', $value->qid)
		->get();	
		}
		
		
		
		
			
		}

		
		
		
		
		
		
				
		if($Questions->count()==0)			
		{		


			$get_person_answered=SurveyAnswered::where('person_id',Session::get('person_id'))->get();
			
			foreach($get_person_answered as $key=>$value){				
				if($value->question_id==1 && $value->rating<=6){
				$this->send_ticket_status_emails("opened",Session::get('person_id'));			
				break;					
				}
				
			}		
			
		}
		
		if($departments){
			
		}
		else{
			
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

catch (\Exception $exception){
	
//dd($exception);
		abort(401);
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


public function checking_ticket_action($score=false) {
	
	switch ($score) {
		case '0':
		$status='opened';
		break;	
		case '1':
		$status='opened';
		break;
		case '2':
		$status='opened';
		break;
		case '3':
		$status='opened';
		break;
		case '4':
		$status='opened';
		break;
		case '5':
		$status='opened';
		break;		 
		case '6':
		$status='opened';
		break;  
		case '7':
		$status=null;
		break;	
		case '8':
		$status=null;
		break;
		case '9':
		$status=null;
		break;
		case '10':
		$status=null;
		break;
		default:
		$status=null;
}

return $status;
	
}



public function send_ticket_status_emails($status=false,$person_id=false) {


	switch ($status) {
  case 'hold':
    $color='btn btn-sm btn-info';
    break;
	  case 'placed':
     $color='btn btn-sm btn-success';
    break;
  case 'confirmed':
    $color='btn btn-sm btn-primary';
    break;
	 case 'opened':
	$this->send_ticket_opened_mail($person_id);
    break;
	case 'delivered':
   $color='btn btn-sm btn-light';
    break;		 
	case 'dispatched':
	$this->send_order_dispatched_mail($ordernumber);
    break;  
	case 'cancelled':
   $color='btn btn-dark';
    break;	
  default:
  $color='btn btn-sm btn-primary';
}


	
}






public function send_ticket_opened_mail($person_id=null){
	
	if($person_id){		
		
		$person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
        ->where('survey_answered.organization_id',Auth::user()->organization_id)
        ->where('survey_answered.person_id',$person_id)
        ->get(['survey_answered.*','question_options.option_value as option_value']);	
		
	
		$person_data= SurveyPerson::where('organization_id',Auth::user()->organization_id)->where('id',$person_id)->get()->first();
		
				
		$users_data=User::select('users.reportingto as reportingto')                 
		->where('users.id',auth()->user()->id??0)       
		->get()->first(); 





		$reportingto=User::select('users.email as email')                 
		->where('users.id',$users_data->reportingto??0)       
		->get()->first(); 
			
		
		
		
		$mail_params = [
		'data' =>$person_responses_data??'',
		'person_data' =>$person_data??'',
		'subjectline' =>'Ticket Opened '.$person_data->ticker_final_number??'',
		'ticket_number' =>$person_data->ticker_final_number??'',
		];
		
		
	

	
		if(isset($reportingto->email)){	
		try{
		Mail::to($reportingto->email)->send(new TicketOpened($mail_params));
		}catch (\Exception $exception) {
		}		
		}
		
		/** Trigger HOD mail **/
		$this->trigger_hod_mail($person_id,Auth::user()->organization_id);
		
		
		
		
		
		
	}
	
	
}


public function stop_trigger_escalation_ticket($person_id=false,$organization_id=false,$subject_type=false,$escnumber=false,$gateway=false){	

	DB::table('escaltion_trigger_log')->insert(
	[
	'person_id' => $person_id??0, 
	'escalation_number' =>$escnumber??'',
	'gateway_type' => 'email',
	'esc_subject' =>$subject_type??'',
	'organization_id' =>$organization_id??0,
	'created_at' =>Carbon::now(),
	'updated_at' =>Carbon::now(),

	]
	);	

}


public function verify_stop_trigger_escalation_ticket($person_id=false,$organization_id=false,$escnumber=false,$gateway=false){	
	
	$is_exist=DB::table('escaltion_trigger_log')
	->where('person_id',$person_id)
	->where('escalation_number','=',$escnumber)
	->where('gateway_type','=',$gateway)
	->where('organization_id','=',$organization_id)
	->first(); 	
	
	if($is_exist){		
		return true;
	}
	else{		
		return false;
	}
	

}


public function trigger_escalation_mails(){
	
	
		$person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
        ->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')           
		->wherenotIn('survey_answered.ticket_status',['closed_satisfied','closed_unsatisfied'])
		->where('survey_answered.created_at','>=',Carbon::today())
		->orderBy('survey_answered.created_at','asc')
        ->get(['survey_answered.*','question_options.option_value as option_value']);	
		
		
		$sno=1;		
		foreach($person_responses_data as $key=>$value){
			
				$now = date('Y-m-d H:i:s'); 
				$a = strtotime($value->created_at); 
				$b = strtotime($now);		
				$minutes = ceil(($b - $a) / 60);	
				
			
				
				$escllations=DB::table('group_levels')
				->select('alias')
				->wherenotIn('alias',['L1','L2'])
				->where('esc_minitues', '<', $minutes)			
				->get()
				->first();				

				
				if($escllations){
					
				
				
				if($escllations->alias=="L3"){
					
					/** HOD First Escllation mail **/	

					$subject_type="First Ticket Escalation";
					$gateway_type="email";
					$esc_type="L3";
					
					$IsExist=$this->verify_stop_trigger_escalation_ticket($value->person_id,$value->organization_id,$esc_type,$gateway_type);
					if(!$IsExist){
					$this->trigger_hod_mail($value->person_id,$value->organization_id,$subject_type);	
					$this->stop_trigger_escalation_ticket($value->person_id,$value->organization_id,$subject_type,$esc_type,$gateway_type);
					}
					
				}	

				
				else if($escllations->alias=="L4"){					
					/** Operational Head Escllation mail **/
					
						$subject_type="Second Ticket Escalation";						
						$esc_type="L4";
						$gateway_type="email";
					
						$IsExist=$this->verify_stop_trigger_escalation_ticket($value->person_id,$value->organization_id,$esc_type,$gateway_type);
						if(!$IsExist)
						{
							$this->stop_trigger_escalation_ticket($value->person_id,$value->organization_id,$subject_type,$esc_type,$gateway_type);
							$reportingto=User::select('users.email as email')                 
							->where('users.role',5)       
							->get(); 
							foreach($reportingto as $key1=>$value1){
								$this->trigger_escal_mail($value->person_id,$value->organization_id,$value1->email,$subject_type);
							}					
						}

					
				}	
				
				else if($escllations->alias=="L5"){
					/** Trigger Unit Head Escllation mail **/
					$subject_type="Third Ticket Escalation";						
					$esc_type="L5";
					$gateway_type="email";

					$IsExist=$this->verify_stop_trigger_escalation_ticket($value->person_id,$value->organization_id,$esc_type,$gateway_type);
					if(!$IsExist)
					{
						$reportingto=User::select('users.email as email')                 
						->where('users.role',6)       
						->get();
						foreach($reportingto as $key1=>$value1){
						$this->trigger_escal_mail($value->person_id,$value->organization_id,$value1->email,$subject_type);
						}
					}					
				}
				
				
				else{
					
				}			
				
			}			
			$sno++;			
		}
	
}

public function trigger_hod_mail($person_id=false,$organization_id=false,$is_subject=false){
	
$person_data= SurveyPerson::where('organization_id',$organization_id)->where('id',$person_id)->get()->first();
$person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
->where('survey_answered.organization_id',$organization_id)
->where('survey_answered.person_id',$person_id)
->wherenotIn('survey_answered.question_id',[1,11])
->get(['survey_answered.*','question_options.option_value as option_value']);

/** Convert mapToGroups **/
$collection = collect($person_responses_data);
$grouped = $collection->mapWithKeys(function ($item, $key) {
return [ $item['option_value'] => 			
[
"department_name"=>$item['option_value'],
"department_activities"=>$item['department_activities'],
"rating"=>$item['rating'],
"answeredby_person"=>$item['answeredby_person']
]];
});
$Final_Feedback_Data=$grouped->all();
foreach($Final_Feedback_Data as $key=>$value){
$get_dep=Departments::select('id','department_name')->where("organization_id",$organization_id)->where("department_name",$key)->get()->first();
if($get_dep){
	$reporting_hod_dep=User::select('users.email as email')                 
	->where('users.department',$get_dep->id??0)       
	->where('users.organization_id',$organization_id??0)					       
	->where('users.role',3)					       
	->get();
	if($reporting_hod_dep){				
		foreach ($reporting_hod_dep as $recipient) {	
		
			if($is_subject)
			{
				
				$subject=Str::title($Final_Feedback_Data[$key]['department_name']).' Department '.$is_subject.' #'.$person_data->ticker_final_number??'';
				
			}
			else{
				$subject=Str::title($Final_Feedback_Data[$key]['department_name']).' Department Ticket Opened #'.$person_data->ticker_final_number??'';
			}
			
			
			try{
				$mail_params = [
				'Dep_name' =>$Final_Feedback_Data[$key]['department_name']??'',
				'Dep_activities' =>$Final_Feedback_Data[$key]['department_activities']??'',			
				'Dep_note' =>$Final_Feedback_Data[$key]['answeredby_person']??'',		
				'nps_score' =>$Final_Feedback_Data[$key]['rating']??'',
				'person_data' =>$person_data??'',			
				'subjectline' =>$subject??'',
				'ticket_number' =>$person_data->ticker_final_number??'',
				];
				Mail::to($recipient->email)->send(new HodMails($mail_params));
				}catch (\Exception $exception) {
			}
		}
	}
}
}
	
}

public function trigger_escal_mail($person_id=false,$organization_id=false,$reportingto=false,$escalatonmsg=false){
	
	
	
	$person_data= SurveyPerson::where('organization_id',$organization_id)->where('id',$person_id)->get()->first();
	
	
	$person_responses_data=SurveyAnswered::join('survey_persons', 'survey_answered.person_id', '=', 'survey_persons.id')
	->join('question_options', 'survey_answered.answerid', '=', 'question_options.id')
	->where('survey_answered.organization_id',$organization_id)
	->where('survey_answered.person_id',$person_id)
	->get(['survey_answered.*','question_options.option_value as option_value']);	
	
	
	$mail_params = [
	'data' =>$person_responses_data??'',
	'person_data' =>$person_data??'',
	'subjectline' =>$escalatonmsg." ".$person_data->ticker_final_number??'',
	'ticket_number' =>$person_data->ticker_final_number??'',
	];
	
	
	if(isset($reportingto)){	
	try{
	Mail::to($reportingto)->send(new EsclationMails($mail_params));
	}catch (\Exception $exception) {
	}		
	}
	
}

public function checkcronlog(){
	Log::info("Test cron performance - NPS");
	
}




    
    
}
