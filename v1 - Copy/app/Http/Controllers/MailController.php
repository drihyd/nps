<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Mail\Registration;
use Mail;

class MailController extends Controller
{
    //
	
	public function sendOfferMail()
    {
		
		
		
		
		
       $email = 'venkat@deepredink.com';
        $offer = [
            'title' => 'Deals of the Day',
            'url' => 'https://www.remotestack.io'
        ];
  
	  
   
                	try{
			    Mail::to($email)->send(new Registration($offer));
			
			}catch (\Exception $exception) {
dd($exception->getMessage());
			} 
        
        
    }
}
