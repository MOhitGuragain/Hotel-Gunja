@extends('admin.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10">

<h2 class="text-2xl font-bold mb-6">Restaurant Tables</h2>

<a href="{{ route('admin.restaurant-tables.create') }}"
class="bg-[#800020] text-white px-4 py-2 rounded">
Add Table
</a>

<table class="w-full mt-6 border">

<thead class="bg-gray-100">

<tr>
<th class="p-3">Restaurant</th>
<th class="p-3">Table Number</th>
<th class="p-3">Capacity</th>
<th class="p-3">Status</th>
<th class="p-3">Action</th>
</tr>

</thead>

<tbody>

@foreach($tables as $table)

<tr class="border-t">

<td class="p-3">{{ $table->restaurant->name }}</td>

<td class="p-3">{{ $table->table_number }}</td>

<td class="p-3">{{ $table->capacity }} Persons</td>

<td class="p-3">

@if($table->bookings->where('booking_status','approved')->count() > 0)

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
Reserved
</span>

@elseif($table->status)

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
Available
</span>

@else

<span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">
Unavailable
</span>

@endif

</td>

<td class="p-3">

<a href="{{ route('admin.restaurant-tables.edit',$table->id) }}"
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