@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Cashier Dashboard</h2>
    <p>Welcome, {{ auth()->user()->name }}</p>

    <a href="{{ route('payments.index') }}" class="btn btn-success">
        Process Payments
    </a>
</div>
@endsection