<h2>Gallery Images</h2>

<a href="/admin/gallery/create">Upload New</a>

<table border="1">
<tr>
    <th>Image</th>
    <th>Category</th>
    <th>Approve</th>
    <th>Homepage</th>
</tr>

@foreach($images as $image)
<tr>
    <td>
        <img src="{{ asset('storage/'.$image->image_path) }}" width="100">
    </td>

    <td>
        {{ $image->category }}
    </td>

    <td>
         @if(!$image->is_approved)
            <form action="/admin/gallery/approve/{{ $image->id }}" method="POST">
                @csrf
                <button type="submit">Approve</button>
            </form>
        @else
            <span style="color:green;">Approved</span>
        @endif
    </td>

    <td>
        @if(!$image->show_on_homepage)
            <form action="/admin/gallery/homepage/{{ $image->id }}" method="POST">
                @csrf
                <button type="submit">Show</button>
            </form>
        @else
            <span style="color:blue;">Showing</span>
        @endif
    </td>

</tr>
@endforeach

</table>