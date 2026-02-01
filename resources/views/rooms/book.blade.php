@extends('layouts.app')

@section('content')
<section class="pt-24 pb-32 bg-gray-50">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-lg">

        {{-- Heading --}}
        <h1 class="text-3xl font-bold mb-2">
            Book {{ $category->name }}
        </h1>

        <p class="text-gray-600 mb-8">
            Choose your plan and dates to continue booking.
        </p>

        {{-- Success --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errors --}}
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('rooms.book.store', $category->id) }}">
            @csrf

            {{-- Plan Selection --}}
            <div class="mb-6">
                <label class="block mb-2 font-semibold">Select Plan</label>

                <select name="room_plan_id"
                        class="w-full border p-3 rounded"
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

            {{-- Check-in --}}
            <div class="mb-4">
                <label class="block mb-2 font-semibold">Check-in Date</label>
                <input type="date"
                       name="check_in"
                       value="{{ old('check_in') }}"
                       class="w-full border p-3 rounded"
                       required>
            </div>

            {{-- Check-out --}}
            <div class="mb-4">
                <label class="block mb-2 font-semibold">Check-out Date</label>
                <input type="date"
                       name="check_out"
                       value="{{ old('check_out') }}"
                       class="w-full border p-3 rounded"
                       required>
            </div>

            {{-- Guests --}}
            <div class="mb-6">
                <label class="block mb-2 font-semibold">Number of Guests</label>
                <input type="number"
                       name="guests"
                       value="{{ old('guests', 1) }}"
                       min="1"
                       max="{{ $category->max_adults }}"
                       class="w-full border p-3 rounded"
                       required>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full bg-[#800020] text-white px-6 py-3 rounded-lg
                           hover:bg-[#600018] transition text-lg font-semibold">
                Confirm Booking
            </button>
        </form>

    </div>
</section>
@endsection
