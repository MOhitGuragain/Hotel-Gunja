<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Booking;

class BillingController extends Controller
{
    public function generateBill(Request $request, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        $bill = Bill::create([
            'booking_id' => $booking->id,
            'total_amount' => $request->total,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'net_amount' => $request->net,
            'generated_by' => auth()->id()
        ]);

        return $bill;
    }
}

