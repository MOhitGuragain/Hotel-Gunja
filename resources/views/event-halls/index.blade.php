@extends('layouts.app')

@section('content')
<section class="pt-24 pb-32 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center mb-14">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                Our Event Halls
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Host your weddings, conferences, and celebrations 
                in our spacious and beautifully designed event halls.
            </p>
        </div>

        {{-- Event Hall Grid --}}
        <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">

            @forelse($halls as $hall)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

                    {{-- Image --}}
                    <div class="h-56 overflow-hidden">
                        <img src="{{ asset('storage/' . $hall->image) }}"
                             class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2 text-gray-800">
                            {{ $hall->name }}
                        </h2>

                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($hall->description, 100) }}
                        </p>

                        <div class="flex justify-between items-center">
                            <span class="text-[#800020] font-semibold">
                                Capacity: {{ $hall->min_capacity }} - {{ $hall->max_capacity }} Persons
                            </span>

                            <a href="{{ route('event-halls.show', $hall->id) }}"
                               class="bg-[#800020] text-white px-4 py-2 rounded-lg
                                      hover:bg-[#600018] transition text-sm font-semibold">
                                View Details
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    No event halls available at the moment.
                </div>
            @endforelse

        </div>

    </div>
</section>
@endsection