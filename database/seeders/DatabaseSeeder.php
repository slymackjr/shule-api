<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\School;
use App\Models\School_teacher;
use App\Models\Stream;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(TanzaniaPhysicalAddressSeeder::class);
        $this->call(TanzaniaPhysicalAddressSeeder::class);
        $this->call(PublicSchoolGradeSeeder::class);
        $this->call(StreamSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
