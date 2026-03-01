<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Cormorant+Garamond:wght@400;500;600&display=swap" rel="stylesheet"> --}}

    <title>Hotel Gunja Pvt. Ltd.</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Fade-in animation --}}
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 1.2s ease-out forwards;
        }

        /* Yellow text selection */
        ::selection {
            background-color: rgba(212, 175, 55, 0.6);
        }
        ::-moz-selection {
            background: #D4AF37;
            color: #1a1a1a;
        }

        /* Hide scrollbar by default */
.scrollbar-hide::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}
.scrollbar-hide {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;      /* Firefox */
}

/* Show golden scrollbar on hover */
.review-scrollbar:hover::-webkit-scrollbar {
    display: block;
    width: 6px; /* width of scrollbar */
}

.review-scrollbar:hover::-webkit-scrollbar-thumb {
    background-color: #D4AF37; /* gold color */
    border-radius: 10px;
}

.review-scrollbar:hover::-webkit-scrollbar-track {
    background: rgba(212, 175, 55, 0.1); /* light gold track */
}

/* Firefox */
.review-scrollbar:hover {
    scrollbar-width: thin;
    scrollbar-color: #c2a134 rgba(212, 175, 55, 0.1);
}

      
//Gallery animation
.dual-gallery {
    background: #f9f9f9;
    overflow: hidden;
}

.gallery-row {
    overflow: hidden;
    position: relative;
}

.gallery-track {
    display: flex;
    gap: 20px;
    width: max-content;
}

.gallery-item {
    width: 250px;
    height: 180px;
    border-radius: 18px;
    overflow: hidden;
    flex-shrink: 0;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-item:hover img {
    transform: scale(1.15);
}

/* LEFT SCROLL */
.left-slide {
    animation: slideLeft 35s linear infinite;
}

/* RIGHT SCROLL */
.right-slide {
    animation: slideRight 35s linear infinite;
}

@keyframes slideLeft {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@keyframes slideRight {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
}
    </style>
</head>

{{-- Lazy-Load a Background Video and Add smooth fade-in when video starts--}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const video = document.getElementById('bgVideo');

        if (!video) return;

        video.addEventListener('loadeddata', () => {
            video.classList.remove('opacity-0');
            video.classList.add('opacity-100');
        });
    });
</script>





<body class="font-sans text-gray-800 overflow-x-hidden">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

</body>
</html>
