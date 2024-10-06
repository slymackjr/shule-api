<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class TanzaniaPhysicalAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $country = new Country;
        $country->name = 'Tanzania';
        $country->save();

        DB::unprepared(file_get_contents(database_path('seeders/TanzaniaData/regions.sql')));
        DB::unprepared(file_get_contents(database_path('seeders/TanzaniaData/districts.sql')));
        DB::unprepared(file_get_contents(database_path('seeders/TanzaniaData/wards.sql')));

        
    }
}
