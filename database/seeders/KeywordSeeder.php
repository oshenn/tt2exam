<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keyword;

class KeywordSeeder extends Seeder
{
    public function run()
    {
        Keyword::create(['keyword' => 'commercial']);
        Keyword::create(['keyword' => 'jet']);
        Keyword::create(['keyword' => 'show']);
        Keyword::create(['keyword' => 'expo']);
    }
}
