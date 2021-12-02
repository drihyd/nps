<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\Organizations;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Carbon;
use Config;
use Validator;
use Auth;
use Session;

class DepartmentsController extends Controller
{
    public function departments_list()
    {   
        
            $departments_data=Departments::get();
            $pageTitle="Departments";      
            $addlink=url(Config::get('constants.admin').'/departments/create');     
            return view('admin.departments.departments_list', compact('pageTitle','departments_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_departments()
    {
         
            $pageTitle="Add New";
            return view('admin.departments.add_edit_departments',compact('pageTitle'));   
         
    }
    public function store_departments(Request $request)
    {


        $request->validate([
            'department_name' => 'required', 
            'is_display' => 'sometimes|nullable',
            
        ]);
        Departments::insert([
            [
                "department_name"=>$request->department_name??'',
                "is_display"=>$request->is_display??'',
                "organization_id"=>$request->organization_id??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/departments')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_departments($id)    {
        
        $ID = Crypt::decryptString($id);
            $departments_data=Departments::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.departments.add_edit_departments',compact('departments_data','pageTitle'));
        
        
    }
    public function update_departments(Request $request)
    {
        $request->validate([
            'department_name' => 'required', 
            'is_display' => 'sometimes|nullable',        
        ]);  
        
        Departments::where('id', $request->id)
            ->update(
            [
                
                
                "department_name"=>$request->department_name??'',
                "is_display"=>$request->is_display??'',
                "organization_id"=>$request->organization_id??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/departments')->with('success', "Success! Details are updated successfully");
    }
    public function delete_departments($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Departments::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}