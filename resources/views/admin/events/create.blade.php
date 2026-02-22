{{-- Event Form --}}

<h2>Add Event</h2>

<form method="POST" action="{{ route('admin.events.store') }}">
    @csrf

    <p>Title</p>
    <input type="text" name="title" required>

    <p>Description</p>
    <textarea name="description" required></textarea>

    <p>Date</p>
    <input type="date" name="event_date" required>

    <p>Location</p>
    <input type="text" name="location">

    <br><br>
    <button type="submit">Save Event</button>
</form>