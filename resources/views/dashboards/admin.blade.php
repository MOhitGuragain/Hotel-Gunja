@extends('layouts.app')

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

        <!-- Rooms -->
        <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
            <h3 class="text-xl font-semibold mb-2">Manage Rooms</h3>
            <p class="text-gray-500 mb-4 text-sm">
                View and update room listings
            </p>
            <a href="{{ route('rooms.index') }}"
               class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                Manage Rooms
            </a>
        </div>

        <!-- Restaurants -->
        <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
            <h3 class="text-xl font-semibold mb-2">Manage Restaurants</h3>
            <p class="text-gray-500 mb-4 text-sm">
                Control restaurant reservations
            </p>
            <a href="{{ route('restaurant.index') }}"
               class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                Manage Restaurants
            </a>
        </div>

        <!-- Event Halls -->
        <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
            <h3 class="text-xl font-semibold mb-2">Manage Event Halls</h3>
            <p class="text-gray-500 mb-4 text-sm">
                Manage event hall bookings
            </p>
            <a href="{{ route('event-halls.index') }}"
               class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                Manage Halls
            </a>
        </div>

    </div>
</div>
@endsection