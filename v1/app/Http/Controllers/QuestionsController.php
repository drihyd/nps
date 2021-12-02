<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Surveys;
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

class QuestionsController extends Controller
{
    public function questions_list()
    {   
        
        $questions_data=Questions::get();
        $pageTitle="Questions";      
        $addlink=url(Config::get('constants.admin').'/questions/create');     
        return view('admin.surveys.surveys_list', compact('pageTitle','questions_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_questions()
    {
         
            $pageTitle="Add New";
            $surveys_data=Surveys::get();
            return view('admin.questions.add_edit_questions',compact('pageTitle','surveys_data'));   
         
    }
    public function store_questions(Request $request)
    {


        $request->validate([
            'title' => 'required', 
            'isopen' => 'sometimes|nullable',
            
        ]);
        Surveys::insert([
            [
                "title"=>$request->title??'',
                "isopen"=>$request->isopen??'',
                "organization_id"=>$request->organization_id??'',
                "admin_user_id"=>$request->admin_user_id??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/surveys')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_surveys($id)    {
        
        $ID = Crypt::decryptString($id);
            $surveys_data=Surveys::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.surveys.add_edit_surveys',compact('surveys_data','pageTitle'));
        
        
    }
    public function update_surveys(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'isopen' => 'sometimes|nullable',        
        ]);  
        
        Surveys::where('id', $request->id)
            ->update(
            [
                
                
                "title"=>$request->title??'',
                "isopen"=>$request->isopen??'',
                "organization_id"=>$request->organization_id??'',
                "admin_user_id"=>$request->admin_user_id??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/surveys')->with('success', "Success! Details are updated successfully");
    }
    public function delete_surveys($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Surveys::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
