@extends('layouts.app')

@section('content')

<section class="pt-24 pb-32 bg-gray-50">

<div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-16">

    {{-- IMAGE --}}
    <div class="relative group overflow-hidden rounded-2xl shadow-xl">
        <img src="{{ $room['img'] }}"
             class="w-full h-[520px] object-cover transition-transform duration-700 group-hover:scale-110">

        {{-- PRICE BADGE --}}
        <div class="absolute top-6 right-6 bg-[#D4AF37]
                    px-6 py-3 text-xl font-bold text-black
                    shadow-lg animate-fade-in">
            Rs. {{ $room['price'] }}
            <span class="text-sm font-normal">/night</span>
        </div>
    </div>

    {{-- CONTENT --}}
    <div>

        <p class="text-[#D4AF37] tracking-[0.3em] uppercase text-sm mb-4">
            Accommodation
        </p>

        <h1 class="text-4xl md:text-5xl font-bold mb-6"
            style="font-family:'Playfair Display', serif;">
            {{ $room['name'] }}
        </h1>

        <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mb-8"></div>

        <p class="text-lg text-gray-700 leading-relaxed mb-8"
           style="font-family:'Cormorant Garamond', serif;">
            {{ $room['description'] }}
        </p>

        {{-- INFO --}}
        <div class="flex flex-wrap gap-6 mb-10 text-gray-700">
            <span class="px-5 py-2 border rounded-full">
                {{ $room['guests'] }}
            </span>
            <span class="px-5 py-2 border rounded-full">
                {{ $room['size'] }}
            </span>
        </div>

        {{-- AMENITIES --}}
        <div class="mb-12">
            <h3 class="text-xl font-semibold mb-4">Amenities</h3>
            <ul class="grid grid-cols-2 gap-3 text-gray-600">
                @foreach($room['amenities'] as $amenity)
                    <li>✔ {{ $amenity }}</li>
                @endforeach
            </ul>
        </div>

        {{-- ACTION --}}
        <a href="{{ route('rooms.index') }}">
            <button class="relative overflow-hidden
                        bg-gradient-to-r from-[#800020] to-[#600018]
                        text-white px-10 py-4 rounded-md
                        uppercase tracking-widest
                        transition-all duration-500 group">

                <span class="relative z-10 flex items-center gap-3
                            group-hover:translate-x-2 transition">
                    Book This Room →
                </span>

                <span class="absolute inset-0 bg-gradient-to-r
                            from-[#600018] to-[#800020]
                            opacity-0 group-hover:opacity-100
                            transition-opacity duration-500"></span>
            </button>
        </a>

    </div>

</div>
</section>

@endsection
