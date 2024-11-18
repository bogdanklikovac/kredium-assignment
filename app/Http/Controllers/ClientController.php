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
        // Eager load the related cash_loan and home_loan data for each client
        $clients = Client::with(['cashLoan', 'homeLoan'])->get();

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

        Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adviser_id' => auth()->id(),
        ]);

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

        return redirect()->route('clients.index');
    }


    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();
        return redirect()->route('clients.index');
    }
}

