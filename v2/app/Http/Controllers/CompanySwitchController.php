<?php
namespace App\Http\Controllers;
use App\Models\Organizations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Crypt;

class CompanySwitchController extends Controller
{
	public function switchLang($Company=false,$companyID=false)
    {	

		try {

				Session::forget('companyID');			
				$_CompanyID=Crypt::decryptString($companyID);		
				$orgs=Organizations::all('id')->keyBy('id')->toarray();				
				$Single_Com_Name=Organizations::select('id','company_name')->where('id',$_CompanyID)->get()->first();
				
				
				if(isset($Single_Com_Name))
				{
					if (array_key_exists($_CompanyID,$orgs)) {						
						Session::put('companyID', $_CompanyID);			
						return redirect(Config::get('constants.superadmin').'/company/?CID='.Crypt::encryptString($_CompanyID))->with('success', "Switch to ".Str::upper($Single_Com_Name->company_name??''));
					}
					else{
						return Redirect::back()->with('error', "Something went wrong. Please try again.");
					}
				}
				
				else{
					return Redirect::back()->with('error', "Something went wrong. Please try again.");
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
}