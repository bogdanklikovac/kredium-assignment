<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Adviser;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $adviser = Adviser::first();  // Get the first adviser

        Client::create([
            'first_name' => 'Bogdan',
            'last_name' => 'Klikovac',
            'email' => 'bogdan@example.com',
            'phone' => '+3814568945',
            'adviser_id' => $adviser->id,
        ]);
    }
}
