<?php

namespace App\Policies;

use App\Models\Adviser;
use App\Models\Client;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the adviser can update the client.
     */
    public function update(Adviser $adviser, Client $client)
    {
        return $adviser->id === $client->adviser_id;
    }

    /**
     * Determine if the adviser can delete the client.
     */
    public function delete(Adviser $adviser, Client $client)
    {
        return $adviser->id === $client->adviser_id;
    }
}


