<h2>Room Details</h2>

<p>Room Number: {{ $room->room_number }}</p>
<p>Category: {{ $room->category?->name ?? 'No Category' }}</p>
<p>Status: {{ $room->status }}</p>

<a href="{{ url('/') }}">Back to Rooms List</a>
