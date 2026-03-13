<div class="max-w-screen-2xl mx-auto mt-10 px-6">

    {{-- PAGE TITLE --}}
    <h1 class="text-3xl font-bold mb-8 text-gray-800">
        Gallery Management
    </h1>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
    <div id="successToast"
        class="fixed top-5 right-5 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
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
    <div class="bg-white shadow-lg rounded-xl p-8 mb-10">

        <h2 class="text-xl font-semibold mb-6 text-gray-700">
            Upload New Image
        </h2>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">

            @csrf

            {{-- IMAGE UPLOAD --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Select Image
                </label>

                <input type="file"
                    name="image[]"
                    id="imageInput"
                    multiple
                    class="border rounded-lg p-2 w-full"
                    required>

                <div id="preview" class="flex flex-wrap mt-4"></div>
            </div>


            {{-- CATEGORY --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Category
                </label>

                <select name="category"
                    class="w-full border rounded-lg px-3 py-2"
                    required>

                    <option value="">Select Category</option>

                    <option value="exterior">Exterior</option>
                    <option value="interior">Interior</option>
                    <option value="event">Event Hall</option>
                    <option value="lounges">Lounges</option>
                    <option value="food">Food & Drink</option>
                    <option value="restaurant">Restaurant & Dining areas</option>
                    <option value="pool">Swimming Pool</option>
                    <option value="parking">Parking</option>
                    <option value="celebrity">Celebrity Guests</option>
                    <option value="guest">Special Moments</option>

                </select>
            </div>


            {{-- BUTTON --}}
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

                Upload Image

            </button>

        </form>

    </div>


{{-- CATEGORY FILTER --}}
<div class="mb-6 flex flex-wrap gap-3">

    <button onclick="filterGallery('all')" class="bg-gray-700 text-white px-4 py-1 rounded">
        All
    </button>

    <button onclick="filterGallery('exterior')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Exterior
    </button>

    <button onclick="filterGallery('interior')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Interior
    </button>

    <button onclick="filterGallery('event')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Event Hall
    </button>

    <button onclick="filterGallery('lounges')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Lounges
    </button>

    <button onclick="filterGallery('food')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Food & Drinks
    </button>

    <button onclick="filterGallery('restaurant')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Restaurant & Dining Areas
    </button>

    <button onclick="filterGallery('pool')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Swimming Pool
    </button>

    <button onclick="filterGallery('parking')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Parking
    </button>

    <button onclick="filterGallery('celebrity')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Celebrity Guest
    </button>
    
    <button onclick="filterGallery('guest')" class="bg-blue-500 text-white px-4 py-1 rounded">
        Special Moments
    </button>

</div>

    {{-- GALLERY GRID --}}
    <div class="bg-white shadow-lg rounded-xl p-8">

        <h2 class="text-xl font-semibold mb-6 text-gray-700">
            Uploaded Images
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">

        @foreach($images as $image)

        <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition overflow-hidden gallery-item"
            data-category="{{ $image->category }}">

            {{-- IMAGE --}}
            <img src="{{ asset('storage/'.$image->image_path) }}"
                onclick="openPreview(this)"
                class="w-full h-20 object-cover cursor-pointer">

            <div class="p-2 text-xs">

                {{-- CATEGORY --}}
                <p class="text-sm text-gray-500">
                    Category: <span class="font-semibold">{{ ucfirst($image->category) }}</span>
                </p>

                

                {{-- STATUS --}}
                <p class="text-xs">
                    Status:
                    @if($image->is_approved)
                        <span class="text-green-600 font-semibold">Approved</span>
                    @else
                        <span class="text-yellow-600 font-semibold">Pending</span>
                    @endif
                </p>

                {{-- ACTION BUTTONS --}}
                <div class="flex gap-2 pt-2">

                    {{-- APPROVE --}}
                    @if(!$image->is_approved)
                    <form action="{{ route('admin.gallery.approve',$image->id) }}" method="POST">
                        @csrf
                        <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded">
                            Approve
                        </button>
                    </form>
                    @endif


                    {{-- HOMEPAGE --}}
                    @if($image->show_on_homepage)

                    <form action="{{ route('admin.gallery.hideHomepage',$image->id) }}" method="POST">
                    @csrf
                    <button class="bg-gray-600 hover:bg-gray-700 text-white text-xs px-3 py-1 rounded">
                    Hide from Homepage
                    </button>
                    </form>

                    @else

                    <form action="{{ route('admin.gallery.homepage',$image->id) }}" method="POST">
                    @csrf
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded">
                    Show on Homepage
                    </button>
                    </form>

                    @endif


                    {{-- DELETE --}}
                    <form action="{{ route('admin.gallery.destroy',$image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button
                        onclick="return confirm('Delete this image?')"
                        class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">
                        Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>
</div>

<div class="mt-6">
    {{ $images->links() }}
</div>

        {{-- IMAGE PREVIEW MODAL --}}
<div id="previewModal"
class="fixed inset-0 bg-black bg-opacity-90 hidden flex items-center justify-center z-50">

<span onclick="closePreview()"
class="absolute top-5 right-8 text-white text-4xl cursor-pointer">×</span>

<img id="previewImage"
class="max-w-[90%] max-h-[90%] rounded-lg">

</div>

<script>

document.addEventListener("DOMContentLoaded", function(){

let input = document.getElementById("imageInput");
let preview = document.getElementById("preview");

input.addEventListener("change", function(){

    preview.innerHTML = "";

    Array.from(this.files).forEach(file => {

        let reader = new FileReader();

        reader.onload = function(e){

            let img = document.createElement("img");
            img.src = e.target.result;
            img.className = "h-20 w-20 object-cover rounded-lg mr-2 mb-2 shadow";

            preview.appendChild(img);

        }

        reader.readAsDataURL(file);

    });

});
});


function openPreview(img){

let modal = document.getElementById("previewModal");
let preview = document.getElementById("previewImage");

preview.src = img.src;
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