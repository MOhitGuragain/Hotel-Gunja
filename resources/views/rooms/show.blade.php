<h2>Room Details</h2>

{{-- Error messages --}}
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Success message --}}
@if (session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
@endif

<p><strong>Room Number:</strong> {{ $room->room_number }}</p>
<p><strong>Category:</strong> {{ $room->category ? $room->category->name : 'No Category' }}</p>

<hr>

@php
    $checkIn  = request('check_in');
    $checkOut = request('check_out');

    $isBooked = $room->bookings()
        ->where('booking_status', 'approved')
        ->where(function ($query) use ($checkIn, $checkOut) {
            $query->whereBetween('check_in', [$checkIn, $checkOut])
                  ->orWhereBetween('check_out', [$checkIn, $checkOut])
                  ->orWhere(function ($q) use ($checkIn, $checkOut) {
                      $q->where('check_in', '<=', $checkIn)
                        ->where('check_out', '>=', $checkOut);
                  });
        })
        ->exists();
@endphp

{{-- Require search dates --}}
@if(!$checkIn || !$checkOut)
    <p style="color:red;">
        Please search rooms with check-in and check-out dates first.
    </p>
    <a href="{{ url('/') }}">← Go back to search</a>

{{-- Room unavailable --}}
@elseif($isBooked)
    <p style="color:red; font-weight:bold;">
        This room is not available for the selected dates.
    </p>

{{-- Booking form --}}
@else
    <h3>Book This Room</h3>

    <p>
        <strong>Check-in:</strong>
        {{ \Carbon\Carbon::parse($checkIn)->format('d M Y H:i') }} <br>
        <strong>Check-out:</strong>
        {{ \Carbon\Carbon::parse($checkOut)->format('d M Y H:i') }}
    </p>

    <form action="/rooms/{{ $room->id }}/book" method="POST">
        @csrf

        {{-- Locked dates --}}
        <input type="hidden" name="check_in" value="{{ $checkIn }}">
        <input type="hidden" name="check_out" value="{{ $checkOut }}">

        <label>Number of Guests:</label><br>
        <input type="number"
               name="guests"
               min="1"
               max="{{ $room->category ? $room->category->max_adults : 1 }}"
               required>
        <br><br>

        <button type="submit">Confirm Booking</button>
    </form>
@endif
