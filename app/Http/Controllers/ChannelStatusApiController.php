<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ChannelStatusApiController extends Controller
{
    public function checkChannelStatus()
    {
        try {
            // Replace these values with your actual data
            $merchantID = "SB_ViewQwest";
            $dateTime = "20240119123456";
            $verify_key = 'f35e1e6394091c1dc83881640364b215';
            $skey = '19fa5cbb750d58cdc598b23502e3b162';
        
            // Calculate HMAC-SHA256 
            $data_to_hash = $dateTime . $merchantID . $verify_key;
            $hmac_sha256 = hash_hmac('sha256', $data_to_hash, $skey);
        
            // Build the request parameters
            $apiUrl = "https://sandbox.merchant.razer.com/RMS/API/chkstat/channel_status.php";
            $postData = [
                'merchantID' => $merchantID,
                'datetime' => $dateTime,
                'skey' => $hmac_sha256,
            ];
        
            // Make the API request using Guzzle with POST method
            $client = new Client();
            $response = $client->post($apiUrl, ['form_params' => $postData]);
        
            // Handle the API response as needed
            $apiResponse = $response->getBody()->getContents();
        
            return response()->json(['response' => $apiResponse]);
        } catch (\Exception $e) {
            // Handle exceptions if needed
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
