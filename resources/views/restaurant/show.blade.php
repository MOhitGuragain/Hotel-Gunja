@extends('layouts.app')

@section('content')

<section class="pt-24 pb-32 bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-6">

@php
$availableTables = isset($restaurant->available_tables)
? $restaurant->available_tables->count()
: $restaurant->tables->count();

$timeSlots = $restaurant->timeSlots ?? [];
@endphp

<div class="grid md:grid-cols-2 gap-12 items-center">

<div class="relative rounded-2xl overflow-hidden shadow-2xl">

<img src="{{ asset('storage/' . $restaurant->image) }}"
class="w-full h-[500px] object-cover">

@if($availableTables > 0)

<div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 text-sm rounded font-semibold">
{{ $availableTables }} Tables Available
</div>

@else

<div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 text-sm rounded font-semibold">
Sold Out
</div>

@endif

</div>

<div>

<h1 class="text-4xl font-bold text-gray-800 mb-4">
{{ $restaurant->name }}
</h1>

<p class="text-gray-600 mb-6 leading-relaxed">
{{ $restaurant->description }}
</p>

<div class="bg-white p-6 rounded-xl shadow-md mb-8 space-y-3">

<div class="flex justify-between">
<span class="font-semibold text-gray-700">Cuisine</span>
<span class="text-[#800020] font-semibold">
{{ $restaurant->cuisine_type ?? 'Multi Cuisine' }}
</span>
</div>

<div class="flex justify-between">
<span class="font-semibold text-gray-700">Max Capacity</span>
<span class="text-[#800020] font-semibold">
{{ $restaurant->max_capacity }} Guests
</span>
</div>

<div class="flex justify-between">
<span class="font-semibold text-gray-700">Opening Hours</span>
<span class="text-[#800020] font-semibold">
{{ $restaurant->opening_time }} - {{ $restaurant->closing_time }}
</span>
</div>

</div>

<div class="bg-white p-6 rounded-xl shadow-md mb-8">

<form method="GET"
action="{{ route('restaurant.show',$restaurant->id) }}"
class="grid grid-cols-2 gap-4">

{{-- DATE --}}

<div>
<label class="text-sm font-semibold text-gray-700">
Reservation Date
</label>

<input type="date"
name="booking_date"
value="{{ request('booking_date') }}"
min="{{ date('Y-m-d') }}"
class="w-full border rounded-lg px-4 py-2">
</div>

{{-- TIME SLOT --}}

<div>
<label class="text-sm font-semibold text-gray-700">
Reservation Time Slot
</label>

<select name="time_slot_id"
class="w-full border rounded-lg px-4 py-2">

<option value="">Select Time Slot</option>

@foreach($timeSlots as $slot)

<option value="{{ $slot->id }}"
{{ request('time_slot_id') == $slot->id ? 'selected' : '' }}>

{{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }}
-
{{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}

</option>

@endforeach

</select>

</div>

<div class="col-span-2">

<button type="submit"
class="w-full bg-[#800020] text-white py-2 rounded-lg hover:bg-[#600018] transition">

Check Availability

</button>

</div>

</form>

</div>

@if(request('booking_date') && request('time_slot_id') && $availableTables > 0)

<a href="{{ route('restaurant.book',[
'id'=>$restaurant->id,
'booking_date'=>request('booking_date'),
'time_slot_id'=>request('time_slot_id')
]) }}"
class="inline-block bg-gradient-to-r from-[#800020] to-[#600018]
text-white px-8 py-3 rounded-xl text-lg font-semibold
hover:scale-105 transition-transform duration-300 shadow-lg">

Reserve a Table

</a>

@else

<button
class="bg-gray-400 text-white px-8 py-3 rounded-xl text-lg font-semibold cursor-not-allowed">

Select Date & Time First

</button>

@endif

</div>

</div>

</div>

</section>
@endsection