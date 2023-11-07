<?php

namespace App\Services;

use App\Models\VerificationNumber;
use Exception;
use Illuminate\Support\Facades\Log;
use Nutnet\LaravelSms\SmsSender;

class VerificationPhoneService
{

    public function __construct(protected SmsSender $smsSender)
    {
    }

    public function verify(string $phoneNumber):bool
    {
        $text = rand(1000, 9999);

        try {
            $this->smsSender->send($phoneNumber, $text);
            VerificationNumber::create([
                'phone' => $phoneNumber,
                'code' => $text,
            ]);
            return true;
        } catch (Exception $e) {
            log::error($e);
            return false;
        }
    }

    public function confirm(string $phoneNumber, int $code):bool
    {
        $verificationNumber = VerificationNumber::where('phone', $phoneNumber)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$verificationNumber) {
            return false;
        }

        if ($verificationNumber->is_verification || $verificationNumber->code != $code) {
            return false;
        }

        $verificationNumber->is_verification = true;
        $verificationNumber->save();

        return true;
    }


}
