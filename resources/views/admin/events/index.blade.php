{{-- Event List (Admin) --}}

<h2>Events</h2>

<a href="{{ route('admin.events.create') }}">
    Add Event
</a>

<table border="1" cellpadding="10">
<tr>
    <th>Title</th>
    <th>Date</th>
    <th>Location</th>
    <th>Action</th>
</tr>

@foreach($events as $event)
<tr>
    <td>{{ $event->title }}</td>
    <td>{{ $event->event_date }}</td>
    <td>{{ $event->location }}</td>
    <td>
        <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    </td>
</tr>
@endforeach

</table>

{{ $events->links() }}