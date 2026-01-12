<h2>Available Rooms</h2>

{{-- Success Message --}}
@if(session('success'))
    <div style="color:green; margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

{{-- Date Search Form --}}
<form method="GET" action="/">
    <label>Check-in:</label>
    <input type="datetime-local" name="check_in"
           value="{{ request('check_in') }}" required>

    <label>Check-out:</label>
    <input type="datetime-local" name="check_out"
           value="{{ request('check_out') }}" required>

    <button type="submit">Search Rooms</button>
</form>

<hr>

{{-- Validation: Dates not selected --}}
@if(!request('check_in') || !request('check_out'))
    <p>Please select check-in and check-out dates to see available rooms.</p>

{{-- No rooms available --}}
@elseif($rooms->isEmpty())
    <p>No rooms are available for the selected dates.</p>

{{-- Rooms Table --}}
@else
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->category->name ?? 'No Category' }}</td>
                    <td>
                        <a href="/rooms/{{ $room->id }}
                           ?check_in={{ request('check_in') }}
                           &check_out={{ request('check_out') }}">
                            View Details
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
