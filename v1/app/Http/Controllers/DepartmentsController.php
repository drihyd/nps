<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\QuestionOptions;
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
			
            $pageTitle="Teams";      
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


        $isexist = Departments::select('id')->where('department_name',$request->department_name)->get();
            if($isexist->count()==0){


       $id = Departments::insertGetId(array(
            
                "department_name"=>$request->department_name??'',
                "is_display"=>$request->is_display??'',
                "organization_id"=>Session::get('companyID')??'',
            ));
        QuestionOptions::insert([
            [
                "question_id"=>2,
                "department_id"=>$id??'',
                "option_value"=>$request->department_name??'',
            ]  
        ]);
        QuestionOptions::insert([
            [
                "question_id"=>3,
                "department_id"=>$id??'',
                "option_value"=>$request->department_name??'',
            ]  
        ]);
        QuestionOptions::insert([
            [
                "question_id"=>4,
                "department_id"=>$id??'',
                "option_value"=>$request->department_name??'',
            ]  
        ]);
        QuestionOptions::insert([
            [
                "question_id"=>12,
                "department_id"=>$id??'',
                "option_value"=>$request->department_name??'',
            ]  
        ]); 
        QuestionOptions::insert([
            [
                "question_id"=>13,
                "department_id"=>$id??'',
                "option_value"=>$request->department_name??'',
            ]  
        ]);
        QuestionOptions::insert([
            [
                "question_id"=>14,
                "department_id"=>$id??'',
                "option_value"=>$request->department_name??'',
            ]  
        ]);



        return redirect(Config::get('constants.admin').'/departments')->with('success', "Success! Details are added successfully"); 
        }else{

         return redirect()->back()->with('error', 'Department already exist an account.');  
     }
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

        // dd($request->id);

        
        Departments::where('id', $request->id)
            ->update(
            [
                
                
                "department_name"=>$request->department_name??'',
                "is_display"=>$request->is_display??'',
                "organization_id"=>Session::get('companyID')??'',
            ]
            );  


            QuestionOptions::where('department_id', $request->id)->where('question_id',2)
            ->update(
            [
                // "question_id"=>2,
                "option_value"=>$request->department_name??'',
            ]  
        );
        QuestionOptions::where('department_id', $request->id)->where('question_id',3)
            ->update(
            [
                // "question_id"=>2,
                "option_value"=>$request->department_name??'',
            ]  
        );
        QuestionOptions::where('department_id', $request->id)->where('question_id',4)
            ->update(
            [
                // "question_id"=>2,
                "option_value"=>$request->department_name??'',
            ]  
        );
        QuestionOptions::where('department_id', $request->id)->where('question_id',12)
            ->update(
            [
                // "question_id"=>2,
                "option_value"=>$request->department_name??'',
            ]  
        ); 
        QuestionOptions::where('department_id', $request->id)->where('question_id',13)
            ->update(
            [
                // "question_id"=>2,
                "option_value"=>$request->department_name??'',
            ]  
        );   
        QuestionOptions::where('department_id', $request->id)->where('question_id',14)
            ->update(
            [
                // "question_id"=>2,
                "option_value"=>$request->department_name??'',
            ]  
        ); 
        return redirect(Config::get('constants.admin').'/departments')->with('success', "Success! Details are updated successfully");
    }
    public function delete_departments($id)
    {
        $ID = Crypt::decryptString($id);

            $departments_name=Departments::get()->where("id",$ID)->first();

            // dd($departments_name->department_name);

            $data=QuestionOptions::whereIn('question_id',[2,3,4])->where("option_value",$departments_name->department_name)->delete();
            $data=Departments::where('id',$ID)->delete();

         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
