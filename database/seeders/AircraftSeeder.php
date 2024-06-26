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
            ['name' => 'Boeing 747', 'Description' => 'A large commercial jet', 'body'=>"The Boeing 747 is a long-range wide-body airliner designed and manufactured by Boeing Commercial Airplanes in the United States between 1968 and 2023. After the introduction of the 707 in October 1958, Pan Am wanted a jet 2+1⁄2 times its size, to reduce its seat cost by 30%. In 1965, Joe Sutter left the 737 development program to design the 747. In April 1966, Pan Am ordered 25 Boeing 747-100 aircraft, and in late 1966, Pratt & Whitney agreed to develop the JT9D engine, a high-bypass turbofan. On September 30, 1968, the first 747 was rolled out of the custom-built Everett Plant, the world's largest building by volume. The 747's first flight took place on February 9, 1969, and the 747 was certified in December of that year. It entered service with Pan Am on January 22, 1970. The 747 was the first airplane called a 'Jumbo Jet' as the first wide-body airliner."],
            ['name' => 'F-22 Raptor', 'Description' => 'Advanced military fighter jet', 'body'=>"The Lockheed Martin/Boeing F-22 Raptor is an American twin-engine all-weather stealth fighter aircraft developed and produced for the United States Air Force (USAF). As a product of the USAF's Advanced Tactical Fighter (ATF) program the aircraft was designed as an air superiority fighter, but also incorporates ground attack, electronic warfare, and signals intelligence capabilities. The prime contractor, Lockheed Martin, built most of the F-22's airframe and weapons systems and conducted final assembly, while program partner Boeing provided the wings, aft fuselage, avionics integration, and training systems."],
            ['name' => 'Cessna 172', 'Description' => 'Popular private aircraft', 'body'=>"The Cessna 172 Skyhawk is an American four-seat, single-engine, high wing, fixed-wing aircraft made by the Cessna Aircraft Company.[2] First flown in 1955,[2] more 172s have been built than any other aircraft.[3] It was developed from the 1948 Cessna 170 but with tricycle landing gear rather than conventional landing gear. The Skyhawk name was originally used for a trim package, but was later applied to all standard-production 172 aircraft, while some upgraded versions were marketed as the Cutlass, Powermatic, and Hawk XP. The aircraft was also produced under license in France by Reims Aviation, which marketed upgraded versions as the Reims Rocket."],
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
