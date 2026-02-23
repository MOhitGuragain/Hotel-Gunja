<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                return view('dashboards.cashier');

            case 'Guest':
                return view('dashboards.guest');

            default:
                abort(403);
        }
    }
}