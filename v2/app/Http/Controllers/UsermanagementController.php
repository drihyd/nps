<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organizations;
use App\Models\GroupLevel;
use App\Models\Departments_Users;
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
use Mail;
use App\Mail\ResetPassword;

class UsermanagementController extends Controller
{
	// use PasswordValidationRules;

    public function index()
    {	
    
            $users_data=User::select('users.*','user_types.name as ut_name','organizations.short_name as org_short_name')
            ->leftjoin('user_types','user_types.id','=','users.role')       
            ->leftjoin('organizations','organizations.id','=','users.organization_id')       
            ->whereIn('users.role',[2])				
            ->get();  
           
            $pageTitle="Company Users";          
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
                "organization_id"=>$request->company_name??0,
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
		
		   $email = $request->email;
     
	 
	 
	 
	 try{
				
	
		 
		 $offer = [
            'token' => $decrypt_password,
			 'password' =>$decrypt_password,
			  'name' =>$request->firstname,
			  'email' =>$request->email
        ];
		 
		 Mail::to($request->email)->send(new ResetPassword($offer));
		 
		 
		 
		 
		 
			}
			catch (\Exception $exception) {

			} 


        return redirect(Config::get('constants.superadmin').'/admin-users')->with('success', "Success! Details are added successfully");
    }
	
	
	
