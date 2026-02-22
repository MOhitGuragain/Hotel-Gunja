@extends('layouts.app')

@section('content')

<section class="relative h-screen w-screen overflow-hidden">

    {{-- Background Video with Add smooth fade-in when video starts--}}
<video
    id="bgVideo"
    autoplay
    muted
    loop
    playsinline
    preload="none"
    class="absolute top-1/2 left-1/2 w-full h-full
           -translate-x-1/2 -translate-y-1/2 object-cover
           opacity-0 transition-opacity duration-1000"
>
    <source src="{{ asset('videos/bgvideo.mp4') }}" type="video/mp4">
</video>


    {{-- Dark Overlay --}}
    <div class="absolute inset-0 bg-black/50 z-10"></div>

    {{-- CONTACT INFO OVERLAY (BOTTOM OF VIDEO) --}}
    <div class="absolute bottom-0 left-0 w-full z-20 ">
        <div class="max-w-7xl mx-auto px-6 py-4
                    flex flex-col md:flex-row
                    justify-between items-start md:items-center
                    gap-6 text-white">

            {{-- Left Info --}}
            <div class="flex flex-col sm:flex-row gap-6">
                <div>
                    <label class="block text-xs uppercase tracking-widest font-semibold opacity-100">
                        call us
                    </label>
                    <span class="text-sm">
                        +977-044-550620, 9800000000
                    </span>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-widest font-semibold opacity-100">
                        mail us
                    </label>
                    <span class="text-sm">
                        hotelgunja@gmail.com<br>
                        info@hotelgunja.com.np
                    </span>
                </div>
            </div>

            {{-- Right Direction --}}
            <div class="flex items-center gap-3">
                <label class="text-xs uppercase tracking-widest font-semibold opacity-100">
                    get direction
                </label>
                <a href="https://maps.app.goo.gl/1EBcCpF1Pb2kAHWS7"
                   target="_blank"
                   class="w-10 h-10 flex items-center justify-center
                      rounded-full border border-white/40
                      hover:bg-[#D4AF37] hover:text-black
                      transition-all duration-300">
                    {{-- Location Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24"
                         class="w-5 h-5 fill-current">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z"></path>
                    </svg>
                </a>
            </div>

        </div>
    </div>


    {{-- Hero Content --}}
    <div class="relative z-30 flex flex-col items-center justify-center h-full text-center px-4 max-w-6xl mx-auto">
        <div class="mb-6 inline-block">
            <div class="w-16 h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent mb-4 mx-auto"></div>
        <p class="text-[#D4AF37] tracking-[0.3em] text-xs sm:text-sm uppercase mb-6"
           style="font-family: 'Cormorant Garamond', serif;">
            Welcome to Luxury
        </p>

        <h1 class="text-4xl sm:text-6xl md:text-8xl font-bold mb-8 animate-fade-in text-white"
            style="font-family: 'Playfair Display', serif;">
            Hotel Gunja
        </h1>

        <p class="text-base sm:text-xl md:text-3xl mb-12 text-gray-200"
           style="font-family: 'Cormorant Garamond', serif;">
            Where Elegance Meets Exceptional Service
        </p>

        <div class="flex flex-col sm:flex-row gap-5 sm:gap-6">

            <a href="{{ url('/rooms') }}">
                <button
                    class="w-full sm:w-auto px-10 py-4 text-lg rounded-md bg-gradient-to-r from-[#800020] to-[#600018]
                           text-white border-2 border-[#D4AF37]/30
                           hover:from-[#600018] hover:to-[#800020] transition-all duration-300">
                    Reserve Your Stay
                </button>
            </a>

            <a href="{{ url('/rooms') }}">
                <button
                    class="w-full sm:w-auto px-10 py-4 text-lg rounded-md border-2 border-[#D4AF37]
                           text-white hover:bg-[#D4AF37] hover:text-black transition-all duration-300">
                    Explore Our Suites
                </button>
            </a>

        </div>
    </div>

</section>

{{-- Exceptional Luxury Awaits --}}
<section class="relative py-20 sm:py-24 px-4 bg-white overflow-hidden">

    {{-- Subtle Gold Gradient Accent --}}
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-[#D4AF37]/5 to-transparent"></div>

    <div class="max-w-4xl mx-auto text-center relative z-10">

        {{-- Icon --}}
        <div class="mb-6">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-12 w-12 text-[#D4AF37] mx-auto mb-4"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/>
                <path d="M20 3v4"/>
                <path d="M22 5h-4"/>
                <path d="M4 17v2"/>
                <path d="M5 18H3"/>
            </svg>

            {{-- Heading --}}
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-6"
                style="font-family: 'Playfair Display', serif;">
                Comfortable Stays Begin Here
            </h2>

            {{-- Divider --}}
            <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto mb-8"></div>
        </div>

        {{-- Description --}}
        <p class="text-lg sm:text-xl text-gray-600 leading-relaxed"
           style="font-family: 'Cormorant Garamond', serif;">
            {{-- Nestled in the heart of the city, Hotel Gunja Pvt. Ltd. offers an unparalleled blend
            of sophistication, comfort, and world-class service. Every detail is thoughtfully
            designed to exceed expectations and create unforgettable memories. --}}


            Nestled in the heart of the Bardibas city, Hotel Gunja Pvt. Ltd. redefines luxury through timeless
            elegance, personalized comfort, and exceptional hospitality where every stay becomes 
            a memorable experience.

        </p>

    </div>
</section>


{{-- Room card section --}}
{{-- ===== ACCOMMODATION SECTION ===== --}}
<section class="py-24 px-4 bg-gradient-to-b from-gray-50 to-white relative">

    <div class="max-w-7xl mx-auto">

        {{-- SECTION HEADER --}}
        <div class="text-center mb-16">
            <p class="text-[#D4AF37] tracking-[0.3em] text-sm uppercase mb-4"
               style="font-family: 'Cormorant Garamond', serif;">
                Accommodation
            </p>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6"
                style="font-family: 'Playfair Display', serif;">
                Our Rooms & Suites
            </h2>

            <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto mb-6"></div>

            <p class="text-lg text-gray-600 max-w-2xl mx-auto"
               style="font-family: 'Cormorant Garamond', serif;">
                Experience thoughtfully designed accommodations that make every stay pleasant and comfortable.
            </p>
        </div>

        {{-- ROOM CARDS GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- CARD --}}
            @php
                $rooms = [
                    ['name'=>'Presidential Suite','price'=>'15,000','img'=>'https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800','guests'=>'4 Guests','size'=>'1200 sq ft'],
                    ['name'=>'Suite','price'=>'8,000','img'=>'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800','guests'=>'3 Guests','size'=>'800 sq ft'],
                    ['name'=>'Super Deluxe','price'=>'5,500','img'=>'https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=800','guests'=>'3 Guests','size'=>'500 sq ft'],
                    ['name'=>'Deluxe','price'=>'4,000','img'=>'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=800','guests'=>'2 Guests','size'=>'400 sq ft'],
                    ['name'=>'Family Room','price'=>'6,500','img'=>'https://images.unsplash.com/photo-1560185127-6a7e7c5b8f6c?w=800','guests'=>'5 Guests','size'=>'650 sq ft'],
                    ['name'=>'Twin Bed Room','price'=>'4,500','img'=>'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?w=800','guests'=>'2 Guests','size'=>'380 sq ft'],
                ];
            @endphp

            @foreach($rooms as $room)
            <div class="group bg-white rounded-xl overflow-hidden
                        border border-gray-200
                        transition-all duration-500 ease-out
                        hover:-translate-y-3
                        hover:shadow-[0_30px_60px_-15px_rgba(212,175,55,0.25)]
                        hover:border-[#D4AF37]/50">

                {{-- IMAGE --}}
                <div class="relative h-72 overflow-hidden group">
                    <img src="{{ $room['img'] }}"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                    {{-- PRICE BADGE --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent"></div>

                    <div class="absolute top-4 right-4 bg-[#D4AF37] px-4 py-2 font-bold text-[#1a1a1a] animate-fade-in">
                        Rs.{{ $room['price'] }} <span class="text-sm font-normal">/night</span>
                    </div>
                </div>

                {{-- CONTENT (View Details)--}}
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2"
                        style="font-family:'Playfair Display', serif;">
                        {{ $room['name'] }}
                    </h3>

                    <div class="flex justify-between text-sm text-gray-600 mb-6">
                        <span>{{ $room['guests'] }}</span>
                        <span class="text-[#D4AF37]">{{ $room['size'] }}</span>
                    </div>

                    <a href="{{ route('rooms.index') }}">
                        <button class="w-full relative overflow-hidden
                                        bg-gradient-to-r from-[#800020] to-[#600018]
                                        text-white py-3 rounded-md uppercase tracking-widest
                                        transition-all duration-500 group">

                        <span class="relative z-10 flex items-center justify-center gap-2
                                    transition-transform duration-500
                                    group-hover:translate-x-2">
                            View Details
                            <span class="text-lg">→</span>
                        </span>

                        <span class="absolute inset-0 bg-gradient-to-r
                                    from-[#600018] to-[#800020]
                                    opacity-0 group-hover:opacity-100
                                    transition-opacity duration-500"></span>
                        </button>
                    </a>
                </div>
            </div>
            @endforeach

        </div>

        {{-- EXPLORE ALL --}}
        <div class="text-center mt-16">
            <a href="{{ route('rooms.index') }}">
                <button class="border-2 border-[#800020] text-[#800020]
                               hover:bg-[#800020] hover:text-white
                               px-8 py-4 text-lg rounded-md transition group">
                    Explore All Accommodations →
                </button>
            </a>
        </div>

    </div>
</section>


{{-- ===== AMENITIES SECTION (Elegant AI – Exact) ===== --}}
<section id="amenities" class="relative py-24 bg-white overflow-hidden scroll-mt-24">

    {{-- Background Pattern --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNENEFGMzciIGZpbGwtb3BhY2l0eT0iMC4wMyI+PHBhdGggZD0iTTM2IDE4YzAtOS45NC04LjA2LTE4LTE4LTE4UzAgOC4wNiAwIDE4czguMDYgMTggMTggMTggMTgtOC4wNiAxOC0xOHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-40"></div>

    <div class="relative max-w-7xl mx-auto px-4">

        {{-- Header --}}
        <div class="text-center mb-16">
            <p class="text-[#D4AF37] tracking-[0.3em] uppercase text-sm mb-4">
                Amenities
            </p>

            <h2 class="text-4xl md:text-5xl font-bold mb-6"
                style="font-family:'Playfair Display', serif;">
                Elevated Comfort & Services
            </h2>

            <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto mb-6"></div>

            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{-- Experience thoughtful details that make your stay truly special. --}}
                Every comfort chosen to make you feel at ease.
            </p>
        </div>

        {{-- Amenities Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @php
                $amenities = [
                    ['Swimming Pool','Outdoor heated pool','waves'],
                    ['Spa & Wellness','Full-service spa','sparkles'],
                    ['Fitness Center','24/7 gym access','dumbbell'],
                    ['Restaurant','Fine dining','utensils-crossed'],
                    ['Free WiFi','High-speed internet','wifi'],
                    ['Room Service','24-hour service','concierge-bell'],
                    ['Parking','Free valet parking','car'],
                    ['Conference Hall','Event spaces','users'],
                    ['Airport Transfer','Complimentary shuttle','plane'],
                    ['Bar & Lounge','Premium beverages','wine'],
                    ['Laundry Service','Same-day service','shirt'],
                    ['Concierge','24/7 assistance','info'],
                ];
            @endphp

            @foreach($amenities as [$title,$desc,$icon])
            <div class="rounded-xl text-center bg-white shadow
                        border-2 border-transparent
                        hover:border-[#D4AF37]/30
                        transition-all duration-300 group">

                <div class="p-6 pt-8 pb-8">

                    {{-- Icon Container --}}
                    <div class="bg-gradient-to-br from-[#800020]/10 to-[#D4AF37]/10
                                w-20 h-20 rounded-2xl
                                flex items-center justify-center
                                mx-auto mb-4
                                transition-transform duration-300
                                group-hover:scale-110">

                        {{-- ICON --}}
                        @includeIf('icons.' . $icon)

                    </div>

                    <h3 class="font-semibold text-gray-900 mb-2 text-lg"
                        style="font-family:'Playfair Display', serif;">
                        {{ $title }}
                    </h3>

                    <p class="text-sm text-gray-600">
                        {{ $desc }}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


{{-- ===== UPCOMING EVENTS SECTION ===== --}}
<section class="py-24 px-4 bg-gradient-to-b from-white to-gray-50">

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="text-center mb-16">
            <p class="text-[#D4AF37] tracking-[0.3em] text-sm uppercase mb-4">
                Events
            </p>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6"
                style="font-family: 'Playfair Display', serif;">
                Upcoming Events
            </h2>

            <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto mb-6"></div>

            {{-- <p class="text-lg text-gray-600 max-w-2xl mx-auto"
               style="font-family: 'Cormorant Garamond', serif;">
                Discover special events and experiences happening at our hotel.
            </p> --}}
        </div>

        {{-- Events Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($events as $event)
            <div class="group bg-white rounded-xl overflow-hidden
                        border border-gray-200
                        transition-all duration-500
                        hover:-translate-y-3
                        hover:shadow-[0_25px_50px_-15px_rgba(212,175,55,0.25)]
                        hover:border-[#D4AF37]/40">

                {{-- Image (optional placeholder) --}}
                {{-- <div class="relative h-56 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=800"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent"></div>

                    {{-- Date Badge --}}
                    {{-- <div class="absolute top-4 right-4 bg-[#D4AF37] px-4 py-2 font-bold text-black">
                        {{ \Carbon\Carbon::parse($event->event_date)->format('M d') }}
                    </div>
                </div> --}} 

                {{-- Content --}}
                <div class="p-6 " >

                    <h3 class="text-2xl font-semibold mb-2"
                        style="font-family:'Playfair Display', serif;">
                        {{ $event->title }}
                    </h3>

                    <p class="text-sm text-gray-500 mb-2">
                        📍 {{ $event->location ?? 'Hotel Gunja' }}
                    </p>

                    <p class="text-gray-600 mb-4 max-h-20 overflow-hidden">
                        {{ $event->description }}
                    </p>

                    <p class="text-[#D4AF37] font-semibold">
                        {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}
                    </p>

                </div>
            </div>

            @empty

            {{-- Empty Message --}}
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500 text-lg">
                    No upcoming events available.
                </p>
            </div>

            @endforelse

        </div>
    </div>
</section>

{{-- RESTURANTS & DINING --}}
<section class="py-24 px-4 bg-gradient-to-b from-white to-gray-50">

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="text-center mb-16">
            <p class="text-[#D4AF37] tracking-[0.3em] text-sm uppercase mb-4">
                Experience
            </p>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6"
                style="font-family: 'Playfair Display', serif;">
                Restaurant & Dining
            </h2>

            <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto mb-6"></div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Card 1 -->
            <div class="rounded-xl shadow overflow-hidden border-2 border-transparent hover:border-[#D4AF37]/30 flex flex-col">
                <div class="relative h-64 overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-3">Fine Dining Restaurant</h3>

                    <p class="text-gray-600 mb-4">
                        Savor world-class cuisine prepared by expert chefs.
                        Enjoy local delicacies and international dishes in a luxury setting.
                    </p>

                    <ul class="text-sm text-gray-600 space-y-1 mb-5">
                        <li>Breakfast: 7:00 AM – 10:30 AM</li>
                        <li>Lunch: 12:00 PM – 3:00 PM</li>
                        <li>Dinner: 7:00 PM – 11:00 PM</li>
                        <li>In-Room Dining Available</li>
                    </ul>

                    <a href="#"
                       class="mt-auto inline-block bg-[#800020] text-white px-4 py-2 rounded hover:bg-[#600018] text-center">
                        Book Now
                    </a>
                </div>
            </div>


            <!-- Card 2 -->
            <div class="rounded-xl shadow overflow-hidden border-2 border-transparent hover:border-[#D4AF37]/30 flex flex-col">
                <div class="relative h-64 overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-3">Dining Hall</h3>

                    <p class="text-gray-600 mb-4">
                        Spacious dining hall perfect for families and groups.
                        Enjoy a relaxed atmosphere and delicious meals.
                    </p>

                    <ul class="text-sm text-gray-600 space-y-1 mb-5">
                        <li>Breakfast: 7:00 AM – 10:30 AM</li>
                        <li>Lunch: 12:00 PM – 3:00 PM</li>
                        <li>Dinner: 6:30 PM – 10:30 PM</li>
                        <li>Group Seating Available</li>
                    </ul>

                    <a href="#"
                       class="mt-auto inline-block bg-[#800020] text-white px-4 py-2 rounded hover:bg-[#600018] text-center">
                        Book Now
                    </a>
                </div>
            </div>


            <!-- Card 3 -->
            <div class="rounded-xl shadow overflow-hidden border-2 border-transparent hover:border-[#D4AF37]/30 flex flex-col">
                <div class="relative h-64 overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-3">Private Dining</h3>

                    <p class="text-gray-600 mb-4">
                        Exclusive private dining rooms for celebrations
                        and special occasions with personalized service.
                    </p>

                    <ul class="text-sm text-gray-600 space-y-1 mb-5">
                        <li>Private Rooms Available</li>
                        <li>Advance Booking Required</li>
                        <li>Custom Menu Options</li>
                        <li>VIP Service Available</li>
                    </ul>

                    <a href="#"
                       class="mt-auto inline-block bg-[#800020] text-white px-4 py-2 rounded hover:bg-[#600018] text-center">
                        Book Now
                    </a>
                </div>
            </div>


            <!-- Card 4 -->
            <div class="rounded-xl shadow overflow-hidden border-2 border-transparent hover:border-[#D4AF37]/30 flex flex-col">
                <div class="relative h-64 overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1544148103-0773bf10d330?w=800"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-3">Bar & Lounge</h3>

                    <p class="text-gray-600 mb-4">
                        Relax and unwind with premium drinks
                        in a cozy and stylish environment.
                    </p>

                    <ul class="text-sm text-gray-600 space-y-1 mb-5">
                        <li>Signature Cocktails</li>
                        <li>Premium Spirits</li>
                        <li>Live Music Weekends</li>
                        <li>Happy Hour: 5 PM – 7 PM</li>
                    </ul>

                    <a href="#"
                       class="mt-auto inline-block bg-[#800020] text-white px-4 py-2 rounded hover:bg-[#600018] text-center">
                        Book Now
                    </a>
                </div>
            </div>

        </div>

    </div>

</section>
{{-- ===== GUEST REVIEWS SECTION ===== --}}
<section class="relative py-24 bg-gray-50 overflow-hidden">

    <div class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/5 to-transparent"></div>

    <div class="relative max-w-7xl mx-auto px-4">

        {{-- Header --}}
        <div class="text-center mb-16">
            <p class="text-[#D4AF37] tracking-[0.3em] uppercase text-sm mb-4">
                Testimonials
            </p>

            <h2 class="text-4xl md:text-5xl font-bold mb-6"
                style="font-family:'Playfair Display', serif;">
                What Our Guests Say
            </h2>

            <div class="w-24 h-1 bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto mb-6"></div>

            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Genuine experiences shared by guests who stayed with us.
            </p>
        </div>

        {{-- Reviews Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($topReviews as $review)
            <div class="group bg-white rounded-xl p-8
                        border border-gray-200
                        transition-all duration-500
                        hover:-translate-y-3
                        hover:shadow-[0_25px_50px_-15px_rgba(0,0,0,0.25)]
                        hover:border-[#D4AF37]/40">

                {{-- Stars --}}
                <div class="flex mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-[#D4AF37]' : 'text-gray-300' }}"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 0 0 .95.69h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 0 0-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.538 1.118l-3.381-2.455a1 1 0 0 0-1.176 0l-3.381 2.455c-.783.57-1.838-.197-1.538-1.118l1.287-3.966a1 1 0 0 0-.364-1.118L2.05 9.393c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 0 0 .95-.69l1.287-3.966z"/>
                        </svg>
                    @endfor
                </div>

                {{-- Review Text --}}
                {{-- <p class="text-gray-600 italic mb-6 leading-relaxed max-h-24 overflow-y-auto "> //simple scroll bar--}} 
                <p class="text-gray-600 italic mb-6 leading-relaxed max-h-24 overflow-y-auto scrollbar-hide review-scrollbar">
                    “{{ $review->comment }}”
                </p>

                {{-- Guest Info --}}
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#800020] to-[#D4AF37]
                                flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr($review->name?? 'G',0,1)) }}
                    </div>

                    <div>
                        <p class="font-semibold text-gray-900">
                            {{ $review->name?? 'Verified Guest'}}
                        </p>
                        @if(!$review->name)
                            <p class="text-sm text-gray-500">Verified Guest</p>
                        @endif
                    </div>
                </div>

            </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">
                    No reviews available yet.
                </p>
            @endforelse

        </div>
    </div>
</section>



{{-- Your Luxury Escape Awaits section  --}}
<section class="relative overflow-hidden py-32 px-4">
    <!-- Background Image -->
    <div
        class="absolute inset-0 bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1600');">
        {{-- style="background-image: url('/Images/luxury_escape.jpg');" --}}
    </div>

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#800020]/90 to-[#1a1a1a]/90"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto text-center text-white">
        <!-- Sparkle Icon -->
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="2"
             stroke-linecap="round"
             stroke-linejoin="round"
             class="mx-auto mb-8 h-16 w-16 text-[#D4AF37] animate-pulse">
            <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/>
            <path d="M20 3v4"/>
            <path d="M22 5h-4"/>
            <path d="M4 17v2"/>
            <path d="M5 18H3"/>
        </svg>

        <!-- Heading -->
        <h2 class="mb-8 text-5xl md:text-6xl font-bold"
            style="font-family: 'Playfair Display', serif;">
            Your Luxury Escape Awaits
        </h2>

        <!-- Subtitle -->
        <p class="mb-12 text-2xl text-gray-200"
           style="font-family: 'Cormorant Garamond', serif;">
            Experience the perfect blend of elegance, comfort, and exceptional service
        </p>

        <!-- CTA Button -->
        <a href="/rooms">
            <button
                class="group inline-flex items-center justify-center gap-2 rounded-md bg-gradient-to-r
                       from-[#D4AF37] to-[#F4E4C1] px-12 py-8 text-xl font-semibold text-[#1a1a1a]
                       shadow-2xl transition-all duration-300
                       hover:from-[#F4E4C1] hover:to-[#D4AF37]
                       hover:scale-105 active:scale-95">

                <!-- Calendar Icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                     class="mr-3 h-6 w-6">
                    <path d="M8 2v4"/>
                    <path d="M16 2v4"/>
                    <rect width="18" height="18" x="3" y="4" rx="2"/>
                    <path d="M3 10h18"/>
                </svg>

                Book Now

                <!-- Arrow Animation -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                     class="ml-3 h-6 w-6 transition-transform duration-300 group-hover:translate-x-2">
                    <path d="M5 12h14"/>
                    <path d="m12 5 7 7-7 7"/>
                </svg>
            </button>
        </a>
    </div>
</section>



@endsection
