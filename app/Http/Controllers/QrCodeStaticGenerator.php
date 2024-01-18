<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;

class QrCodeStaticGenerator extends Controller
{
    //
    public function qrCodeStaticGenerator()
    {
        try {
            // Replace these values with your actual data
            $merchantID = env('RAZER_MERCHANT_ID');
            $channel = "AlipaySQR";
            $orderid = "S001";
            $currency = "MYR";
            $amount = "1";
            $verify_key = env('RAZER_VERIFICATION_KEY');
            $bill_name = "VIEWQWEST";
            $bill_desc = "test item";
    
            // Calculate MD5 checksum
            $data_to_hash = $merchantID . $channel . $orderid . $currency . $amount . $verify_key . $bill_name . $bill_desc;
            $md5_checksum = md5($data_to_hash);
    
            // Build the request parameters
            $apiUrl = env('RAZER_API_GENERATE_STATIC');
            $queryParams = [
                'merchantID' => $merchantID,
                'channel' => $channel,
                'orderid' => $orderid,
                'currency' => $currency,
                'amount' => $amount,
                'verify_key' => $verify_key,
                'bill_name' => $bill_name,
                'bill_desc' => $bill_desc,
                'checksum' => $md5_checksum,
            ];
    
            // Make the API request using Guzzle
            $client = new Client(); // Use the full namespace here
            $response = $client->get($apiUrl, ['query' => $queryParams]);
    
            // Handle the API response as needed
            $apiResponse = $response->getBody()->getContents();
    
            return response()->json(['response' => $apiResponse]);
        } catch (\Exception $e) {
            // Handle exceptions if needed
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
