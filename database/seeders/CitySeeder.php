<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'name' => 'Braila',
                'country' => 'Romania',
                'population' => 8622698,
            ],
            [
                'name' => 'Bucuresti',
                'country' => 'Romania',
                'population' => 8982000,
            ],
            // Add more cities as needed
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
