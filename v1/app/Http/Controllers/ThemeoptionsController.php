<?php

namespace App\Http\Controllers;

use App\Models\Themeoptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Validator;
use Config;

class ThemeoptionsController extends Controller
{
    public function index()
    {   
        
            $theme_options_data=Themeoptions::get()->first();
            $pageTitle="Theme Options";          
            return view('admin.themeoptions.theme_options_list', compact('pageTitle','theme_options_data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        
        
    }
    public function create_theme_options()
    {
         
            $pageTitle="Add New";
            return view('admin.themeoptions.add_theme_options',compact('pageTitle'));   
         
    }
    public function store_theme_options(Request $request)
    {
        
        $request->validate([
            'header_logo' => 'required|mimes:png,jpg,jpeg,svg,html', 
            'favicon' => 'sometimes|nullable',
            
        ]);

        if ($request->hasFile('header_logo')) {      
        $header_filename=uniqid().'_'.time().'.'.$request->header_logo->extension();
        $request->header_logo->move(('assets/uploads'),$header_filename); 
        }
        else{
            $header_filename="";
        }
        
        if ($request->hasFile('favicon')) {      
        $favicon_filename=uniqid().'_'.time().'.'.$request->favicon->extension();
        $request->favicon->move(('assets/uploads'),$favicon_filename);
        }
        else{
            $favicon_filename="";
        } 
        Themeoptions::insert([
            [
                "header_logo"=>$header_filename,
                "favicon"=>$favicon_filename,
                "copyright"=>$request->copyright??'',
            ]  
        ]); 
        return redirect(Config::get('constants.superadmin').'/theme_options')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_theme_options($id)    {
        
            $theme_options_data=Themeoptions::get()->where("id",$id)->first();
            $pageTitle="Edit";      
            return view('admin.themeoptions.add_theme_options',compact('theme_options_data','pageTitle'));
        
        
    }
    public function update_theme_options(Request $request)
    {
        $request->validate([
            'header_logo' => 'mimes:png,jpg,jpeg,svg,html', 
            'favicon' => 'sometimes|nullable',         
        ]);  
        if ($request->hasFile('header_logo')) {      
        $header_logo=uniqid().'_'.time().'.'.$request->header_logo->extension();
        $request->header_logo->move(('assets/uploads'),$header_logo);
        Themeoptions::where('id', $request->id)
        ->update(["header_logo"=>$header_logo]);
        }
        else{
            $header_logo="";
        }
        if ($request->hasFile('favicon')) {      
        $favicon=uniqid().'_'.time().'.'.$request->favicon->extension();
        $request->favicon->move(('assets/uploads'),$favicon);
        Themeoptions::where('id', $request->id)
        ->update(["favicon"=>$favicon]);
        }
        else{
            $favicon="";
        } 
        Themeoptions::where('id', $request->id)
            ->update(
            [
                
                
                "copyright"=>$request->copyright??'',
            ]
            );      
        return redirect(Config::get('constants.superadmin').'/theme_options')->with('success', "Success! Details are updated successfully");
    }
    public function delete_theme_options($id)
    {
        
            $data=Themeoptions::where('id',$id)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
