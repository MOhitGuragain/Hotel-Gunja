@extends('admin.layouts.app')

@section('content')

<div class="max-w-xl mx-auto py-10">

<h2 class="text-2xl font-bold mb-6">Add Restaurant Table</h2>

<form method="POST" action="{{ route('admin.restaurant-tables.store') }}">

@csrf

<div class="mb-4">

<label>Restaurant</label>

<select name="restaurant_id" class="w-full border p-2">

@foreach($restaurants as $restaurant)

<option value="{{ $restaurant->id }}">
{{ $restaurant->name }}
</option>

@endforeach

</select>

</div>


<div class="mb-4">

<label>Table Number</label>

<input type="text"
name="table_number"
class="w-full border p-2">

</div>


<div class="mb-4">

<label>Capacity</label>

<select name="capacity" class="w-full border p-2">

<option value="2">2 Persons</option>
<option value="4">4 Persons</option>
<option value="6">6 Persons</option>
<option value="8">8 Persons</option>

</select>

</div>


<div class="mb-4">

<label>Status</label>

<select name="status" class="w-full border p-2">

<option value="1">Available</option>
<option value="0">Unavailable</option>

</select>

</div>


<button class="bg-[#800020] text-white px-6 py-2 rounded">
Save Table
</button>

</form>

</div>

@endsection