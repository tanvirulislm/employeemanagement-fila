<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\City;
use App\Models\State;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Cities for United States
        $usStates = State::whereIn('name', ['California', 'Texas', 'New York', 'Florida', 'Illinois'])->get();
        foreach ($usStates as $state) {
            $cities = [
                'Los Angeles', 'San Francisco', 'San Diego', 'Houston', 'Dallas', 'Austin', 'Chicago', 'New York City', 'Miami', 'Atlanta'
            ];
            foreach ($cities as $city) {
                City::create([
                    'state_id' => $state->id,
                    'name' => $city,
                ]);
            }
        }

        // Cities for Canada
        $canadaStates = State::whereIn('name', ['Ontario', 'Quebec', 'British Columbia', 'Alberta', 'Nova Scotia'])->get();
        foreach ($canadaStates as $state) {
            $cities = [
                'Toronto', 'Vancouver', 'Montreal', 'Ottawa', 'Calgary', 'Edmonton', 'Winnipeg', 'Halifax', 'Quebec City', 'Victoria'
            ];
            foreach ($cities as $city) {
                City::create([
                    'state_id' => $state->id,
                    'name' => $city,
                ]);
            }
        }

        // Cities for Spain
        $spainStates = State::whereIn('name', ['Catalonia', 'Andalusia', 'Madrid', 'Galicia', 'Valencia'])->get();
        foreach ($spainStates as $state) {
            $cities = [
                'Barcelona', 'Madrid', 'Sevilla', 'Valencia', 'Malaga', 'Zaragoza', 'Murcia', 'Palma de Mallorca', 'Bilbao', 'Alicante'
            ];
            foreach ($cities as $city) {
                City::create([
                    'state_id' => $state->id,
                    'name' => $city,
                ]);
            }
        }

        // Cities for Japan
        $japanStates = State::whereIn('name', ['Tokyo', 'Osaka', 'Kyoto', 'Hokkaido'])->get();
        foreach ($japanStates as $state) {
            $cities = [
                'Tokyo', 'Osaka', 'Kyoto', 'Hokkaido', 'Fukuoka', 'Nagoya', 'Sapporo', 'Yokohama', 'Kobe', 'Sendai'
            ];
            foreach ($cities as $city) {
                City::create([
                    'state_id' => $state->id,
                    'name' => $city,
                ]);
            }
        }

        // Cities for Egypt
        $egyptStates = State::whereIn('name', ['Cairo', 'Alexandria', 'Giza'])->get();
        foreach ($egyptStates as $state) {
            $cities = [
                'Cairo', 'Alexandria', 'Giza', 'Luxor', 'Aswan', 'Sharm El Sheikh', 'Tanta', 'Port Said', 'Mansoura', 'Suez'
            ];
            foreach ($cities as $city) {
                City::create([
                    'state_id' => $state->id,
                    'name' => $city,
                ]);
            }
        }

        // Cities for Bangladesh
        $bangladeshStates = State::whereIn('name', ['Dhaka', 'Chittagong', 'Khulna', 'Rajshahi', 'Sylhet'])->get();
        foreach ($bangladeshStates as $state) {
            $cities = [
                'Dhaka', 'Chittagong', 'Khulna', 'Rajshahi', 'Sylhet', 'Barisal', 'Rajshahi', 'Mymensingh', 'Rangpur', 'Comilla'
            ];
            foreach ($cities as $city) {
                City::create([
                    'state_id' => $state->id,
                    'name' => $city,
                ]);
            }
        }

        // Cities for Saudi Arabia
        $ksaStates = State::whereIn('name', ['Riyadh', 'Makkah', 'Madinah', 'Eastern Province', 'Asir'])->get();
        foreach ($ksaStates as $state) {
            $cities = [
                'Riyadh', 'Jeddah', 'Mecca', 'Medina', 'Dammam', 'Khobar', 'Jubail', 'Tabuk', 'Buraidah', 'Abha'
            ];
            foreach ($cities as $city) {
                City::create([
                    'state_id' => $state->id,
                    'name' => $city,
                ]);
            }
        }

        // Cities for Pakistan
        $pakistanStates = State::whereIn('name', ['Punjab', 'Sindh', 'Khyber Pakhtunkhwa', 'Balochistan', 'Gilgit-Baltistan', 'Azad Jammu & Kashmir'])->get();
        foreach ($pakistanStates as $state) {
            $cities = [
                'Lahore', 'Karachi', 'Islamabad', 'Peshawar', 'Quetta', 'Rawalpindi', 'Multan', 'Faisalabad', 'Sialkot', 'Gilgit'
            ];
            foreach ($cities as $city) {
                City::create([
                    'state_id' => $state->id,
                    'name' => $city,
                ]);
            }
        }
    }
}
