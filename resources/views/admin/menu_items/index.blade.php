@extends('admin.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10">

<h2 class="text-2xl font-bold mb-6">Menu Items</h2>

<a href="{{ route('admin.menu-items.create') }}"
class="bg-[#800020] text-white px-4 py-2 rounded">
Add Food Item
</a>

<table class="w-full mt-6 border">

<thead class="bg-gray-100">

<tr>
<th class="p-3">Category</th>
<th class="p-3">Name</th>
<th class="p-3">Price</th>
<th class="p-3">Status</th>
<th class="p-3">Action</th>
</tr>

</thead>

<tbody>

@foreach($items as $item)

<tr class="border-t">

<td class="p-3">{{ $item->category->name }}</td>

<td class="p-3">{{ $item->name }}</td>

<td class="p-3">Rs {{ $item->price }}</td>

<td class="p-3">
{{ $item->status ? 'Available' : 'Unavailable' }}
</td>

<td class="p-3">

<a href="{{ route('admin.menu-items.edit',$item->id) }}"
class="text-blue-600">
Edit
</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection