<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;
use Validator;
use Auth;
use Illuminate\Support\Facades\Session;
use Carbon;
Use Exception;
use Illuminate\Support\Facades\Crypt;
use Config;

class UsermanagementController extends Controller
{
	// use PasswordValidationRules;

    public function index()
    {	
        
            $users_data=User::select('users.*','user_types.name as ut_name')
            ->leftjoin('user_types','user_types.id','=','users.role')       
            ->whereNotIn('users.role',[1])       
            ->get();   
            // $addlink=url(Config::get('constants.superadmin').'/admin-user/create'); 
            $pageTitle="Users";          
            return view('admin.users.users_list', compact('pageTitle','users_data'));
        
    }
    public function create_user()
    {
        
        $pageTitle="Add User";
        $user_type_data=DB::table('user_types')->get();
        return view('admin.users.add_user',compact('pageTitle','user_type_data')); 
            
    }
    public function store_user(Request $request)
    {
    	
        $request->validate([
         'firstname' => 'required|min:1|max:100',        
         'lastname' => 'required|min:1|max:100',        
         'email' => 'required|email|unique:users,email',        
         'role' => 'required',
         'phone' => 'required',
         'is_active_status' => 'required',
         'password' => 'sometimes|nullable',
         'phone' => 'sometimes|nullable|regex:/^[6-9]{1}[0-9]{9}/',
         'profile' => 'mimes:jpg,jpeg,png',
         // 'password' => $this->passwordRules(),        
        ]);


        $isexistemail = User::select('id')->where('email',$request->admin_email)->get();
            if($isexistemail->count()==0){
            $decrypt_password=Str::random(8);

   

        User::insert([
            [
                "organization_id"=>$request->id,
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "role"=>$request->role,
                "email"=>$request->email,
                "password"=> Hash::make($decrypt_password),
                "decrypt_password"=>$decrypt_password,
                "phone"=>$request->phone??'',
                "role"=>'2',
                'created_at' =>Carbon\Carbon::now(),    
                'updated_at' =>Carbon\Carbon::now(), 
                'email_verified_at' =>Carbon\Carbon::now(), 
                'is_email_verified' =>1, 
                'is_active_status' =>1, 
                'ip' =>request()->ip()??0,
            ]  
        ]); 

        return redirect(Config::get('constants.superadmin').'/admin-users')->with('success', "Success! Details are added successfully");
    }else{

         return redirect()->back()->with('error', 'User already exist an account.');  
     }

	}
	public function edit_user($id){

        $user_id=Crypt::decryptString($id);

            $users_data=User::where("id",$user_id)->get()->first();
            
             $user_type_data=DB::table('user_types')->get();
            $pageTitle="Edit User";     
            return view('admin.users.add_user',compact('pageTitle','users_data','user_type_data'));

    }
    public function update_user(Request $request)
    {
		$request->validate([
		 'firstname' => 'required|min:1|max:100',        
         'lastname' => 'required|min:1|max:100',        
         'email' => 'required|email',        
         'role' => 'required',
         'phone' => 'required',
         'is_active_status' => 'required',
         'password' => 'sometimes|nullable',
         'phone' => 'sometimes|nullable|regex:/^[6-9]{1}[0-9]{9}/',
         'profile' => 'mimes:jpg,jpeg,png',        	        
		]); 
        

        if ($request->hasFile('profile')) {      
        $profile_filename=uniqid().'_'.time().'.'.$request->profile->extension();
        $request->profile->move(('assets/uploads'),$profile_filename);
        
        DB::table('users')
        ->where('id', $request->id)
        ->update(["profile"=>$profile_filename]);
        }
        else{
            $profile_filename="";
        } 

        if ($request->password) {
        $password = Hash::make($request->password);

        DB::table('users')
        ->where('id', $request->id)
        ->update(["password"=>$password]);
        
    }else{
        $password ="";
    }
        
        DB::table('users')
            ->where('id', $request->id)
            ->update(
            [
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "role"=>$request->role,
                "email"=>$request->email,
                "phone"=>$request->phone??'',
                "is_active_status"=>$request->is_active_status??'',
            ]
            );      
        return redirect('admin/users')->with('success', "Success! Details are updated successfully");
            
        
        
    }

