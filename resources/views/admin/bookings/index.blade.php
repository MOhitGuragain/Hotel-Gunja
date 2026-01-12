<h2>All Bookings</h2>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
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
        @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->guest->name ?? 'Walk-in Guest' }}</td>
                <td>{{ $booking->bookable->room_number ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y H:i') }}</td>
                <td>{{ $booking->guests }}</td>
                <td>
                    @if($booking->booking_status == 'approved')
                        <span style="color: green; font-weight: bold;">Approved</span>
                    @elseif($booking->booking_status == 'pending')
                        <span style="color: orange; font-weight: bold;">Pending</span>
                    @elseif($booking->booking_status == 'rejected')
                        <span style="color: red; font-weight: bold;">Rejected</span>
                    @endif
                </td>
                <td>
                    @if($booking->booking_status == 'pending')
                        <form action="{{ url('/admin/bookings/'.$booking->id.'/approve') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background-color: green; color: white; padding: 5px 10px; border: none; cursor: pointer;">Approve</button>
                        </form>
                        <form action="{{ url('/admin/bookings/'.$booking->id.'/reject') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background-color: red; color: white; padding: 5px 10px; border: none; cursor: pointer;">Reject</button>
                        </form>
                    @else
                        --
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align: center; padding: 10px;">No bookings found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
