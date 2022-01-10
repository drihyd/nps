<?php

namespace App\Http\Controllers;

use App\Models\QuestionOptions;
use App\Models\Questions;
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

class QuestionsOptionsController extends Controller
{
    public function questions_option_list(Request $request)
    {   
        if($request->question_id) {                    
                $Question=$request->question_id;
                }       
                else{
                $Question='';
                
                
                }

        $questions_options_data=QuestionOptions::join('questions', 'question_options.question_id', '=', 'questions.id')
        ->where('questions.organization_id',Auth::user()->organization_id)
        ->orderBy('question_options.question_id')
        ->where(function($questions_options_data) use ($Question){   
            if($Question){       
                $questions_options_data->where('questions.survey_id','=',$Question);                
            }
            })
        ->get(['question_options.*','questions.label as question_label']);
        $pageTitle="Question Options";      
        $addlink=url(Config::get('constants.admin').'/questions_options/create');
        $quetion=$request->question_id??'';     
        return view('admin.question_options.question_options_list', compact('pageTitle','questions_options_data','addlink','quetion'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function create_questions_options()
    {
         
        $pageTitle="Add New";
        $questions_data=Questions::get();
        return view('admin.question_options.add_edit_question_options',compact('pageTitle','questions_data'));   
         
    }
    public function store_questions_options(Request $request)
    {


        $request->validate([
            'question_id' => 'required', 
            'option_value' => 'required', 
        ]);
        QuestionOptions::insert([
            [
                "question_id"=>$request->question_id??'',
                "option_value"=>$request->option_value??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/questions_options')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_questions_options($id)    {
        
        $ID = Crypt::decryptString($id);
            $questions_options_data=QuestionOptions::get()->where("id",$ID)->first();
            $questions_data=Questions::get();
            $pageTitle="Edit";      
            return view('admin.question_options.add_edit_question_options',compact('pageTitle','questions_data','questions_options_data'));
        
        
    }
    public function update_questions_options(Request $request)
    {
        $request->validate([
            'question_id' => 'required', 
            'option_value' => 'required',      
        ]);  
        
        QuestionOptions::where('id', $request->id)
            ->update(
            [
                
                "question_id"=>$request->question_id??'',
                "option_value"=>$request->option_value??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/questions_options')->with('success', "Success! Details are updated successfully");
    }
    public function delete_questions_options($id)
    {
        $ID = Crypt::decryptString($id);
            $data=QuestionOptions::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
