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
        
        <!-- Font Awesome untuk ikon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Data pengguna untuk chat - penting untuk fitur chat -->
        @auth
        <script id="user-data" type="application/json" data-user-id="{{ auth()->id() }}" data-user-name="{{ auth()->user()->name }}" data-user-email="{{ auth()->user()->email }}"></script>
        @endauth

        <!-- Scripts -->
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
            
            <!-- Container Vue untuk Chat Widget - PENTING! -->
            <div id="app">
                <chat-widget></chat-widget>
            </div>
        </div>
        
        <!-- Tambahkan debug info untuk membantu troubleshooting -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM fully loaded');
                if (document.getElementById('app')) {
                    console.log('App element found');
                } else {
                    console.error('App element NOT found');
                }
            });
        </script>
    </body>
</html>