<?php

namespace App\Http\Controllers;

use App\Models\Organizations;
use App\Models\User;
use App\Scopes\ActiveOrgaization;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Carbon;
use Config;

class OrganizationsController extends Controller
{


    public function organizations_lists(Request $request)
    {
		

        $pageTitle = 'Organizations';
        $data = Organizations::withoutGlobalScope(new ActiveOrgaization)->Orderby('created_at','ASC')->get();

        if ($request->ajax()) {			
	
            $data = Organizations::Orderby('created_at','desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('entity_group', function($row){
                            
                            if($row->is_group=='yes'){
                                $items= "Group Company";
                            }else{
                                $items= "Single Entity";
                            }
                             return $items;
                    })
                    ->addColumn('status', function($row){
                            
                            if($row->is_active=='yes' && $row->license_startdate!=''){
                                $items= "Active";
                            }else{
                                $items= "In Active";
                            }
                             return $items;
                    })
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="'.url(Config::get('constants.superadmin')."/organizations/edit/".Crypt::encryptString($row->id)).'"><i class="fa fa-edit"></i></a>&ensp;<a href="javascript:void(0);" data-id='.$row->id.' class="nddelete delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action','entity_group','status'])
                    ->make(true);
        }


        return view('admin.organizations.organizations_list',compact('pageTitle','data'));
    }


    public function add_basicinfo()
    {
        $pageTitle = 'Add Organization';
        return view('admin.organizations.add_basicinfo',compact('pageTitle'));
    }
    public function store_basicinfo(Request $request)
    {
        
        $request->validate([
            'company_name' => 'required', 
            'short_name' => 'required',
            'is_group' => 'sometimes|nullable',
            'company_url' => 'sometimes|nullable',
            'brand_logo' => 'required|mimes:png,jpg,jpeg,svg,html',
            
        ]);

        if ($request->hasFile('brand_logo')) {      
        $header_filename=uniqid().'_'.time().'.'.$request->brand_logo->extension();
        $request->brand_logo->move(('assets/uploads'),$header_filename); 
        }
        else{
            $header_filename="";
        }

        
        if ($request->company_url) {
            $domain = parse_url($request->company_url)['host'];
            $favicon_url = 'https://www.google.com/s2/favicons?domain=' . $domain;
        }else{
            $favicon_url='';
        }

        $id = Organizations::insertGetId(array(
        "company_name"=>$request->company_name??'',
                "short_name"=>$request->short_name??'',
                "slug"=> Str::slug($request->short_name??''),
                "is_group"=>$request->is_group??'no',
                "company_url"=>$request->company_url??'',
                "brand_logo"=>$header_filename,
                "favicon_url"=>$favicon_url,
));


        return redirect(Config::get('constants.superadmin').'/organizations/add-address/'.Crypt::encryptString($id))->with('success', "Success! Details are added successfully"); 
    }
    public function add_address($id)
    {
        $comapany_id = Crypt::decryptString($id);
        $organizations_data= Organizations::where('id',$comapany_id)->get()->first();
        $pageTitle = 'Add Organization Address';
        return view('admin.organizations.add_address',compact('pageTitle','comapany_id','organizations_data'));
    }
    public function store_address(Request $request)
    {
        
        $request->validate([
            'address_1' => 'required', 
            'address_2' => 'sometimes|nullable',
            'pincode' => 'required',
            'city' => 'required',
            'country' => 'required',
            
        ]);
        Organizations::where('id', $request->id)
            ->update(
            [
                "address_1"=>$request->address_1??'',
                "address_2"=>$request->address_2??'',
                "pincode"=>$request->pincode??'',
                "city"=>$request->city??'',
                "country"=>$request->country??'',
            ]
            ); 
        return redirect(Config::get('constants.superadmin').'/organizations/add-gst-details/'.Crypt::encryptString($request->id))->with('success', "Success! Address Details are updated successfully"); 
    }
    public function add_gst_details($id)
    {
        $comapany_id = Crypt::decryptString($id);
        $organizations_data= Organizations::where('id',$comapany_id)->get()->first();
        $pageTitle = 'Add Organization Address';
        return view('admin.organizations.add_gst_details',compact('pageTitle','comapany_id','organizations_data'));
    }
    public function store_gst_details(Request $request)
    {
        
        $request->validate([
            'billing_address_1' => 'required', 
            'billing_address_2' => 'sometimes|nullable',
            'billing_pincode' => 'required',
            'billing_city' => 'required',
            'billing_country' => 'required',
            'gst_no' => 'required',
            
        ]);
        Organizations::where('id', $request->id)
            ->update(
            [
                "billing_address_1"=>$request->billing_address_1??'',
                "billing_address_2"=>$request->billing_address_2??'',
                "billing_pincode"=>$request->billing_pincode??'',
                "billing_city"=>$request->billing_city??'',
                "billing_country"=>$request->billing_country??'',
                "gst_no"=>$request->gst_no??'',
            ]
            ); 
        return redirect(Config::get('constants.superadmin').'/organizations/add-admin-details/'.Crypt::encryptString($request->id))->with('success', "Success! GST & Billing Details are updated successfully"); 
    }
    public function add_admin_details($id)
    {
        $comapany_id = Crypt::decryptString($id);
        $organizations_data= Organizations::where('id',$comapany_id)->get()->first();
        $pageTitle = 'Add Organization Address';
        return view('admin.organizations.add_admin_details',compact('pageTitle','comapany_id','organizations_data'));
    }
	
	
	public function admininfo_storein_usertb($request){		

			$isexistemail = User::select('id')->where('email',$request->admin_email)->get();
			if($isexistemail->count()==0){
			$decrypt_password=Str::random(8);
			$InserasUser=User::insert(
				[
				"organization_id"=>$request->id,
				"email"=>$request->admin_email,
				"phone"=>$request->admin_mobile,
				"password"=> Hash::make($decrypt_password),
				"decrypt_password"=>$decrypt_password,
				"firstname"=>$request->admin_name??'',
				"role"=>'2',
				'created_at' =>Carbon\Carbon::now(), 	
				'updated_at' =>Carbon\Carbon::now(), 
				'email_verified_at' =>Carbon\Carbon::now(), 
				'is_email_verified' =>1, 
				'is_active_status' =>1, 
				'ip' =>request()->ip()??0, 
				]
				);		

			}else{

			return redirect()->back()->with('error', 'User already exist an account.');  
			}			
	
	}
    public function store_admin_details(Request $request)
    {
        
        $request->validate([
            'admin_name' => 'required', 
            'admin_email' => 'required',
            'admin_mobile' => 'required',
            'admin_alter_mobile' => 'sometimes|nullable',
            
        ]);
        Organizations::where('id', $request->id)
            ->update(
            [
                "admin_name"=>$request->admin_name??'',
                "admin_email"=>$request->admin_email??'',
                "admin_mobile"=>$request->admin_mobile??'',
                "admin_alter_mobile"=>$request->admin_alter_mobile??'',
                "role"=>'2',
                "password"=> Str::random(8),
            ]
            );

            $org_data= Organizations::where('id',$request->id)->get()->first();
			
            // echo '<pre>'; print_r($org_data); exit();
			

		
		$this->admininfo_storein_usertb($request);
	

          




        return redirect(Config::get('constants.superadmin').'/organizations/add-license-details/'.Crypt::encryptString($request->id))->with('success', "Success! Address Details are updated successfully"); 
    }
    public function add_license_details($id)
    {
        $comapany_id = Crypt::decryptString($id);
        $organizations_data= Organizations::where('id',$comapany_id)->get()->first();
        $pageTitle = 'Add Organization Address';
        return view('admin.organizations.add_license_details',compact('pageTitle','comapany_id','organizations_data'));
    }
    public function store_license_details(Request $request)
    {
        
        $request->validate([
            'license_startdate' => 'required', 
            'license_period_year' => 'required',
            'license_period_month' => 'required',
            
        ]);
        Organizations::where('id', $request->id)
            ->update(
            [
                "license_startdate"=>$request->license_startdate??'',
                "license_period_year"=>$request->license_period_year??'',
                "license_period_month"=>$request->license_period_month??'',
            ]
            ); 




        return redirect(Config::get('constants.superadmin').'/organizations')->with('success', "Organization Details are saved successfully"); 
    }

    public function get_permanent_address(Request $request)
    {
          $permanent_data = Organizations::where('id', $request->id)
            ->get()->first();
        echo json_encode($permanent_data);
        exit();
        
    }


    public function delete_organization($id)
    {		
	
        $ID = Crypt::decryptString($id);
          $Organizations=Organizations::where('id',$ID)->delete(); 		  
		  $User=User::where('organization_id',$ID)->delete(); 

		  // if($Organizations){
			 // return Response()->json(['success'=>"Organization deleted successfully."]);  
		  // }
		  // else{
			 //   return Response()->json(['error'=>"Record not deleted."]);
		  // }
        
        return redirect(Config::get('constants.superadmin').'/organizations')->with('success', "Success! Details are deleted successfully");

        
    }
    public function edit_organization($id)    {
		
		
		try {
			
		$pageTitle="Edit Organization"; 
		$ID = Crypt::decryptString($id);
		
		$organizations_data=Organizations::get()->where("id",$ID)->first();
		
		if(isset($organizations_data)) {
			return view('admin.organizations.single_organization',compact('organizations_data','pageTitle'));
		}
		else{
			return redirect()->back()->with('error', "Something went wrong/Organization is not found.");
		}
		
		
		}		
		catch (RequestException $exception) {		
		// Catch all 4XX errors 
		// To catch exactly error 400 use 
		if ($exception->hasResponse()){
		if ($exception->getResponse()->getStatusCode() == '400') {
		}			
		}			
		// You can check for whatever error status code you need 
		return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??'');
		}
		catch (\Exception $exception) {		
		return redirect()->back()->with('error', "Something went wrong.". $exception->getMessage()??''); 
		}


    }

    public function update_company(Request $request)
    {
        if($request->ajax()){
            Organizations::where('id', $request->pk)
            ->update(
            [
                'company_name' =>$request->value??'',

            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Company Name']);
        }
    }
    public function update_shortname(Request $request)
    {
        if($request->ajax()){
            Organizations::where('id', $request->pk)
            ->update(
            [
                'short_name' =>$request->value??'',
                "slug"=> Str::slug($request->value??''),
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Short Name']);
        }
    }

public function update_entitytype(Request $request)
    {
        if($request->ajax()){
            Organizations::where('id', $request->pk)
            ->update(
            [
                'is_group' =>$request->value??'no',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Entity Type']);
        }
    }
    public function update_address_1(Request $request)
    {
        if($request->ajax()){
            Organizations::where('id', $request->pk)
            ->update(
            [
                'address_1' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Address 1']);
        }
    }
    public function update_address_2(Request $request)
    {
        if($request->ajax()){
            Organizations::where('id', $request->pk)
            ->update(
            [
                'address_2' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Address 2']);
        }
    }
    public function update_pincode(Request $request)
    {
        if($request->ajax()){
            Organizations::where('id', $request->pk)
            ->update(
            [
                'pincode' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Pincode']);
        }
    }
    public function update_city(Request $request)
    {
        if($request->ajax()){
            Organizations::where('id', $request->pk)
            ->update(
            [
                'city' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated City']);
        }
    }
    public function update_country(Request $request)
    {
        if($request->ajax()){
            Organizations::where('id', $request->pk)
            ->update(
            [
                'country' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Country']);
        }
    }
public function update_gst(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'gst_no' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated GST']);
        }
    }
    public function update_billing_address1(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'billing_address_1' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Billing Address 1']);
        }
    }
    public function update_billing_address2(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'billing_address_2' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Billing Address 2']);
        }
    }
    public function update_billing_pincode(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'billing_pincode' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Billing Pincode']);
        }
    }
    public function update_billing_city(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'billing_city' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Billing City']);
        }
    }
    public function update_billing_country(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'billing_country' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Billing City']);
        }
    }
    public function update_admin_name(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'admin_name' =>$request->value??'',
            ]
            );
            User::where('organization_id', $request->pk)
            ->where('role',2)
            ->update(
            [
                'firstname' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Admin Name']);
        }
    }
    public function update_admin_email(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update( 

            [
                'admin_email' =>$request->value??'',
            ]
            );
            User::where('organization_id', $request->pk)
            ->where('role',2)
            ->update(
            [
                'email' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Admin Email']);
        }
    }
    public function update_admin_mobile(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'admin_mobile' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Admin Mobile']);
        }
    }
    public function update_admin_alt_mobile(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'admin_alter_mobile' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated Admin Alternative Mobile']);
        }
    }
    public function update_license_startdate(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'license_startdate' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated License start date']);
        }
    }
    public function update_license_period_year(Request $request)
    {
        if($request->ajax()){

            Organizations::where('id', $request->pk)
            ->update(
            [
                'license_period_year' =>$request->value??'',
            ]
            );
            return response()->json(['statsCode'=>200,'success' => 'Successfully Updated License Period year']);
        }
    }
    public function update_brand_logo(Request $request)
    {
        $request->validate([
            'brand_logo' => 'mimes:png,jpg,jpeg,svg,html',
        ]);  
        if ($request->hasFile('brand_logo')) {      
        $brand_logo=uniqid().'_'.time().'.'.$request->brand_logo->extension();
        $request->brand_logo->move(('assets/uploads'),$brand_logo);
        Organizations::where('id', $request->id)
        ->update(["brand_logo"=>$brand_logo]);
        }
        else{
            $brand_logo="";
        }
              
        return redirect()->back()->with('success','Success! Logo Updated successfully');
    }
    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

            
            User::where('organization_id', $request->id)
            ->where('role',2)
            ->update(
            [
                "password"=> Hash::make($request->password),
                "decrypt_password"=>$request->password,
            ]
            );
            return redirect()->back()->with('success','Success! Password Updated successfully');
        
    }


}
