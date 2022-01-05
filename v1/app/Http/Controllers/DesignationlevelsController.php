<?php

namespace App\Http\Controllers;

use App\Models\GroupLevel;
use App\Models\RoleLevel;
use App\Models\RoleNames;
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

class DesignationlevelsController extends Controller
{
    public function designations_list()
    {   
        
        $group_level_data=GroupLevel::where('organization_id',Auth::user()->organization_id)->get();
        $pageTitle="Designations";      
        $addlink=url(Config::get('constants.admin').'/designations/create');     
        return view('admin.designationsgroup.grouplevel_list', compact('pageTitle','group_level_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_designations()
    {
         
            $pageTitle="Add New";
            return view('admin.designationsgroup.add_edit_grouplevels',compact('pageTitle'));   
         
    }
    public function store_designations(Request $request)
    {


        $request->validate([
            'name' => 'required', 
            'alias' => 'required', 
        ]);

        GroupLevel::insert([
            [
                "name"=>$request->name??'',
                "alias"=>$request->alias??'',
                "organization_id"=>$request->organization_id??'',
                "esc_minitues"=>$request->esc_minitues??0,
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/designations')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_designations($id)    {
        
        $ID = Crypt::decryptString($id);
            $group_level_data=GroupLevel::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.designationsgroup.add_edit_grouplevels',compact('pageTitle','group_level_data'));
        
        
    }
    public function update_designations(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'alias' => 'required',     
        ]);  
        
        GroupLevel::where('id', $request->id)
            ->update(
            [
                
                
                "name"=>$request->name??'',
                "alias"=>$request->alias??'',
                "organization_id"=>$request->organization_id??'',
				"esc_minitues"=>$request->esc_minitues??0,
            ]
            );      
        return redirect(Config::get('constants.admin').'/designations')->with('success', "Success! Details are updated successfully");
    }
    public function delete_designations($id)
    {
        $ID = Crypt::decryptString($id);
            $data=GroupLevel::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
    public function designation_levels_list(Request $request)
    {   

       if($request->level) {    

               

                $level=$request->level;
                }       
                else{
                $level='';
                
                
                }
        
        $group_level_data=RoleLevel::join('group_levels', 'role_levels.designation_id', '=', 'group_levels.id')->orderBy('role_levels.designation_id')->where('role_levels.organization_id',Auth::user()->organization_id)
        ->where(function($group_level_data) use ($level){   
            if($level){       
                $group_level_data->where('role_levels.designation_id',"=",$level);            
            }
            })
        ->get(['role_levels.*','group_levels.name as group_level_name','group_levels.alias as alias']);
        $pageTitle="Designation Levels";   
        $level=$request->level??'';   
        $addlink=url(Config::get('constants.admin').'/designation_levels/create');     
        return view('admin.designationsgroup.rolelevel_list', compact('pageTitle','group_level_data','addlink','level'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_designation_levels()
    {
         
            $pageTitle="Add New";
            $designations_data=GroupLevel::where('organization_id',Auth::user()->organization_id)->get();
            return view('admin.designationsgroup.add_edit_rolelevels',compact('pageTitle','designations_data'));   
         
    }
    public function store_designation_levels(Request $request)
    {


        $request->validate([
            'role_level' => 'required', 
            'designation_id' => 'required', 
        ]);

        RoleLevel::insert([
            [
                "role_level"=>$request->role_level??'',
                "designation_id"=>$request->designation_id??'',
                "organization_id"=>$request->organization_id??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/designation_levels')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_designation_levels($id)    {
        
        $ID = Crypt::decryptString($id);
        $designations_data=GroupLevel::where('organization_id',Auth::user()->organization_id)->get();
            $group_level_data=RoleLevel::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.designationsgroup.add_edit_rolelevels',compact('pageTitle','designations_data','group_level_data'));
        
        
    }
    public function update_designation_levels(Request $request)
    {
        $request->validate([
            'role_level' => 'required', 
            'designation_id' => 'required', 
        ]);  
        
        RoleLevel::where('id', $request->id)
            ->update(
            [
                
                
                "role_level"=>$request->role_level??'',
                "designation_id"=>$request->designation_id??'',
                "organization_id"=>$request->organization_id??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/designation_levels')->with('success', "Success! Details are updated successfully");
    }
    public function delete_designation_levels($id)
    {
        $ID = Crypt::decryptString($id);
            $data=RoleLevel::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
    public function designation_roles_list()
    {   

        $group_level_data=RoleNames::leftjoin('role_levels', 'role_names.designation_role_id', '=', 'role_levels.id')->leftjoin('group_levels', 'role_levels.designation_id', '=', 'group_levels.id')->where('role_names.organization_id',Auth::user()->organization_id)->get(['role_levels.*','role_names.*','group_levels.name as group_level_name','group_levels.alias as alias']);
        $pageTitle="Designation Roles";      
        $addlink=url(Config::get('constants.admin').'/designation_roles/create');     
        return view('admin.designationsgroup.rolenames_list', compact('pageTitle','group_level_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_designation_roles()
    {
         
            $pageTitle="Add New";
            $designations_data=GroupLevel::where('organization_id',Auth::user()->organization_id)->get();
            return view('admin.designationsgroup.add_edit_rolenames',compact('pageTitle','designations_data'));   
         
    }
    public function store_designation_roles(Request $request)
    {


        $request->validate([
            'role_name' => 'required', 
            'designation_id' => 'required', 
            'designation_role_id' => 'required', 
        ]);

        RoleNames::insert([
            [
                "role_name"=>$request->role_name??'',
                "designation_id"=>$request->designation_id??'',
                "designation_role_id"=>$request->designation_role_id??'',
                "organization_id"=>$request->organization_id??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/designation_roles')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_designation_roles($id)    {
        
        $ID = Crypt::decryptString($id);
        $designations_data=GroupLevel::where('organization_id',Auth::user()->organization_id)->get();
            $group_level_data=RoleNames::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.designationsgroup.add_edit_rolenames',compact('pageTitle','designations_data','group_level_data'));
        
        
    }
    public function update_designation_roles(Request $request)
    {
        $request->validate([
            'role_name' => 'required', 
            'designation_id' => 'required', 
            'designation_role_id' => 'required', 
        ]);  
        
        RoleNames::where('id', $request->id)
            ->update(
            [
                
                
                "role_name"=>$request->role_name??'',
                "designation_id"=>$request->designation_id??'',
                "designation_role_id"=>$request->designation_role_id??'',
                "organization_id"=>$request->organization_id??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/designation_roles')->with('success', "Success! Details are updated successfully");
    }
    public function delete_designation_roles($id)
    {
        $ID = Crypt::decryptString($id);
            $data=RoleNames::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
    public function getrole_level(Request $request)
     {
     $role_levels = RoleLevel::where("designation_id",$request->designation_id)
     ->pluck("role_level","id");

     return response()->json($role_levels);
     }  
}
