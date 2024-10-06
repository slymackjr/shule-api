<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //language
        $subject = Subject::create(['name' => 'kiswahili', 'level' => 'all', 'sw_name' => 'kiswahili']);
        $subject = Subject::create(['name' => 'english', 'level' => 'all', 'sw_name' => 'kiingereza']);
        $subject = Subject::create(['name' => 'french', 'level' => 'all', 'sw_name' => 'kifaransa']);
        $subject = Subject::create(['name' => 'arabic', 'level' => 'all', 'sw_name' => 'kiarabu']);

        //social science
        $subject = Subject::create(['name' => 'civics', 'level' => 'primary', 'sw_name' => 'kiraia']);
        $subject = Subject::create(['name' => 'scocial studies', 'level' => 'primary', 'sw_name' => 'jamii']);

        // science and Technology
        $subject = Subject::create(['name' => 'science', 'level' => 'primary', 'sw_name' => 'sayansi']);
        //mathematics
        $subject = Subject::create(['name' => 'mathematics', 'level' => 'all', 'sw_name' => 'hisabati']);

        //sports and arts
        $subject = Subject::create(['name' => 'sports and arts', 'level' => 'all', 'sw_name' => 'michezo na sanaa']);

        //religion
        $subject = Subject::create(['name' => 'religion', 'level' => 'all', 'sw_name' => 'dini']);

        //vocational training
        $subject = Subject::create(['name' => 'vocational skills', 'level' => 'primary', 'sw_name' => 'ujuzi wa ufundi']);
    }
}
