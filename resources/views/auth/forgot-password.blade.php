@extends('layouts.app')

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-black via-gray-900 to-gray-800">

    <div class="w-full max-w-md bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl p-10 text-white">

        <!-- Title -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-[#ffccd5]">
                Hotel Gunja
            </h1>
            <p class="text-gray-300 text-sm mt-2">
                Forgot Password
            </p>
        </div>

        <!-- Success Message -->
        @if (session('status'))
            <div class="bg-green-500/20 border border-green-400 text-green-200 px-4 py-2 rounded-lg mb-4 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <!-- Errors -->
        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-400 text-red-200 px-4 py-2 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm mb-2 text-gray-300">Email Address</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white"
                    placeholder="Enter your email">
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-[#800020] to-[#a00030] py-3 rounded-xl font-semibold">
                Send Reset Link
            </button>

            <!-- Back -->
            <a href="{{ route('auth.staff-login') }}"
                class="block text-center mt-3 text-sm text-gray-300 hover:text-white">
                Back to Login
            </a>

        </form>

        <div class="mt-6 text-center text-xs text-gray-400">
            © {{ date('Y') }} Hotel Gunja
        </div>

    </div>
</div>

@endsection