<?php

namespace App\Http\Controllers;

use App\Models\Specifications;
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

class SpecificationsController extends Controller
{
     public function specifications_list()
    {   
        
        $specifications_data=Specifications::get();
        $pageTitle="Specialities";      
        $addlink=url(Config::get('constants.admin').'/specifications/create');     
        return view('admin.specifications.specifications_list', compact('pageTitle','specifications_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function create_specifications()
    {
         
            $pageTitle="Add a Speciality";
            return view('admin.specifications.add_edit_specifications',compact('pageTitle'));   
         
    }
    public function store_specifications(Request $request)
    {


        $request->validate([
            'name' => 'required', 
            
        ]);
        Specifications::insert([
            [
                "name"=>$request->name??'',
                "admin_user_id"=>$request->admin_user_id??'',
                "organization_id"=>Session::get('companyID')??0,
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/specifications')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_specifications($id)    {
        
        $ID = Crypt::decryptString($id);
            $specifications_data=Specifications::get()->where("id",$ID)->first();
            $pageTitle="Edit a Speciality";      
            return view('admin.specifications.add_edit_specifications',compact('specifications_data','pageTitle'));
        
        
    }
    public function update_specifications(Request $request)
    {
        $request->validate([
            'name' => 'required',       
        ]);  
        
        Specifications::where('id', $request->id)
            ->update(
            [ 
                "name"=>$request->name??'',
                "admin_user_id"=>$request->admin_user_id??'',
                "organization_id"=>Session::get('companyID')??0,
            ]
            );      
        return redirect(Config::get('constants.admin').'/specifications')->with('success', "Success! Details are updated successfully");
    }
    public function delete_specifications($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Specifications::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
