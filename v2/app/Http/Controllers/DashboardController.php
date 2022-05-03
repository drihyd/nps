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
		
		
		
		
        return view('admin.dashboard.show',compact('pageTitle','all_organizations','all_group','all_single','all_admin_departments','all_admin_users','all_admin_surveys','final_score','organizations_data'));
    }

    public function dashboard_user_lists()
    {


            $nps_score= new NetPromoterScore();
            $npsscore=$nps_score->nps_score_factor_count();

            $final_score = json_decode($npsscore);

        $pageTitle = 'Dashboard';
        
        $all_admin_surveys = SurveyPerson::where('logged_user_id',Auth::user()->id)->get()->count();
  
        return view('admin.dashboard.show',compact('pageTitle','all_admin_surveys','final_score'));
    }
    public function doubtnutchart()
    {
        $nps_score= new NetPromoterScore();
            $npsscore=$nps_score->nps_score_factor_count();

            return $npsscore;
    }
}
