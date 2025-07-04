<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
         <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="bg-gray-100 text-gray-700 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Logo / Ime sajta -->
                <div class="text-lg font-semibold">
                    Thanks for visiting our site!
                </div>

                <!-- Navigacija -->
                <ul class="flex space-x-6 text-sm">
                    <li><a href="{{ route('welcome') }}" class="hover:text-black transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-black transition">About us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-black transition">Contact</a></li>
                </ul>

                <!-- Autorska prava -->
                <div class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} Company Name
                </div>
            </div>
        </footer>
    </body>
</html>
