@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Receptionist Dashboard</h2>
    <p>Welcome, {{ auth()->user()->name }}</p>

    <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary">
        View All Bookings
    </a>
</div>
@endsection