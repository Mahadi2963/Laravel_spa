<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('subjects')->insert([
            [
                'name' => 'Bangla',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'English',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Math',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
