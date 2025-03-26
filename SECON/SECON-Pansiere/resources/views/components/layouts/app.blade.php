<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'SECON' }}</title>
</head>

<body class="h-screen overflow-hidden bg-white antialiased">
    <!-- Sidebar -->
    <x-sidebar />

    <!-- Page Content -->
    <main class="sm:ml-64 flex items-center justify-center h-full overflow-hidden">
        {{ $slot }}
    </main>
</body>

</html>
