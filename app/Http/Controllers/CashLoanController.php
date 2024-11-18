<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class CashLoanController extends Controller
{
    use AuthorizesRequests;
    public function update(Request $request, Client $client)
    {
        $this->authorize('update', $client);

        $request->validate([
            'cash_loan_amount' => 'required|numeric|min:0',
        ]);

        $client->cashLoan()->updateOrCreate(
            ['client_id' => $client->id],
            [
                'loan_amount' => $request->cash_loan_amount,
                'adviser_id' => auth()->id(),
            ]
        );

        return redirect()->route('clients.edit', $client)->with('success', 'Cash loan updated successfully.');
    }
}
