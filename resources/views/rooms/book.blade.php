@extends('layouts.app')

@section('content')
<section class="pt-24 pb-32 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden grid md:grid-cols-2">

            {{-- LEFT SIDE --}}
            <div class="bg-[#800020] text-white p-10 flex flex-col justify-center">
                <h1 class="text-4xl font-bold mb-4">
                    Book {{ $category->name }}
                </h1>

                <p class="text-gray-200 mb-6">
                    Experience luxury and comfort. Select your preferred plan
                    and dates to confirm your reservation.
                </p>

                <div class="space-y-2 text-sm text-gray-200">
                    <p>✔ Max Guests: {{ $category->max_adults }}</p>
                    <p>✔ Secure Booking</p>
                    <p>✔ Instant Confirmation</p>
                </div>
            </div>

            {{-- RIGHT SIDE (FORM) --}}
            <div class="p-10">

                {{-- Success --}}
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Errors --}}
                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('rooms.book.store', $category->id) }}"
                      enctype="multipart/form-data"
                      class="space-y-5">
                    @csrf

                    {{-- Guest Name --}}
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

                    {{-- Contact --}}
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

                    {{-- ID Image --}}
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">
                            Upload ID Image
                        </label>
                        <input type="file"
                               name="id_image"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 file:bg-[#800020] file:text-white file:border-0 file:px-4 file:py-2 file:rounded file:mr-4">
                    </div>

                    {{-- Plan --}}
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">
                            Select Plan
                        </label>
                        <select name="room_plan_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
                                required>
                            <option value="">-- Choose a Plan --</option>

                            @forelse($category->plans as $plan)
                                <option value="{{ $plan->id }}">
                                    {{ $plan->plan_name }}
                                    (Rs {{ number_format($plan->price_per_night) }}/night)
                                </option>
                            @empty
                                <option disabled>No plans available</option>
                            @endforelse
                        </select>
                    </div>

                    {{-- Dates --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">
                                Check-in
                            </label>
                            <input type="date"
                                   name="check_in"
                                   value="{{ old('check_in') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">
                                Check-out
                            </label>
                            <input type="date"
                                   name="check_out"
                                   value="{{ old('check_out') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
                                   required>
                        </div>
                    </div>

                    {{-- Guests --}}
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">
                            Number of Guests
                        </label>
                        <input type="number"
                               name="guests"
                               value="{{ old('guests', 1) }}"
                               min="1"
                               max="{{ $category->max_adults }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#800020] focus:outline-none"
                               required>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-[#800020] to-[#600018]
                                   text-white py-3 rounded-xl text-lg font-semibold
                                   hover:scale-105 transition-transform duration-300 shadow-lg">
                        Confirm Booking
                    </button>

                </form>

            </div>
        </div>

    </div>
</section>
@endsection