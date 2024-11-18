<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="container mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-bold mb-4">Loan Report</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-md">
            <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4 border-b text-left">Product Type</th>
                <th class="py-2 px-4 border-b text-left">Loan Amount</th>
                <th class="py-2 px-4 border-b text-left">Property Value</th>
                <th class="py-2 px-4 border-b text-left">Down Payment</th>
                <th class="py-2 px-4 border-b text-left">Creation Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4 text-left">
                        @if ($product instanceof App\Models\CashLoan)
                            Cash Loan
                        @elseif ($product instanceof App\Models\HomeLoan)
                            Home Loan
                        @endif
                    </td>
                    <td class="py-2 px-4 text-left">
                        @if ($product instanceof App\Models\CashLoan)
                            {{ number_format($product->loan_amount, 2) }}
                        @elseif ($product instanceof App\Models\HomeLoan)

                        @endif
                    </td>
                    <td class="py-2 px-4 text-left">
                        @if ($product instanceof App\Models\HomeLoan)
                            {{ number_format($product->property_value, 2) }}
                        @elseif($product->property_value === null)

                        @endif
                    </td>
                    <td class="py-2 px-4 text-left">
                        @if ($product instanceof App\Models\HomeLoan)
                            {{ number_format($product->down_payment_amount, 2) }}
                        @else

                        @endif
                    </td>
                    <td class="py-2 px-4 text-left">{{ $product->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
