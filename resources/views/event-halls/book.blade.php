@extends('layouts.app')

@section('content')

<section class="pt-24 pb-32 bg-gray-50 min-h-screen">

<div class="max-w-3xl mx-auto px-6">

{{-- Success --}}
@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
{{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-xl p-10">

<h2 class="text-3xl font-bold text-gray-800 mb-2">
Book {{ $hall->name }}
</h2>

<p class="text-gray-500 mb-4">
Capacity: <strong>{{ $hall->max_capacity }} Guests</strong>
</p>

<p class="text-gray-500 mb-8">
Fill in the details below to reserve this event hall.
</p>

<form action="{{ route('event-halls.store', $hall->id) }}"
method="POST"
enctype="multipart/form-data"
class="space-y-6">

@csrf

{{-- Event Date --}}

<div>

<label class="block text-gray-700 font-semibold mb-2">
Event Date
</label>

<input type="date"
name="event_date"
value="{{ request('event_date') ?? old('event_date') }}"
min="{{ date('Y-m-d') }}"
class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
required>

</div>

{{-- Number of Guests --}}

<div>

<label class="block text-gray-700 font-semibold mb-2">
Number of Guests
</label>

<input type="number"
name="guests"
value="{{ old('guests') }}"
min="1"
max="{{ $hall->max_capacity }}"
class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
placeholder="Enter expected guests"
required>

<p class="text-sm text-gray-500 mt-1">
Maximum capacity: {{ $hall->max_capacity }} guests
</p>

</div>

{{-- Guest Name --}}

<div>

<label class="block text-gray-700 font-semibold mb-2">
Your Name
</label>

<input type="text"
name="guest_name"
value="{{ old('guest_name') }}"
class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
placeholder="Full Name"
required>

</div>

{{-- Contact Number --}}

<div>

<label class="block text-gray-700 font-semibold mb-2">
Contact Number
</label>

<input type="text"
name="contact_number"
value="{{ old('contact_number') }}"
class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
placeholder="Phone Number"
required>

</div>

{{-- ID Image --}}

<div>

<label class="block text-gray-700 font-semibold mb-2">
ID Image (Optional)
</label>

<input type="file"
name="id_image"
class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none">

</div>

{{-- Submit --}}

<div>

<button type="submit"
class="w-full bg-[#800020] text-white py-3 rounded-lg font-semibold text-lg hover:bg-[#600018] transition duration-300">

Submit Booking

</button>

</div>

</form>

</div>

</div>

</section>
@endsection
