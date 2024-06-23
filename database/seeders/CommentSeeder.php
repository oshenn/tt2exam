<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Aircraft;
use App\Models\Event;
use App\Models\User;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        $aircraft = Aircraft::first();
        $aircraft->comments()->create([
            'body' => 'This is an amazing aircraft!',
            'user_id' => $user->id,
        ]);

        $event = Event::first();
        $event->comments()->create([
            'body' => 'Looking forward to this event!',
            'user_id' => $user->id,
        ]);
    }
}
