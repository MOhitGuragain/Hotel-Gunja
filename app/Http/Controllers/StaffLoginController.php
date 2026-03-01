<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.staff-login'); // your login blade
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = auth()->user();

            // Redirect based on role
            switch ($user->role->name) {
                case 'Admin':
case 'Receptionist':
case 'Cashier':
    return redirect()->route('dashboard');
                default:
                    Auth::logout();
                    return back()->withErrors(['email' => 'Unauthorized']);
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.staff-login');
    }
}