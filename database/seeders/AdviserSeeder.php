<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adviser;

class AdviserSeeder extends Seeder
{
    public function run()
    {
        Adviser::create([
            'email' => 'adviser1@example.com',
            'password' => bcrypt('password123'),
            'first_name' => 'Adam',
            'last_name' => 'Tod',
        ]);

        Adviser::create([
            'email' => 'adviser2@example.com',
            'password' => bcrypt('password123'),
            'first_name' => 'Eva',
            'last_name' => 'Tod',
        ]);
    }
}
