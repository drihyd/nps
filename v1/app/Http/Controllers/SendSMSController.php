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


$mobilenumbers="919052691535"; //enter Mobile numbers comma seperated
$message = "test messgae"; //enter Your Message
$senderid="smscntry"; //Your senderid
$messagetype="N"; //Type Of Your Message
$DReports="Y"; //Delivery Reports

$apiURL="http://www.smscountry.com/SMSCwebservice_Bulk.aspx";

$client = new \GuzzleHttp\Client();
$response = $client->request('POST', $apiURL, 
[

'User' => $user,
'passwd' => $password,
'mobilenumber' => $mobilenumbers,
'message' => $message,
'sid' => $senderid,
'mtype' => $messagetype,
'DR' => $DReports,

]
);

$statusCode = $response->getStatusCode();
$responseBody = json_decode($response->getBody(), true);

 dd($responseBody);

		
    }
}