<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Gunja | Staff Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN (if not already loaded globally) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-black via-gray-900 to-gray-800 relative overflow-hidden">

    <!-- Animated Background Glow -->
    <div class="absolute w-96 h-96 bg-[#800020] opacity-20 rounded-full blur-3xl -top-20 -left-20"></div>
    <div class="absolute w-96 h-96 bg-purple-700 opacity-20 rounded-full blur-3xl -bottom-20 -right-20"></div>

    <!-- Login Card -->
    <div class="relative w-full max-w-md bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl p-10 text-white">

        <!-- Logo / Branding -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold tracking-wide text-[#ffccd5]">
                Hotel Gunja
            </h1>
            <p class="text-gray-300 text-sm mt-2">
                Staff Portal
            </p>
            <div class="mt-3 text-xs text-gray-400">
                Admin • Receptionist • Cashier
            </div>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-400 text-red-200 px-4 py-2 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('auth.staff-login.submit') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm mb-2 text-gray-300">
                    Email Address
                </label>
                <div class="relative">
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 pl-10 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-[#ffccd5] focus:outline-none transition duration-300"
                        placeholder="Enter your email">
                    <span class="absolute left-3 top-3.5 text-gray-400">
                        ✉
                    </span>
                </div>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm mb-2 text-gray-300">
                    Password
                </label>
                <div class="relative">
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-3 pl-10 pr-10 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:ring-2 focus:ring-[#ffccd5] focus:outline-none transition duration-300"
                        placeholder="Enter your password">
                    <span class="absolute left-3 top-3.5 text-gray-400">
                        🔒
                    </span>

                    <!-- Toggle Password -->
                    <button type="button" onclick="togglePassword()" 
                        class="absolute right-3 top-3.5 text-gray-400 hover:text-white text-sm">
                        Show
                    </button>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-[#800020] to-[#a00030] text-white py-3 rounded-xl font-semibold shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                Sign In
            </button>
        </form>

        </form>
        <a href="{{ route('password.request') }}" class="text-sm text-gray-300 hover:text-white">
                    Forgot Password
                    </a>

        <!-- Footer -->
        <div class="mt-8 text-center text-xs text-gray-400">
            © {{ date('Y') }} Hotel Gunja. All rights reserved.
        </div>

    </div>

    <!-- Toggle Script -->
    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>

</body>
</html>