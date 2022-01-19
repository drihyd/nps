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
use App\Exports\ResponsesExport;
use App\Imports\ResponsesImport;
use Maatwebsite\Excel\Facades\Excel;


class Reports extends Controller
{
	
	
	public function __construct() {
		$this->role = auth()->user()->role??0;
	  }
    public function reports_response_list(Request $request)
    {   
	
		$role=auth()->user()->role??0;

	
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
		
		if($request->question_id) {                    
                $Question=$request->question_id;
			
                }       
                else{
                $Question='';
                
              
                }
		
		
		
		
			$Detractors = SurveyAnswered::select('survey_persons.*','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
			->where('survey_persons.organization_id',Auth::user()->organization_id)				
			->whereIn('survey_answered.rating',[0,1,2,3,4,5,6])			
		

			->where(function($Detractors) use ($role){	
			
			
			if($role==2){	
				
			}
			else{
				$Detractors->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}	
			})
			
			
			
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
			$Detractors->whereIn('survey_answered.question_id',[1,11]);
			
			}
			
			})
			->where(function($Detractors) use ($Question){   
            if($Question){       
                $Detractors->where('survey_answered.survey_id','=',$Question);                
            }
            })
			
			->orderBy('survey_persons.created_at','DESC')
			->get();
			
		
			$Passives = SurveyAnswered::select('survey_persons.*','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
			->where('survey_persons.organization_id',Auth::user()->organization_id)			
			->whereIn('survey_answered.rating',[7,8])
			->where(function($Passives) use ($role){	
			if($role==2){	
				
			}
			else{
				$Passives->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}	
			})			
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
			$Passives->whereIn('survey_answered.question_id',[1,11]);	
			}
			
			})
			->where(function($Passives) use ($Question){   
            if($Question){       
                $Passives->where('survey_answered.survey_id','=',$Question);                
            }
            })
			
			->orderBy('survey_persons.created_at','DESC')
			->get(); 
			
			
			
			$Promoters = SurveyAnswered::select('survey_persons.*','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title')
			->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
			->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
			->where('survey_persons.organization_id',Auth::user()->organization_id)	
			->whereIn('survey_answered.rating',[9,10])
			->where(function($Promoters) use ($role){	
			if($role==2){	
				
			}
			else{
				$Promoters->where('survey_persons.logged_user_id',auth()->user()->id??0);
			}	
			})		
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
				$Promoters->whereIn('survey_answered.question_id',[1,11]);	
			}
			
			})
			->where(function($Promoters) use ($Question){   
            if($Question){       
                $Promoters->where('survey_answered.survey_id','=',$Question);                
            }
            })
			
			->orderBy('survey_persons.created_at','DESC')
			->get();
			
			
			
	
		
	
		
        $pageTitle="Reports";  
		$pickteam=$request->team??'';	
		$quetion=$request->question_id??'';	
        return view('admin.reports.responses_reports_list', compact('pageTitle','responses_data','Detractors','Passives','Promoters','pickteam','quetion'))
        ->withInput('i', (request()->input('page', 1) - 1) * 5);  
    }


public function export(Request $request) 
    {
    // 	dd($request);
    // 	$data = [
				
				// 'fd' =>$request->from_date,
				// 'td' =>$request->to_date,
				// ];

        return Excel::download(new ResponsesExport, 'responses_report.xlsx');
    }



}
