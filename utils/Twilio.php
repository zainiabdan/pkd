<?php
 
namespace Utils;
 
class Twilio {
 
    private $sid = "ACd2f704399afc13f71425d8f6b4833b9a"; // Your Account SID from www.twilio.com/console
    private $token = "4a77778c59ea4bc21a5c94195fc4352d"; // Your Auth Token from www.twilio.com/console
 
    private $client;
 
    public function __construct() {
        $this->client = new \Twilio\Rest\Client($this->sid, $this->token);
    }
 
    public function sendSMS($from, $body, $to) {
        $message = $this->client->messages->create(
            "whatsapp:$to", // Text this number
            array(
              'from' => "whatsapp:$from", // From a valid Twilio number
              'body' => $body
            )
        );
        return $message->sid;
    }
    
}