@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-20 text-center">
    <h1 class="text-3xl font-bold text-red-600">Error</h1>
    <p class="mt-4 text-gray-700">Please log in first to access the dashboard.</p>
    <a href="{{ route('auth.staff-login') }}" class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
        Go to Login
    </a>
</div>
@endsection