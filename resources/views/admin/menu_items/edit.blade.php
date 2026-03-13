@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto py-10">

<h2 class="text-2xl font-bold mb-6">Edit Food Item</h2>

<form method="POST"
action="{{ route('admin.menu-items.update',$item->id) }}">

@csrf
@method('PUT')

<div class="mb-4">

<label>Category</label>

<select name="menu_category_id" class="w-full border p-2">

@foreach($categories as $category)

<option value="{{ $category->id }}"
@if($item->menu_category_id == $category->id) selected @endif>

{{ $category->name }}

</option>

@endforeach

</select>

</div>


<div class="mb-4">

<label>Name</label>

<input type="text"
name="name"
value="{{ $item->name }}"
class="w-full border p-2">

</div>


<div class="mb-4">

<label>Description</label>

<textarea name="description"
class="w-full border p-2">

{{ $item->description }}

</textarea>

</div>


<div class="mb-4">

<label>Price</label>

<input type="number"
name="price"
value="{{ $item->price }}"
class="w-full border p-2">

</div>


<div class="mb-4">

<label>Status</label>

<select name="status" class="w-full border p-2">

<option value="1" {{ $item->status ? 'selected' : '' }}>
Available
</option>

<option value="0" {{ !$item->status ? 'selected' : '' }}>
Unavailable
</option>

</select>

</div>


<button class="bg-[#800020] text-white px-6 py-2 rounded">

Update Food Item

</button>

</form>

</div>

@endsection