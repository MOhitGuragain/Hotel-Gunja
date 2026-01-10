<h2>Room Details</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
@endif

<p>Room Number: {{ $room->room_number }}</p>
<p>Category: {{ $room->category ? $room->category->name : 'No Category' }}</p>
<p>Status: {{ $room->status }}</p>

@if(
    !$room->bookings()
        ->where('check_in', '<=', now())
        ->where('check_out', '>=', now())
        ->exists()
)
    <h3>Book This Room</h3>

    <form action="/rooms/{{ $room->id }}/book" method="POST">
        @csrf

        <label>Check-in Date:</label><br>
        <input type="datetime-local" name="check_in" required><br><br>

        <label>Check-out Date:</label><br>
        <input type="datetime-local" name="check_out" required><br><br>

        <label>Number of Guests:</label><br>
        <input type="number"
               name="guests"
               min="1"
               max="{{ $room->category ? $room->category->max_adults : 1 }}"
               required><br><br>

        <button type="submit">Book Now</button>
    </form>
@else
    <p>This room is not available for booking.</p>
@endif
