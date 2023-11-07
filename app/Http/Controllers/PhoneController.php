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
        $data = $this->phone->verify($request->input('phone'));
        return response()->json(['success' => $data]);
    }

    public function confirm(Request $request)
    {
        $data = $this->phone->confirm($request->input('phone'),
            $request->input('code'));

        return response()->json(['success' => $data]);
    }
}

