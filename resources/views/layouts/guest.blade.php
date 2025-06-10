<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $websiteName ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="logo.png" type="image/x-icon">
    <style>
        header {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    @if (!Route::has('/login') || !Route::has('/register'))
    <header class="bg-white">
        <div class="container mx-auto px-6 py-6 flex justify-between items-center">
            <a href="/" class="flex items-center gap-4">
                <x-application-logo class="block h-12 w-auto" />
                <div class="text-2xl font-bold text-green-600">
                    {{ $websiteName ?? config('app.name', 'Laravel') }}
                </div>
            </a>
            <nav class="flex items-center space-x-8">
                <a href="/" class="text-green-600 hover:text-green-800">Jelajahi Desa</a>
                <a href="#peta" class="text-green-600 hover:text-green-800">Peta Desa</a>
                <a href="#berita" class="text-green-600 hover:text-green-800">Berita</a>
                <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800">Login</a>
            </nav>
        </div>
    </header>
    @endif

    {{ $slot }}
    <!-- Footer -->
    @if (!Route::is('/login') || !Route::is('/register'))
    <footer class="bg-gray-800 text-gray-400 py-12">
        <div class="container mx-auto px-6 text-center">
            <p class="text-lg font-semibold mb-4">&copy; 2025 Desa Perkebunan Tambunan. Semua Hak Dilindungi.</p>
        </div>
    </footer>
    @endif
    @stack('scripts')
</body>

</html>