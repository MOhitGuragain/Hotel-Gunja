@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-10">

<h2 class="text-3xl font-bold mb-8">Homepage Image Manager</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">

@foreach($images as $img)

<div class="border rounded-lg p-6">

<h3 class="font-bold mb-4">{{ $img->section }}</h3>

@if($img->image)
<img src="{{ asset('storage/'.$img->image) }}" class="h-40 mb-4">
@endif

<form action="{{ route('admin.homepage-images.update',$img->id) }}" method="POST" enctype="multipart/form-data">
@csrf

<input type="file" name="image" class="mb-3">

<button class="bg-[#800020] text-white px-4 py-2 rounded">
Upload / Replace
</button>

</form>

@if($img->image)

<form action="{{ route('admin.homepage-images.delete',$img->id) }}" method="POST" class="mt-3">
@csrf
@method('DELETE')

<button class="bg-red-600 text-white px-4 py-2 rounded">
Delete Image
</button>

</form>

@endif

</div>

@endforeach

</div>

</div>

@endsection