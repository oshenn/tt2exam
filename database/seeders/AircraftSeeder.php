<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aircraft;
use App\Models\Tag;

class AircraftSeeder extends Seeder
{
    public function run()
    {
        $aircraftData = [
            ['name' => 'Boeing 747', 'Description' => 'A large commercial jet', 'body'=>'empty'],
            ['name' => 'F-22 Raptor', 'Description' => 'Advanced military fighter jet', 'body'=>"The Lockheed Martin/Boeing F-22 Raptor is an American twin-engine all-weather stealth fighter aircraft developed and produced for the United States Air Force (USAF). As a product of the USAF's Advanced Tactical Fighter (ATF) program the aircraft was designed as an air superiority fighter, but also incorporates ground attack, electronic warfare, and signals intelligence capabilities. The prime contractor, Lockheed Martin, built most of the F-22's airframe and weapons systems and conducted final assembly, while program partner Boeing provided the wings, aft fuselage, avionics integration, and training systems."],
            ['name' => 'Cessna 172', 'Description' => 'Popular private aircraft', 'body'=>'empty'],
        ];

        foreach ($aircraftData as $data) {
            $aircraft = Aircraft::create($data);
            
            switch ($data['name']) {
                case 'Boeing 747':
                    $tags = Tag::whereIn('name', ['Commercial', 'Cargo'])->get();
                    break;
                case 'F-22 Raptor':
                    $tags = Tag::whereIn('name', ['Military'])->get();
                    break;
                case 'Cessna 172':
                    $tags = Tag::whereIn('name', ['Private'])->get();
                    break;
            }

            $aircraft->tags()->attach($tags);
        }
    }
}
