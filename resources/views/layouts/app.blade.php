<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '招財貓') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100">
    <div x-data="{ sidebarOpen: true }" class="min-h-screen">
        @include('layouts.navigation')

        <div class="flex">
            @include('layouts.sidebar')

            <main class="flex-1 p-8 transition-all duration-300 mt-16" :class="{'ml-64': sidebarOpen, 'ml-20': !sidebarOpen}">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>