<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
<<<<<<< Updated upstream
use Illuminate\Support\Facades\Response;
=======
use Illuminate\Support\Facades\Storage;
>>>>>>> Stashed changes

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

            // Generate a unique filename for the QR code image
            $filename = 'qrcode_' . $id . '.png';

            // Save the image to the specified file path
            $filePath = 'public/' . $filename;
            Storage::put($filePath, $qrCode);

            return 'QR code generated and saved successfully!';
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
}
