@extends('layouts.app')

@section('content')
<section class="pt-24 pb-32 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center mb-14">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                Our Restaurants
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Experience fine dining and authentic flavors crafted
                by our expert chefs.
            </p>
        </div>

        {{-- Restaurant Grid --}}
        <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">

            @forelse($restaurants as $restaurant)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

                    {{-- Image --}}
                    <div class="h-56 overflow-hidden">
                        <img src="{{ asset('storage/' . $restaurant->image) }}"
                             class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2 text-gray-800">
                            {{ $restaurant->name }}
                        </h2>

                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($restaurant->description, 100) }}
                        </p>

                        <div class="flex justify-between items-center">
                            <span class="text-[#800020] font-semibold">
                                {{ $restaurant->cuisine_type ?? 'Multi Cuisine' }}
                            </span>

                            <a href="{{ route('restaurant.show', $restaurant->id) }}"
                               class="bg-[#800020] text-white px-4 py-2 rounded-lg
                                      hover:bg-[#600018] transition text-sm font-semibold">
                                View Details
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    No restaurants available at the moment.
                </div>
            @endforelse

        </div>

    </div>
</section>
@endsection