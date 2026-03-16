{{-- Event Form --}}

<h2>Add Event</h2>

<form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
@csrf

<p>Title</p>
<input type="text" name="title" required>

<p>Description</p>
<textarea name="description" required></textarea>

<p>Date</p>
<input type="date" name="event_date" required>

<p>Time (optional)</p>
<input type="time" name="event_time">

<p>Location</p>
<input type="text" name="location">

<p>Event Image</p>
<input type="file" name="image">


<br><br>

<button type="submit">Save Event</button>

</form>