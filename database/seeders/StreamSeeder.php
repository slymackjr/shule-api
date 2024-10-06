<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $streams = [];
        foreach (range('A', 'S') as $letter) {
            $streams[] = ['name' => $letter, 'created_at' => now(), 'updated_at' => now()];
        }

        DB::table('streams')->insert($streams);
    }
}
