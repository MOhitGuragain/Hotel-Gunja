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
                Reset Password
            </p>
        </div>

        <!-- Errors -->
        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-400 text-red-200 px-4 py-2 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf

            <!-- TOKEN (IMPORTANT) -->
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div>
                <label class="block text-sm mb-2 text-gray-300">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white"
                    placeholder="Enter your email">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm mb-2 text-gray-300">New Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-3 pr-10 bg-white/10 border border-white/20 rounded-xl text-white"
                        placeholder="New password">

                    <button type="button" onclick="togglePassword('password')" 
                        class="absolute right-3 top-3 text-sm">
                        Show
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm mb-2 text-gray-300">Confirm Password</label>
                <div class="relative">
                    <input id="confirmPassword" type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 pr-10 bg-white/10 border border-white/20 rounded-xl text-white"
                        placeholder="Confirm password">

                    <button type="button" onclick="togglePassword('confirmPassword')" 
                        class="absolute right-3 top-3 text-sm">
                        Show
                    </button>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-[#800020] to-[#a00030] py-3 rounded-xl font-semibold">
                Reset Password
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

<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
}
</script>

@endsection