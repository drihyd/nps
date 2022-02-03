<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;
  
class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		
		 $pageTitle="Reset Password";   
        return view('admin.changePassword.change_password', compact('pageTitle'));
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
		

        $request->validate([ 			
			'password' => 'required|min:8|max:16|confirmed',			

        ]);   
  
        if(User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password),'decrypt_password'=> $request->password])){
			return redirect()->back()->with('success', "Password change successfully.");
		}
		else{	
			 return redirect()->back()->with('error', "Password not match/not update password.");
		}
  
    }
}