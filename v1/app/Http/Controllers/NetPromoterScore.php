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
class NetPromoterScore extends Controller
{

    public function nps_login()
    {
		$page=false;
        return view('frontend.survey.first_question',compact('page'));
    }
	
	  public function first_question()
    {
		$page=false;
        return view('frontend.survey.first_question',compact('page'));
    }
	
	public function second_question()
    {
		$page=false;
        return view('frontend.survey.second_question',compact('page'));
    }	
	public function surveyone_post(Request $request)
    {
		
		if($request->first_questin_range){
			
			dd($request->first_questin_range);
		$page=false;
		return view('frontend.survey.second_question',compact('page'));

		}
		else{
			return redirect()->back()->with('error', 'Please select score number.');  
		}
    }
    
    
}
