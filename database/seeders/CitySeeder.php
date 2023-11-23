<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Moscow',
                'code' => '524901',
            ],
            [
                'name' => 'Irkutsk',
                'code' => '2023469',
            ],
            [
                'name' => 'Ulan-Ude',
                'code' => '2014407',
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }

}
