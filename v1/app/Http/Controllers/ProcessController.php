<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;
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

class ProcessController extends Controller
{
    public function process_list()
    {   
        
            $process_data=Process::where('organization_id',Auth::user()->organization_id)->get();
            $pageTitle="Process";      
            $addlink=url(Config::get('constants.admin').'/process/create');     
            return view('admin.process.process_list', compact('pageTitle','process_data','addlink'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_process()
    {
         
            $pageTitle="Add New";
            return view('admin.process.add_edit_process',compact('pageTitle'));   
         
    }
    public function store_process(Request $request)
    {


        $request->validate([
            'name' =>'required|unique:processes,name', 
            'slug' => 'required',
            
        ]);
        Process::insert([
            [
                "name"=>$request->name??'',
                "slug"=>$request->slug??'',
                "organization_id"=>$request->organization_id??'',
            ]  
        ]);



        return redirect(Config::get('constants.admin').'/process')->with('success', "Success! Details are added successfully"); 
        
    }
    public function edit_process($id)    {
        
        $ID = Crypt::decryptString($id);
            $process_data=Departments::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.process.add_edit_process',compact('process_data','pageTitle'));
        
        
    }
    public function update_process(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'slug' => 'required',        
        ]);  

        // dd($request->id);

        
        Process::where('id', $request->id)
            ->update(
            [
                
                
                "name"=>$request->name??'',
                "slug"=>$request->slug??'',
                "organization_id"=>$request->organization_id??'',
            ]
            ); 
        return redirect(Config::get('constants.admin').'/process')->with('success', "Success! Details are updated successfully");
    }
    public function delete_process($id)
    {
        $ID = Crypt::decryptString($id);

            
            $data=Process::where('id',$ID)->delete();

         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
