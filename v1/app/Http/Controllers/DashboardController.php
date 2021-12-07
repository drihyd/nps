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

class DashboardController extends Controller
{
    public function dashboard_lists()
    {


            $nps_score= new NetPromoterScore();
            $npsscore=$nps_score->nps_score_factor_count();

            $final_score = json_decode($npsscore);

        $pageTitle = 'Dashboard';
        $all_organizations = Organizations::get()->count();
        $all_group = Organizations::where('is_group','yes')->get()->count();
        $all_single = Organizations::where('is_group','no')->get()->count();
        $all_admin_departments = Departments::where('organization_id',Auth::user()->organization_id)->get()->count();
        $all_admin_users = User::where('organization_id',Auth::user()->organization_id)->whereNotIn('role',[1,2])->get()->count();
        $all_admin_surveys = SurveyPerson::where('organization_id',Auth::user()->organization_id)->get()->count();
        // dd(Auth::user()->organization_id);
        return view('admin.dashboard.show',compact('pageTitle','all_organizations','all_group','all_single','all_admin_departments','all_admin_users','all_admin_surveys','final_score'));
    }
    public function doubtnutchart()
    {
        $nps_score= new NetPromoterScore();
            $npsscore=$nps_score->nps_score_factor_count();

            return $npsscore;
    }
}
