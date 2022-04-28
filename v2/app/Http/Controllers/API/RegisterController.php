<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->firstname;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {		
		if($this->Verify_Access_Token($request->access_token)){			
			if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
				$user = Auth::user();
				$success['name'] =  $user->firstname;
	   
				return $this->sendResponse($success, 'User login successfully.');
			} 
			else{ 
				return $this->sendError('Unauthorised.', ['error'=>'Unauthorised (Or) Invalid credentials']);
			} 
		}
		else{
			return $this->sendError('Unauthorised.', ['error'=>'Invalid access token']);
		}	
		
    }
	
	
	
    public function changepassword(Request $request)
    {		
		if($this->Verify_Access_Token($request->access_token)){			
			if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
				$user = Auth::user();
				$success['name'] =  $user->firstname;
	   
				return $this->sendResponse($success, 'User login successfully.');
			} 
			else{ 
				return $this->sendError('Unauthorised.', ['error'=>'Unauthorised (Or) Invalid credentials']);
			} 
		}
		else{
			return $this->sendError('Unauthorised.', ['error'=>'Invalid access token']);
		}	
		
    }
	
	
	
	public function php_Curl(){
		


		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://deepredink.in/demos/nps/v1/api/AuthenticateUser/Validate_User',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"email": "omni@incor.in",
		"password": "9OUlXBR0",
		"access_token":"89616bad112871a8f7d8e1753a14948dc186f513840923e59012e1f0d8822976"
		}',
		CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;


	}
}