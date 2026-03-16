@extends('admin.layouts.app')
@section('content')

<div class="max-w-screen-2xl mx-auto mt-10 px-6">

{{-- PAGE HEADER --}}
<div class="flex items-center justify-between mb-10">

    <div>
        <h1 class="text-4xl font-bold text-gray-800">
            Gallery Management
        </h1>
        <p class="text-gray-500 mt-1">
            Upload, approve and manage gallery images
        </p>
    </div>

</div>


{{-- SUCCESS TOAST --}}
@if(session('success'))
<div id="successToast"
class="fixed top-6 right-6 bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg shadow-xl z-50">

    {{ session('success') }}

</div>

<script>
setTimeout(function(){
let toast=document.getElementById("successToast");
if(toast){
toast.style.opacity="0";
toast.style.transition="0.5s";
setTimeout(()=>toast.remove(),500);
}
},3000);
</script>
@endif



{{-- UPLOAD CARD --}}
<div class="bg-white shadow-xl rounded-2xl p-8 mb-12 border border-gray-100">

<h2 class="text-xl font-semibold text-gray-700 mb-6">
Upload New Images
</h2>

<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">

@csrf

{{-- IMAGE --}}
<div>

<label class="block text-sm font-semibold text-gray-600 mb-2">
Select Images
</label>

<input type="file"
name="image[]"
id="imageInput"
multiple
required
class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">

<div id="preview" class="flex flex-wrap mt-4"></div>

</div>


{{-- CATEGORY --}}
<div>

<label class="block text-sm font-semibold text-gray-600 mb-2">
Category
</label>

<select name="category"
required
class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-400">

<option value="">Select Category</option>

<option value="exterior">Exterior</option>
<option value="interior">Interior</option>
<option value="event">Event Hall</option>
<option value="lounges">Lounges</option>
<option value="food">Food & Drink</option>
<option value="restaurant">Restaurant & Dining Areas</option>
<option value="swimming pool">Swimming Pool</option>
<option value="parking">Parking</option>
<option value="celebrity">Celebrity Guests</option>
<option value="guest">Special Moments</option>

</select>

</div>


<button type="submit"
class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition">

Upload Images

</button>

</form>

</div>



{{-- CATEGORY FILTER --}}
<div class="flex flex-wrap gap-3 mb-8">

<button onclick="filterGallery('all')"
class="px-4 py-2 rounded-full bg-gray-800 text-white text-sm hover:bg-black transition">
All
</button>

<button onclick="filterGallery('exterior')" class="filterBtn">Exterior</button>
<button onclick="filterGallery('interior')" class="filterBtn">Interior</button>
<button onclick="filterGallery('event')" class="filterBtn">Event Hall</button>
<button onclick="filterGallery('lounges')" class="filterBtn">Lounges</button>
<button onclick="filterGallery('food')" class="filterBtn">Food & Drinks</button>
<button onclick="filterGallery('restaurant')" class="filterBtn">Restaurant</button>
<button onclick="filterGallery('pool')" class="filterBtn">Swimming Pool</button>
<button onclick="filterGallery('parking')" class="filterBtn">Parking</button>
<button onclick="filterGallery('celebrity')" class="filterBtn">Celebrity</button>
<button onclick="filterGallery('guest')" class="filterBtn">Special Moments</button>

</div>



{{-- GALLERY GRID --}}
<div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

<h2 class="text-xl font-semibold text-gray-700 mb-6">
Uploaded Images
</h2>

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5">

@foreach($images as $image)

<div class="gallery-item group relative bg-white rounded-xl overflow-hidden shadow hover:shadow-xl transition border"
data-category="{{ $image->category }}">

{{-- IMAGE --}}
<img src="{{ asset('storage/'.$image->image_path) }}"
onclick="openPreview(this)"
class="w-full h-28 object-cover cursor-pointer group-hover:scale-110 transition duration-300">

{{-- OVERLAY --}}
<div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition flex items-center justify-center">

<span class="text-white opacity-0 group-hover:opacity-100 text-sm">
View
</span>

</div>

{{-- INFO --}}
<div class="p-3 text-xs">

<p class="text-gray-500">
Category:
<span class="font-semibold text-gray-700">
{{ ucfirst($image->category) }}
</span>
</p>

<p class="mt-1">
Status:
@if($image->is_approved)
<span class="text-green-600 font-semibold">Approved</span>
@else
<span class="text-yellow-600 font-semibold">Pending</span>
@endif
</p>

{{-- ACTION BUTTONS --}}
<div class="flex flex-wrap gap-1 mt-3">

@if(!$image->is_approved)
<form action="{{ route('admin.gallery.approve',$image->id) }}" method="POST">
@csrf
<button class="actionBtn bg-green-500 hover:bg-green-600">
Approve
</button>
</form>
@endif


@if($image->show_on_homepage)

<form action="{{ route('admin.gallery.hideHomepage',$image->id) }}" method="POST">
@csrf
<button class="actionBtn bg-gray-600 hover:bg-gray-700">
Hide
</button>
</form>

@else

<form action="{{ route('admin.gallery.homepage',$image->id) }}" method="POST">
@csrf
<button class="actionBtn bg-blue-500 hover:bg-blue-600">
Homepage
</button>
</form>

@endif


<form action="{{ route('admin.gallery.destroy',$image->id) }}" method="POST">
@csrf
@method('DELETE')

<button
onclick="return confirm('Delete this image?')"
class="actionBtn bg-red-500 hover:bg-red-600">

Delete

</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

</div>

{{-- PAGINATION --}}
<div class="mt-6">
{{ $images->links() }}
</div>

</div>



{{-- PREVIEW MODAL --}}
<div id="previewModal"
class="fixed inset-0 bg-black bg-opacity-90 hidden flex items-center justify-center z-50">

<span onclick="closePreview()"
class="absolute top-5 right-8 text-white text-4xl cursor-pointer">×</span>

<img id="previewImage"
class="max-w-[90%] max-h-[90%] rounded-lg shadow-2xl">

</div>



<style>

/* Filter button style */
.filterBtn{
background:#3b82f6;
color:white;
padding:6px 14px;
border-radius:999px;
font-size:13px;
transition:0.2s;
}

.filterBtn:hover{
background:#2563eb;
}

/* Action buttons */
.actionBtn{
color:white;
font-size:11px;
padding:3px 8px;
border-radius:5px;
}

</style>



<script>

document.addEventListener("DOMContentLoaded", function(){

let input = document.getElementById("imageInput");
let preview = document.getElementById("preview");

input.addEventListener("change", function(){

preview.innerHTML="";

Array.from(this.files).forEach(file=>{

let reader=new FileReader();

reader.onload=function(e){

let img=document.createElement("img");

img.src=e.target.result;

img.className="h-20 w-20 object-cover rounded-lg mr-2 mb-2 shadow";

preview.appendChild(img);

}

reader.readAsDataURL(file);

});

});

});


function openPreview(img){

let modal=document.getElementById("previewModal");
let preview=document.getElementById("previewImage");

preview.src=img.src;
modal.classList.remove("hidden");

}

function closePreview(){

document.getElementById("previewModal").classList.add("hidden");

}


function filterGallery(category){

let items=document.querySelectorAll(".gallery-item");

items.forEach(function(item){

if(category=="all"){
item.style.display="block";
}
else if(item.dataset.category==category){
item.style.display="block";
}
else{
item.style.display="none";
}

});

}

</script>

@endsection