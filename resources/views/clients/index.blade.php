<!-- resources/views/clients/index.blade.php -->
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

    <ul class="bg-white shadow-md rounded overflow-hidden">
        @forelse ($clients as $client)
            <li class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <span class="text-lg">{{ $client->first_name }} {{ $client->last_name }}</span>
                <div>
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
                </div>
            </li>
        @empty
            <li class="px-6 py-4 text-gray-500">No clients found.</li>
        @endforelse
    </ul>
</div>
</body>
</html>
