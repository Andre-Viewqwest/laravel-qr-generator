<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;

class QrCodeStaticGeneratorController extends Controller
{

    // $merchantID = env('RAZER_MERCHANT_ID');
    // $verify_key = env('RAZER_VERIFICATION_KEY');
    // $apiUrl = env('RAZER_API_QR_CODE_STATIC_GENERATOR');
    public function qrCodeStaticGenerator()
    {
        try {
            // Replace these values with your actual data
            $merchantID = "SB_ViewQwest";
            $channel = "WeChatPaySQR";
            $orderid = "S001";
            $currency = "MYR";
            $amount = 1;
            $verify_key = 'f35e1e6394091c1dc83881640364b215';
            $bill_name = "VIEW QWEST";
            $bill_desc = "test item";

            $checksumString = $merchantID . $channel . $orderid . $currency . $amount . $verify_key;
            $checksum = md5($checksumString);
        
            // Build the request parameters
            $apiUrl = "https://api.merchant.razer.com/RMS/API/staticqr/index.php";
            $queryParams = [
                'merchantID' => $merchantID,
                'channel' => $channel,
                'orderid' => $orderid,
                'currency' => $currency,
                'amount' => $amount,
                'verify_key' => $verify_key,
                'bill_name' => $bill_name,
                'bill_desc' => $bill_desc,
                'checksum' => $checksum,
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
