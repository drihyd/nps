<?php

namespace App\Http\Controllers;

use App\Models\CustomerFieldsConfigurable;
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

class CustomerFieldsConfigurableController extends Controller
{
    public function customer_fields_configurables_list()
    {   
        
        $customer_fields_configurables_data=CustomerFieldsConfigurable::where('organization_id',Auth::user()->organization_id)->get();
        $pageTitle="Customer Fields Configurables";      
        $addlink=url(Config::get('constants.admin').'/customer_fields_configurables/create');     
        return view('admin.customer_fields_configurables.customer_fields_configurables_list', compact('pageTitle','customer_fields_configurables_data','addlink'))
        ->with('i', (request()->input('page', 1) - 1) * 5);    
    }
    public function create_customer_fields_configurables()
    {
         
            $pageTitle="Add New";
            return view('admin.customer_fields_configurables.add_edit_customer_fields_configurables',compact('pageTitle'));   
         
    }
    public function store_customer_fields_configurables(Request $request)
    {


        $request->validate([
            'input_type' => 'required', 
            'input_name' => 'required',
            'label' => 'required',
            'class_name' => 'sometimes|nullable',
            'placeholder' => 'sometimes|nullable',
            'input_id' => 'sometimes|nullable',
            'is_display' => 'sometimes|nullable',
            
        ]);
        CustomerFieldsConfigurable::insert([
            [
                "input_type"=>$request->input_type??'',
                "input_name"=>$request->input_name??'',
                "label"=>$request->label??'',
                "organization_id"=>$request->organization_id??'',
                "class_name"=>$request->class_name??'',
                "placeholder"=>$request->placeholder??'',
                "input_id"=>$request->input_id??'',
                "is_display"=>$request->is_display??'',
            ]  
        ]); 
        return redirect(Config::get('constants.admin').'/customer_fields_configurables')->with('success', "Success! Details are added successfully"); 
    }
    public function edit_customer_fields_configurables($id)    {
        
        $ID = Crypt::decryptString($id);
            $customer_fields_configurables_data=CustomerFieldsConfigurable::get()->where("id",$ID)->first();
            $pageTitle="Edit";      
            return view('admin.customer_fields_configurables.add_edit_customer_fields_configurables',compact('customer_fields_configurables_data','pageTitle'));
        
        
    }
    public function update_customer_fields_configurables(Request $request)
    {
        $request->validate([
            'input_type' => 'required', 
            'input_name' => 'required',
            'label' => 'required',
            'class_name' => 'sometimes|nullable',
            'placeholder' => 'sometimes|nullable',
            'input_id' => 'sometimes|nullable',
            'is_display' => 'sometimes|nullable',       
        ]);  
        
        CustomerFieldsConfigurable::where('id', $request->id)
            ->update(
            [
                
                
               "input_type"=>$request->input_type??'',
                "input_name"=>$request->input_name??'',
                "label"=>$request->label??'',
                "organization_id"=>$request->organization_id??'',
                "class_name"=>$request->class_name??'',
                "placeholder"=>$request->placeholder??'',
                "input_id"=>$request->input_id??'',
                "is_display"=>$request->is_display??'',
            ]
            );      
        return redirect(Config::get('constants.admin').'/customer_fields_configurables')->with('success', "Success! Details are updated successfully");
    }
    public function delete_customer_fields_configurables($id)
    {
        $ID = Crypt::decryptString($id);
            $data=CustomerFieldsConfigurable::where('id',$ID)->delete();   
         return redirect()->back()->with('success','Success! Details are deleted successfully');
        
    }
}
