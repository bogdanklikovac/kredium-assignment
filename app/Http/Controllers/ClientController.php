<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $clients = Client::where('adviser_id', auth()->id())->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
        ]);

        $client = Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adviser_id' => auth()->id(),
        ]);

        // Handle Cash Loan and Home Loan creation if submitted
        if ($request->has('cash_loan_amount')) {
            $client->cashLoan()->create([
                'loan_amount' => $request->cash_loan_amount,
                'adviser_id' => auth()->id(),
            ]);
        }

        if ($request->has('home_loan_property_value')) {
            $client->homeLoan()->create([
                'property_value' => $request->home_loan_property_value,
                'down_payment_amount' => $request->home_loan_down_payment,
                'adviser_id' => auth()->id(),
            ]);
        }

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        $this->authorize('update', $client);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $this->authorize('update', $client);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
        ]);

        $client->update($request->only('first_name', 'last_name', 'email', 'phone'));

        // Handle cash loan and home loan update if submitted
        if ($request->has('cash_loan_amount')) {
            $client->cashLoan()->update([
                'loan_amount' => $request->cash_loan_amount,
                'adviser_id' => auth()->id(),
            ]);
        }

        if ($request->has('home_loan_property_value')) {
            $client->homeLoan()->update([
                'property_value' => $request->home_loan_property_value,
                'down_payment_amount' => $request->home_loan_down_payment,
                'adviser_id' => auth()->id(),
            ]);
        }

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();
        return redirect()->route('clients.index');
    }
}

