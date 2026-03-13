@extends('admin.layouts.app')

@section('content')

<div class="max-w-xl mx-auto py-10">

<h2 class="text-2xl font-bold mb-6">Edit Restaurant Table</h2>

<form method="POST"
action="{{ route('admin.restaurant-tables.update',$table->id) }}">

@csrf
@method('PUT')

<div class="mb-4">

<label>Restaurant</label>

<select name="restaurant_id" class="w-full border p-2">

@foreach($restaurants as $restaurant)

<option value="{{ $restaurant->id }}"
@if($table->restaurant_id == $restaurant->id) selected @endif>

{{ $restaurant->name }}

</option>

@endforeach

</select>

</div>


<div class="mb-4">

<label>Table Number</label>

<input type="text"
name="table_number"
value="{{ $table->table_number }}"
class="w-full border p-2">

</div>


<div class="mb-4">

<label>Capacity</label>

<select name="capacity" class="w-full border p-2">

<option value="2" {{ $table->capacity == 2 ? 'selected' : '' }}>2</option>
<option value="4" {{ $table->capacity == 4 ? 'selected' : '' }}>4</option>
<option value="6" {{ $table->capacity == 6 ? 'selected' : '' }}>6</option>
<option value="8" {{ $table->capacity == 8 ? 'selected' : '' }}>8</option>

</select>

</div>


<div class="mb-4">

<label>Status</label>

<select name="status" class="w-full border p-2">

<option value="1" {{ $table->status ? 'selected' : '' }}>Available</option>
<option value="0" {{ !$table->status ? 'selected' : '' }}>Unavailable</option>

</select>

</div>


<button class="bg-[#800020] text-white px-6 py-2 rounded">
Update Table
</button>

</form>

</div>

@endsection