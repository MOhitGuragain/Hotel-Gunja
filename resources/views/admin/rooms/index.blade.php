@extends('admin.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto mt-10 px-4">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Rooms Management
        </h2>

        <a href="{{ route('admin.rooms.create') }}"
           class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            + Add New Room
        </a>
    </div>

    {{-- Table Card --}}
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">

                {{-- Table Head --}}
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">#</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Room</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Floor</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Available Plans</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="divide-y divide-gray-100 bg-white">

                @forelse($rooms as $room)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-800">
                            {{ $room->room_number }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $room->category->name ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $room->floor ?? '-' }}
                        </td>

                        {{-- Plans --}}
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-2">
                                @foreach($room->category->plans as $plan)
                                    <span class="px-3 py-1 text-xs font-medium 
                                                 bg-blue-100 text-blue-700 
                                                 rounded-full">
                                        {{ $plan->plan_name }} - Rs{{ $plan->price_per_night }}
                                    </span>
                                @endforeach
                            </div>
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4">
                            @if($room->status === 'available')
                                <span class="px-3 py-1 text-xs font-semibold 
                                             bg-green-100 text-green-700 
                                             rounded-full">
                                    Available
                                </span>
                            @elseif($room->status === 'booked')
                                <span class="px-3 py-1 text-xs font-semibold 
                                             bg-red-100 text-red-700 
                                             rounded-full">
                                    Booked
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold 
                                             bg-yellow-100 text-yellow-700 
                                             rounded-full">
                                    {{ ucfirst($room->status) }}
                                </span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-gray-400">
                            No rooms found.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>

    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $rooms->links() }}
    </div>

</div>

@endsection