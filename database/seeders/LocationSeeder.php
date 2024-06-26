<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $museumdata = [
            ['name' => 'Smithsonian National Air and Space Museum', 'location' => 'Washington, D.C. , 600 Independence Ave SW'],
            ['name' => 'The Museum of Flight', 'location' => ' Seattle, 9404 E Marginal Way S'],
            ['name' => 'Royal Air Force Museum London', 'location' => 'London, Grahame Park Way'],
            ['name' => 'Intrepid Sea, Air & Space Museum', 'location' => 'New York, Pier 86, W 46th St']
        ];

        foreach ($museumdata as $museum) {
            Location::create($museum);
        }

    }
}
