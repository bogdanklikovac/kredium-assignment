<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
</head>
<body>
<h1>Your Clients</h1>
<a href="{{ route('clients.create') }}">Add New Client</a>
<ul>
    @foreach ($clients as $client)
        <li>
            {{ $client->first_name }} {{ $client->last_name }}
            <a href="{{ route('clients.edit', $client->id) }}">Edit</a>
            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
