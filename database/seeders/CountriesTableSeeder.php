<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('countries')->insert([
            ['country_code' => 'US', 'name' => 'United States', 'phone_code' => '+1', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'CA', 'name' => 'Canada', 'phone_code' => '+1', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'GB', 'name' => 'United Kingdom', 'phone_code' => '+44', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'AU', 'name' => 'Australia', 'phone_code' => '+61', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'IN', 'name' => 'India', 'phone_code' => '+91', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'DE', 'name' => 'Germany', 'phone_code' => '+49', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'FR', 'name' => 'France', 'phone_code' => '+33', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'IT', 'name' => 'Italy', 'phone_code' => '+39', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'ES', 'name' => 'Spain', 'phone_code' => '+34', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'MX', 'name' => 'Mexico', 'phone_code' => '+52', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'BR', 'name' => 'Brazil', 'phone_code' => '+55', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'RU', 'name' => 'Russia', 'phone_code' => '+7', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'CN', 'name' => 'China', 'phone_code' => '+86', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'JP', 'name' => 'Japan', 'phone_code' => '+81', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'KR', 'name' => 'South Korea', 'phone_code' => '+82', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'ZA', 'name' => 'South Africa', 'phone_code' => '+27', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'NG', 'name' => 'Nigeria', 'phone_code' => '+234', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'EG', 'name' => 'Egypt', 'phone_code' => '+20', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'AR', 'name' => 'Argentina', 'phone_code' => '+54', 'created_at' => now(), 'updated_at' => now()],
            ['country_code' => 'KE', 'name' => 'Kenya', 'phone_code' => '+254', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
