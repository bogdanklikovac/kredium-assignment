<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use AuthorizesRequests;

    /**
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        // Eager load the related cash_loan and home_loan data for each client
        $clients = Client::with(['cashLoan', 'homeLoan'])->get();

        return view('clients.index', compact('clients'));
    }

    /**
     * @return View|Factory|Application
     */
    public function create(): View|Factory|Application
    {
        return view('clients.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|regex:/^\+?[0-9]+$/', // Validate that phone only contains numbers and an optional "+" symbol
        ]);

        // Check if either email or phone is provided
        if (!$request->email && !$request->phone) {
            return back()->withErrors(['email' => 'Email or phone must be provided.']);
        }

        Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adviser_id' => auth()->id(),
        ]);

        return redirect()->route('clients.index');
    }

    /**
     * @param Client $client
     * @return Factory|View|Application
     * @throws AuthorizationException
     */
    public function edit(Client $client): Factory|View|Application
    {
        $this->authorize('update', $client);
        return view('clients.edit', compact('client'));
    }

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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|regex:/^\+?[0-9]+$/', // Validate that phone only contains numbers and an optional "+" symbol
        ]);

        // Ensure that either email or phone is provided
        if (!$request->email && !$request->phone) {
            return back()->withErrors(['email' => 'Email or phone must be provided.']);
        }

        $client->update($request->only('first_name', 'last_name', 'email', 'phone'));

        return redirect()->route('clients.index');
    }

    /**
     * @param Client $client
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Client $client): RedirectResponse
    {
        $this->authorize('delete', $client);

        $client->delete();
        return redirect()->route('clients.index');
    }
}

