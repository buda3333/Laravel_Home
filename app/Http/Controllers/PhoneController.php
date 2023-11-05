<?php

namespace App\Http\Controllers;

use App\Services\VerificationPhoneService;
use Illuminate\Http\Request;


class PhoneController extends Controller
{
    public function __construct(protected VerificationPhoneService $phone)
    {
    }
    public function verify(Request $request)
    {
        $phoneNumber = $request->input('phone');
        $data = $this->phone->verify($phoneNumber);
        return response()->json(['success' => $data['success'], 'message' => $data['message']]);
    }

    public function confirm(Request $request)
    {
        $phoneNumber = $request->input('phone');
        $code = $request->input('code');
        $data = $this->phone->confirm($phoneNumber,$code);
        return response()->json(['success' => $data['success'], 'message' => $data['message']]);
    }
}

