@extends('layouts.app')

@section('content')

<section class="pt-24 pb-32 bg-gray-50">

<div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-16">

{{-- IMAGE --}}
<div class="relative group overflow-hidden rounded-2xl shadow-xl">

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
        : 'https://images.unsplash.com/photo-1591088398332-8a7791972843?w=1600' }}"
    class="w-full h-[520px] object-cover transition-transform duration-700 group-hover:scale-110"
>

{{-- MIN PRICE --}}
@php
    $minPrice = $category->plans->min('price_per_night');
@endphp

@if($minPrice)
<div class="absolute top-6 right-6 bg-[#D4AF37] px-6 py-3 text-xl font-bold text-black shadow-lg">
    Rs. {{ number_format($minPrice) }}
    <span class="text-sm font-normal">/night</span>
</div>
@endif

{{-- AVAILABILITY --}}
@php
    $availableCount = isset($category->available_rooms)
        ? $category->available_rooms->count()
        : $category->rooms->count();
@endphp

@if($availableCount > 0)
<div class="absolute top-6 left-6 bg-green-500 text-white px-4 py-2 text-sm font-semibold rounded">
    {{ $availableCount }} Rooms Available
</div>
@else
<div class="absolute top-6 left-6 bg-red-500 text-white px-4 py-2 text-sm font-semibold rounded">
    Sold Out
</div>
@endif

</div>

{{-- CONTENT --}}
<div>

<p class="text-[#D4AF37] tracking-[0.3em] uppercase text-sm mb-4">
    Accommodation
</p>

<h1 class="text-4xl md:text-5xl font-bold mb-6" style="font-family:'Playfair Display', serif;">
    {{ $category->name }}
</h1>

<div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mb-8"></div>

<p class="text-lg text-gray-700 leading-relaxed mb-8" style="font-family:'Cormorant Garamond', serif;">
    {{ $category->description }}
</p>

{{-- INFO --}}
<div class="flex flex-wrap gap-6 mb-10 text-gray-700">
    
<span class="px-5 py-2 border rounded-full">
    🛏 {{ $category->bed_type ?? 'Comfort Bed' }}
</span>

</div>

{{-- PLANS --}}
<div class="mb-12">

<h3 class="text-xl font-semibold mb-4">
    Available Plans
</h3>

<div class="grid grid-cols-2 gap-4">

@forelse($category->plans as $plan)

<div class="border rounded-lg p-4">

<p class="font-semibold text-gray-800">
    {{ $plan->plan_name }}
</p>

<p class="text-gray-600">
    Rs {{ number_format($plan->price_per_night) }} / night
</p>

</div>

@empty

<p class="text-gray-500">
    No plans available.
</p>

@endforelse

</div>

</div>

{{-- BOOK BUTTON --}}
@if($availableCount > 0)

<a href="{{ route('rooms.book', [
    'id' => $category->id,
    'check_in' => request('check_in'),
    'check_out' => request('check_out')
]) }}">

<button class="bg-gradient-to-r from-[#800020] to-[#600018]
               text-white px-10 py-4 rounded-md
               uppercase tracking-widest
               hover:scale-105 transition">

    Book This Room →

</button>

</a>

@else

<button class="bg-gray-400 text-white px-10 py-4 rounded-md cursor-not-allowed">
    No Rooms Available
</button>

@endif

</div>

</div>

</section>

@endsection