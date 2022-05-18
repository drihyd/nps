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
$response = $client->request(
'POST', 
"http://sms.adstogether.com/app/smsapi/index.php?key=61e6a3c7a3de0&type=text&contacts=9052691535&senderid=KPOMNI&peid=1201160613278000476&templateid=1207165025919707553&msg=Billing%20new%20ticket%20%2301%20has%20a%20negative%20feedback.%20Cust%3AVenkat%20%20Mob%3A%209052691535.%20OMNI%20CONNECT%27"

);



$statusCode = $response->getStatusCode();
$responseBody = json_decode($response->getBody(), true);

 dd($responseBody);

		
    }
	
	
	
	
public function Send_SMS_First_Interview($params=false)
{	

$msg=$params['which_department'].' new ticket '.$params['which_ticket'].' has a negative feedback. Cust:'.$params['patient_Name'].' Mob: '.$params['patient_Contact'].'. OMNI CONNECT';
$msg=rawurlencode($msg);

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
$response = $client->request('POST', 
$apiURL."?key=61e6a3c7a3de0&type=text&contacts=".$params['hod_Contact']."&senderid=KPOMNI&peid=1201160613278000476&templateid=1207165025919707553&msg=".$msg
);



$statusCode = $response->getStatusCode();
$responseBody = json_decode($response->getBody(), true);


		
    }
	
	
}