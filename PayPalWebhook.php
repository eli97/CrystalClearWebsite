<?php
$myfile = fopen("WebhookLog.txt", "w");
//get the webhook payload
$txt = "Test 1\n";
    fwrite($myfile, $txt);
    
$requestBody = file_get_contents('php://input');
$txt = "Test 2\n";
    fwrite($myfile, $txt);
    
//check if webhook payload has data
if($requestBody) {
//request body is set
} else {
//request body is not set
//exit(); 
}
$txt = "Test 3\n";
    fwrite($myfile, $txt);
use \PayPal\Api\VerifyWebhookSignature;
use \PayPal\Api\WebhookEvent;
    //$txt = "Before require DIR bootstrap";
    //fwrite($myfile, $txt);
    //fwrite($fp, "\n")
$apiContext = require __DIR__ . '/bootstrap.php';
    //$txt = "After require DIR bootstrap";
    //fwrite($myfile, $txt);
    //fwrite($fp, "\n")

//Receive HTTP headers that you received from PayPal webhook.

$headers = getallheaders();
$txt = "After getallheaders()\n";
fwrite($myfile, $txt);

//need header keys to be UPPERCASE

$headers = array_change_key_case($headers, CASE_UPPER);


/*

example header paypal signature content for webhook, these values are recieved as an array, we then need to use this data to verify the payload


CONTENT-LENGTH : 1376

CORRELATION-ID : 6db85170269e7

USER-AGENT : PayPal/AUHD-214.0-54377828

CONTENT-TYPE: application/json

PAYPAL-AUTH-ALGO : SHA256withRSA

PAYPAL-CERT-URL : https://api.paypal.com/v1/notifications/certs/CERT-360caa42-fca2a784-5edc0ebc

PAYPAL-AUTH-VERSION : v2

PAYPAL-TRANSMISSION-SIG : Hc2lsDedYdSjOM4/t3T/ioAVQqFPNVB/AY/EyPNlavXk5WYUfnAmt9dyEP6neAPOjFHiVkXMK+JlLODbr6dalw6i26aFQdsPXqGl38Mafuu9elPE74qgsqNferUFgHi9QFXL+UZCNYcb4mvlDePXZIIAPbB0gOuFGOdEv2uqNwTCSAa/D8aguv1/51FWb3RkytFuVwXK/XNfIEy2oJCpDs8dgtYAZeojH8qO6IAwchdSpttMods5YfNBzT7oCoxO80hncVorBtjj1zQrkoynEB9WNNN9ytepNCkT8l29fQ4Sx/WRndm/PESCqxqmRoYJoiSosxYU3bZP7QTtILDykQ==

PAYPAL-TRANSMISSION-TIME : 2020-04-05T14:40:43Z

PAYPAL-TRANSMISSION-ID : 6dec99b0-774b-11ea-b306-c3ed128f0c4b


*/


//if any of the relevant paypal signature headers are not set exit()

if(
(!array_key_exists('PAYPAL-AUTH-ALGO', $headers)) ||
(!array_key_exists('PAYPAL-TRANSMISSION-ID', $headers)) ||
(!array_key_exists('PAYPAL-CERT-URL', $headers)) ||
(!array_key_exists('PAYPAL-TRANSMISSION-SIG', $headers)) ||
(!array_key_exists('PAYPAL-TRANSMISSION-TIME', $headers)) 
)
{
    $txt = "PAYPAL HEADERS NOT SET CORRECTLY\n";
    fwrite($myfile, $txt);
exit();     
}

//specify the ID for the webhook that you have set up on the paypal developer website, each web hook that you create has a unique ID


$webhookID = "5E539268KB0890006";



//start paypal webhook signature validation 

$signatureVerification = new VerifyWebhookSignature();
$signatureVerification->setAuthAlgo($headers['PAYPAL-AUTH-ALGO']);
$signatureVerification->setTransmissionId($headers['PAYPAL-TRANSMISSION-ID']);
$signatureVerification->setCertUrl($headers['PAYPAL-CERT-URL']);
$signatureVerification->setWebhookId($webhookID); 
$signatureVerification->setTransmissionSig($headers['PAYPAL-TRANSMISSION-SIG']);
$signatureVerification->setTransmissionTime($headers['PAYPAL-TRANSMISSION-TIME']);

$signatureVerification->setRequestBody($requestBody);
$request = clone $signatureVerification;

try {

$output = $signatureVerification->post($apiContext);

} catch (Exception $ex) {

//error during signature validation, capture error and exit

ResultPrinter::printError("Validate Received Webhook Event", "WebhookEvent", null, $request->toJSON(), $ex);
exit(1);

}


$sigVerificationResult = $output->getVerificationStatus();
$txt = "Signature Verification Result: ";
fwrite($myfile, $txt);
fwrite($myfile, $sigVerificationResult);
// $sigVerificationResult is a string and will either be "SUCCESS" or "FAILURE"


//if not webhook signature failed validation exit
if($sigVerificationResult != "SUCCESS"){

exit(); 
}
else if($sigVerificationResult == "SUCCESS"){

//paypay webhook signature is valid

//proceed to process webhook payload


//decode raw request body

$requestBodyDecode = json_decode($requestBody);
/*
$txt = "-----Webhook Payload-----\n";
fwrite($myfile, $txt);
fwrite($myfile, $requestBody);
$txt = "-----Webhook Payload-----\n";
fwrite($myfile, $txt);*/
//pull whatever info required from decoded request body, some examples below


$paymentSystemID = $requestBodyDecode->id;
fwrite($myfile, $paymentSystemID);
fwrite($myfile, $paymentSystemID);

$eventType = $requestBodyDecode->event_type;

fwrite($myfile, $eventType);
$email = $requestBodyDecode->email_adrress;
fwrite($myfile, $email);
//do something with info captured from the webhook payload


} 