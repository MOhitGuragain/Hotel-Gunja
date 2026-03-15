@extends('admin.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-10">

```
{{-- PAGE HEADER --}}
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Event Management</h1>
        <p class="text-gray-500 text-sm">Manage upcoming hotel events</p>
    </div>

    <a href="{{ route('admin.events.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
        + Add Event
    </a>
</div>


{{-- EVENT TABLE CARD --}}
<div class="bg-white shadow-xl rounded-xl overflow-hidden">

    <table class="w-full text-left">

        {{-- TABLE HEADER --}}
        <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
            <tr>
                <th class="px-6 py-4">Title</th>
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4">Location</th>
                <th class="px-6 py-4 text-center">Action</th>
            </tr>
        </thead>

        {{-- TABLE BODY --}}
        <tbody class="divide-y">

            @foreach($events as $event)

            <tr class="hover:bg-gray-50 transition">

                <td class="px-6 py-4 font-semibold text-gray-800">
                    {{ $event->title }}
                </td>

                <td class="px-6 py-4 text-gray-600">
                    {{ $event->event_date }}
                </td>

                <td class="px-6 py-4 text-gray-600">
                    {{ $event->location }}
                </td>

                <td class="px-6 py-4 text-center">

                    <form method="POST"
                          action="{{ route('admin.events.destroy', $event->id) }}"
                          onsubmit="return confirm('Delete this event?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-1 rounded">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>


{{-- PAGINATION --}}
<div class="mt-6">
    {{ $events->links() }}
</div>
```

</div>

@endsection
