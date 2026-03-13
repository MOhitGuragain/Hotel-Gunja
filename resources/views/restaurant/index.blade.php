@extends('layouts.app')

@section('content')

<section class="pt-24 pb-32 bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-14">

<h1 class="text-4xl font-bold text-gray-800 mb-4">
Our Restaurants
</h1>

<p class="text-gray-600 max-w-2xl mx-auto">
Experience fine dining and authentic flavors crafted
by our expert chefs.
</p>

</div>

<div class="bg-white shadow-md rounded-xl p-6 mb-12">

<form method="GET"
action="{{ route('restaurant.index') }}"
class="grid md:grid-cols-3 gap-4 items-end">

<div>

<label class="block text-sm font-semibold text-gray-700 mb-1">
Reservation Date
</label>

<input type="date"
name="booking_date"
value="{{ request('booking_date') }}"
min="{{ date('Y-m-d') }}"
class="w-full border rounded-lg px-4 py-3">

</div>

<div>

<label class="block text-sm font-semibold text-gray-700 mb-1">
Reservation Time
</label>

<input type="time"
name="booking_time"
value="{{ request('booking_time') }}"
class="w-full border rounded-lg px-4 py-3">

</div>

<div>

<button type="submit"
class="w-full bg-[#800020] text-white py-3 rounded-lg font-semibold hover:bg-[#600018] transition">

Check Availability

</button>

</div>

</form>

</div>

<div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">

@forelse($restaurants as $restaurant)

@php
$availableTables = isset($restaurant->available_tables)
? $restaurant->available_tables->count()
: $restaurant->tables->count();
@endphp

<div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

<div class="relative h-56 overflow-hidden">

<img src="{{ asset('storage/' . $restaurant->image) }}"
class="w-full h-full object-cover hover:scale-110 transition duration-500">

@if($availableTables > 0)

<div class="absolute top-4 left-4 bg-green-500 text-white text-xs px-3 py-1 rounded font-semibold">
{{ $availableTables }} Tables Available
</div>

@else

<div class="absolute top-4 left-4 bg-red-500 text-white text-xs px-3 py-1 rounded font-semibold">
Sold Out
</div>

@endif

</div>

<div class="p-6">

<h2 class="text-xl font-bold mb-2 text-gray-800">
{{ $restaurant->name }}
</h2>

<p class="text-gray-600 text-sm mb-4">
{{ Str::limit($restaurant->description,100) }}
</p>

<div class="flex justify-between items-center">

<span class="text-[#800020] font-semibold">
{{ $restaurant->cuisine_type ?? 'Multi Cuisine' }}
</span>

<a href="{{ route('restaurant.show',[
'id'=>$restaurant->id,
'booking_date'=>request('booking_date'),
'booking_time'=>request('booking_time')
]) }}"
class="bg-[#800020] text-white px-4 py-2 rounded-lg hover:bg-[#600018] transition text-sm font-semibold">

View Details

</a>

</div>

</div>

</div>

@empty

<div class="col-span-3 text-center text-gray-500">
No restaurants available at the moment.
</div>

@endforelse

</div>

</div>

</section>
@endsection
