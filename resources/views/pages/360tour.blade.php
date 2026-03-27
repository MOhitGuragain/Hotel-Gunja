@extends('layouts.app')

@section('content')

<section class="relative min-h-screen bg-black flex items-center justify-center">

    <div class="w-full max-w-7xl mx-auto px-4">

        {{-- Heading --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl sm:text-5xl font-bold text-white"
                style="font-family: 'Playfair Display', serif;">
                360 Image Tour
            </h1>

            <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto my-6"></div>

            <p class="text-gray-300 text-lg max-w-3xl mx-auto"
               style="font-family: 'Cormorant Garamond', serif;">
                Explore Hotel Gunja through an immersive 360 virtual experience.
            </p>
        </div>

        {{-- SCENE HOVER BUTTONS --}}
<div class="flex justify-center">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">

        @for ($i = 1; $i <= 10; $i++)
            <button
                type="button"
                data-scene="scene{{ $i }}"
                class="group relative px-6 py-4
                       rounded-xl
                       border border-white/20
                       text-white text-sm tracking-wide
                       transition-all duration-300
                       hover:border-[#D4AF37]
                       hover:bg-[#D4AF37]/10
                       hover:text-[#D4AF37]
                       active:scale-95">

                <span class="relative z-10">
                    Scene {{ $i }}
                </span>

                {{-- Hover Glow --}}
                <span class="absolute inset-0 rounded-xl
                             opacity-0 group-hover:opacity-100
                             transition-opacity duration-300
                             bg-gradient-to-br from-[#D4AF37]/20 to-transparent">
                </span>
            </button>
        @endfor

    </div>
</div>

    </div>

</section>

@endsection