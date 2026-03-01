@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#1a1a1a] to-black p-6">

    <div class="w-full max-w-xl bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl p-10 text-white">

        <h1 class="text-3xl font-bold mb-8 text-center"
            style="font-family: 'Playfair Display', serif;">
            Add Guest Review
        </h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 bg-green-500/20 border border-green-400 text-green-200 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.reviews.store') }}" class="space-y-6">
            @csrf

            {{-- Guest Name --}}
            <div>
                <label class="block mb-2 text-sm text-gray-300">Guest Name</label>
                <input type="text" name="name" required
                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-[#D4AF37] focus:outline-none transition duration-300"
                    placeholder="Enter guest name">
            </div>

            {{-- Rating --}}
            <div>
                <label class="block mb-3 text-sm text-gray-300">Rating</label>

                <div class="flex justify-center space-x-3 mb-3">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button"
                                class="star w-10 h-10 text-gray-400 transition-transform duration-300 hover:scale-125 focus:outline-none"
                                data-value="{{ $i }}">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 0 0 .95.69h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 0 0-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.538 1.118l-3.381-2.455a1 1 0 0 0-1.176 0l-3.381 2.455c-.783.57-1.838-.197-1.538-1.118l1.287-3.966a1 1 0 0 0-.364-1.118L2.05 9.393c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 0 0 .95-.69l1.287-3.966z"/>
                            </svg>
                        </button>
                    @endfor
                </div>

                <input type="hidden" name="rating" id="rating" value="1">

                <p id="ratingText" class="text-center text-sm text-[#D4AF37] mt-2">
                    1 Star - Poor
                </p>
            </div>

            {{-- Comment --}}
            <div>
                <label class="block mb-2 text-sm text-gray-300">Comment</label>
                <textarea name="comment" rows="4" required
                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-[#D4AF37] focus:outline-none transition duration-300"
                    placeholder="Write guest experience..."></textarea>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full bg-gradient-to-r from-[#D4AF37] to-[#F4E4C1]
                       text-black py-3 rounded-xl font-semibold
                       shadow-lg transition-all duration-300
                       hover:scale-105 hover:shadow-2xl">
                Save Review (Pending)
            </button>

        </form>
    </div>
</div>

{{-- Star Rating Script --}}
<script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');
    const ratingText = document.getElementById('ratingText');

    const ratingLabels = {
        1: "1 Star - Poor",
        2: "2 Stars - Fair",
        3: "3 Stars - Good",
        4: "4 Stars - Very Good",
        5: "5 Stars - Excellent"
    };

    let selectedRating = 1;

    function updateStars(rating) {
        stars.forEach(star => {
            star.classList.toggle('text-[#D4AF37]', star.dataset.value <= rating);
            star.classList.toggle('text-gray-400', star.dataset.value > rating);
        });
        ratingText.textContent = ratingLabels[rating];
    }

    stars.forEach(star => {

        star.addEventListener('mouseenter', () => {
            updateStars(star.dataset.value);
        });

        star.addEventListener('mouseleave', () => {
            updateStars(selectedRating);
        });

        star.addEventListener('click', () => {
            selectedRating = star.dataset.value;
            ratingInput.value = selectedRating;
            updateStars(selectedRating);
        });

    });

    updateStars(selectedRating);
</script>

@endsection