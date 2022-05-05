<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Organizations;
use App\Models\Departments;
use App\Models\User;
use App\Models\Surveys;
use App\Models\SurveyPerson;
use App\Http\Controllers\NetPromoterScore;
use Auth;
use Crypt;
use Illuminate\Support\Str;
use App\Scopes\ActiveOrgaization;
use DB;
use Session;
use App\Models\Departments_Users;

class DashboardController extends Controller
{
    public function company_dashboard(Request $request)
    {
	
	
		try {

			
				$_CompanyID=Crypt::decryptString($request->CID);						
				$Single_Com_Name=Organizations::select('id','company_name')->where('id',$_CompanyID)->get()->first();
				if(isset($Single_Com_Name))
				{
					
					$nps_score= new NetPromoterScore();
					$npsscore=$nps_score->nps_score_factor_count();
					$final_score = json_decode($npsscore);
					$pageTitle = Str::title($Single_Com_Name->company_name);
					$all_organizations = Organizations::get()->count();
					$all_group = Organizations::where('is_group','yes')->get()->count();
					$all_single = Organizations::where('is_group','no')->get()->count();
					$all_admin_departments = Departments::get()->count();
					
					$all_admin_users = 0;
					
					
					$all_admin_surveys = SurveyPerson::get()->count();
					$organizations_data = Organizations::get();
					
					return view('admin.dashboard.company_dashboard',compact('pageTitle','all_organizations','all_group','all_single','all_admin_departments','all_admin_users','all_admin_surveys','final_score','organizations_data'));
				
				}
				
				else{
					return redirect()->back()->with('error', "Something went wrong. Please try again.");
				}
				
		
			
			}		
		catch (RequestException $exception) {		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
			}			
		}			
			// You can check for whatever error status code you need 
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {		
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
		}
		
		
	
    }    
	
	
	public function dashboard_lists(Request $request)
    {
		
		try {
		
		$nps_score= new NetPromoterScore();
		$npsscore=$nps_score->nps_score_factor_count($request);
		$final_score = json_decode($npsscore);
		$pageTitle = 'Dashboard';
		$all_organizations = Organizations::get()->count();
		$all_group = Organizations::where('is_group','yes')->get()->count();
		$all_single = Organizations::where('is_group','no')->get()->count();
		$all_admin_departments = Departments::get()->count();
		$all_admin_users = User::whereNotIn('role',[1,2])->get()->count();
		$all_admin_surveys = SurveyPerson::get()->count();
		
		
		if(auth()->user()->role==1){

			Session::forget('companyID');
			$organizations_data = DB::table('organizations')->get();
		}
		else{
			$organizations_data = Organizations::get();
		}
		
		
		$role=auth()->user()->role??0;
		
		
		
	if($request->from_date &&  $request->to_date) {
	$from_date = $request->from_date;
	$to_date = $request->to_date;			
	}		
	else{

	$from_date = date('Y-m-01');
	$to_date = date('Y-m-t');

	}
		
		
		$user_mapped_departments=Departments_Users::where('user_id',auth()->user()->id??0)->get()->pluck('department_id');
		
		
		
		if(isset($request->department)) {					
		$selected_department=$request->department;			
		}		
		else{
		$selected_department='';		
		}			

		if(isset($request->question_id)){                    
		$survey_id=$request->question_id;			
		}       
		else{
		$survey_id='';              
		}
		
		$Departments=Departments::select('departments.department_name','departments.id')
		->leftjoin('survey_answered','department_name_id', '=', 'departments.id')
		->where(function($Departments) use ($role,$user_mapped_departments){	
		if($role==2){
		}
		else if($role==3){	
			$Departments->whereIn('id',$user_mapped_departments??0);
		}	
		else if($role==4){	
		}
		else{	
		}
		})
		
		->where(function($Departments) use ($selected_department){	
		if($selected_department){		
		$Departments->where('departments.id', $selected_department);
		}		
		})

		->where(function($Departments) use ($survey_id){   
		if($survey_id){       
			$Departments->where('survey_answered.survey_id','=',$survey_id);                
		}
		})	
		
		
				->where(function($Departments) use ($from_date,$to_date){	
		if($from_date &&  $to_date){		
			$Departments->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
			$Departments->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
		}		
		})	
		
		->groupby(['departments.department_name','departments.id'])
		->Orderby('department_name','asc')
		->get();	
		
        return view('admin.dashboard.show',compact('pageTitle','all_organizations','all_group','all_single','all_admin_departments','all_admin_users','all_admin_surveys','final_score','organizations_data','Departments','user_mapped_departments','request'));
		}
		
		catch (RequestException $exception) {		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
			}			
		}			
			// You can check for whatever error status code you need 
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {		
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
		}
    }

    public function dashboard_user_lists(Request $request)
    {

	try {

	$nps_score= new NetPromoterScore();
	$npsscore=$nps_score->nps_score_factor_count($request);
	$final_score = json_decode($npsscore);
	$pageTitle = 'Dashboard';        
	$all_admin_surveys = SurveyPerson::where('logged_user_id',Auth::user()->id)->get()->count(); 




		$role=auth()->user()->role??0;
		
		
		
	if($request->from_date &&  $request->to_date) {
	$from_date = $request->from_date;
	$to_date = $request->to_date;			
	}		
	else{

	$from_date = date('Y-m-01');
	$to_date = date('Y-m-t');

	}
		
		
		$user_mapped_departments=Departments_Users::where('user_id',auth()->user()->id??0)->get()->pluck('department_id');
		
		

		if(isset($request->question_id)){                    
		$survey_id=$request->question_id;			
		}       
		else{
		$survey_id='';              
		}
		
		$Departments=Departments::select('departments.department_name','departments.id')
		->leftjoin('survey_answered','department_name_id', '=', 'departments.id')
		->where(function($Departments) use ($role,$user_mapped_departments){	
		if($role==2){
		}
		else if($role==3){	
			$Departments->whereIn('survey_answered.department_name_id',$user_mapped_departments??0);
		}	
		else if($role==4){	
		}
		else{	
		}
		})
		->where(function($Departments) use ($survey_id){   
		if($survey_id){       
			$Departments->where('survey_answered.survey_id','=',$survey_id);                
		}
		})		
		->where(function($Departments) use ($from_date,$to_date){	
		if($from_date &&  $to_date){		
			$Departments->whereDate('survey_answered.created_at', '>=', "$from_date 00:00:00");
			$Departments->whereDate('survey_answered.created_at', '<=',"$to_date 23:59:59");
		}		
		})		
		->groupby(['departments.department_name','departments.id'])
		->Orderby('department_name','asc')
		->get();
	
	return view('admin.dashboard.show',compact('pageTitle','all_admin_surveys','final_score','Departments'));
	}
	
			catch (RequestException $exception) {		
			// Catch all 4XX errors 
			// To catch exactly error 400 use 
			if ($exception->hasResponse()){
			if ($exception->getResponse()->getStatusCode() == '400') {
			}			
		}			
			// You can check for whatever error status code you need 
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {	
		
			return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
		}
		
    }
    public function doubtnutchart()
    {
        $nps_score= new NetPromoterScore();
            $npsscore=$nps_score->nps_score_factor_count();

            return $npsscore;
    }
}
