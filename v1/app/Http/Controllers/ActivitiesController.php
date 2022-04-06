<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Carbon;
Use Exception;
use Hash;
use Validator;
use Auth;
use Session;
use Config;

class ActivitiesController extends Controller
{
    public function activities_list(Request $request)
    {   

       if($request->team) {    

                    /*    
                $role=User::select()
                ->where('role',$request->role)
                ->pluck('id');
                */

                $team=$request->team;
                }       
                else{
                $team='';
                
                
                }
        
        $activities_data=Activities::join('departments', 'activities.department_id', '=', 'departments.id')       
        ->where(function($activities_data) use ($team){   
		
            if($team){       
                $activities_data->where('activities.department_id',"=",$team);            
            }
            })
        ->orderBy('activities.activity_name','ASC')
        ->get(['activities.*', 'departments.department_name']);
		
		
		
        $pageTitle="Activities";      
        $addlink=url(Config::get('constants.admin').'/activities/create');  
        $team=$request->team??'';    
        return view('admin.activities.activities_list', compact('pageTitle','activities_data','addlink','team'))
        ->with('i', (request()->input('page', 1) - 1) * 5); 
		
		
    }
    public function create_activities()
    {
         
        $pageTitle="Add New";
        $departments_data=Departments::get();
        return view('admin.activities.add_edit_activities',compact('pageTitle','departments_data'));   
         
    }
    public function store_activities(Request $request)
    {


        $request->validate([
            'department_id' => 'required', 
            'activity_name' => 'required', 
            
        ]);
        Activities::insert([
            [
                "organization_id"=>Session::get('companyID')??'',
                "department_id"=>$request->department_id??'',
                "activity_name"=>$request->activity_name??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/activities')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_activities($id)    {
        
        $ID = Crypt::decryptString($id);
            $activities_data=Activities::get()->where("id",$ID)->first();
            $departments_data=Departments::get();
            $pageTitle="Edit";      
            return view('admin.activities.add_edit_activities',compact('departments_data','pageTitle','activities_data'));
        
        
    }
    public function update_activities(Request $request)
    {
        $request->validate([
            'department_id' => 'required', 
            'activity_name' => 'required',    
        ]);  
        
        Activities::where('id', $request->id)
            ->update(
            [
                
                
                "organization_id"=>Session::get('companyID')??'',
                "department_id"=>$request->department_id??'',
                "activity_name"=>$request->activity_name??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/activities')->with('success', "Success! Details are updated successfully");
    }
    public function delete_activities($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Activities::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
