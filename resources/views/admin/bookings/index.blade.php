<h2>All Bookings</h2>

@if(session('success'))
    <div style="color:green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Guest</th>
            <th>Room</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Guests</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->guest->name ?? 'Walk-in Guest' }}</td>
                <td>{{ $booking->bookable->room_number ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y H:i') }}</td>
                <td>{{ $booking->guests }}</td>
                <td>
                    @if($booking->booking_status == 'approved')
                        <span style="color:green;font-weight:bold;">Approved</span>
                    @elseif($booking->booking_status == 'pending')
                        <span style="color:orange;font-weight:bold;">Pending</span>
                    @elseif($booking->booking_status == 'rejected')
                        <span style="color:red;font-weight:bold;">Rejected</span>
                    @endif
                </td>
                <td>
                    @if($booking->booking_status == 'pending')
                        <form action="/admin/bookings/{{ $booking->id }}/approve" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Approve</button>
                        </form>
                        <form action="/admin/bookings/{{ $booking->id }}/reject" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Reject</button>
                        </form>
                    @else
                        --
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
