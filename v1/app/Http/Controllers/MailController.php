<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\RegistrationMail;
use Mail;

class MailController extends Controller
{
    //
	
	public function sendOfferMail()
    {
        
        
        
        $email = 'jayaraju@deepredink.com';
        $offer = [
            'title' => 'Deals of the Day',
            'url' => 'https://www.remotestack.io'
        ];
  
        Mail::to($email)->send(new RegistrationMail($offer));
   
        dd("Mail sent!");
        
        
    }
}
