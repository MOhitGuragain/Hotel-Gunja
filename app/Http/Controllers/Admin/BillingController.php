<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Booking;
   use Carbon\Carbon;
use App\Models\RoomCategory;
use Barryvdh\DomPDF\Facade\Pdf;

class BillingController extends Controller
{
public function generateBill($bookingId)
{
    $booking = Booking::with('bookable.plans')->findOrFail($bookingId);

    $total = 0;

    // Calculate nights
    $checkIn = Carbon::parse($booking->check_in);
    $checkOut = Carbon::parse($booking->check_out);
    $nights = $checkIn->diffInDays($checkOut);

    // If booking is room category
    if ($booking->bookable instanceof RoomCategory) {

        $plan = $booking->bookable->plans->first();

        if ($plan) {
            $total = $plan->price_per_night * $nights;
        }
    }

    $discount = 0;
    $tax = $total * 0.12; // 12% VAT
    $net = $total - $discount + $tax;

    $bill = Bill::create([
        'booking_id' => $booking->id,
        'total_amount' => $total,
        'discount' => $discount,
        'tax' => $tax,
        'net_amount' => $net,
        'generated_by' => auth()->id(),
    ]);

    return redirect()->back()->with('success', 'Bill generated successfully.');
}

public function downloadInvoice($bookingId)
{
   $booking = Booking::with('bookable', 'guest')
    ->findOrFail($bookingId);
    if ($booking->bookable instanceof RoomCategory) {
    $plan = $booking->bookable->plans()->first();
}
    $bill = Bill::where('booking_id', $bookingId)->firstOrFail();

    $pdf = Pdf::loadView('admin.invoices.invoice', compact('booking', 'bill'));

    return $pdf->download('invoice_'.$booking->id.'.pdf');
}

public function markAsPaid($billId)
{
    $bill = Bill::findOrFail($billId);

    if ($bill->status === 'paid') {
        return redirect()->back()->with('info', 'Bill is already paid.');
    }

    $bill->status = 'paid';
    $bill->save();

    return redirect()->back()->with('success', 'Bill marked as paid successfully.');
}
}

