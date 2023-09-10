<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Specialist;


class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active',true)->get();
        $specialists = Specialist::all();
        return view('home.index', ['services' => $services],['specialists' => $specialists]);
    }

}
