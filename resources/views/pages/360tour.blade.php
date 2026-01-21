@extends('layouts.app')

@section('content')

<section class="relative min-h-screen bg-black flex items-center justify-center">

    <div class="w-full max-w-7xl mx-auto px-4">

        <div class="text-center mb-10">
            <h1 class="text-4xl sm:text-5xl font-bold text-white"
                style="font-family: 'Playfair Display', serif;">
                360° Image Tour
            </h1>

            <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto my-6"></div>

            <p class="text-gray-300 text-lg max-w-3xl mx-auto"
               style="font-family: 'Cormorant Garamond', serif;">
                Explore Hotel Gunja through an immersive 360° virtual experience.
            </p>
        </div>

        <div class="w-full h-[80vh] rounded-xl overflow-hidden border border-white/10 shadow-2xl">
            <iframe
                src="https://www.google.com/maps/embed?pb=!4v1768565020449!6m8!1m7!1sfkcs695r0YBuKzkW_Dwlcg!2m2!1d26.99965031083459!2d85.90302010613728!3f110.64935191261227!4f-4.168787514254035!5f0.7820865974627469"
                class="w-full h-full border-0"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>

</section>

@endsection
