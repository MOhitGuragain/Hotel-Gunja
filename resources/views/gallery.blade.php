@extends('layouts.app')

@section('content')

<section class="py-16 bg-white">
<div class="max-w-7xl mx-auto px-4 py-16">

<!-- Header -->
<div class="text-center mb-12 pt-20">
<h1 class="text-5xl font-bold text-gray-900 mb-4">Gallery</h1>
<p class="text-xl text-gray-600">Glimpse Of Events</p>
</div>


{{-- Exterior --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Exterior</h2>
<div class="w-24 h-[2.5px] bg-yellow-600 mb-6"></div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($exteriorImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>


{{-- Interior --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Interior</h2>
<div class="w-24 h-[2.5px] bg-yellow-600 mb-6"></div>


<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($interiorImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>


{{-- Event Hall --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Event Hall</h2>
<div class="w-28 h-[2.5px] bg-yellow-600 mb-6"></div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($eventImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>

{{-- Lounges --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Lounges</h2>
<div class="w-24 h-[2px] bg-yellow-600 mb-6"></div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($loungeImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>

{{-- Food & Drink --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Food & Drink</h2>
<div class="w-36 h-[2.5px] bg-yellow-600 mb-6"></div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($foodImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>

{{-- Restaurant --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Restaurant & Dining</h2>
<div class="w-52 h-[2.5px] bg-yellow-600 mb-6"></div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($restaurantImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>

{{-- Swimming Pool --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Swimming Pool</h2>
<div class="w-40 h-[2.5px] bg-yellow-600 mb-6"></div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($poolImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>

{{-- Parking --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Parking</h2>
<div class="w-24 h-[2.5px] bg-yellow-600 mb-6"></div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($parkingImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>

{{-- Celebrities --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Celebrity Guests</h2>
<div class="w-44 h-[2px] bg-yellow-600 mb-6"></div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($celebrityImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>


{{-- Guest Gallery  [Special Moments] --}}
<div class="mb-16">
<h2 class="text-2xl font-light mb-2">Special Moments</h2>
<div class="w-44 h-[2.5px] bg-yellow-600 mb-6"></div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

@foreach($guestImages as $image)
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openModal(this)"
class="gallery-image w-full h-64 object-cover rounded-lg shadow cursor-pointer">
@endforeach

</div>
</div>

</div>
</section>



<!-- Image Modal -->
<div id="imageModal"
class="fixed inset-0 bg-black bg-opacity-95 hidden flex items-center justify-center z-50">

<!-- Close -->
<span onclick="closeModal()"
class="absolute top-5 right-8 text-white text-4xl cursor-pointer">×</span>

<!-- Prev -->
<span onclick="prevImage()"
class="absolute left-5 text-white text-5xl cursor-pointer">❮</span>

<!-- Image -->
<img id="modalImage"
class="max-w-[90%] max-h-[90%] rounded-lg transition duration-300">

<!-- Next -->
<span onclick="nextImage()"
class="absolute right-5 text-white text-5xl cursor-pointer">❯</span>

<!-- Zoom -->
<span onclick="zoomIn()"
class="absolute bottom-10 right-20 text-white text-3xl cursor-pointer">+</span>

<span onclick="zoomOut()"
class="absolute bottom-10 right-10 text-white text-3xl cursor-pointer">−</span>

</div>



<script>

let images = [];
let currentIndex = 0;
let zoomLevel = 1;
let startX = 0;

function openModal(clickedImage){

images = document.querySelectorAll('.gallery-image');
currentIndex = Array.from(images).indexOf(clickedImage);

zoomLevel = 1;
showImage();

document.getElementById('imageModal').classList.remove('hidden');

}

function showImage(){

let src = images[currentIndex].src;
src = src.replace(/=w.*$/, '');

const modalImg = document.getElementById('modalImage');
modalImg.src = src;
modalImg.style.transform = `scale(${zoomLevel})`;

}

function closeModal(){

document.getElementById('imageModal').classList.add('hidden');

}

function nextImage(){

currentIndex++;

if(currentIndex >= images.length)
currentIndex = 0;

zoomLevel = 1;
showImage();

}

function prevImage(){

currentIndex--;

if(currentIndex < 0)
currentIndex = images.length - 1;

zoomLevel = 1;
showImage();

}



/* KEYBOARD CONTROLS */

document.addEventListener('keydown', function(e){

if(document.getElementById('imageModal').classList.contains('hidden')) return;

if(e.key === "ArrowRight") nextImage();
if(e.key === "ArrowLeft") prevImage();
if(e.key === "Escape") closeModal();

});


/* ZOOM */

function zoomIn(){

zoomLevel += 0.2;
showImage();

}

function zoomOut(){

if(zoomLevel > 0.4){
zoomLevel -= 0.2;
showImage();
}

}



/* MOBILE SWIPE */

const modal = document.getElementById('imageModal');

modal.addEventListener('touchstart', function(e){

startX = e.touches[0].clientX;

});

modal.addEventListener('touchend', function(e){

let endX = e.changedTouches[0].clientX;

if(startX - endX > 50) nextImage();
if(endX - startX > 50) prevImage();

});

</script>


@endsection