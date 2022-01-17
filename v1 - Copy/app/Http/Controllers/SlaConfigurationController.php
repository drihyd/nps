<?php

namespace App\Http\Controllers;

use App\Models\SlaConfiguration;
use App\Models\GroupLevel;
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

class SlaConfigurationController extends Controller
{
    public function sla_configurations_list()
    {   
        
        $sla_configurations_data=SlaConfiguration::join('group_levels', 'sla_configurations.level_id', '=', 'group_levels.id')->where('sla_configurations.organization_id',Auth::user()->organization_id)->get(['sla_configurations.*','group_levels.alias as group_levels_alias','group_levels.name as group_levels_name']);
        $pageTitle="SLA Configuration";      
        $addlink=url(Config::get('constants.admin').'/sla_configurations/create');     
        return view('admin.sla_configurations.sla_configurations_list', compact('pageTitle','sla_configurations_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_sla_configurations()
    {
         
            $pageTitle="Add New";
            $group_levels_data=GroupLevel::get();
            return view('admin.sla_configurations.add_edit_sla_configurations',compact('pageTitle','group_levels_data'));   
         
    }
    public function store_sla_configurations(Request $request)
    {


        $request->validate([
            'level_id' => 'required', 
            'x_minutes' => 'required',
            
        ]);
        SlaConfiguration::insert([
            [
                "level_id"=>$request->level_id??'',
                "x_minutes"=>$request->x_minutes??'',
                "organization_id"=>$request->organization_id??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/sla_configurations')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_sla_configurations($id)    {
        
        $ID = Crypt::decryptString($id);
            $sla_configurations_data=SlaConfiguration::get()->where("id",$ID)->first();
            $group_levels_data=GroupLevel::get();
            $pageTitle="Edit";      
            return view('admin.sla_configurations.add_edit_sla_configurations',compact('sla_configurations_data','pageTitle','group_levels_data'));
        
        
    }
    public function update_sla_configurations(Request $request)
    {
        $request->validate([
            'level_id' => 'required', 
            'x_minutes' => 'required',        
        ]);  
        
        SlaConfiguration::where('id', $request->id)
            ->update(
            [
                
                
                "level_id"=>$request->level_id??'',
                "x_minutes"=>$request->x_minutes??'',
                "organization_id"=>$request->organization_id??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/sla_configurations')->with('success', "Success! Details are updated successfully");
    }
    public function delete_sla_configurations($id)
    {
        $ID = Crypt::decryptString($id);
            $data=SlaConfiguration::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
    
}
