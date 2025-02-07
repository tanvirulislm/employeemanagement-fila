<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('cities')->insert([
            // Cities for State Madhya Pradesh (state_id 1)
            ['state_id' => 5, 'name' => "Indore", 'created_at' => now(), 'updated_at' => now()],
            ['state_id' => 6, 'name' => "Bhopal", 'created_at' => now(), 'updated_at' => now()],
            ['state_id' => 8, 'name' => "Mumbai", 'created_at' => now(), 'updated_at' => now()],
            ['state_id' => 5, 'name' => "Pune", 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
