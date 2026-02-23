@extends('layouts.app')

@section('content')
<section class="pt-24 pb-32 bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-6">

        {{-- Hall Image --}}
        <div class="rounded-2xl overflow-hidden shadow-lg mb-8">
            <img src="{{ asset('storage/' . $hall->image) }}"
                 class="w-full h-96 object-cover">
        </div>

        {{-- Hall Details --}}
        <div class="bg-white p-8 rounded-2xl shadow-lg">

            <h1 class="text-3xl font-bold text-gray-800 mb-4">
                {{ $hall->name }}
            </h1>

            <p class="text-gray-600 mb-4">
                {{ $hall->description }}
            </p>

            <div class="flex justify-between items-center mb-6">
                <span class="text-[#800020] font-semibold text-lg">
                    Capacity: {{ $hall->min_capacity }} - {{ $hall->max_capacity }} Persons
                </span>
            </div>

            <a href="{{ route('event-halls.book', $hall->id) }}"
               class="bg-[#800020] text-white px-6 py-3 rounded-lg
                      hover:bg-[#600018] transition font-semibold">
                Book This Hall
            </a>

        </div>

    </div>
</section>
@endsection