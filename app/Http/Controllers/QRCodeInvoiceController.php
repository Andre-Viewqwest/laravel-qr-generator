<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeInvoiceController extends Controller
{
    public function generateInvoiceQrCode(string $id)
    {
        try {
            $molpayApiKey = env('MOLPAY_API');

            $link = $molpayApiKey . $id;

            $qrCode = QrCode::size(300)->generate($link);

            return view('qrCodeView', compact('qrCode'));
        } catch (\Exception $e) {
            // Log or handle the exception
            return response('Error generating QR code', 500);
        }
    }
}
