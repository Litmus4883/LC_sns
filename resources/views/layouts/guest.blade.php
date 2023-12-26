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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-white">
            <div class="bg-red-300 px-2 mb-6 font-mono text-4xl">
                <h1>Let's login or register!!</h1>
            </div>
            <div>
                <a href="/" class="bg-yellow-300 py-2 text-4xl">
                    🍊
                </a>
            </div>

            <div class="border-dashed border-8 border-gray-300 w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
