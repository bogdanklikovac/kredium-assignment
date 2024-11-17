<!-- resources/views/clients/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    @vite('resources/css/app.css') <!-- Make sure Tailwind CSS is included -->
</head>
<body class="bg-gray-100 font-sans">
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h1 class="text-3xl font-bold mb-6 text-center">Edit Client</h1>

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- First Name -->
            <div class="mb-4">
                <label for="first_name" class="block text-lg font-semibold">First Name:</label>
                <input type="text" name="first_name" id="first_name" value="{{ $client->first_name }}" required class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <label for="last_name" class="block text-lg font-semibold">Last Name:</label>
                <input type="text" name="last_name" id="last_name" value="{{ $client->last_name }}" required class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-semibold">Email:</label>
                <input type="email" name="email" id="email" value="{{ $client->email }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-lg font-semibold">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ $client->phone }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Cash Loan Form -->
            <h3 class="text-xl font-semibold mb-2">Cash Loan</h3>
            <div class="mb-4">
                <label for="cash_loan_amount" class="block text-lg font-semibold">Loan Amount:</label>
                <input type="number" id="cash_loan_amount" name="cash_loan_amount" value="{{ $client->cashLoan->loan_amount ?? '' }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Home Loan Form -->
            <h3 class="text-xl font-semibold mb-2">Home Loan</h3>
            <div class="mb-4">
                <label for="home_loan_property_value" class="block text-lg font-semibold">Property Value:</label>
                <input type="number" id="home_loan_property_value" name="home_loan_property_value" value="{{ $client->homeLoan->property_value ?? '' }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="home_loan_down_payment" class="block text-lg font-semibold">Down Payment:</label>
                <input type="number" id="home_loan_down_payment" name="home_loan_down_payment" value="{{ $client->homeLoan->down_payment_amount ?? '' }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Update Client
            </button>
        </form>
    </div>
</div>
</body>
</html>
