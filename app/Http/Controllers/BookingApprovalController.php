<?php

namespace App\Http\Controllers;
use App\Models\Booking;

use Illuminate\Http\Request;

class BookingApprovalController extends Controller
{
    public function approve($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'booking_status' => 'approved',
            'approved_by' => auth()->$id()
        ]);

        return back()->with('success','Booking Approved');
    }
}

