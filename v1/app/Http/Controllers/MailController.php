<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    //
	
	public function sendTestMail()
    {
		
		

$email = 'abdullahs@incor.in';
$offer = [
'title' => 'Test Mail',          
];

try{
Mail::to($email)->send(new TestMail($offer));

}catch (\Exception $exception) {
dd($exception->getMessage());
} 
        
        
    }
}
