@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-16">

    <!-- Header -->
    <div class="text-center mb-12 pt-20">
        <h1 class="text-5xl font-bold text-gray-900 mb-4">
            Explore Our Rooms
        </h1>
        <p class="text-xl text-gray-600">
            Find your ideal stay
        </p>
    </div>

    <!-- Rooms Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- ROOM CARD -->
        <div class="rounded-xl border bg-white shadow overflow-hidden 
                    hover:shadow-2xl transition-all duration-300 group">

            <!-- Image -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                    alt="Presidential Suite"
                    class="w-full h-full object-cover 
                           transition-transform duration-500 
                           group-hover:scale-110"
                >

                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-[#800020] text-white 
                            text-lg font-semibold px-4 py-2 rounded-md shadow 
                            transform transition-transform duration-300 
                            group-hover:scale-105">
                    Rs.15,000/night
                </div>

                <!-- Availability -->
                <div class="absolute top-4 left-4 bg-green-500 text-white 
                            text-xs font-semibold px-3 py-1 rounded-md shadow">
                    Available
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Presidential Suite
                </h2>

                <p class="text-gray-600 mb-4">
                    Experience ultimate luxury in our spacious Presidential Suite
                    with panoramic views and premium amenities.
                </p>

                <!-- Info -->
                <div class="flex justify-between text-gray-600 mb-4">

                <!-- Guests -->
                <span class="flex items-center">
                    👥 Up to 4 Guests
                </span>

                    <!-- Size -->
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 text-[#800020]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        1200 sq ft
                    </span>
                </div>

                <!-- Amenities -->
                <h4 class="font-semibold text-gray-900 mb-2">
                    Room Amenities:
                </h4>

                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                    <span>✔ King Bed</span>
                    <span>✔ Living Room</span>
                    <span>✔ Jacuzzi</span>
                    <span>✔ City View</span>
                    <span>✔ Premium WiFi</span>
                    <span>✔ Kitchenette</span>
                </div>

                <!--Book now and Details Buttons -->
                
                <div class="flex gap-3">
                    {{-- Book Now --}}
                    <a href="{{ route('rooms.book', 1) }}"
                    class="flex-1 bg-[#800020] text-white py-2 rounded-md
                            text-center hover:bg-[#600018] transition">
                        Book Now
                    </a>

                    {{-- Details --}}
                    <a href="{{ route('rooms.show', 1) }}"
                    class="flex-1 border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                            text-center hover:bg-[#800020] hover:text-white transition">
                        Details
                    </a>
                </div>
            </div>
        </div>

        <!-- ROOM CARD -->
        <div class="rounded-xl border bg-white shadow overflow-hidden 
                    hover:shadow-2xl transition-all duration-300 group">

            <!-- Image -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                    alt="Presidential Suite"
                    class="w-full h-full object-cover 
                           transition-transform duration-500 
                           group-hover:scale-110"
                >

                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-[#800020] text-white 
                            text-lg font-semibold px-4 py-2 rounded-md shadow 
                            transform transition-transform duration-300 
                            group-hover:scale-105">
                    Rs.15,000/night
                </div>

                <!-- Availability -->
                <div class="absolute top-4 left-4 bg-green-500 text-white 
                            text-xs font-semibold px-3 py-1 rounded-md shadow">
                    Available
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Suite
                </h2>

                <p class="text-gray-600 mb-4">
                    Experience ultimate luxury in our spacious Suite
                    with panoramic views and premium amenities.
                </p>

                <!-- Info -->
                <div class="flex justify-between text-gray-600 mb-4">

                    <!-- Guests -->
                    <span class="flex items-center">
                        👥 Up to 4 Guests
                    </span>

                    <!-- Size -->
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 text-[#800020]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        1200 sq ft</span>
                </div>

                <!-- Amenities -->
                <h4 class="font-semibold text-gray-900 mb-2">
                    Room Amenities:
                </h4>

                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                    <span>✔ King Bed</span>
                    <span>✔ Living Room</span>
                    <span>✔ Jacuzzi</span>
                    <span>✔ City View</span>
                    <span>✔ Premium WiFi</span>
                    <span>✔ Kitchenette</span>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('rooms.show', 1) }}" class="flex-1">
                        <button
                            class="w-full bg-[#800020] text-white py-2 rounded-md
                                   hover:bg-[#600018] transition">
                            Book Now
                        </button>
                    </a>

                    <button
                        class="border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                               hover:bg-[#800020] hover:text-white transition">
                        Details
                    </button>
                </div>
            </div>
        </div>

        <!-- ROOM CARD -->
        <div class="rounded-xl border bg-white shadow overflow-hidden 
                    hover:shadow-2xl transition-all duration-300 group">

            <!-- Image -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                    alt="Presidential Suite"
                    class="w-full h-full object-cover 
                           transition-transform duration-500 
                           group-hover:scale-110"
                >

                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-[#800020] text-white 
                            text-lg font-semibold px-4 py-2 rounded-md shadow 
                            transform transition-transform duration-300 
                            group-hover:scale-105">
                    Rs.15,000/night
                </div>

                <!-- Availability -->
                <div class="absolute top-4 left-4 bg-green-500 text-white 
                            text-xs font-semibold px-3 py-1 rounded-md shadow">
                    Available
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Super Deluxe
                </h2>

                <p class="text-gray-600 mb-4">
                    Experience ultimate luxury in our spacious Suite
                    with panoramic views and premium amenities.
                </p>

                <!-- Info -->
                <div class="flex justify-between text-gray-600 mb-4">

                    <!-- Guests -->
                    <span class="flex items-center">
                        👥 Up to 4 Guests
                    </span>

                    <!-- Size -->
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 text-[#800020]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        1200 sq ft</span>
                </div>

                <!-- Amenities -->
                <h4 class="font-semibold text-gray-900 mb-2">
                    Room Amenities:
                </h4>

                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                    <span>✔ King Bed</span>
                    <span>✔ Living Room</span>
                    <span>✔ Jacuzzi</span>
                    <span>✔ City View</span>
                    <span>✔ Premium WiFi</span>
                    <span>✔ Kitchenette</span>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('rooms.show', 1) }}" class="flex-1">
                        <button
                            class="w-full bg-[#800020] text-white py-2 rounded-md
                                   hover:bg-[#600018] transition">
                            Book Now
                        </button>
                    </a>

                    <button
                        class="border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                               hover:bg-[#800020] hover:text-white transition">
                        Details
                    </button>
                </div>
            </div>
        </div>

        <!-- ROOM CARD -->
        <div class="rounded-xl border bg-white shadow overflow-hidden 
                    hover:shadow-2xl transition-all duration-300 group">

            <!-- Image -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                    alt="Presidential Suite"
                    class="w-full h-full object-cover 
                           transition-transform duration-500 
                           group-hover:scale-110"
                >

                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-[#800020] text-white 
                            text-lg font-semibold px-4 py-2 rounded-md shadow 
                            transform transition-transform duration-300 
                            group-hover:scale-105">
                    Rs.15,000/night
                </div>

                <!-- Availability -->
                <div class="absolute top-4 left-4 bg-green-500 text-white 
                            text-xs font-semibold px-3 py-1 rounded-md shadow">
                    Available
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Deluxe
                </h2>

                <p class="text-gray-600 mb-4">
                    Experience ultimate luxury in our spacious Suite
                    with panoramic views and premium amenities.
                </p>

                <!-- Info -->
                <div class="flex justify-between text-gray-600 mb-4">

                    <!-- Guests -->
                    <span class="flex items-center">
                        👥 Up to 4 Guests
                    </span>

                    <!-- Size -->
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 text-[#800020]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        1200 sq ft</span>
                </div>

                <!-- Amenities -->
                <h4 class="font-semibold text-gray-900 mb-2">
                    Room Amenities:
                </h4>

                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                    <span>✔ King Bed</span>
                    <span>✔ Living Room</span>
                    <span>✔ Jacuzzi</span>
                    <span>✔ City View</span>
                    <span>✔ Premium WiFi</span>
                    <span>✔ Kitchenette</span>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('rooms.show', 1) }}" class="flex-1">
                        <button
                            class="w-full bg-[#800020] text-white py-2 rounded-md
                                   hover:bg-[#600018] transition">
                            Book Now
                        </button>
                    </a>

                    <button
                        class="border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                               hover:bg-[#800020] hover:text-white transition">
                        Details
                    </button>
                </div>
            </div>
        </div>

        <!-- ROOM CARD -->
            <div class="rounded-xl border bg-white shadow overflow-hidden 
                        hover:shadow-2xl transition-all duration-300 group">

                <!-- Image -->
                <div class="relative h-80 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                        alt="Presidential Suite"
                        class="w-full h-full object-cover 
                            transition-transform duration-500 
                            group-hover:scale-110"
                    >

                    <!-- Price Badge -->
                    <div class="absolute top-4 right-4 bg-[#800020] text-white 
                                text-lg font-semibold px-4 py-2 rounded-md shadow 
                                transform transition-transform duration-300 
                                group-hover:scale-105">
                        Rs.15,000/night
                    </div>

                    <!-- Availability -->
                    <div class="absolute top-4 left-4 bg-green-500 text-white 
                                text-xs font-semibold px-3 py-1 rounded-md shadow">
                        Available
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                        Standard
                    </h2>

                    <p class="text-gray-600 mb-4">
                        Experience ultimate luxury in our spacious Suite
                        with panoramic views and premium amenities.
                    </p>

                    <!-- Info -->
                    <div class="flex justify-between text-gray-600 mb-4">

                        <!-- Guests -->
                        <span class="flex items-center">
                            👥 Up to 4 Guests
                        </span>

                        <!-- Size -->
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2 text-[#800020]"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true">
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <polyline points="9 21 3 21 3 15"></polyline>
                                <line x1="21" y1="3" x2="14" y2="10"></line>
                                <line x1="3" y1="21" x2="10" y2="14"></line>
                            </svg>
                            1200 sq ft</span>
                    </div>

                    <!-- Amenities -->
                    <h4 class="font-semibold text-gray-900 mb-2">
                        Room Amenities:
                    </h4>

                    <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                        <span>✔ King Bed</span>
                        <span>✔ Living Room</span>
                        <span>✔ Jacuzzi</span>
                        <span>✔ City View</span>
                        <span>✔ Premium WiFi</span>
                        <span>✔ Kitchenette</span>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <a href="{{ route('rooms.show', 1) }}" class="flex-1">
                            <button
                                class="w-full bg-[#800020] text-white py-2 rounded-md
                                    hover:bg-[#600018] transition">
                                Book Now
                            </button>
                        </a>

                        <button
                            class="border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                                hover:bg-[#800020] hover:text-white transition">
                            Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- ROOM CARD -->
        <div class="rounded-xl border bg-white shadow overflow-hidden 
                    hover:shadow-2xl transition-all duration-300 group">

            <!-- Image -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                    alt="Presidential Suite"
                    class="w-full h-full object-cover 
                           transition-transform duration-500 
                           group-hover:scale-110"
                >

                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-[#800020] text-white 
                            text-lg font-semibold px-4 py-2 rounded-md shadow 
                            transform transition-transform duration-300 
                            group-hover:scale-105">
                    Rs.15,000/night
                </div>

                <!-- Availability -->
                <div class="absolute top-4 left-4 bg-green-500 text-white 
                            text-xs font-semibold px-3 py-1 rounded-md shadow">
                    Available
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Family
                </h2>

                <p class="text-gray-600 mb-4">
                    Experience ultimate luxury in our spacious Suite
                    with panoramic views and premium amenities.
                </p>

                <!-- Info -->
                <div class="flex justify-between text-gray-600 mb-4">

                    <!-- Guests -->
                    <span class="flex items-center">
                        👥 Up to 4 Guests
                    </span>

                    <!-- Size -->
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 text-[#800020]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        1200 sq ft</span>
                </div>

                <!-- Amenities -->
                <h4 class="font-semibold text-gray-900 mb-2">
                    Room Amenities:
                </h4>

                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                    <span>✔ King Bed</span>
                    <span>✔ Living Room</span>
                    <span>✔ Jacuzzi</span>
                    <span>✔ City View</span>
                    <span>✔ Premium WiFi</span>
                    <span>✔ Kitchenette</span>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('rooms.show', 1) }}" class="flex-1">
                        <button
                            class="w-full bg-[#800020] text-white py-2 rounded-md
                                   hover:bg-[#600018] transition">
                            Book Now
                        </button>
                    </a>

                    <button
                        class="border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                               hover:bg-[#800020] hover:text-white transition">
                        Details
                    </button>
                </div>
            </div>
        </div>


        <!-- ROOM CARD -->
        <div class="rounded-xl border bg-white shadow overflow-hidden 
                    hover:shadow-2xl transition-all duration-300 group">

            <!-- Image -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                    alt="Presidential Suite"
                    class="w-full h-full object-cover 
                           transition-transform duration-500 
                           group-hover:scale-110"
                >

                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-[#800020] text-white 
                            text-lg font-semibold px-4 py-2 rounded-md shadow 
                            transform transition-transform duration-300 
                            group-hover:scale-105">
                    Rs.15,000/night
                </div>

                <!-- Availability -->
                <div class="absolute top-4 left-4 bg-green-500 text-white 
                            text-xs font-semibold px-3 py-1 rounded-md shadow">
                    Available
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Twin Bed Super Deluxe
                </h2>

                <p class="text-gray-600 mb-4">
                    Experience ultimate luxury in our spacious Suite
                    with panoramic views and premium amenities.
                </p>

                <!-- Info -->
                <div class="flex justify-between text-gray-600 mb-4">

                    <!-- Guests -->
                    <span class="flex items-center">
                        👥 Up to 4 Guests
                    </span>

                    <!-- Size -->
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 text-[#800020]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        1200 sq ft</span>
                </div>

                <!-- Amenities -->
                <h4 class="font-semibold text-gray-900 mb-2">
                    Room Amenities:
                </h4>

                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                    <span>✔ King Bed</span>
                    <span>✔ Living Room</span>
                    <span>✔ Jacuzzi</span>
                    <span>✔ City View</span>
                    <span>✔ Premium WiFi</span>
                    <span>✔ Kitchenette</span>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('rooms.show', 1) }}" class="flex-1">
                        <button
                            class="w-full bg-[#800020] text-white py-2 rounded-md
                                   hover:bg-[#600018] transition">
                            Book Now
                        </button>
                    </a>

                    <button
                        class="border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                               hover:bg-[#800020] hover:text-white transition">
                        Details
                    </button>
                </div>
            </div>
        </div>

        <!-- ROOM CARD -->
        <div class="rounded-xl border bg-white shadow overflow-hidden 
                    hover:shadow-2xl transition-all duration-300 group">

            <!-- Image -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                    alt="Presidential Suite"
                    class="w-full h-full object-cover 
                           transition-transform duration-500 
                           group-hover:scale-110"
                >

                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-[#800020] text-white 
                            text-lg font-semibold px-4 py-2 rounded-md shadow 
                            transform transition-transform duration-300 
                            group-hover:scale-105">
                    Rs.15,000/night
                </div>

                <!-- Availability -->
                <div class="absolute top-4 left-4 bg-green-500 text-white 
                            text-xs font-semibold px-3 py-1 rounded-md shadow">
                    Available
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Twin Deluxe
                </h2>

                <p class="text-gray-600 mb-4">
                    Experience ultimate luxury in our spacious Suite
                    with panoramic views and premium amenities.
                </p>

                <!-- Info -->
                <div class="flex justify-between text-gray-600 mb-4">

                    <!-- Guests -->
                    <span class="flex items-center">
                        👥 Up to 4 Guests
                    </span>

                    <!-- Size -->
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 text-[#800020]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        1200 sq ft</span>
                </div>

                <!-- Amenities -->
                <h4 class="font-semibold text-gray-900 mb-2">
                    Room Amenities:
                </h4>

                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                    <span>✔ King Bed</span>
                    <span>✔ Living Room</span>
                    <span>✔ Jacuzzi</span>
                    <span>✔ City View</span>
                    <span>✔ Premium WiFi</span>
                    <span>✔ Kitchenette</span>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('rooms.show', 1) }}" class="flex-1">
                        <button
                            class="w-full bg-[#800020] text-white py-2 rounded-md
                                   hover:bg-[#600018] transition">
                            Book Now
                        </button>
                    </a>

                    <button
                        class="border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                               hover:bg-[#800020] hover:text-white transition">
                        Details
                    </button>
                </div>
            </div>
        </div>

        <!-- ROOM CARD -->
        <div class="rounded-xl border bg-white shadow overflow-hidden 
                    hover:shadow-2xl transition-all duration-300 group">

            <!-- Image -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=800"
                    alt="Presidential Suite"
                    class="w-full h-full object-cover 
                           transition-transform duration-500 
                           group-hover:scale-110"
                >

                <!-- Price Badge -->
                <div class="absolute top-4 right-4 bg-[#800020] text-white 
                            text-lg font-semibold px-4 py-2 rounded-md shadow 
                            transform transition-transform duration-300 
                            group-hover:scale-105">
                    Rs.15,000/night
                </div>

                <!-- Availability -->
                <div class="absolute top-4 left-4 bg-green-500 text-white 
                            text-xs font-semibold px-3 py-1 rounded-md shadow">
                    Available
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                    Twin Bed Standard
                </h2>

                <p class="text-gray-600 mb-4">
                    Experience ultimate luxury in our spacious Suite
                    with panoramic views and premium amenities.
                </p>

                <!-- Info -->
                <div class="flex justify-between text-gray-600 mb-4">

                    <!-- Guests -->
                    <span class="flex items-center">
                        👥 Up to 4 Guests
                    </span>

                    <!-- Size -->
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 text-[#800020]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        1200 sq ft</span>
                </div>

                <!-- Amenities -->
                <h4 class="font-semibold text-gray-900 mb-2">
                    Room Amenities:
                </h4>

                <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-6">
                    <span>✔ King Bed</span>
                    <span>✔ Living Room</span>
                    <span>✔ Jacuzzi</span>
                    <span>✔ City View</span>
                    <span>✔ Premium WiFi</span>
                    <span>✔ Kitchenette</span>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <a href="{{ route('rooms.show', 1) }}" class="flex-1">
                        <button
                            class="w-full bg-[#800020] text-white py-2 rounded-md
                                   hover:bg-[#600018] transition">
                            Book Now
                        </button>
                    </a>

                    <button
                        class="border border-[#800020] text-[#800020] px-4 py-2 rounded-md
                               hover:bg-[#800020] hover:text-white transition">
                        Details
                    </button>
                </div>
            </div>
        </div>

        <!-- DUPLICATE CARD -->
        <!-- Copy above card and just change image, title, price -->

    </div>
</div>
@endsection
