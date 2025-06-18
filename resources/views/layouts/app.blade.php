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
        
        <style>
            :root {
                --color-primary: #FF4B2B;
                --color-primary-light: #FF8A65;
                --color-primary-dark: #E53935;
                --color-bg-light: #FDFDFC;
                --color-bg-dark: #1a1a1a;
                --color-text-light: #1b1b18;
                --color-text-dark: #EDEDEC;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-[var(--color-bg-light)] dark:bg-[var(--color-bg-dark)]">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-[#252525] shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="bg-[var(--color-bg-light)] dark:bg-[var(--color-bg-dark)]">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>