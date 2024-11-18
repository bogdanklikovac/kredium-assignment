<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Loan Report</h1>
        <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
            Go to Dashboard
        </a>
    </div>

    <div class="overflow-hidden rounded-lg border border-gray-200 shadow">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Product Type</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Loan Amount</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Property Value</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Down Payment</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Creation Date</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach ($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 text-sm text-gray-800">
                        @if ($product instanceof App\Models\CashLoan)
                            Cash Loan
                        @elseif ($product instanceof App\Models\HomeLoan)
                            Home Loan
                        @endif
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-800">
                        @if ($product instanceof App\Models\CashLoan)
                            {{ number_format($product->loan_amount, 2) }}
                        @endif
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-800">
                        @if ($product instanceof App\Models\HomeLoan)
                            {{ number_format($product->property_value ?? 0, 2) }}
                        @endif
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-800">
                        @if ($product instanceof App\Models\HomeLoan)
                            {{ number_format($product->down_payment_amount ?? 0, 2) }}
                        @endif
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-800">{{ $product->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('report.export') }}">
            <button class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Export to CSV
            </button>
        </a>
    </div>
</div>
</body>
</html>
