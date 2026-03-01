@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold mb-6">Cashier Dashboard</h2>
    <p class="mb-6 text-gray-700">Welcome, {{ auth()->user()->name }}</p>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-500 font-semibold text-sm">Total Bills</h3>
            <p class="text-2xl font-bold mt-2">{{ $totalBills }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-500 font-semibold text-sm">Total Revenue</h3>
            <p class="text-2xl font-bold mt-2">Rs {{ number_format($totalRevenue, 2) }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-500 font-semibold text-sm">Unpaid Bills</h3>
            <p class="text-2xl font-bold mt-2">{{ $unpaidCount }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-500 font-semibold text-sm">Today's Revenue</h3>
            <p class="text-2xl font-bold mt-2">Rs {{ number_format($todayRevenue, 2) }}</p>
        </div>
    </div>

    <!-- Recent Bills Table -->
    <div class="bg-white shadow-lg rounded-2xl overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Guest</th>
                    <th class="px-4 py-3">Booking Type</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Discount</th>
                    <th class="px-4 py-3">Tax</th>
                    <th class="px-4 py-3">Net Amount</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($recentBills as $bill)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $bill->id }}</td>
                    <td class="px-4 py-3">{{ $bill->booking->guest->name ?? 'Walk-in Guest' }}</td>
                    <td class="px-4 py-3">
                        @if($bill->booking->bookable_type === 'App\Models\RoomCategory') Room
                        @elseif($bill->booking->bookable_type === 'App\Models\Restaurant') Restaurant
                        @elseif($bill->booking->bookable_type === 'App\Models\EventHall') Event Hall
                        @endif
                    </td>
                    <td class="px-4 py-3">Rs {{ number_format($bill->total_amount,2) }}</td>
                    <td class="px-4 py-3">Rs {{ number_format($bill->discount,2) }}</td>
                    <td class="px-4 py-3">Rs {{ number_format($bill->tax,2) }}</td>
                    <td class="px-4 py-3 font-semibold">Rs {{ number_format($bill->net_amount,2) }}</td>
                    <td class="px-4 py-3">
                        @if($bill->status == 'paid')
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Paid</span>
                        @else
                            <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">Unpaid</span>
                        @endif
                    </td>
                  <td class="px-4 py-3 text-center space-y-2">

    <!-- Download Invoice Button -->
    <a href="{{ route('invoice.download', $bill->booking_id) }}"
       class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 text-xs inline-block">
        Download Invoice
    </a>

    @if($bill->status == 'unpaid')
        <form action="{{ route('billing.mark-paid', $bill->id) }}" 
              method="POST">
            @csrf
            <button class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 text-xs mt-1">
                Mark as Paid
            </button>
        </form>
    @else
        <span class="block text-green-600 text-xs mt-1 font-semibold">
            Payment Completed
        </span>
    @endif

</td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-6 text-gray-500">No bills found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<form action="{{ route('auth.staff-logout') }}" method="POST">
            @csrf
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>

@endsection