<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.tailwindcss.css">
    <style>
        /* Override agar DataTables tetap terang walau dark mode aktif */
        @media (prefers-color-scheme: dark) {

            /* Wrapper datatable */
            #default-table_wrapper,
            #default-table_wrapper select,
            #default-table_wrapper input,
            #default-table_wrapper table {
                background-color: white !important;
                color: black !important;
                border-color: #d1d5db !important;
                /* border-gray-300 */
            }

            /* Khusus input search di datatable */
            #default-table_wrapper input {
                background-color: white !important;
                color: black !important;
                border-color: #d1d5db !important;
            }

            #default-table thead th tr{
                background-color: #f9fafb !important;
                /* gray-50 */
                color: #1f2937 !important;
                /* gray-800 */
                border-color: #e5e7eb !important;
                /* gray-200 */
            }
        }
    </style>
    @routes
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.tailwindcss.js"></script>

    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: `{{ session('success') }}`,
            confirmButtonText: 'OK',
            timer: 2000
        });
        @endif
        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: `{{ session('error') }}`,
            confirmButtonText: 'OK',
            timer: 2000
        });
        @endif
    </script>
    @stack('scripts')
</body>

</html>