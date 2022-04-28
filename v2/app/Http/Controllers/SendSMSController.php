<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
 
 
class SendSMSController extends Controller
{
    public function index()
    {
		
		
	
    
       
		
		
		
		
		
		
		
		
//Please Enter Your Details
$user=env('SMS_CNTRY_UN'); //your username
$password=env('SMS_CNTRY_PWD'); //your password


$mobilenumbers="9052691535"; //enter Mobile numbers comma seperated
$message = "test messgae"; //enter Your Message
$senderid="smscntry"; //Your senderid
$messagetype="N"; //Type Of Your Message
$DReports="Y"; //Delivery Reports

$apiURL="http://sms.adstogether.com/app/smsapipost/index.php";

$client = new \GuzzleHttp\Client();
$response = $client->request('POST', $apiURL, 
[

'key' => '61e6a3c7a3de0',
'type' => 'text',
'contacts' => '9052691535',
'senderid' => 'OMNIHS',
'peid' => '1201160189518122669',
'templateid' => '123',
'msg' => 'test message',


]
);



$statusCode = $response->getStatusCode();
$responseBody = json_decode($response->getBody(), true);

 dd($statusCode);

		
    }
}