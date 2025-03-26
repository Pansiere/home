<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')

    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="relative min-h-screen">
        <livewire:components.sidebar />
        <div class="lg:ml-64">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-lg font-bold">{{ $title ?? 'Page Title' }}</h1>
                <button id="openSidebar" class="text-gray-800 lg:hidden focus:outline-none">
                    ☰
                </button>
            </header>
            <main class="p-2">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>

<script src="https://kit.fontawesome.com/a8c71ee175.js" crossorigin="anonymous"></script>
@stack('scripts')
