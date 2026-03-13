@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto py-10">

<h2 class="text-2xl font-bold mb-6">Add Food Item</h2>

<form method="POST" action="{{ route('admin.menu-items.store') }}">

@csrf

<div class="mb-4">

<label>Category</label>

<select name="menu_category_id" class="w-full border p-2">

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach

</select>

</div>


<div class="mb-4">

<label>Name</label>

<input type="text" name="name"
class="w-full border p-2">

</div>


<div class="mb-4">

<label>Description</label>

<textarea name="description"
class="w-full border p-2"></textarea>

</div>


<div class="mb-4">

<label>Price</label>

<input type="number" name="price"
class="w-full border p-2">

</div>


<div class="mb-4">

<label>Status</label>

<select name="status" class="w-full border p-2">
<option value="1">Available</option>
<option value="0">Unavailable</option>
</select>

</div>


<button class="bg-[#800020] text-white px-6 py-2 rounded">

Save Food Item

</button>

</form>

</div>

@endsection