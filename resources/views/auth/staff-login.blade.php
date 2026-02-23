<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-black">

    <div class="w-full max-w-md bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl p-10">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Staff Login</h2>
            <p class="text-gray-500 text-sm mt-2">
                Admin • Receptionist • Cashier
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('auth.staff-login.submit') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800020] focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800020] focus:outline-none">
            </div>

            <button type="submit"
                class="w-full bg-[#800020] text-white py-3 rounded-lg font-semibold hover:bg-[#600018] transition duration-300">
                Sign In
            </button>
        </form>

    </div>

</body>
</html>