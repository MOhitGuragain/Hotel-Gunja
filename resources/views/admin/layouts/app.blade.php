<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel – Hotel Gunja</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen">

    {{-- Admin Header --}}
    <header class="bg-black text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-lg font-semibold">Hotel Gunja — {{ auth()->user()->name }}</h1>

            {{-- later: Logout --}}
        </nav>
    </header>

    {{-- Admin Content --}}
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
