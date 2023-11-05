<?php

namespace App\Services;

use App\Models\VerificationNumber;
use Exception;
use Nutnet\LaravelSms\SmsSender;

class VerificationPhoneService
{

    public function __construct(protected SmsSender $smsSender)
    {
    }
    public function verify($phoneNumber): array
    {
        $text = rand(1000, 9999);

        try {
            $this->smsSender->send($phoneNumber, $text);
            VerificationNumber::create([
                'phone' => $phoneNumber,
                'code' => $text,
            ]);
            return ['success' => true, 'message' => 'SMS sent successfully.'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'SMS sending failed. ' . $e->getMessage()];
        }
    }

    public function confirm($phoneNumber, int $code): array
    {
        $verificationNumber = VerificationNumber::where('phone', $phoneNumber)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($verificationNumber && !$verificationNumber->is_verification && $verificationNumber->code == $code) {
            $verificationNumber->is_verification = true;
            $verificationNumber->save();

            return ['success' => true, 'message' => 'Код подтвержден'];
        } else {
            return ['success' => false, 'message' => 'Код не подтвержден'];
        }
    }
}
