<?php

namespace App\Http\Controllers;

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

class SurveysController extends Controller
{
    public function surveys_list()
    {   
        
        $surveys_data=Surveys::where('organization_id',Auth::user()->organization_id)->get();
        $pageTitle="Questionnaire";      
        $addlink=url(Config::get('constants.admin').'/questionnaire/create');     
        return view('admin.surveys.surveys_list', compact('pageTitle','surveys_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_surveys()
    {
         
            $pageTitle="Add New";
            return view('admin.surveys.add_edit_surveys',compact('pageTitle'));   
         
    }
    public function store_surveys(Request $request)
    {


        $request->validate([
            'title' => 'required', 
            'isopen' => 'sometimes|nullable',
            
        ]);
        Surveys::insert([
            [
                "title"=>$request->title??'',
                "description"=>$request->description??'',
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
                "description"=>$request->description??'',
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
    public function changeStatus(Request $request)
    {
        if($request->ajax()){
        Surveys::where('id', $request->id)
            ->update(
            [
                "isopen"=>$request->isopen??'',
            ]
            );
        }     
  
        return response()->json(['statusCode'=>200,'success'=>'Status change successfully.']);
    }
}
