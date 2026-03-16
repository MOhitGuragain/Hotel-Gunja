@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-16">

```
<!-- Header -->
<div class="text-center mb-12 pt-20">
    <h1 class="text-5xl font-bold text-gray-900 mb-4">
        Explore Our Rooms
    </h1>
    <p class="text-xl text-gray-600">
        Find your ideal stay
    </p>
</div>

<!-- Room Search -->
<div class="bg-white shadow rounded-lg p-6 mb-12">
    <form method="GET" action="{{ route('rooms.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Check In
            </label>
            <input type="date"
                   name="check_in"
                   value="{{ $checkIn }}"
                   required
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Check Out
            </label>
            <input type="date"
                   name="check_out"
                   value="{{ $checkOut }}"
                   required
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex items-end">
            <button type="submit"
                    class="w-full bg-[#800020] text-white py-2 rounded hover:bg-[#600018] transition">
                Check Availability
            </button>
        </div>

    </form>
</div>

<!-- Categories Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    @forelse($categories as $category)

    @php
        $minPrice = $category->plans->min('price_per_night');
        $availableCount = isset($category->available_rooms)
            ? $category->available_rooms->count()
            : $category->rooms->count();
    @endphp

    <div class="rounded-xl border bg-white shadow overflow-hidden 
                hover:shadow-2xl transition-all duration-300 group">

        <!-- Image -->
        <div class="relative h-80 overflow-hidden">
            @php
$roomImageMap = [
    'Presidential Suite' => 'presidential_suite',
    'Suite' => 'suite',
    'Super Deluxe' => 'super_deluxe',
    'Deluxe' => 'deluxe',
    'Family Room' => 'family',
    'Standard' => 'standard',
    'Twin Bed Super Deluxe' => 'twin_bed_super_deluxe',
    'Twin Bed Deluxe' => 'twin_bed_deluxe',
    'Twin Bed Standard' => 'twin_bed_standard'
];

$key = $roomImageMap[$category->name] ?? null;
@endphp

<img
src="{{ $key && !empty($homepageImages[$key])
        ? asset('storage/'.$homepageImages[$key])
        : 'https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800' }}"
alt="{{ $category->name }}"
class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
>

            <!-- Price -->
            @if($minPrice)
            <div class="absolute top-4 right-4 bg-[#800020] text-white 
                        text-lg font-semibold px-4 py-2 rounded-md shadow">
                Rs {{ number_format($minPrice) }}/night
            </div>
            @endif

            <!-- Availability Badge -->
            @if($availableCount > 0)
            <div class="absolute top-4 left-4 bg-green-500 text-white 
                        text-xs font-semibold px-3 py-1 rounded-md shadow">
                {{ $availableCount }} Rooms Available
            </div>
            @else
            <div class="absolute top-4 left-4 bg-red-500 text-white 
                        text-xs font-semibold px-3 py-1 rounded-md shadow">
                Sold Out
            </div>
            @endif

        </div>

        <!-- Content -->
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                {{ $category->name }}
            </h2>

            <p class="text-gray-600 mb-4">
                {{ $category->description }}
            </p>

            <!-- Info -->
            <div class="flex justify-between text-gray-600 mb-4">
                <span>👥 Up to {{ $category->max_adults }} Guests</span>
                <span>🛏 {{ $category->bed_type ?? 'Standard Bed' }}</span>
            </div>

            <!-- Plans -->
            <h4 class="font-semibold text-gray-900 mb-2">
                Available Plans:
            </h4>

            <div class="flex flex-wrap gap-2 text-sm text-gray-600 mb-6">
                @forelse($category->plans as $plan)
                    <span class="px-3 py-1 bg-gray-100 rounded">
                        {{ $plan->plan_name }}
                    </span>
                @empty
                    <span>No plans available</span>
                @endforelse
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">

                <a href="{{ route('rooms.show', [
                    'id' => $category->id,
                    'check_in' => $checkIn,
                    'check_out' => $checkOut
                ]) }}"
                   class="flex-1 border border-[#800020] text-[#800020] py-2 rounded-md
                          text-center hover:bg-[#800020] hover:text-white transition">

                    View Details

                </a>

            </div>
        </div>
    </div>

    @empty
        <p class="text-center col-span-2 text-gray-500">
            No room categories available.
        </p>
    @endforelse

</div>
```

</div>
@endsection
