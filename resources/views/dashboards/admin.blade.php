@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">

    <!-- Header -->
    <div class="flex justify-between items-center mb-10">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Admin Dashboard</h2>
            <p class="text-gray-500 mt-1">
                Welcome back, {{ auth()->user()->name }}
            </p>
        </div>

        <form action="{{ route('auth.staff-logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Bookings -->
        <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
            <h3 class="text-xl font-semibold mb-2">Manage Bookings</h3>
            <p class="text-gray-500 mb-4 text-sm">
                View and control all hotel bookings
            </p>
            <a href="{{ route('admin.bookings.index') }}"
               class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                Go to Bookings
            </a>
        </div>

        <!-- Events -->
        <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
            <h3 class="text-xl font-semibold mb-2">Manage Events</h3>
            <p class="text-gray-500 mb-4 text-sm">
                Create and manage hotel events
            </p>
            <a href="{{ route('admin.events.index') }}"
               class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                Go to Events
            </a>
        </div>

        <!-- Reviews -->
        <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
            <h3 class="text-xl font-semibold mb-2">Manage Reviews</h3>
            <p class="text-gray-500 mb-4 text-sm">
                Approve, reject or remove guest reviews
            </p>
            <a href="{{ route('admin.reviews.index') }}"
               class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                Go to Reviews
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
        <h3 class="text-xl font-semibold mb-2">Manage Rooms</h3>
        <p class="text-gray-500 mb-4 text-sm">
            Add, edit or remove hotel rooms
        </p>
        <a href="{{ route('admin.rooms.index') }}"
           class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
            Manage Rooms
        </a>
</div>

<!-- Restaurant Management -->
<div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
    <h3 class="text-xl font-semibold mb-2">Manage Restaurant</h3>
    <p class="text-gray-500 mb-4 text-sm">
        Add, edit or remove restaurant tables
    </p>
    <a href="/"
       class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
        Manage Restaurant Tables
    </a>
</div>

<!-- Menu Management -->
<div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
    <h3 class="text-xl font-semibold mb-2">Manage Menus </h3>
    <p class="text-gray-500 mb-4 text-sm">
        Add, edit or remove food items
    </p>
    <a href="/"
       class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
        Manage Menus
    </a>
    </div>
@endsection