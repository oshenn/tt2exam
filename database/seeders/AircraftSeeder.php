<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aircraft;

class AircraftSeeder extends Seeder
{
    public function run()
    {
        Aircraft::create([
            'name' => 'Boeing 747',
            'body' => 'A large, long-range wide-body airliner',
        ]);

        Aircraft::create([
            'name' => 'Airbus A380',
            'body' => 'A double-deck, wide-body, four-engine jet airliner',
        ]);
        Aircraft::create([
            'name' => 'Seed1',
            'body' => 'A double-deck, wide-body, four-engine jet airliner',
        ]);
        Aircraft::create([
            'name' => 'Seed2',
            'body' => 'A double-deck, wide-body, four-engine jet airliner',
        ]);
        Aircraft::create([
            'name' => 'Seed3',
            'body' => 'A double-deck, wide-body, four-engine jet airliner',
        ]);
    }
}