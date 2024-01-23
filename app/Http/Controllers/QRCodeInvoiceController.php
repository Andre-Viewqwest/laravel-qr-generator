<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class QRCodeInvoiceController extends Controller
{
    public function generateInvoiceQrCode(string $id)
    {
        try {
            $molpayApiKey = env('MOLPAY_API');

            // Concatenate your API key and $id to create the link
            $link = $molpayApiKey . $id;

            // Generate QR code
            $qrCode = QrCode::size(300)->generate($link);

            // Convert the QR code image to base64
            $base64Image = base64_encode($qrCode);

            // Generate a unique filename for the QR code image
            $filename = 'qrcode_' . $id . '.txt'; // Use .txt extension for base64 data

            // Save the base64-encoded string to the specified file path in the local storage
            $filePath = 'public/' . $filename;
            Storage::put($filePath, $base64Image);

            // Return the path to the saved file
            return response()->json(['file_path' => $filePath, 'message' => 'Base64 data saved as a file successfully']);
        }catch (\Exception $e) {
            // Log or handle the exception
            return response('Error generating QR code', 500);
        }

        // try {
        //     $molpayApiKey = env('MOLPAY_API');

        //     // Concatenate your API key and $id to create the link
        //     $link = $molpayApiKey . $id;

        //     // Generate QR code
        //     $qrCode = QrCode::size(300)->generate($link);

        //     // Generate a unique filename for the QR code image
        //     $filename = 'qrcode_' . $id . '.png';

        //     // Save the image to the specified file path
        //     $filePath = 'public/' . $filename;
        //     Storage::put($filePath, $qrCode);

        //     return 'QR code generated and saved successfully!';
        // }catch (\Exception $e) {
        //     // Log or handle the exception
        //     return response('Error generating QR code', 500);
        // }
    }

    public function showqr(){
        
    }
}
