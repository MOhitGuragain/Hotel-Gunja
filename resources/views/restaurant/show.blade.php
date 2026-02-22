@extends('layouts.app')

@section('content')
<section class="pt-24 pb-32 bg-gray-50 min-h-screen">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            {{-- LEFT SIDE IMAGE --}}
            <div class="rounded-2xl overflow-hidden shadow-2xl">
                <img src="{{ asset('storage/' . $restaurant->image) }}"
                     class="w-full h-[500px] object-cover">
            </div>

            {{-- RIGHT SIDE DETAILS --}}
            <div>

                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    {{ $restaurant->name }}
                </h1>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ $restaurant->description }}
                </p>

                {{-- Info Box --}}
                <div class="bg-white p-6 rounded-xl shadow-md mb-8 space-y-3">
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">
                            Cuisine
                        </span>
                        <span class="text-[#800020] font-semibold">
                            {{ $restaurant->cuisine_type ?? 'Multi Cuisine' }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">
                            Max Capacity
                        </span>
                        <span class="text-[#800020] font-semibold">
                            {{ $restaurant->max_capacity }} Guests
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700">
                            Opening Hours
                        </span>
                        <span class="text-[#800020] font-semibold">
                            10:00 AM - 10:00 PM
                        </span>
                    </div>
                </div>

                {{-- Booking Button --}}
                <a href="{{ route('restaurant.book', $restaurant->id) }}"
                   class="inline-block bg-gradient-to-r from-[#800020] to-[#600018]
                          text-white px-8 py-3 rounded-xl text-lg font-semibold
                          hover:scale-105 transition-transform duration-300 shadow-lg">
                    Reserve a Table
                </a>

            </div>
        </div>

    </div>

</section>
@endsection