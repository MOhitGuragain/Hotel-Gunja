@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-xl font-semibold mb-4">Add Review</h1>

    <form method="POST" action="{{ route('admin.reviews.store') }}">
        @csrf

        {{-- Guest Name --}}
        <div class="mb-4">
            <label class="block mb-1">Guest Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        {{-- Rating --}}
        <div class="mb-4">
            <label class="block mb-1">Rating (1–5)</label>
            <div class="flex space-x-1 mb-2">
                @for($i = 1; $i <= 5; $i++)
                    <button type="button"
                            class="star w-8 h-8 text-gray-300 focus:outline-none"
                            data-value="{{ $i }}">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 0 0 .95.69h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 0 0-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.538 1.118l-3.381-2.455a1 1 0 0 0-1.176 0l-3.381 2.455c-.783.57-1.838-.197-1.538-1.118l1.287-3.966a1 1 0 0 0-.364-1.118L2.05 9.393c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 0 0 .95-.69l1.287-3.966z"/>
                        </svg>
                    </button>
                @endfor
            </div>
            <input type="hidden" name="rating" id="rating" value="1">
        </div>

        {{-- Comment --}}
        <div class="mb-4">
            <label class="block mb-1">Comment</label>
            <textarea name="comment" rows="4" class="w-full border rounded p-2" required></textarea>
        </div>

        {{-- Submit --}}
        <button class="bg-black text-white px-4 py-2 rounded">
            Save Review (Pending)
        </button>
    </form>
</div>

{{-- JS for hover + click star rating --}}
<script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');
    let selectedRating = 1;

    function updateStars(rating) {
        stars.forEach(star => {
            star.classList.toggle('text-[#D4AF37]', star.dataset.value <= rating);
            star.classList.toggle('text-gray-300', star.dataset.value > rating);
        });
    }

    stars.forEach(star => {
        // Hover effect
        star.addEventListener('mouseenter', () => {
            updateStars(star.dataset.value);
        });

        star.addEventListener('mouseleave', () => {
            updateStars(selectedRating);
        });

        // Click to set rating
        star.addEventListener('click', () => {
            selectedRating = star.dataset.value;
            ratingInput.value = selectedRating;
            updateStars(selectedRating);
        });
    });

    // Initialize stars
    updateStars(selectedRating);
</script>
@endsection
