@extends('admin.layouts.app')

@section('content')

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
<div class="max-w-3xl mx-auto px-6 py-10">

```
{{-- PAGE HEADER --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Add New Event</h1>
    <p class="text-gray-500 text-sm mt-1">
        Create and publish a new event for your hotel
    </p>
</div>


{{-- FORM CARD --}}
<div class="bg-white shadow-xl rounded-xl p-8">

    <form method="POST" action="{{ route('admin.events.store') }}" class="space-y-6">
        @csrf

        {{-- TITLE --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Event Title
            </label>

            <input
                type="text"
                name="title"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Enter event title">
        </div>


        {{-- DESCRIPTION --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Description
            </label>

            <textarea
                name="description"
                rows="4"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Write event description..."></textarea>
        </div>


        {{-- DATE --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Event Date
            </label>

            <input
                type="date"
                name="event_date"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>


        {{-- LOCATION --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Location
            </label>

            <input
                type="text"
                name="location"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Example: Grand Ballroom">
        </div>


        {{-- BUTTONS --}}
        <div class="flex items-center gap-4 pt-4">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                Save Event
            </button>

            <a href="{{ route('admin.events.index') }}"
               class="text-gray-600 hover:text-gray-900">
                Cancel
            </a>

        </div>

    </form>

</div>
```

</div>

@endsection
