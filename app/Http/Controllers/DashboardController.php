<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Carbon\Carbon;

class DashboardController extends Controller
{
public function index()
{
    $role = auth()->user()->role->name;

    switch ($role) {
        case 'Admin':
            return view('dashboards.admin');

        case 'Receptionist':
            return view('dashboards.receptionist');

       case 'Cashier':

            $totalBills = Bill::count();

            $totalRevenue = Bill::where('status', 'paid')
                                ->sum('net_amount');

            $unpaidCount = Bill::where('status', 'unpaid')
                                ->count();

            $todayRevenue = Bill::where('status', 'paid')
                                ->whereDate('updated_at', today())
                                ->sum('net_amount');

            
    $recentBills = Bill::with(['booking.guest'])
                        ->latest()
                        ->take(5)
                        ->get();

    return view('dashboards.cashier', compact(
        'totalBills',
        'totalRevenue',
        'unpaidCount',
        'todayRevenue',
        'recentBills'
            ));

        default:
            abort(403);
    }
}
}