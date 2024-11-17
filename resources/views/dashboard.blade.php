<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Main container for the dashboard -->
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">

    <!-- Welcome message -->
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">
        Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
    </h1>

    <!-- Navigation buttons -->
    <div class="flex justify-center gap-6 mb-4">
        <a href="{{ route('clients.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            View Clients
        </a>
        <!-- View Report link -->
        <a href="{{ route('report.index') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
            View Report
        </a>
    </div>

    <!-- Logout button -->
    <div class="flex justify-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                Logout
            </button>
        </form>
    </div>

</div>

</body>
</html>
