<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;



class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Service::factory()->count(5)->create();
    }
}
