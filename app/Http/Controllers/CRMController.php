<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CRMController extends Controller
{
    function smsToCustomerPage(){
        return view('pos.crm.sms-marketing');
    }
    function smsToCustomer(Request $request){
       // Assuming $request->number and $request->sms are provided correctly
        $url = "http://bulksmsbd.net/api/smsapimany";
        $api_key = "0yRu5BkB8tK927YQBA8u";
        $senderid = "8809617615171";
        $numbers = explode(",", $request->number);
        $messages = [];
        $sms = $request->sms;
        foreach ($numbers as $number) {
            $messages[] = [
                "to" => $number,
                "message" => $sms
            ];
        }

        // Construct the full data payload
        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "messages" => $messages // This should be an array of messages
        ];

        // JSON encode the entire data array
        $jsonData = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Send JSON data
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); // Set appropriate content type
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $response;
    }
    public function smsCategoryStore(Request $request){
        // dd($request->all());
    }
}
