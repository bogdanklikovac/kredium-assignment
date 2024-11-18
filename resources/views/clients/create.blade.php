<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Client</title>
    @vite('resources/css/app.css') <!-- Make sure Tailwind CSS is included -->
</head>
<body class="bg-gray-100 font-sans">
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h1 class="text-3xl font-bold mb-6 text-center">Add New Client</h1>

        <div class="flex justify-between mb-4">
            <a href="{{ route('clients.index') }}" class="text-blue-500 hover:text-blue-700">
                Go back to clients
            </a>
        </div>

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <!-- First Name -->
            <div class="mb-4">
                <label for="first_name" class="block text-lg font-semibold">First Name:</label>
                <input type="text" name="first_name" id="first_name" required class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <label for="last_name" class="block text-lg font-semibold">Last Name:</label>
                <input type="text" name="last_name" id="last_name" required class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-semibold">Email:</label>
                <input type="email" name="email" id="email" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-lg font-semibold">Phone:</label>
                <input type="text" name="phone" id="phone" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Client
            </button>
        </form>
    </div>
</div>
</body>
</html>
