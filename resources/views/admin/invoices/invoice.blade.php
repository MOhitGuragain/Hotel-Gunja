<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title>Invoice</title>

<style>

body{
    font-family: DejaVu Sans;
    font-size:13px;
    color:#333;
}

.header{
    text-align:center;
    border-bottom:2px solid #444;
    padding-bottom:10px;
}

.header h1{
    margin:0;
    color:#2c3e50;
}

.invoice-info{
    margin-top:20px;
    width:100%;
}

.invoice-info td{
    padding:4px 0;
}

.section-title{
    margin-top:25px;
    font-weight:bold;
    font-size:14px;
    border-bottom:1px solid #999;
    padding-bottom:5px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

th{
    background:#f2f2f2;
    border:1px solid #ddd;
    padding:8px;
    text-align:left;
}

td{
    border:1px solid #ddd;
    padding:8px;
}

.text-right{
    text-align:right;
}

.net-amount{
    font-weight:bold;
    font-size:15px;
}

.status{
    padding:5px 10px;
    font-size:11px;
}

.paid{
    background:#d4edda;
    color:#155724;
}

.unpaid{
    background:#fff3cd;
    color:#856404;
}

.footer{
    margin-top:60px;
    text-align:center;
    font-size:11px;
    color:#777;
}

</style>

</head>

<body>

<!-- HOTEL HEADER -->

<div class="header">
<h1>Hotel Gunja</h1>
<p>Luxury & Comfort Redefined</p>
</div>

<!-- INVOICE INFORMATION -->

<table class="invoice-info">

<tr>
<td>
<strong>Invoice #:</strong>
INV-{{ str_pad($booking->id,4,'0',STR_PAD_LEFT) }}
</td>

<td class="text-right">
<span class="status {{ $bill->status == 'paid' ? 'paid' : 'unpaid' }}">
{{ strtoupper($bill->status) }}
</span>
</td>
</tr>

<tr>
<td><strong>Booking ID:</strong> {{ $booking->id }}</td>
<td class="text-right"><strong>Date:</strong> {{ date('Y-m-d') }}</td>
</tr>

<tr>
<td>
<strong>Guest:</strong>
{{ $booking->guest->name ?? 'Walk-in Guest' }}
</td>
<td></td>
</tr>

</table>

<!-- BOOKING DETAILS -->

<div class="section-title">Booking Details</div>

@if($booking->bookable_type === 'App\Models\RoomCategory')

<table>

<tr>
<th>Room Type</th>
<th>Check In</th>
<th>Check Out</th>
<th>Nights</th>
</tr>

<tr>

<td>{{ $booking->bookable->name ?? 'Room' }}</td>

<td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>

<td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>

<td>
{{ max(\Carbon\Carbon::parse($booking->check_in)->diffInDays($booking->check_out),1) }}
</td>

</tr>

</table>

@endif

<!-- RESTAURANT ORDERS -->

@if($booking->menuItems->count())

<div class="section-title">Restaurant Orders</div>

<table>

<tr>
<th>Item</th>
<th>Quantity</th>
<th class="text-right">Price</th>
<th class="text-right">Total</th>
</tr>

@foreach($booking->menuItems as $item)

<tr>

<td>{{ $item->name }}</td>

<td>{{ $item->pivot->quantity }}</td>

<td class="text-right">
Rs {{ number_format($item->pivot->price_at_time,2) }}
</td>

<td class="text-right">
Rs {{ number_format($item->pivot->price_at_time * $item->pivot->quantity,2) }}
</td>

</tr>

@endforeach

</table>

@endif

<!-- BILL SUMMARY -->

<div class="section-title">Bill Summary</div>

<table>

<tr>
<th>Description</th>
<th class="text-right">Amount (Rs)</th>
</tr>

<tr>
<td>Room Charges</td>
<td class="text-right">
Rs {{ number_format($booking->total_price ?? 0,2) }}
</td>
</tr>

<tr>
<td>Restaurant Charges</td>
<td class="text-right">
Rs {{ number_format($booking->food_total ?? 0,2) }}
</td>
</tr>

<tr>
<td>Subtotal</td>
<td class="text-right">
Rs {{ number_format($booking->final_total,2) }}
</td>
</tr>

<tr>
<td>Discount</td>
<td class="text-right">
- Rs {{ number_format($bill->discount,2) }}
</td>
</tr>

<tr>
<td>Tax (12%)</td>
<td class="text-right">
Rs {{ number_format($bill->tax,2) }}
</td>
</tr>

<tr class="net-amount">
<td>Net Amount</td>
<td class="text-right">
Rs {{ number_format($bill->net_amount,2) }}
</td>
</tr>

</table>

<!-- FOOTER -->

<div class="footer">
Thank you for choosing Hotel Gunja.<br>
We look forward to serving you again.
</div>

</body>
</html>
