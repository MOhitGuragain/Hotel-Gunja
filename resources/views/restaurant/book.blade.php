@extends('layouts.app')

@section('content')

<section class="pt-24 pb-32 bg-gray-100 min-h-screen">

<div class="max-w-7xl mx-auto px-6">

@php
$availableTables = $tables->count();
$bookingDate = request('booking_date');
$timeSlot = $timeSlot ?? null;
@endphp

<div class="grid md:grid-cols-2 bg-white rounded-2xl shadow-2xl overflow-hidden">

{{-- LEFT PANEL --}}

<div class="bg-[#800020] text-white p-12 flex flex-col justify-center">

<h1 class="text-4xl font-bold mb-6">
Reserve a Table at <br>
{{ $restaurant->name }}
</h1>

<p class="text-gray-200 mb-6">
Enjoy a luxury dining experience. Choose your table,
select your preferred time and optionally pre-order food.
</p>

@if($bookingDate && $timeSlot)

<div class="bg-white text-[#800020] px-4 py-2 rounded mb-6 text-sm font-semibold w-fit">

Reservation:
{{ \Carbon\Carbon::parse($bookingDate)->format('M d, Y') }}

<br>

{{ \Carbon\Carbon::parse($timeSlot->start_time)->format('h:i A') }}
-
{{ \Carbon\Carbon::parse($timeSlot->end_time)->format('h:i A') }}

</div>

@endif

@if($availableTables > 0)

<div class="bg-green-500 text-white px-4 py-2 rounded mb-6 w-fit text-sm font-semibold">
{{ $availableTables }} Tables Available
</div>

@else

<div class="bg-red-500 text-white px-4 py-2 rounded mb-6 w-fit text-sm font-semibold">
No Tables Available
</div>

@endif

<ul class="space-y-3 text-gray-200">
<li>✔ Premium Dining</li>
<li>✔ Comfortable Seating</li>
<li>✔ Fast Online Reservation</li>
<li>✔ Pre-Order Your Meals</li>
</ul>

</div>

{{-- RIGHT PANEL --}}

<div class="p-10">

<h2 class="text-2xl font-bold mb-8 text-gray-800">
Restaurant Reservation
</h2>

@if($availableTables > 0)

<form method="POST"
action="{{ route('restaurant.book.store',$restaurant->id) }}"
class="space-y-6">

@csrf

<input type="hidden" name="booking_date" value="{{ $bookingDate }}">
<input type="hidden" name="time_slot_id" value="{{ $timeSlot->id }}">

{{-- TABLES --}}

<div>

<label class="block mb-2 font-semibold text-gray-700">
Select Table
</label>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">

@foreach($tables as $table)

<label class="cursor-pointer">

<input
type="radio"
name="table_id"
value="{{ $table->id }}"
class="hidden peer"
required>

<div class="border rounded-xl p-4 text-center
peer-checked:border-[#800020]
peer-checked:bg-[#fff5f7]
hover:shadow-lg transition">

<p class="font-bold text-lg text-[#800020]">
Table {{ $table->table_number }}
</p>

<p class="text-sm text-gray-500">
{{ $table->capacity }} Seats
</p>

</div>

</label>

@endforeach

</div>

</div>

{{-- GUESTS --}}

<div>

<label class="block mb-2 font-semibold text-gray-700">
Number of Guests
</label>

<select name="guests"
class="w-full border rounded-lg px-4 py-3"
required>

<option value="">Select Guests</option>
<option value="2">2 Guests</option>
<option value="4">4 Guests</option>
<option value="6">6 Guests</option>
<option value="8">8 Guests</option>

</select>

</div>

{{-- GUEST INFO --}}

<div class="grid grid-cols-2 gap-4">

<div>

<label class="block mb-1 font-semibold text-gray-700">
Guest Name
</label>

<input
type="text"
name="guest_name"
value="{{ old('guest_name') }}"
class="w-full border rounded-lg px-4 py-3"
required>

</div>

<div>

<label class="block mb-1 font-semibold text-gray-700">
Contact Number
</label>

<input
type="text"
name="contact_number"
value="{{ old('contact_number') }}"
class="w-full border rounded-lg px-4 py-3"
required>

</div>

</div>

{{-- FOOD MENU --}}

<div class="mt-10">

<h2 class="text-xl font-bold mb-6 text-gray-800">
Pre-Order Food (Optional)
</h2>

@foreach($menuCategories as $category)

<div class="mb-6">

<h3 class="font-semibold text-[#800020] mb-3">
{{ $category->name }}
</h3>

<div class="space-y-3">

@foreach($category->menuItems as $item)

<div class="flex justify-between items-center border p-3 rounded-lg">

<div>

<p class="font-semibold">
{{ $item->name }}
</p>

<p class="text-sm text-gray-500">
{{ $item->description }}
</p>

<p class="text-sm text-[#800020] font-semibold">
Rs {{ $item->price }}
</p>

</div>

<input
type="number"
name="food_items[{{ $item->id }}]"
min="0"
value="0"
class="w-20 border rounded px-2 py-1">

</div>

@endforeach

</div>

</div>

@endforeach

</div>

<button
type="submit"
class="w-full bg-[#800020] text-white py-3 rounded-xl
font-semibold text-lg hover:bg-[#5e0018]
transition shadow-lg">

Confirm Reservation

</button>

</form>

@else

<div class="text-center text-gray-600">
No tables available for this date and time.
</div>

@endif

</div>

</div>

</div>

</section>

@endsection