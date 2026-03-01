<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 13px;
            color: #333;
        }

        .header {
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 2px solid #444;
        }

        .header h1 {
            margin: 0;
            color: #2c3e50;
        }

        .invoice-info {
            margin-top: 20px;
        }

        .invoice-info td {
            padding: 4px 0;
        }

        .section-title {
            margin-top: 25px;
            font-weight: bold;
            font-size: 14px;
            border-bottom: 1px solid #999;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #f2f2f2;
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .text-right {
            text-align: right;
        }

        .total-box {
            margin-top: 20px;
            width: 40%;
            float: right;
        }

        .total-box td {
            border: none;
            padding: 6px 0;
        }

        .net-amount {
            font-weight: bold;
            font-size: 15px;
            border-top: 2px solid #000;
        }

        .status {
            padding: 5px 10px;
            font-size: 11px;
            display: inline-block;
        }

        .paid {
            background: #d4edda;
            color: #155724;
        }

        .unpaid {
            background: #fff3cd;
            color: #856404;
        }

        .footer {
            margin-top: 80px;
            text-align: center;
            font-size: 11px;
            color: #777;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <h1>Hotel Gunja</h1>
        <p>Luxury & Comfort Redefined</p>
    </div>

    <!-- INVOICE INFO -->
    <table class="invoice-info">
        <tr>
            <td><strong>Invoice #:</strong> INV-{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</td>
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
            <td><strong>Guest Name:</strong> {{ $booking->guest->name ?? 'Walk-in Guest' }}</td>
            <td></td>
        </tr>
    </table>

    <!-- BOOKING DETAILS -->
    <div class="section-title">Booking Details</div>

    @if($booking->bookable_type === 'App\Models\RoomCategory')

        <table>
            <tr>
                <th>Room Type</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Days</th>
            </tr>
            <tr>
                <td>{{ $booking->bookable->name ?? 'Room' }}</td>
                <td>{{ $booking->check_in }}</td>
                <td>{{ $booking->check_out }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($booking->check_in)->diffInDays($booking->check_out) }}
                </td>
            </tr>
        </table>

    @elseif($booking->bookable_type === 'App\Models\Restaurant')

        <table>
            <tr>
                <th>Restaurant Service</th>
                <th>Date</th>
                <th>Guests</th>
            </tr>
            <tr>
                <td>{{ $booking->bookable->name ?? 'Restaurant' }}</td>
                <td>{{ $booking->check_in }}</td>
                <td>{{ $booking->guests_count ?? 'N/A' }}</td>
            </tr>
        </table>

    @elseif($booking->bookable_type === 'App\Models\EventHall')

        <table>
            <tr>
                <th>Event Hall</th>
                <th>Event Date</th>
                <th>Duration</th>
            </tr>
            <tr>
                <td>{{ $booking->bookable->name ?? 'Event Hall' }}</td>
                <td>{{ $booking->check_in }}</td>
                <td>1 Day Event</td>
            </tr>
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
            <td>Subtotal</td>
            <td class="text-right">{{ number_format($bill->total_amount, 2) }}</td>
        </tr>
        <tr>
            <td>Discount</td>
            <td class="text-right">- {{ number_format($bill->discount, 2) }}</td>
        </tr>
        <tr>
            <td>Tax (12%)</td>
            <td class="text-right">{{ number_format($bill->tax, 2) }}</td>
        </tr>
        <tr class="net-amount">
            <td>Net Amount</td>
            <td class="text-right">Rs {{ number_format($bill->net_amount, 2) }}</td>
        </tr>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        Thank you for choosing Hotel Gunja.<br>
        We look forward to serving you again!
    </div>

</body>
</html>