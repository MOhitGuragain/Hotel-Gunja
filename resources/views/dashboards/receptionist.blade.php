@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">

    <div class="flex justify-between items-center mb-10">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Receptionist Dashboard</h2>
            <p class="text-gray-500 mt-1">
                Welcome back, {{ auth()->user()->name }}
            </p>
        </div>

        <form action="{{ route('auth.staff-logout') }}" method="POST">
            @csrf
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition">
            <h3 class="text-xl font-semibold mb-2">Manage Bookings</h3>
            <p class="text-gray-500 mb-4 text-sm">
                View and approve guest bookings
            </p>
            <a href="{{ route('admin.bookings.index') }}"
               class="block text-center bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                View Bookings
            </a>
        </div>

    </div>

</div>
@endsection