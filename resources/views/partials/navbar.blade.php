@php
    function navActive($path) {
        return request()->is($path) ? 'nav-active' : '';
    }
@endphp


<style>
    /* Elegant underline base (hidden by default) */
    .navbar-link span {
        width: 0;
        left: 50%;
        transition: all 0.35s ease;
    }

    /* FIXED underline for ACTIVE page */
    .navbar-link.active span {
        width: 100%;
        left: 0;
    }

    /* FIXED maroon text for ACTIVE page */
    .navbar-link.active {
        color: #800020 !important;
    }
</style>

<header
    id="navbar"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group focus:outline-none focus:ring-0 active:scale-100 select-none">
                <div class="bg-gradient-to-br from-[#800020] to-[#600018]
                            w-12 h-12 p-2.5 rounded-xl shadow-lg
                            relative overflow-hidden transition-transform duration-500
                group-hover:scale-110">

                    <!-- Hover overlay glow  -->
                    {{-- <div class="absolute inset-0 bg-gradient-to-br from-[#D4AF37] to-transparent
                                opacity-0 group-hover:opacity-30 transition-opacity duration-500 z-10"></div> --}}

                    <!-- Logo Image (Scaled Up) -->
                    <img src="{{ asset('Images/logo.jpg') }}"
                        alt="Logo"
                        class="w-full h-full object-cover rounded-lg
                                scale-[1.70] origin-center ">
                </div>


                <div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-[#800020] to-[#D4AF37]
                                bg-clip-text text-transparent"
                        style="font-family: 'Playfair Display', serif;">
                        Hotel Gunja
                    </span>
                    <p id="navbarSubtitle"
                    class="text-xs tracking-widest transition-colors duration-300"
                    style="font-family: 'Cormorant Garamond', serif;">
                        PRIVATE LIMITED
                    </p>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center space-x-1">
                @php
                    $navItem = "px-4 sm:px-6 py-2 text-sm sm:text-base font-medium
                            transition-all duration-300 relative group navbar-link ";
                @endphp

                <a href="{{ url('/') }}" 
                class="{{ $navItem }} navbar-link {{ request()->is('/') ? 'active' : '' }}">
                Home
                    <span class="absolute bottom-0 h-0.5
                                bg-gradient-to-r from-[#800020] via-[#D4AF37] to-[#800020]"></span>
                </a>

                <a href="{{ url('/rooms') }}" 
                class="{{ $navItem }} navbar-link {{ request()->is('rooms*') ? 'active' : '' }}">
                Rooms
                    <span class="absolute bottom-0  h-0.5
                                bg-gradient-to-r from-[#800020] to-[#D4AF37]
                                group-hover:w-full group-hover:left-0"></span>                             
                </a>

                <a href="#gallery" 
                class="{{ $navItem }} navbar-link">
                Gallery
                    <span class="absolute bottom-0  h-0.5
                                bg-gradient-to-r from-[#800020] to-[#D4AF37]
                                group-hover:w-full group-hover:left-0 "></span>
                </a>

                <a href="{{ url('/360-tour') }}"
                class="{{ $navItem }} navbar-link {{ request()->is('360-tour*') ? 'active' : '' }}">
                    360 Image Tour
                    <span class="absolute bottom-0 h-0.5
                                bg-gradient-to-r from-[#800020] to-[#D4AF37]
                                group-hover:w-full group-hover:left-0 "></span>
                </a>


                {{-- Book Now  --}}
                @if(!empty($featuredRoom))
                    <a href="{{ route('rooms.book', $featuredRoom->id) }}"
                    class="{{ $navItem }} navbar-link group relative">
                    Book Now
                    </a>
                @else
                    <a href="{{ route('rooms.index') }}"
                    class="{{ $navItem }} navbar-link group relative">
                    Book Now
                    </a>
                @endif

            </nav>

            {{-- Mobile Button --}}
            <button id="menuBtn"
                    class="md:hidden p-2.5 rounded-lg hover:bg-[#D4AF37]/10 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-[#800020]"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</header>

    {{-- Mobile Menu --}}
    <div id="mobileMenu"
            class="hidden fixed top-20 left-0 w-full bg-white/95 backdrop-blur-md shadow-lg z-40 md:hidden">
        <a href="{{ url('/') }}"
            class="block px-6 py-4 {{ request()->is('/') ? 'text-[#800020] font-semibold' : '' }}">
            Home
        </a>

        <a href="{{ url('/rooms') }}"
            class="block px-6 py-4 {{ request()->is('rooms*') ? 'text-[#800020] font-semibold' : '' }}">
            Rooms
        </a>

        <a href="{{ url('/#gallery') }}"
            class="block px-6 py-4 {{ request()->is('gallery*') ? 'text-[#800020] font-semibold' : '' }}">
            Gallery
        </a>

        <a href="{{ url('/360-tour') }}"
            class="block px-6 py-4 {{ request()->is('360-tour*') ? 'text-[#800020] font-semibold' : '' }}">
            360 Image Tour
        </a>

        {{-- Book Now --}}
        @if(!empty($featuredRoom))
            <a href="{{ route('rooms.book', $featuredRoom->id) }}"
            class="block px-6 py-4 {{ request()->is('rooms/*/book') ? 'text-[#800020] font-semibold' : '' }}">
                Book Now
            </a>
        @else
            <a href="{{ route('rooms.index') }}"
            class="block px-6 py-4 {{ request()->is('rooms') ? 'text-[#800020] font-semibold' : '' }}">
                Book Now
            </a>
        @endif



    </div>

<script>

    const navbar = document.getElementById('navbar');
    const subtitle = document.getElementById('navbarSubtitle');
    const navLinks = document.querySelectorAll('.navbar-link');
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    const isHome = window.location.pathname === '/';

    function resetNavLinkColors() {
        navLinks.forEach(link => {
            link.classList.remove(
                'text-white',
                'text-gray-800',
                'hover:text-[#800020]'
            );
        });
    }

    function setSolidNavbar() {
        navbar.className =
            'fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md shadow-lg border-b border-[#D4AF37]/20';

        subtitle.classList.remove('text-gray-300');
        subtitle.classList.add('text-gray-600');

        resetNavLinkColors();
        navLinks.forEach(link => {
            link.classList.add('text-gray-800', 'hover:text-[#800020]');
        });
    }

    function setTransparentNavbar() {
        navbar.className =
            'fixed top-0 left-0 right-0 z-50 bg-transparent';

        subtitle.classList.remove('text-gray-600');
        subtitle.classList.add('text-gray-300');

        resetNavLinkColors();
        navLinks.forEach(link => {
            link.classList.add('text-white');
        });
    }

    if (isHome) {
        setTransparentNavbar();

        window.addEventListener('scroll', () => {
            window.scrollY > 80
                ? setSolidNavbar()
                : setTransparentNavbar();
        });
    } else {
        setSolidNavbar();
    }

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });


</script>
