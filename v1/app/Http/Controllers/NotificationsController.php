<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
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

class NotificationsController extends Controller
{
    public function notifications_list()
    {   
        
        $notifications_data=Notifications::get();
        $pageTitle="Notifications";      
        $addlink=url(Config::get('constants.admin').'/notifications/create');     
        return view('admin.notifications.notifications_list', compact('pageTitle','notifications_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create_notifications()
    {
         
            $pageTitle="Add New";
            return view('admin.notifications.add_edit_notifications',compact('pageTitle'));   
         
    }
    public function store_notifications(Request $request)
    {


        $request->validate([
            'gateway_type' => 'required', 
            'username' => 'required', 
            // 'password' => 'required', 
            // // 'api_key' => 'required', 
            // 'from_name' => 'required', 
            // 'from_address' => 'required', 
            // 'host_name' => 'required', 
            // 'port_no' => 'required', 
        ]);

        Notifications::insert([
            [
                "gateway_type"=>$request->gateway_type??'',
                "organization_id"=>$request->organization_id??'',
                "username"=>$request->username??'',
                "password"=>$request->password??'',
                "api_key"=>$request->api_key??'',
                "from_name"=>$request->from_name??'',
                "from_address"=>$request->from_address??'',
                "host_name"=>$request->host_name??'',
                "port_no"=>$request->port_no??'',
                "mobile"=>$request->mobile??'',
                "is_active"=>$request->is_active??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/notifications')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_notifications($id)    {
        
        $ID = Crypt::decryptString($id);
            $notifications_data=Notifications::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.notifications.add_edit_notifications',compact('pageTitle','notifications_data'));
        
        
    }
    public function update_notifications(Request $request)
    {
        $request->validate([
            'gateway_type' => 'required', 
            'username' => 'required', 
            'password' => 'required', 
            // // 'api_key' => 'required', 
            // 'from_name' => 'required', 
            // 'from_address' => 'required', 
            // 'host_name' => 'required', 
            // 'port_no' => 'required',     
        ]);  
        
        Notifications::where('id', $request->id)
            ->update(
            [
                
               "gateway_type"=>$request->gateway_type??'',
                "username"=>$request->username??'',
                "password"=>$request->password??'',
                "api_key"=>$request->api_key??'',
                "from_name"=>$request->from_name??'',
                "from_address"=>$request->from_address??'',
                "host_name"=>$request->host_name??'',
                "port_no"=>$request->port_no??'',
                "mobile"=>$request->mobile??'',
                "is_active"=>$request->is_active??'',
                "organization_id"=>$request->organization_id??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/notifications')->with('success', "Success! Details are updated successfully");
    }
    public function delete_notifications($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Notifications::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
