<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nutnet\LaravelSms\SmsSender;
use App\Models\VerificationNumber;

class PhoneController extends Controller
{
    public function verify(Request $request, SmsSender $smsSender)
    {
        $phoneNumber = $request->input('phone');
        $text = rand(1000, 9999);

        try {
            $smsSender->send($phoneNumber, $text);
            $status = true;
            $message = 'SMS sent successfully.';
            VerificationNumber::create([
                'phone' => $phoneNumber,
                'code' => $text,
            ]);
        } catch (Exception $e) {
            $status = false;
            $message = 'SMS sending failed. ' . $e->getMessage();
        }

        return response()->json(['success' => $status, 'message' => $message]);
    }

    public function confirm(Request $request)
    {
        $phoneNumber = $request->input('phone');
        $code = $request->input('code');

        $verificationNumber = VerificationNumber::where('phone', $phoneNumber)
            ->orderBy('created_at', 'desc')
            ->first();

        if($verificationNumber && $verificationNumber->code == $code){
            $verificationNumber->is_verification = true;
            $verificationNumber->save();
            $status = true;
            $message = 'Код подтвержден';
        } else {
            $status = false;
            $message = 'Код не подтвержден';
        }

        return response()->json(['success' => $status, 'message' => $message]);
    }
}

