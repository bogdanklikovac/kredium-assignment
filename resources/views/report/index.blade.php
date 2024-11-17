<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Loan Report</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 bg-white rounded-md shadow-md">
            <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4 border-b">Product Type</th>
                <th class="py-2 px-4 border-b">Product Value</th>
                <th class="py-2 px-4 border-b">Loan Amount / Property Value</th>
                <th class="py-2 px-4 border-b">Down Payment</th>
                <th class="py-2 px-4 border-b">Creation Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4">
                        @if ($product instanceof App\Models\CashLoan)
                            Cash loan
                        @elseif ($product instanceof App\Models\HomeLoan)
                            Home loan
                        @endif
                    </td>
                    <td class="py-2 px-4">
                        @if ($product instanceof App\Models\CashLoan)
                            {{ $product->loan_amount }}
                        @elseif ($product instanceof App\Models\HomeLoan)
                            {{ $product->property_value }}
                        @endif
                    </td>
                    <td class="py-2 px-4">
                        @if ($product instanceof App\Models\CashLoan)
                            {{ $product->loan_amount }}
                        @elseif ($product instanceof App\Models\HomeLoan)
                            {{ $product->property_value }}
                        @endif
                    </td>
                    <td class="py-2 px-4">
                        @if ($product instanceof App\Models\HomeLoan)
                            {{ $product->down_payment }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="py-2 px-4">{{ $product->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
