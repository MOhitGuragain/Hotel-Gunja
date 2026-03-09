@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto p-6">

<h2 class="text-2xl font-bold mb-6">
Add Food Order (Booking #{{ $booking->id }})
</h2>

<form method="POST"
action="{{ route('admin.orders.store',$booking->id) }}">
@csrf

<table class="w-full border">

<tr class="bg-gray-100">
<th class="p-2">Item</th>
<th class="p-2">Price</th>
<th class="p-2">Quantity</th>
</tr>

@foreach($menuItems as $item)

<tr>
<td class="p-2">{{ $item->name }}</td>
<td class="p-2">Rs {{ $item->price }}</td>

<td class="p-2">
<input type="number"
name="items[{{ $item->id }}]"
value="0"
min="0"
class="border p-1 w-20">
</td>
</tr>

@endforeach

</table>

<button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">
Add Food
</button>

</form>

</div>

@endsection