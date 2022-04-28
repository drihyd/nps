<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
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

class DoctorsController extends Controller
{
    public function doctors_list()
    {   
        
        $doctors_data=Doctors::join('specifications','specifications.id', '=', 'doctors.specification_id')->get(['specifications.name as specification_name','doctors.*']);
        $pageTitle="Doctors";      
        $addlink=url(Config::get('constants.admin').'/doctors/create');     
        return view('admin.doctors.doctors_list', compact('pageTitle','doctors_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function create_doctors()
    {
         
            $pageTitle="Add New";
            $specifications_data=Specifications::get();
            return view('admin.doctors.add_edit_doctors',compact('pageTitle','specifications_data'));   
         
    }
    public function store_doctors(Request $request)
    {


        $request->validate([
            'doctor_name' => 'required', 
            'specification_id' => 'required', 
            
        ]);
        Doctors::insert([
            [
                "doctor_name"=>$request->doctor_name??'',
                "specification_id"=>$request->specification_id??'',
                "admin_user_id"=>$request->admin_user_id??'',
                "organization_id"=>Session::get('companyID')??0,
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/doctors')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_doctors($id)    {
        
        $ID = Crypt::decryptString($id);
        $specifications_data=Specifications::get();
            $doctors_data=Doctors::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.doctors.add_edit_doctors',compact('doctors_data','pageTitle','specifications_data'));
        
        
    }
    public function update_doctors(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required',       
            'specification_id' => 'required',       
        ]);  
        
        Doctors::where('id', $request->id)
            ->update(
            [ 
                "doctor_name"=>$request->doctor_name??'',
                "specification_id"=>$request->specification_id??'',
                "admin_user_id"=>$request->admin_user_id??'',
                "organization_id"=>Session::get('companyID')??0,
            ]
            );      
        return redirect(Config::get('constants.admin').'/doctors')->with('success', "Success! Details are updated successfully");
    }
    public function delete_doctors($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Doctors::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
