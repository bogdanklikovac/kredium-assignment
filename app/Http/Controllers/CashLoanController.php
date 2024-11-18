<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CashLoanController extends Controller
{
    use AuthorizesRequests;

    /**
     * @param Request $request
     * @param Client $client
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        $this->authorize('update', $client);

        $request->validate([
            'cash_loan_amount' => 'required|numeric',
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
