@extends('admin.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

```
<!-- PAGE HEADER -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Cashier Dashboard</h2>
        <p class="text-gray-600 mt-1">Welcome, {{ auth()->user()->name }}</p>
    </div>

    <form action="{{ route('auth.staff-logout') }}" method="POST">
        @csrf
        <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
            Logout
        </button>
    </form>
</div>


<!-- SUMMARY CARDS -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-gray-500 text-sm font-semibold">Total Bills</h3>
        <p class="text-2xl font-bold mt-2">{{ $totalBills }}</p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-gray-500 text-sm font-semibold">Total Revenue</h3>
        <p class="text-2xl font-bold mt-2">
            Rs {{ number_format($totalRevenue,2) }}
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-gray-500 text-sm font-semibold">Unpaid Bills</h3>
        <p class="text-2xl font-bold mt-2">{{ $unpaidCount }}</p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-gray-500 text-sm font-semibold">Today's Revenue</h3>
        <p class="text-2xl font-bold mt-2">
            Rs {{ number_format($todayRevenue,2) }}
        </p>
    </div>

</div>



<!-- RECENT BILLS TABLE -->

<div class="bg-white shadow-lg rounded-2xl overflow-x-auto">

    <table class="min-w-full text-sm text-left">

        <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">

            <tr>
                <th class="px-4 py-3">Bill ID</th>
                <th class="px-4 py-3">Guest</th>
                <th class="px-4 py-3">Booking Type</th>
                <th class="px-4 py-3">Room + Food Total</th>
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

                <!-- BILL ID -->
                <td class="px-4 py-3">
                    {{ $bill->id }}
                </td>


                <!-- GUEST -->
                <td class="px-4 py-3">
                    {{ $bill->booking->guest->name ?? 'Walk-in Guest' }}
                </td>


                <!-- BOOKING TYPE -->
                <td class="px-4 py-3 font-semibold">

                    @switch($bill->booking->bookable_type)

                        @case('App\Models\RoomCategory')
                            Room
                            @break

                        @case('App\Models\RestaurantTable')
                            Restaurant
                            @break

                        @case('App\Models\EventHall')
                            Event Hall
                            @break

                    @endswitch

                </td>


                <!-- SUBTOTAL -->
                <td class="px-4 py-3">
                    Rs {{ number_format($bill->booking->final_total,2) }}
                </td>


                <!-- DISCOUNT -->
                <td class="px-4 py-3">
                    Rs {{ number_format($bill->discount,2) }}
                </td>


                <!-- TAX -->
                <td class="px-4 py-3">
                    Rs {{ number_format($bill->tax,2) }}
                </td>


                <!-- NET -->
                <td class="px-4 py-3 font-semibold">
                    Rs {{ number_format($bill->net_amount,2) }}
                </td>


                <!-- STATUS -->
                <td class="px-4 py-3">

                    @if($bill->status == 'paid')

                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                            Paid
                        </span>

                    @else

                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                            Unpaid
                        </span>

                    @endif

                </td>



                <!-- ACTIONS -->

                <td class="px-4 py-3 text-center">

                    <div class="flex flex-col gap-2 items-center">

                        <!-- PREVIEW INVOICE -->
                        <a href="{{ route('invoice.view', $bill->booking_id) }}"
                           class="bg-gray-600 text-white px-3 py-1 rounded-lg hover:bg-gray-700 text-xs w-32 text-center">
                           Preview Invoice
                        </a>

                        <!-- DOWNLOAD INVOICE -->
                        <a href="{{ route('invoice.download', $bill->booking_id) }}"
                           class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 text-xs w-32 text-center">
                           Download Invoice
                        </a>


                        @if($bill->status == 'unpaid')

                        <form action="{{ route('billing.mark-paid', $bill->id) }}"
                              method="POST">
                            @csrf

                            <button class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 text-xs w-32">
                                Mark as Paid
                            </button>

                        </form>

                        @else

                        <span class="text-green-600 text-xs font-semibold">
                            Payment Completed
                        </span>

                        @endif

                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="9" class="text-center py-6 text-gray-500">
                    No bills found.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>
```

</div>

@endsection
