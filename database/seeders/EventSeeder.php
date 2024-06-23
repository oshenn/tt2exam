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
            'body' => 'An annual air show featuring various aircraft',
            'time' => Carbon::create('2024-08-15'),
        ]);

        Event::create([
            'name' => 'Aircraft Expo 2024',
            'body' => 'An expo showcasing the latest in aviation technology',
            'time' => Carbon::create('2024-09-10'),
        ]);
    }
}