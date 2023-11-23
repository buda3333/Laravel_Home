<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Service;
use App\Models\Specialist;


class HomeController extends Controller
{
    public function index()
    {
        return view('home.index',
            ['services' => Service::where('is_active',true)->get(),
                'specialists' => Specialist::all(),
                'cities' => City::all()
            ]);
    }

}