    public function profile(){
            
            $users_data=DB::table('users')->get()->where("id",auth()->user()->id)->first();
            $pageTitle="Edit Profile";     
            return view('admin.users.edit_profile',compact('users_data','pageTitle'));
        
    }
    public function update_profile(Request $request)
    {
        $request->validate([
         'firstname' => 'required|min:1|max:100',        
         'lastname' => 'required|min:1|max:100',        
         'email' => 'required|email', 
         'phone' => 'required',
         'password' => 'sometimes|nullable',
         'phone' => 'sometimes|nullable|regex:/^[6-9]{1}[0-9]{9}/',
         'profile' => 'mimes:jpg,jpeg,png',                 
        ]); 
        

        if ($request->hasFile('profile')) {      
        $profile_filename=uniqid().'_'.time().'.'.$request->profile->extension();
        $request->profile->move(('assets/uploads'),$profile_filename);
        
        DB::table('users')
        ->where('id', auth()->user()->id)
        ->update(["profile"=>$profile_filename]);
        }
        else{
            $profile_filename="";
        } 

        if ($request->password) {
        $password = Hash::make($request->password);

        DB::table('users')
        ->where('id', auth()->user()->id)
        ->update(["password"=>$password]);
        
    }else{
        $password ="";
    }
        
        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(
            [
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "email"=>$request->email,
                "phone"=>$request->phone??'',
            ]
            );   
                return redirect('admin/profile')->with('success', "Success! Details are updated successfully");       
            }
    public function delete_user($id)
    {
        $user_id=Crypt::decryptString($id);    
        $data=DB::table('users')->where('id',$user_id)->delete();   
        return redirect()->back()->with('success','Success! Details are deleted successfully');   
         
    }


    public function department_users_list()
    {   
        
            $users_data=User::select('users.*','user_types.name as ut_name')
            ->leftjoin('user_types','user_types.id','=','users.role')       
            ->whereNotIn('users.role',[1,2])       
            ->get(); 
            $addlink=url(Config::get('constants.admin').'/user/create'); 
            $pageTitle="Users";          
            return view('admin.department_users.users_list', compact('pageTitle','users_data','addlink'));
        
    }
    public function department_create_user()
    {
        
        $pageTitle="Add User";
        $user_type_data=DB::table('user_types')->whereNotIn('user_types.id',[1,2])->get();
        return view('admin.department_users.add_user',compact('pageTitle','user_type_data')); 
            
    }
    public function department_store_user(Request $request)
    {
        
        $request->validate([
         'firstname' => 'required|min:1|max:100',       
         'email' => 'required|email|unique:users,email',        
         'role' => 'required',
         'phone' => 'required',
         'is_active_status' => 'required',
         'password' => 'sometimes|nullable',
         'phone' => 'sometimes|nullable|regex:/^[6-9]{1}[0-9]{9}/',
        ]);


        $isexistemail = User::select('id')->where('email',$request->admin_email)->get();
            if($isexistemail->count()==0){
            $decrypt_password=Str::random(8);

   

        User::insert([
            [
                "organization_id"=>$request->organization_id,
                "firstname"=>$request->firstname,
                "role"=>$request->role,
                "email"=>$request->email,
                "password"=> Hash::make($decrypt_password),
                "decrypt_password"=>$decrypt_password,
                "phone"=>$request->phone??'',
                'created_at' =>Carbon\Carbon::now(),    
                'updated_at' =>Carbon\Carbon::now(), 
                'email_verified_at' =>Carbon\Carbon::now(), 
                'is_email_verified' =>1, 
                'is_active_status' =>$request->is_active_status??0, 
                'ip' =>request()->ip()??0,
            ]  
        ]); 

        return redirect(Config::get('constants.admin').'/users')->with('success', "Success! Details are added successfully");
    }else{

         return redirect()->back()->with('error', 'User already exist an account.');  
     }

    }
    public function department_edit_user($id){

        $user_id=Crypt::decryptString($id);

            $users_data=User::where("id",$user_id)->get()->first();
            
             $user_type_data=DB::table('user_types')->get();
            $pageTitle="Edit User";     
            return view('admin.department_users.add_user',compact('pageTitle','users_data','user_type_data'));

    }
    public function department_update_user(Request $request)
    {
        $request->validate([
         'firstname' => 'required',       
         'email' => 'required|email',        
         'role' => 'required',
         'phone' => 'required',
         'is_active_status' => 'required',
         'password' => 'sometimes|nullable',
         'phone' => 'sometimes|nullable',
        ]);
        
        User::where('id', $request->id)
            ->update(
            [
                "organization_id"=>$request->organization_id,
                "firstname"=>$request->firstname,
                "role"=>$request->role,
                "email"=>$request->email,
                // "password"=> Hash::make($decrypt_password),
                // "decrypt_password"=>$decrypt_password,
                "phone"=>$request->phone??'',
                'email_verified_at' =>Carbon\Carbon::now(), 
                'is_email_verified' =>1, 
                'is_active_status' =>$request->is_active_status??'', 
                'ip' =>request()->ip()??0,
            ]
            );      
        return redirect('admin/users')->with('success', "Success! Details are updated successfully");
            
        
        
    }
    public function department_delete_user($id)
    {
        $user_id=Crypt::decryptString($id);    
        $data=User::where('id',$user_id)->delete();   
        return redirect()->back()->with('success','Success! Details are deleted successfully');   
         
    }
}
