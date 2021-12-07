<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
Use Exception;
use Hash;
use Validator;
use Auth;
use Session;

class LoginController extends Controller
{
        
    public function auth_login(Request $request)
    {
   	    $user  = auth()->user();       
        if ($user && $user->role==1) {           
            return redirect('superadmin/dashboard')->with('success', 'Successfully logged in.');

        }
        else if ($user && $user->role==2) {         
            return redirect('admin/dashboard')->with('success', 'Successfully logged in.');
        }
        
        
        else{
           
           $pageTitle="Login"; 
            return view('admin.auth.login', compact('pageTitle'));
        }    
	   
   
    }

    public function Loginsubmit(Request $request)
    {
    
   
   
   
   	$credentials = $request->only('email', 'password');		
		
        if (Auth::attempt($credentials)) {  
        	$user  = auth()->user();
				switch(Auth::user()->role){
				case '1':
				return redirect('superadmin/dashboard')->with('success', 'Successfully logged in.');
				break;
				case '2':
				return redirect('admin/dashboard')->with('success', 'Successfully logged in.');
				break;
				case '3':
				return redirect('user/dashboard')->with('success', 'Successfully logged in.');
				break;
				case '4':
				return redirect('user/dashboard')->with('success', 'Successfully logged in.');
				break;
				
				default:
				Auth::logout();
				Session::flush();
				return redirect('/')->with('error', 'Failed to logged in.'); 
				}			


		
        }
        else{
	        return redirect('/')->with('error', 'Failed to logged in/Entered wrong credentials.');
	    }
   

    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('error', 'You have been successfully logged out!'); 
    }
     public function profile(){
            
            $users_data=User::get()->where("id",auth()->user()->id)->first();
            $pageTitle="Edit Profile";     
            return view('admin.auth.edit_profile',compact('users_data','pageTitle'));
        
    }
    public function update_profile(Request $request)
    {
        $request->validate([
         'firstname' => 'required|min:1|max:100',    
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
                "email"=>$request->email,
                "phone"=>$request->phone??'',
            ]
            );   
            return redirect('administrator/profile')->with('success', "Success! Details are updated successfully");
        
            }
}
