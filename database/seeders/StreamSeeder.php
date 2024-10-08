<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stream;
use Illuminate\Support\Str;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range('A', 'S') as $letter) {
            Stream::create([
                'name' => $letter,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
