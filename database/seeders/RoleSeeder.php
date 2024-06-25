<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        Role::create(['name' => 'Visitor']);
        Role::create(['name' => 'Registered']);
        Role::create(['name' => 'Administrator']);
        
    }
}
