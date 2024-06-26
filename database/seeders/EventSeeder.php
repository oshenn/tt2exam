<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'name' => 'Air Show 2024',
            'description' => 'An annual air show featuring various aircraft',
            'body' => 'empty',
            'time' => Carbon::create('2024-08-15'),
        ]);

        Event::create([
            'name' => 'Aircraft Expo 2024',
            'description' => 'An expo showcasing the latest in aviation technology',
            'body' => 'empty',
            'time' => Carbon::create('2024-09-10'),
        ]);

        Event::create([
            'name' => 'Filler1',
            'description' => 'An Filler showcasing the latest in aviation technology',
            'body' => 'empty',
            'time' => Carbon::create('2024-10-10'),
        ]);

        Event::create([
            'name' => 'Filler2 Expo 2024',
            'description' => 'An expo showcasing the latest in aviation technology',
            'body' => 'empty',
            'time' => Carbon::create('2024-11-10'),
        ]);

        Event::create([
            'name' => 'time travel expo',
            'description' => 'An expo showcasing the oldest in aviation technology',
            'body' => 'empty',
            'time' => Carbon::create('2023-2-10'),
        ]);
    }
}