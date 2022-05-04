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
use App\Models\Departments;
use App\Models\Departments_Survey;

class SurveysController extends Controller
{
    public function surveys_list()
    {   
        
        $surveys_data=Surveys::get();
        $pageTitle="Questionnaire";      
        $addlink=url(Config::get('constants.admin').'/questionnaire/create');     
        return view('admin.surveys.surveys_list', compact('pageTitle','surveys_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_surveys()
    {
         
            $pageTitle="Add New";
			$Departments=Departments::select('department_name','id')->orderBy('department_name','asc')->get();
            return view('admin.surveys.add_edit_surveys',compact('pageTitle','Departments'));   
         
    }
    public function store_surveys(Request $request)
    {

try{
	
	if(isset($request->department_id)){
        $request->validate([
            'title' => 'required', 
            'isopen' => 'sometimes|nullable',
            
        ]);
        $survey_data_id=Surveys::insertGetId(
            [
                "title"=>$request->title??'',
                "description"=>$request->description??'',
                "isopen"=>$request->isopen??'',
                "organization_id"=>$request->company_name??0,
                "admin_user_id"=>$request->admin_user_id??'',
            ]  
        );	
		$LastInserID=$survey_data_id??0;
		$DepartmentSelected=$request->department_id??[0];
		if($LastInserID){
		$this->mapping_departments_survey($DepartmentSelected,$LastInserID);
		}	
        return redirect(Config::get('constants.admin').'/questionnaire')->with('success', "Success! Details are added successfully"); 
    }
	else{
		return redirect()->back()->with('error', "Something went wrong/Select Departments"); 
		
	}
	
	}
	
	catch (\Exception $exception) {
		return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
	} 
	
	
	}
    public function edit_surveys($id)    {
        
		$ID = Crypt::decryptString($id);
		$surveys_data=Surveys::get()->where("id",$ID)->first();
		$Departments=Departments::select('department_name','id')->orderBy('department_name','asc')->get();
		$pageTitle="Edit"; 

		$Departments_Survey=Departments_Survey::where("survey_id",$ID)->pluck('department_id')->toArray();	
		return view('admin.surveys.add_edit_surveys',compact('surveys_data','pageTitle','Departments','Departments_Survey'));
        
        
    }
    public function update_surveys(Request $request)
    {
		
	try{
	$request->validate([
            'title' => 'required', 
            'isopen' => 'sometimes|nullable',        
        ]);  
		
		$Surveys = Surveys::select('id')->where('id',$request->id)->get()->count();
        
		if($Surveys && $request->department_id){
        Surveys::where('id', $request->id)
            ->update(
            [
                
                
                "title"=>$request->title??'',
                "description"=>$request->description??'',
                "isopen"=>$request->isopen??'',
                "organization_id"=>$request->company_name??0,
                "admin_user_id"=>$request->admin_user_id??'',
            ]
            ); 
		}
else{
return redirect()->back()->with('error', "Something went wrong/Select Departments"); 
}	


	$LastInserID=$request->id??0;
	$DepartmentSelected=$request->department_id??[0];
	if($LastInserID){
	$this->mapping_departments_survey($DepartmentSelected,$LastInserID);
	}
	return redirect(Config::get('constants.admin').'/questionnaire')->with('success', "Success! Details are updated successfully");
    
}
catch (\Exception $exception) {
return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
} 
	
	}
	
	
public function mapping_departments_survey($DepartmentSelected,$LastInserID){
	if(isset($LastInserID) && $LastInserID>0)
	{
		$Surveys = Surveys::select('id')->where('id',$LastInserID)->get()->count();
			if($Surveys>0){				
				$remove_data=Departments_Survey::where('survey_id',$LastInserID)->delete(); 
				foreach($DepartmentSelected as $key=>$value){	
				$checking_exist=Departments_Survey::where("department_id",$value)->where("survey_id",$LastInserID)->get()->count();
						if($checking_exist==0) {							
							if($value>0) {
								$Dep_survey=Departments_Survey::insert(
									[				
										[
											"department_id"=>$value,
											"survey_id"=>$LastInserID,
											'created_at' =>Carbon\Carbon::now(),    
											'updated_at' =>Carbon\Carbon::now(),			
										]
									]
									);
								
							}
							
						}
						else{
							
							
							if($value>0) {
								$Dep_survey=Departments_Survey::where('department_id',$value)->where('survey_id',$LastInserID)
								->update(
										[
										"department_id"=>$value,
										"survey_id"=>$LastInserID,
										'updated_at' =>Carbon\Carbon::now(),			
										]
								); 
							
							}
							
							
						}
				
				}
				
				
				
				
				
			}
		}
		else{
			
		}
			
	}
	
	
	
    public function delete_surveys($id)
    {
		$ID = Crypt::decryptString($id);
		$remove_data=Departments_Survey::where('survey_id',$ID)->delete();
		$data=Surveys::where('id',$ID)->delete();   
		return redirect()->back()->with('success','Survey&Mapped Departments are deleted.');
        
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
