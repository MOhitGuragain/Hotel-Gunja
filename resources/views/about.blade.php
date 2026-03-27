@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<!-- HERO SECTION -->
<section class="relative h-[60vh] flex items-center justify-center text-white">
<div class="absolute inset-0 bg-cover bg-center"
     style="background-image: url('{{ asset('images/luxury_escape.jpg') }}');">
</div>
    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative text-center px-6">
        <h1 class="text-5xl md:text-6xl font-bold mb-4">About Us</h1>
        <p class="text-xl text-gray-200">Experience Luxury, Comfort & Tradition</p>
    </div>
</section>

<!-- ABOUT CONTENT -->
<div class="max-w-6xl mx-auto px-6 py-20">

    <div class="bg-white rounded-2xl shadow-lg p-10">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center" >
            About Hotel Gunja Pvt. Ltd.
        </h2>

        <p class="mb-6 text-lg text-gray-700 leading-relaxed text-justify">
            Hotel Gunja Pvt. Ltd. is a well-established hospitality destination located approximately
            1.3 kilometers north of Bardibas Chowk, the main entry point of the B.P. Highway.
            Its strategic location makes it an ideal stop for travelers, tourists, and business
            visitors commuting along this important route.
        </p>

        <p class="mb-6 text-lg text-gray-700 leading-relaxed text-justify">
            Established in early 2020, the hotel was founded by
            <a href="https://www.linkedin.com/in/gunja-b-karki/"><strong class="text-[#800020]">   Mr. Gunja Bahadur Karki (Gopal) </strong></a> 
            with a vision to provide quality accommodation
            and warm hospitality in the region.
        </p>

        <p class="mb-6 text-lg text-gray-700 leading-relaxed text-justify">
            The hotel offers <strong>38 well-appointed rooms</strong> including Suite, Deluxe, and Standard categories,
            along with a family dining restaurant and a multipurpose hall for events and gatherings.
        </p>

        <p class="text-lg text-gray-700 leading-relaxed text-justify">
            Combining modern facilities with traditional hospitality, we ensure every guest enjoys a memorable stay.
        </p>
        {{-- <p class="mb-6 text-lg text-gray-700 leading-relaxed">
             Hotel Gunja Pvt. Ltd. is a well-established hospitality destination located approximately
            1.3 kilometers north of Bardibas Chowk, the main entry point of the B.P. Highway.
            Its strategic location makes it an ideal stop for travelers, tourists, and business
            visitors commuting along this important route.<br>
             Established in early 2020, the hotel was founded by
            <strong class="text-[#800020]">Gunja Bahadur Karki</strong> with a vision to provide quality accommodation
            and warm hospitality in the region.<br>
            The hotel offers <strong>38 well-appointed rooms</strong> including Suite, Deluxe, and Standard categories,
            along with a family dining restaurant and a multipurpose hall for events and gatherings.<br>
             Combining modern facilities with traditional hospitality, we ensure every guest enjoys a memorable stay.
             </p> --}}
    </div>

    <!-- STATS SECTION -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 text-center">
        <div class="bg-[#800020] text-white p-6 rounded-xl shadow">
            <h3 class="text-3xl font-bold">38+</h3>
            <p>Rooms</p>
        </div>
        <div class="bg-[#800020] text-white p-6 rounded-xl shadow">
            <h3 class="text-3xl font-bold">2020</h3>
            <p>Established</p>
        </div>
        <div class="bg-[#800020] text-white p-6 rounded-xl shadow">
            <h3 class="text-3xl font-bold">100%</h3>
            <p>Guest Satisfaction</p>
        </div>
        <div class="bg-[#800020] text-white p-6 rounded-xl shadow">
            <h3 class="text-3xl font-bold">24/7</h3>
            <p>Service</p>
        </div>
    </div>

</div>

<!-- CHAIRMAN SECTION -->
<section class="bg-gradient-to-r from-gray-100 to-gray-50 py-20">

    <div class="max-w-5xl mx-auto text-center px-6">

        <h2 class="text-4xl font-bold text-gray-800 mb-6">
            Message from the Chairman
        </h2>

        <!-- IMAGE -->
        <div class="flex justify-center mb-6">
             <a href="https://www.linkedin.com/in/gunja-b-karki/">
                 <img src="{{ asset('images/chairman.jpg') }}"
                 class="w-52 h-52 object-cover rounded-full border-4 border-[#D4AF37] shadow-xl">
            </a>
        </div>
        <a href="https://www.linkedin.com/in/gunja-b-karki/">
            <h3 class="text-2xl font-semibold text-gray-800">
                 Mr. Gunja Bahadur Karki (Gopal) 
            </h3>
        </a>
        <p class="text-[#D4AF37] mb-8">Chairman</p>

        <!-- MESSAGE CARD -->
        <div class="bg-white p-10 rounded-2xl shadow-lg text-left space-y-6 text-gray-700 text-lg leading-relaxed">

            <p class="text-justify">
                It is my great honor and privilege to welcome you to Hotel Gunja Pvt. Ltd.
            </p>

            <p class="text-justify">
                Since our establishment in early 2020, we have been driven by a simple yet meaningful vision—
                to create a place where every guest feels valued, comfortable, and truly at home.
            </p>

            <p class="text-justify">
                Located along the gateway of the B.P. Highway, our hotel serves as a trusted destination
                for travelers from near and far.
            </p>

            <p class="text-justify">
                This journey would not have been possible without the support of my family
                and the dedication of our hardworking team.
            </p>

            <p class="text-justify">
                We do not just offer a place to stay; we offer an experience defined by warmth,
                trust, and lasting memories.
            </p>

            <div class="pt-6">
                <p class="font-semibold">Warm regards,</p>
                <a href="https://www.linkedin.com/in/gunja-b-karki/"> <p class="text-xl font-bold">Gunja Bahadur Karki (Gopal)</p></a>
                <p class="text-gray-600">Chairman, Hotel Gunja Pvt. Ltd.</p>
            </div>

        </div>

    </div>
</section>

@endsection