	else{

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
        
		
		
		$isexistemail = User::select('id')->where('email',$request->email)->get();
        if($isexistemail->count()==1){
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
		
		/*

        if ($request->password) {
        $password = Hash::make($request->password);

        DB::table('users')
        ->where('id', $request->id)
        ->update(["password"=>$password]);
        
    }else{
        $password ="";
    }
	*/
        
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
				"organization_id"=>$request->company_name??0,
            ]
            );      
        return redirect('admin/users')->with('success', "Success! Details are updated successfully");
		
			}
			
			else{
				
				  return redirect('admin/users')->with('error', "Duplicate email not allowed");
			}
		
		
		
		
		
		
            
        
        
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
/*
        if ($request->password) {
        $password = Hash::make($request->password);

        DB::table('users')
        ->where('id', auth()->user()->id)
        ->update(["password"=>$password]);
        
    }
	
	else{
        $password ="";
    }
       
*/
	   
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


    public function department_users_list(Request $request)
    { 
	
	
        if($request->role) {    

                    /*    
                $role=User::select()
                ->where('role',$request->role)
                ->pluck('id');
                */

                $role=$request->role;
                }       
                else{
                $role='';
                
                
                }

		
            $users_data=User::leftjoin('user_types','user_types.id','=','users.role')       
            ->leftjoin('group_levels','group_levels.id','=','users.designation_id')
            ->leftJoin('departments','departments.id', '=', 'users.department')
            ->whereNotIn('users.role',[1,2])  
			->where('users.organization_id',Session::get('companyID')??0) 			
            ->where(function($users_data) use ($role){   
            if($role){       
                $users_data->where('users.role',"=",$role);            
            }
            })
            ->Orderby('users.created_at','desc')       
            ->get(['users.*','user_types.name as ut_name','group_levels.name as designation_name','departments.department_name as dname']); 
            


            $addlink=url(Config::get('constants.admin').'/user/create'); 
            $role=$request->role??''; 
            $pageTitle="Users";          
            return view('admin.department_users.users_list', compact('pageTitle','users_data','addlink','role'));
        
    }
    public function department_create_user()
    {
        
        $pageTitle="Add User";
        $user_type_data=DB::table('user_types')->whereNotIn('user_types.id',[1,2])->get();
        $group_level_data=GroupLevel::get();
        return view('admin.department_users.add_user',compact('pageTitle','user_type_data','group_level_data')); 
            
    }
    public function department_store_user(Request $request)
    {
		
        $request->validate([
         'firstname' => 'required|min:1|max:100',       
         'email' => 'required|email|unique:users,email',        
         'role' => 'required',
         // 'designation_id' => 'required',
         'phone' => 'required',
         'is_active_status' => 'required',
         'password' => 'sometimes|nullable',
         'phone' => 'sometimes|nullable|regex:/^[6-9]{1}[0-9]{9}/',
        ]);
		
		
	$decrypt_password=Str::random(8);	
	$isexistemail = User::select('id')->where('email',$request->admin_email)->get();
	if($isexistemail->count()==0){
		
        $userdata_id=User::insertGetId(
            [
                "organization_id"=>$request->company_name??0,
                // "designation_id"=>$request->designation_id,
                "firstname"=>$request->firstname,
                "role"=>$request->role,
                "email"=>$request->email,
                "password"=> Hash::make($decrypt_password),
                "decrypt_password"=>$decrypt_password,
                "phone"=>$request->phone??'',
               "reportingto"=>$request->reportingto??0,
                "department"=>$request->department[0]??0,
                'created_at' =>Carbon\Carbon::now(),    
                'updated_at' =>Carbon\Carbon::now(), 
                'email_verified_at' =>Carbon\Carbon::now(), 
                'is_email_verified' =>1, 
                'is_active_status' =>$request->is_active_status??0, 
                'ip' =>request()->ip()??0,
            ]  
        ); 


	$LastInserID=$userdata_id??0;
	$DepartmentSelected=$request->department;
	if($LastInserID){
	$this->mapping_departments_users($DepartmentSelected,$LastInserID);
	}
        
try{
		$offer = [
		'token' => $decrypt_password,
		'password' =>$decrypt_password,
		'name' =>$request->firstname,
		'email' =>$request->email
		];
		 
		 Mail::to($request->email)->send(new ResetPassword($offer));
			}
			catch (\Exception $exception) {

			} 


        return redirect(Config::get('constants.admin').'/users')->with('success', "Success! Details are added successfully");
    }else{

         return redirect()->back()->with('error', 'User already exist an account.');  
     }

    }
	
	
	
	
	
	public function mapping_departments_users($DepartmentSelected,$LastInserID){
	
	
	
	
		if(isset($LastInserID) && $LastInserID>0)
		{
			
		$User = User::select('id')->where('id',$LastInserID)->get()->count();
		
			if($User>0){				
				$remove_data=Departments_Users::where('user_id',$LastInserID)->delete(); 
				foreach($DepartmentSelected as $key=>$value){
					
				$checking_exist=Departments_Users::where("department_id",$value)->where("user_id",$LastInserID)->get()->count();
					
						if($checking_exist==0) {
							
							if($value>0) {
								$Dep_Users=Departments_Users::insert(
									[				
										[
											"department_id"=>$value,
											"user_id"=>$LastInserID,
											'created_at' =>Carbon\Carbon::now(),    
											'updated_at' =>Carbon\Carbon::now(),			
										]
									]
									);
								
							}
							
						}
						else{
							
							
							if($value>0) {
								$Dep_Users=Departments_Users::where('department_id',$value)->where('user_id',$LastInserID)
								->update(
										[
										"department_id"=>$value,
										"user_id"=>$LastInserID,
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
	
    public function department_edit_user($id){


		try {
		$user_id=Crypt::decryptString($id);
		$users_data=User::where("id",$user_id)->get()->first();
		
			if(isset($users_data)){			
				$group_level_data=GroupLevel::get();
				$user_type_data=DB::table('user_types')->get();
				$pageTitle="Edit User";     
				
				$Departments_Users=Departments_Users::where('user_id',$user_id)->pluck('department_id')->toArray();
				return view('admin.department_users.add_user',compact('pageTitle','users_data','user_type_data','group_level_data','Departments_Users'));
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
    public function department_update_user(Request $request)
    {
		

        $request->validate([
         'firstname' => 'required',       
         'email' => 'required|email',        
         'role' => 'required',
         // 'designation_id' => 'required',
         'phone' => 'required',
         'is_active_status' => 'required',
         'password' => 'sometimes|nullable',
         'phone' => 'sometimes|nullable',
        ]);
        
        User::where('id', $request->id)
            ->update(
            [
                "organization_id"=>$request->company_name??0,
                "firstname"=>$request->firstname,
                "role"=>$request->role,
                // "designation_id"=>$request->designation_id,
                "email"=>$request->email,
                // "password"=> Hash::make($decrypt_password),
                // "decrypt_password"=>$decrypt_password,
                "phone"=>$request->phone??'',
                "reportingto"=>$request->reportingto??0,
                "department"=>$request->department[0]??0,
                'email_verified_at' =>Carbon\Carbon::now(), 
                'is_email_verified' =>1, 
                'is_active_status' =>$request->is_active_status??'', 
                'ip' =>request()->ip()??0,
            ]
            );      
			
			
			$DepartmentSelected=$request->department??[0];
			$LastInserID=$request->id;
			$update_departments=$this->mapping_departments_users($DepartmentSelected,$LastInserID);
			
			
        return redirect('admin/users')->with('success', "Success! Details are updated successfully");
            
        
        
    }
    public function department_delete_user($id)
    {
        $user_id=Crypt::decryptString($id);    
        $data=User::where('id',$user_id)->delete(); 
		$remove_data=Departments_Users::where('user_id',$user_id)->delete();		
        return redirect()->back()->with('success','User&Mapped Departments are deleted');   
         
    }
}
