@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <h2 class="text-3xl font-bold mb-6">All Bookings</h2>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-2xl overflow-x-auto">
        <table class="min-w-full text-sm text-left">

            <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Guest</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Category / Name</th>
                    <th class="px-4 py-3">Room Number</th>
                    <th class="px-4 py-3">Check-in</th>
                    <th class="px-4 py-3">Check-out</th>
                    <th class="px-4 py-3">Guests</th>
                    <th class="px-4 py-3">Total Price</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Approved By</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

            @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50">

                    <td class="px-4 py-3">{{ $booking->id }}</td>

                    <td class="px-4 py-3">
                        {{ $booking->guest->name ?? 'Walk-in Guest' }}
                    </td>

                    <!-- TYPE -->
                    <td class="px-4 py-3 font-semibold">
                        @if($booking->bookable_type === 'App\Models\RoomCategory')
                            Room
                        @elseif($booking->bookable_type === 'App\Models\Restaurant')
                            Restaurant
                        @elseif($booking->bookable_type === 'App\Models\EventHall')
                            Event Hall
                        @endif
                    </td>

                    <!-- CATEGORY / NAME -->
                    <td class="px-4 py-3">
                        @if($booking->bookable)
                            {{ $booking->bookable->name ?? $booking->bookable->category_name ?? 'N/A' }}
                        @else
                            N/A
                        @endif
                    </td>

                    <!-- ROOM NUMBER (only if room assigned) -->
                    <td class="px-4 py-3">
                        @if($booking->room)
                            {{ $booking->room->room_number }}
                            @else
                            -
                        @endif
                    </td>

                    <td class="px-4 py-3">
                        {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y H:i') }}
                    </td>

                    <td class="px-4 py-3">
                        {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y H:i') }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $booking->guests }}
                    </td>

                    <td class="px-4 py-3">
                        Rs{{ number_format($booking->total_price, 2) }}
                    </td>

                    <!-- STATUS -->
                    <td class="px-4 py-3">
                        @if($booking->booking_status == 'approved')
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                Approved
                            </span>
                        @elseif($booking->booking_status == 'pending')
                            <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                Pending
                            </span>
                        @elseif($booking->booking_status == 'rejected')
                            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                Rejected
                            </span>
                        @endif
                    </td>

                    <!-- APPROVED BY -->
                    <td class="px-4 py-3">
                        @if($booking->approvedBy)
                            {{ $booking->approvedBy->name }}
                            <span class="text-xs text-gray-400">
                                ({{ $booking->approvedBy->role->name ?? '' }})
                            </span>
                        @else
                            -
                        @endif
                    </td>

                    <!-- ACTIONS -->
                    <td class="px-4 py-3 text-center">
                        @if($booking->booking_status == 'pending')
                            <div class="flex justify-center gap-2">
                                <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 text-xs">
                                        Approve
                                    </button>
                                </form>

                                <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 text-xs">
                                        Reject
                                    </button>
                                </form>
                            </div>
                        @else
                            <span class="text-gray-400 text-xs">No Actions</span>
                        @endif
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center py-6 text-gray-500">
                        No bookings found.
                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection