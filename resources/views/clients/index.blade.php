<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    @vite('resources/css/app.css') <!-- Ensure your Tailwind CSS is included -->
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Your Clients</h1>
    <div class="flex justify-between mb-4">
        <a href="{{ route('clients.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New Client
        </a>
        <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Go back to dashboard
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4 border-b text-left">First Name</th>
                <th class="py-2 px-4 border-b text-left">Last Name</th>
                <th class="py-2 px-4 border-b text-left">Email</th>
                <th class="py-2 px-4 border-b text-left">Phone</th>
                <th class="py-2 px-4 border-b text-left">Cash Loan</th>
                <th class="py-2 px-4 border-b text-left">Home Loan</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($clients as $client)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4">{{ $client->first_name }}</td>
                    <td class="py-2 px-4">{{ $client->last_name }}</td>
                    <td class="py-2 px-4">{{ $client->email }}</td>
                    <td class="py-2 px-4">{{ $client->phone }}</td>
                    <td class="py-2 px-4">{{ $client->cashLoan ? 'Yes' : 'No' }}</td>
                    <td class="py-2 px-4">{{ $client->homeLoan ? 'Yes' : 'No' }}</td>
                    @if ($client->adviser_id === auth()->id()) <!-- Ensure only the logged-in adviser's clients are shown -->
                    <td class="py-2 px-4 flex space-x-2">
                        <a href="{{ route('clients.edit', $client->id) }}" class="text-blue-500 hover:text-blue-700">
                            Edit
                        </a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-gray-500 text-center">No clients found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
