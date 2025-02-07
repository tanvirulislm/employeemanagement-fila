<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('states')->insert([
            ['country_id' => 5, 'name' => "Madhya Pradesh", 'created_at' => now(), 'updated_at' => now()],
            ['country_id' => 5, 'name' => "Maharashtra", 'created_at' => now(), 'updated_at' => now()],
            ['country_id' => 9, 'name' => "Barcelona", 'created_at' => now(), 'updated_at' => now()],
            ['country_id' => 5, 'name' => "Delhi", 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
