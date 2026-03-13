@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

```
<h2 class="text-3xl font-bold text-gray-800 mb-6">
    All Bookings
</h2>

{{-- Success Message --}}
@if(session('success'))
    <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

{{-- Error Message --}}
@if(session('error'))
    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
        {{ session('error') }}
    </div>
@endif


<div class="bg-white shadow-lg rounded-2xl overflow-x-auto">

    <table class="min-w-full text-sm text-left">

        {{-- TABLE HEADER --}}
        <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">

            <tr>
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Guest</th>
                <th class="px-4 py-3">Type</th>
                <th class="px-4 py-3">Category / Name</th>
                <th class="px-4 py-3">Room No</th>
                <th class="px-4 py-3">Check-in</th>
                <th class="px-4 py-3">Check-out</th>
                <th class="px-4 py-3">Guests</th>
                <th class="px-4 py-3">Food Orders</th>
                <th class="px-4 py-3">Total Price</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Approved By</th>
                <th class="px-4 py-3 text-center">Actions</th>
            </tr>

        </thead>


        {{-- TABLE BODY --}}
        <tbody class="divide-y divide-gray-200">

        @forelse($bookings as $booking)

            <tr class="hover:bg-gray-50">

                {{-- ID --}}
                <td class="px-4 py-3">
                    {{ $booking->id }}
                </td>

                {{-- Guest --}}
                <td class="px-4 py-3">
                    {{ $booking->guest->name ?? 'Walk-in Guest' }}
                </td>


                {{-- Booking Type --}}
                <td class="px-4 py-3 font-semibold">

                    @switch($booking->bookable_type)

                        @case('App\Models\RoomCategory')
                            Room
                            @break

                        @case('App\Models\RestaurantTable')
                            Restaurant
                            @break

                        @case('App\Models\EventHall')
                            Event Hall
                            @break

                        @default
                            -
                    @endswitch

                </td>


              <td class="px-4 py-3">

@if($booking->bookable instanceof \App\Models\RoomCategory)

    {{ $booking->bookable->name }}

@elseif($booking->bookable instanceof \App\Models\EventHall)

    {{ $booking->bookable->name }}

@elseif($booking->bookable instanceof \App\Models\RestaurantTable)

    {{ $booking->bookable->restaurant->name ?? '-' }}

@else

    -

@endif

</td>


                {{-- Room Number --}}
                <td class="px-4 py-3">
                    @if ($booking->bookable instanceof \App\Models\RoomCategory)
                    {{ $booking->room->room_number ?? '-' }}
                    @else ($booking->bookable instanceof \App\Models\RestaurantTable)
                    {{ $booking->bookable->table_number ?? '-' }}
                   @endif 
                </td>


                {{-- Check In --}}
                <td class="px-4 py-3">
                    {{ $booking->check_in?->format('d M Y H:i') }}
                </td>


                {{-- Check Out --}}
                <td class="px-4 py-3">
                    {{ $booking->check_out?->format('d M Y H:i') }}
                </td>


                {{-- Guests --}}
                <td class="px-4 py-3">
                    {{ $booking->guests }}
                </td>


                {{-- FOOD ORDERS --}}
                <td class="px-4 py-3">

                    @if($booking->menuItems->count())

                        <ul class="text-xs text-gray-700 space-y-1">

                            @foreach($booking->menuItems as $item)

                                <li>
                                    {{ $item->name }}
                                    (x{{ $item->pivot->quantity }})
                                </li>

                            @endforeach

                        </ul>

                    @else

                        <span class="text-gray-400 text-xs">
                            No Food
                        </span>

                    @endif

                </td>


                {{-- TOTAL PRICE --}}
                <td class="px-4 py-3 font-semibold">

                  Rs {{ number_format($booking->final_total, 2) }}

                </td>


                {{-- STATUS --}}
                <td class="px-4 py-3">

                    @if($booking->booking_status === 'approved')

                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                            Approved
                        </span>

                    @elseif($booking->booking_status === 'pending')

                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                            Pending
                        </span>

                    @elseif($booking->booking_status === 'rejected')

                        <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                            Rejected
                        </span>

                    @endif

                </td>


                {{-- APPROVED BY --}}
                <td class="px-4 py-3">

                    {{ $booking->approvedBy->name ?? '-' }}

                </td>


                {{-- ACTIONS --}}
                <td class="px-4 py-3 text-center">

                    @if($booking->booking_status === 'pending')

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

                    @elseif($booking->booking_status === 'approved')

                        <a href="{{ route('admin.orders.create',$booking->id) }}"
                           class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 text-xs">
                            Add Food
                        </a>

                    @else

                        <span class="text-gray-400 text-xs">
                            No Actions
                        </span>

                    @endif

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="13" class="text-center py-6 text-gray-500">
                    No bookings found.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>
```

</div>

@endsection
