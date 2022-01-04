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
    public function questions_list(Request $request)
    {   
        
        if($request->question_id) {                    
                $Question=Questions::select()
                ->where('survey_id',$request->question_id)
                ->pluck('id');  
                }       
                else{
                $Question='';
                
                
                }



        $questions_data=Questions::leftjoin('surveys', 'questions.survey_id', '=', 'surveys.id')
        ->where('questions.organization_id',Auth::user()->organization_id)
        ->where(function($questions_data) use ($Question){   
            if($Question){       
                $questions_data->whereIn('questions.survey_id',$Question);                
            }
            })
        ->get(['questions.*','surveys.title as survey_title']);
        $surveys_data=Surveys::where('organization_id',Auth::user()->organization_id)->get();
        $pageTitle="Questions";      
        $addlink=url(Config::get('constants.admin').'/questions/create'); 
        $quetion=$request->question_id??'';    
        return view('admin.questions.questions_list', compact('pageTitle','questions_data','addlink','surveys_data','quetion'))
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
            'survey_id' => 'required', 
            'label' => 'required', 
            'active' => 'sometimes|nullable',
            
        ]);
        Questions::insert([
            [
                "survey_id"=>$request->survey_id??'',
                "active"=>$request->active??'',
                "label"=>$request->label??'',
                "sublabel"=>$request->sublabel??'',
                "input_type"=>$request->input_type??'',
                "organization_id"=>$request->organization_id??'',
                "sequence_order"=>$request->sequence_order??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/questions')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_questions($id)    {
        
        $ID = Crypt::decryptString($id);
            $questions_data=Questions::get()->where("id",$ID)->first();
            $surveys_data=Surveys::get();
            $pageTitle="Edit";      
            return view('admin.questions.add_edit_questions',compact('surveys_data','pageTitle','questions_data'));
        
        
    }
    public function update_questions(Request $request)
    {
        $request->validate([
            'survey_id' => 'required', 
            'label' => 'required', 
            'active' => 'sometimes|nullable',      
        ]);  
        
        Questions::where('id', $request->id)
            ->update(
            [
                
                
                "survey_id"=>$request->survey_id??'',
                "active"=>$request->active??'',
                "label"=>$request->label??'',
                "sublabel"=>$request->sublabel??'',
                "input_type"=>$request->input_type??'',
                "organization_id"=>$request->organization_id??'',
                "sequence_order"=>$request->sequence_order??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/questions')->with('success', "Success! Details are updated successfully");
    }
    public function delete_questions($id)
    {
        $ID = Crypt::decryptString($id);
            $data=Questions::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
