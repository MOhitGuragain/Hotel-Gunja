<h2>Upload Image</h2>

<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="file" name="image" required>
    
    <select name="category">
        <option value="exterior">Exterior</option>
        <option value="interior">Interior</option>
        <option value="rooms">Rooms</option>
        <option value="interior">Amenities</option>
        <option value="interior">Restaurant & Dining</option>
        <option value="interior">Event Hall</option>
        {{-- <option value="interior">Cabin </option> --}}
        <option value="interior">Food & Drink</option>
        <option value="restaurant">WashRoom</option>
        <option value="guest">Celebrities Gallery</option>
        <option value="guest">Guest Gallery</option>
    </select>

    <button type="submit">Upload</button>
</form>