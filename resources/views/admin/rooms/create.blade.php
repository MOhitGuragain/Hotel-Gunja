@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto mt-10">

    <div class="bg-white shadow-xl rounded-2xl p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Add New Room
        </h2>

        <form action="{{ route('admin.rooms.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Room Number --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Room Number
                </label>
                <input type="text" name="room_number" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none 
                           transition duration-200">
            </div>

            {{-- Category --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Category
                </label>
                <select name="room_category_id" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none 
                           transition duration-200">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Floor --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Floor
                </label>
                <input type="number" name="floor"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none 
                           transition duration-200">
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Status
                </label>
                <select name="status"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none 
                           transition duration-200">
                    <option value="available">Available</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('admin.rooms.index') }}"
                   class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg 
                          hover:bg-gray-300 transition duration-200">
                    Cancel
                </a>

                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg 
                               hover:bg-blue-700 transition duration-200 shadow-md">
                    Save Room
                </button>
            </div>

        </form>

    </div>

</div>

@endsection