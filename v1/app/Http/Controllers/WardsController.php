<?php

namespace App\Http\Controllers;

use App\Models\Wards;
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

class WardsController extends Controller
{
    public function wards_list()
    {   
        
        $wards_data=Wards::get();
        $pageTitle="Wards";      
        $addlink=url(Config::get('constants.admin').'/wards/create');     
        return view('admin.wards.wards_list', compact('pageTitle','wards_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function create_wards()
    {
         
            $pageTitle="Add New";
            return view('admin.wards.add_edit_wards',compact('pageTitle'));   
         
    }
    public function store_wards(Request $request)
    {


        $request->validate([
            'name' => 'required', 
            
        ]);
        Wards::insert([
            [
                "name"=>$request->name??'',
                "admin_user_id"=>$request->admin_user_id??'',
                "organization_id"=>auth()->user()->organization_id??0,
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/wards')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_wards($id)    {
        
        $ID = Crypt::decryptString($id);
            $wards_data=Wards::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.wards.add_edit_wards',compact('wards_data','pageTitle'));
        
        
    }
    public function update_wards(Request $request)
    {
        $request->validate([
            'name' => 'required',       
        ]);  
        
        Wards::where('id', $request->id)
            ->update(
            [ 
                "name"=>$request->name??'',
                "admin_user_id"=>$request->admin_user_id??'',
                "organization_id"=>auth()->user()->organization_id??0,
            ]
            );      
        return redirect(Config::get('constants.admin').'/wards')->with('success', "Success! Details are updated successfully");
    }
    public function delete_wards($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Wards::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
