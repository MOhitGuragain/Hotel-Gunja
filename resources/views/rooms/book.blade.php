@extends('layouts.app')

@section('content')
<section class="pt-24 pb-32 bg-gray-50">
    <div class="max-w-3xl mx-auto bg-white p-10 rounded-xl shadow-lg">

        <h1 class="text-3xl font-bold mb-6">
            Book {{ $room->name }}
        </h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('rooms.book.store', $room->id) }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-2">Check-in</label>
                <input type="date"
                       name="check_in"
                       value="{{ old('check_in') }}"
                       class="w-full border p-3 rounded"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-2">Check-out</label>
                <input type="date"
                       name="check_out"
                       value="{{ old('check_out') }}"
                       class="w-full border p-3 rounded"
                       required>
            </div>

            <div class="mb-6">
                <label class="block mb-2">Guests</label>
                <input type="number"
                       name="guests"
                       value="{{ old('guests', 1) }}"
                       min="1"
                       class="w-full border p-3 rounded"
                       required>
            </div>

            <button type="submit"
                    class="bg-[#800020] text-white px-6 py-3 rounded
                           hover:bg-[#600018] transition">
                Confirm Booking
            </button>
        </form>

    </div>
</section>
@endsection
