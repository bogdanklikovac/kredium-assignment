<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-6xl">
        <a href="{{ route('clients.index') }}" class="inline-block mb-6 text-blue-600 hover:text-blue-800">Go back to clients</a>

        <h1 class="text-3xl font-bold mb-6 text-center">Edit Client</h1>

        <div class="flex space-x-8">
            <!-- Edit Client Form (Bigger) -->
            <div class="w-2/3">
                <form action="{{ route('clients.update', $client->id) }}" method="POST" class="mb-8">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @method('PUT')
                    <h2 class="text-xl font-semibold mb-4">Edit Client Information</h2>
                    <div class="mb-4">
                        <label for="first_name" class="block text-lg font-semibold">First Name:</label>
                        <input type="text" name="first_name" id="first_name" value="{{ $client->first_name }}" required class="w-full p-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="block text-lg font-semibold">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $client->last_name }}" required class="w-full p-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-lg font-semibold">Email:</label>
                        <input type="email" name="email" id="email" value="{{ $client->email }}" class="w-full p-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-lg font-semibold">Phone:</label>
                        <input type="text" name="phone" id="phone" value="{{ $client->phone }}" class="w-full p-3 border border-gray-300 rounded-md">
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Client</button>
                </form>
            </div>

            <!-- Loan Forms Container (Smaller) -->
            <div class="w-1/3">
                <div class="mb-8">
                    <!-- Cash Loan Form -->
                    <form action="{{ route('clients.updateCashLoan', $client->id) }}" method="POST" class="mb-8">
                        @csrf
                        @method('PUT')
                        <h2 class="text-xl font-semibold mb-4">Cash Loan</h2>
                        <div class="mb-4">
                            <label for="cash_loan_amount" class="block text-lg font-semibold">Loan Amount:</label>
                            <input type="number" id="cash_loan_amount" name="cash_loan_amount" value="{{ $client->cashLoan->loan_amount ?? '' }}" class="w-full p-3 border border-gray-300 rounded-md" min="0">
                            <!-- Added validation for non-negative value -->
                            @error('cash_loan_amount')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Update Cash Loan</button>
                    </form>
                </div>

                <div>
                    <!-- Home Loan Form -->
                    <form action="{{ route('clients.updateHomeLoan', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h2 class="text-xl font-semibold mb-4">Home Loan</h2>
                        <div class="mb-4">
                            <label for="home_loan_property_value" class="block text-lg font-semibold">Property Value:</label>
                            <input type="number" id="home_loan_property_value" name="home_loan_property_value" value="{{ $client->homeLoan->property_value ?? '' }}" class="w-full p-3 border border-gray-300 rounded-md" min="0">
                        </div>
                        <div class="mb-4">
                            <label for="home_loan_down_payment" class="block text-lg font-semibold">Down Payment:</label>
                            <input type="number" id="home_loan_down_payment" name="home_loan_down_payment" value="{{ $client->homeLoan->down_payment_amount ?? '' }}" class="w-full p-3 border border-gray-300 rounded-md" min="0">
                        </div>
                        <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Update Home Loan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
