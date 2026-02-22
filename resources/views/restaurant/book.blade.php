@extends('layouts.app')

@section('content')
<section class="pt-24 pb-32 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-2 bg-white rounded-2xl shadow-2xl overflow-hidden">

            {{-- LEFT SIDE --}}
            <div class="bg-[#800020] text-white p-12 flex flex-col justify-center">
                <h1 class="text-4xl font-bold mb-6">
                    Reserve a Table at <br>
                    {{ $restaurant->name }}
                </h1>

                <p class="text-gray-200 mb-6">
                    Select your preferred table and enjoy a fine dining
                    experience crafted just for you.
                </p>

                <ul class="space-y-3 text-gray-200">
                    <li>✔ Fine Dining Experience</li>
                    <li>✔ Exclusive Ambiance</li>
                    <li>✔ Easy Online Reservation</li>
                </ul>
            </div>

            {{-- RIGHT SIDE --}}
            <div class="p-10">

                <h2 class="text-2xl font-bold mb-6 text-gray-800">
                    Choose Your Table
                </h2>

                <form method="POST"
                      action="{{ route('restaurant.book.store', $restaurant->id) }}"
                      enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf

                    {{-- TABLE SELECTION --}}
<div class="grid md:grid-cols-2 gap-10">

    {{-- FOR 2 PERSONS --}}
    <label class="cursor-pointer group">
        <input type="radio" name="guests" value="2" class="hidden peer" required>

        <div class="border-2 border-gray-300 rounded-2xl p-8 text-center
                    transition duration-300
                    peer-checked:border-[#800020]
                    peer-checked:bg-[#fff5f7]
                    group-hover:shadow-2xl">

            <div class="flex justify-center mb-6">

                <svg width="140" height="140" viewBox="0 0 200 200">

                    <!-- Table -->
                    <circle cx="100" cy="100" r="45" fill="#800020" />

                    <!-- Chairs -->
                    <rect x="85" y="15" width="30" height="20" rx="5" fill="#444"/>
                    <rect x="85" y="165" width="30" height="20" rx="5" fill="#444"/>

                </svg>

            </div>

            <p class="text-lg font-semibold text-gray-700">
                Table for 2 Persons
            </p>
        </div>
    </label>


    {{-- FOR 4 PERSONS --}}
    <label class="cursor-pointer group">
        <input type="radio" name="guests" value="4" class="hidden peer">

        <div class="border-2 border-gray-300 rounded-2xl p-8 text-center
                    transition duration-300
                    peer-checked:border-[#800020]
                    peer-checked:bg-[#fff5f7]
                    group-hover:shadow-2xl">

            <div class="flex justify-center mb-6">

                <svg width="160" height="160" viewBox="0 0 200 200">

                    <!-- Table -->
                    <circle cx="100" cy="100" r="50" fill="#800020" />

                    <!-- Chairs -->
                    <rect x="85" y="10" width="30" height="20" rx="5" fill="#444"/>
                    <rect x="85" y="170" width="30" height="20" rx="5" fill="#444"/>
                    <rect x="10" y="85" width="20" height="30" rx="5" fill="#444"/>
                    <rect x="170" y="85" width="20" height="30" rx="5" fill="#444"/>

                </svg>

            </div>

            <p class="text-lg font-semibold text-gray-700">
                Table for 4 Persons
            </p>
        </div>
    </label>


    {{-- FOR 6 PERSONS --}}
    <label class="cursor-pointer group">
        <input type="radio" name="guests" value="6" class="hidden peer">

        <div class="border-2 border-gray-300 rounded-2xl p-8 text-center
                    transition duration-300
                    peer-checked:border-[#800020]
                    peer-checked:bg-[#fff5f7]
                    group-hover:shadow-2xl">

            <div class="flex justify-center mb-6">

                <svg width="170" height="170" viewBox="0 0 200 200">

                    <!-- Table -->
                    <ellipse cx="100" cy="100" rx="60" ry="45" fill="#800020" />

                    <!-- Top & Bottom Chairs -->
                    <rect x="70" y="10" width="25" height="20" rx="5" fill="#444"/>
                    <rect x="105" y="10" width="25" height="20" rx="5" fill="#444"/>
                    <rect x="70" y="170" width="25" height="20" rx="5" fill="#444"/>
                    <rect x="105" y="170" width="25" height="20" rx="5" fill="#444"/>

                    <!-- Side Chairs -->
                    <rect x="10" y="85" width="20" height="30" rx="5" fill="#444"/>
                    <rect x="170" y="85" width="20" height="30" rx="5" fill="#444"/>

                </svg>

            </div>

            <p class="text-lg font-semibold text-gray-700">
                Table for 6 Persons
            </p>
        </div>
    </label>


    {{-- FOR 8 PERSONS --}}
    <label class="cursor-pointer group">
        <input type="radio" name="guests" value="8" class="hidden peer">

        <div class="border-2 border-gray-300 rounded-2xl p-8 text-center
                    transition duration-300
                    peer-checked:border-[#800020]
                    peer-checked:bg-[#fff5f7]
                    group-hover:shadow-2xl">

            <div class="flex justify-center mb-6">

                <svg width="180" height="180" viewBox="0 0 200 200">

                    <!-- Table -->
                    <circle cx="100" cy="100" r="60" fill="#800020" />

                    <!-- Chairs around -->
                    <rect x="85" y="5" width="30" height="20" rx="5" fill="#444"/>
                    <rect x="85" y="175" width="30" height="20" rx="5" fill="#444"/>
                    <rect x="5" y="85" width="20" height="30" rx="5" fill="#444"/>
                    <rect x="175" y="85" width="20" height="30" rx="5" fill="#444"/>

                    <!-- Diagonal Chairs -->
                    <rect x="30" y="30" width="20" height="25" rx="5" fill="#444"/>
                    <rect x="150" y="30" width="20" height="25" rx="5" fill="#444"/>
                    <rect x="30" y="145" width="20" height="25" rx="5" fill="#444"/>
                    <rect x="150" y="145" width="20" height="25" rx="5" fill="#444"/>

                </svg>

            </div>

            <p class="text-lg font-semibold text-gray-700">
                Table for 8 Persons
            </p>
        </div>
    </label>

</div>

                    {{-- GUEST DETAILS --}}
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">
                            Guest Name
                        </label>
                        <input type="text"
                               name="guest_name"
                               value="{{ old('guest_name') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
                               required>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">
                            Contact Number
                        </label>
                        <input type="text"
                               name="contact_number"
                               value="{{ old('contact_number') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
                               required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">
                                Booking Date
                            </label>
                            <input type="date"
                                   name="booking_date"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020]"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">
                                Booking Time
                            </label>
                            <input type="time"
                                   name="booking_time"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020]"
                                   required>
                        </div>
                    </div>

                    {{-- SUBMIT --}}
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-[#800020] to-[#600018]
                                   text-white py-3 rounded-xl text-lg font-semibold
                                   hover:scale-105 transition-transform duration-300 shadow-lg">
                        Confirm Reservation
                    </button>

                </form>

            </div>
        </div>

    </div>
</section>
@endsection