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
    $booking = Booking::with('menuItems')->findOrFail($bookingId);

    $total = $booking->final_total;

    $discount = 0;
    $tax = $total * 0.10;
    $net = $total + $tax - $discount;

    Bill::updateOrCreate(
        ['booking_id' => $booking->id],
        [
            'total_amount' => $total,
            'discount' => $discount,
            'tax' => $tax,
            'net_amount' => $net,
            'generated_by' => auth()->id(),
        ]
    );

    return redirect()->back()->with('success','Bill generated successfully.');
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

public function viewInvoice($bookingId)
{
    $booking = Booking::with('bookable', 'guest')->findOrFail($bookingId);
    $bill = Bill::where('booking_id', $bookingId)->firstOrFail();

    return view('admin.invoices.invoice', compact('booking', 'bill'));
}
}

