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


$msg="Billing new ticket #01 has a negative feedback. Cust:Venkat  Mob: 9052691535. OMNI CONNECT";
echo $msg=rawurlencode($msg);
echo "<br>";

//echo "Billing%20new%20ticket%20%2301%20has%20a%20negative%20feedback.%20Cust%3AVenkat%20%20Mob%3A%209052691535.%20OMNI%20CONNECT%27";



$apiURL="http://sms.adstogether.com/app/smsapipost/index.php";

$client = new \GuzzleHttp\Client();
$response = $client->request(
'POST', 
"http://sms.adstogether.com/app/smsapi/index.php?key=61e6a3c7a3de0&type=text&contacts=9052691535&senderid=KPOMNI&peid=1201160613278000476&templateid=1207165025919707553&msg=".$msg

);



$statusCode = $response->getStatusCode();
$responseBody = json_decode($response->getBody(), true);



		
    }
	
	
	
	
public function Send_SMS_First_Interview($params=false)
{	

try{
$msg=$params['which_department'].' new ticket '.$params['which_ticket'].' has a negative feedback. Cust:'.$params['patient_Name'].'  Mob: '.$params['patient_Contact'].'. OMNI CONNECT';
$msg=rawurlencode($msg);

//$msg="Billing new ticket #01 has a negative feedback. Cust:Venkat  Mob: 9052691535. OMNI CONNECT";
//echo $msg=rawurlencode($msg);

//Please Enter Your Details
$SMS_KEY_ID=env('SMS_KEY_ID'); //your password
$SMS_SENDERID=env('SMS_SENDERID'); //your password
$SMS_PEID=env('SMS_PEID'); //your password
$SMS_APIKEY=env('SMS_APIKEY'); //your password
$apiURL=$SMS_APIKEY;
$client = new \GuzzleHttp\Client();
$response = $client->request('POST', 
"http://sms.adstogether.com/app/smsapi/index.php?key=61e6a3c7a3de0&type=text&contacts=".$params['hod_Contact']."&senderid=KPOMNI&peid=1201160613278000476&templateid=1207165025919707553&msg=".$msg
);



$statusCode = $response->getStatusCode();
$responseBody = json_decode($response->getBody(), true);
}
catch (\Exception $exception){	
}

}
	
	
}