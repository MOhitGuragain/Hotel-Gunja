@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Admin Dashboard</h2>
    <p>Welcome, {{ auth()->user()->name }}</p>

    <div class="row mt-4">
        <div class="col-md-3">
            <a href="{{ route('rooms.index') }}" class="btn btn-dark w-100 mb-2">Manage Rooms</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('restaurant.index') }}" class="btn btn-dark w-100 mb-2">Manage Restaurants</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('event-halls.index') }}" class="btn btn-dark w-100 mb-2">Manage Event Halls</a>
        </div>
    </div>
</div>
@endsection