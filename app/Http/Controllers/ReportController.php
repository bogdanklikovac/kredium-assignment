<?php

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

    public function exportToCsv()
    {
        // Get the products for the currently logged-in adviser
        $adviserId = auth()->id();
        $cashLoans = CashLoan::where('adviser_id', $adviserId)->orderBy('created_at', 'desc')->get();
        $homeLoans = HomeLoan::where('adviser_id', $adviserId)->orderBy('created_at', 'desc')->get();
        $products = $cashLoans->merge($homeLoans);

        // Prepare CSV content with proper headers
        $csvData = "Product Type,Loan Amount,Property Value,Down Payment,Creation Date\n";

        foreach ($products as $product) {
            $productType = $product instanceof CashLoan ? 'Cash loan' : 'Home loan';
            $loanAmount = $product instanceof CashLoan ? number_format($product->loan_amount, 2) : '';
            $propertyValue = $product instanceof HomeLoan ? number_format($product->property_value, 2) : '';
            $downPayment = $product instanceof HomeLoan ? number_format($product->down_payment_amount, 2) : '';
            $creationDate = $product->created_at->format('Y-m-d H:i');

            // Append each product's data to CSV string
            $csvData .= "\"$productType\",";
            $csvData .= "\"$loanAmount\",";
            $csvData .= "\"$propertyValue\",";
            $csvData .= "\"$downPayment\",";
            $csvData .= "\"$creationDate\"\n";
        }

        // Return the CSV as a response for download
        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="loan_report.csv"');
    }

}
