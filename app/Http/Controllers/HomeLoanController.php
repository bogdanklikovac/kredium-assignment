<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class HomeLoanController extends Controller
{
    use AuthorizesRequests;

    public function update(Request $request, Client $client)
    {
        $this->authorize('update', $client);

        $request->validate([
            'home_loan_property_value' => 'required|numeric',
            'home_loan_down_payment' => 'required|numeric',
        ]);

        $client->homeLoan()->updateOrCreate(
            ['client_id' => $client->id],
            [
                'property_value' => $request->home_loan_property_value,
                'down_payment_amount' => $request->home_loan_down_payment,
                'adviser_id' => auth()->id(),
            ]
        );

        return redirect()->route('clients.edit', $client)->with('success', 'Home loan updated successfully.');
    }
}
