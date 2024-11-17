<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use App\Models\CashLoan;
use App\Models\HomeLoan;

class ReportController extends Controller
{
    public function viewReport()
    {
        // Get the currently logged-in adviser
        $adviser = auth()->id();

        // Get cash loans and home loans for the logged-in adviser, ordered by creation date
        $cashLoans = CashLoan::where('adviser_id', $adviser)
            ->orderBy('created_at', 'desc')
            ->get();

        $homeLoans = HomeLoan::where('adviser_id', $adviser)
            ->orderBy('created_at', 'desc')
            ->get();

        // Combine both collections
        $products = $cashLoans->merge($homeLoans);

        return view('report.index', compact('products'));
    }
}
