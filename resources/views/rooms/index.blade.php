<h2>Available Rooms</h2>

@foreach($rooms as $room)
    <div>
        <p>Room Number: {{ $room->room_number }}</p>
        <p>Category: {{ $room->category?->name ?? 'No Category' }}</p>
        <p>Status: {{ $room->status }}</p>
        <a href="/rooms/{{ $room->id }}">View Details</a>
    </div>
@endforeach
