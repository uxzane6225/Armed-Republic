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
    <body class="font-sans antialiased">
        <div class="min-h-screen grid grid-cols-5 bg-gray-100">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            {{-- @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}
            <nav class="p-5 w-full flex flex-col justify-between gap-5 text-white bg-black">
                <div>
                    <div class="p-2 border border-2 border-t-black border-l-black border-r-black border-b-white">
                    <h1 class="text-3xl font-bold">Control Panel</h1>
                </div>
                <div class="py-5 flex flex-col">
                    <h2 class="text-sm">Menu</h2>
                        <div class="py-2 flex flex-col gap-2 border border-t-white border-l-black border-r-black border-b-black">
                            <a href="{{ route('dashboard') }}" class="p-2 hover:text-yellow-300 transition duration-300 border border-2 border-t-black border-l-white border-r-black border-b-black hover:bg-gray-900">
                                Dashboard
                            </a>
                            <a href="{{ route('dashboard') }}" class="p-2 hover:text-yellow-300 transition duration-300 border border-2 border-t-black border-l-white border-r-black border-b-black hover:bg-gray-900">
                                User
                            </a>
                            <a href="{{ route('dashboard') }}" class="p-2 hover:text-yellow-300 transition duration-300 border border-2 border-t-black border-l-white border-r-black border-b-black hover:bg-gray-900">
                                Inventory
                            </a>
                            <a href="{{ route('dashboard') }}" class="p-2 hover:text-yellow-300 transition duration-300 border border-2 border-t-black border-l-white border-r-black border-b-black hover:bg-gray-900">
                                Sales
                            </a>
                            <a href="{{ route('dashboard') }}" class="p-2 hover:text-yellow-300 transition duration-300 border border-2 border-t-black border-l-white border-r-black border-b-black hover:bg-gray-900">
                                Mail / Report
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="p-2 flex flex-col gap-2 border border-2 border-t-white border-l-black border-r-black border-b-white">
                    <div class="p-2 flex items-center justify-center gap-5">
                        <img src="#" alt="Profile Picture" class="w-20 h-20 bg-gray-200 rounded-full">
                        <div>
                            <a class="text-2xl font-bold">Username</a>
                            <p>email@email.com</p>
                        </div>
                    </div>
                    <div class="flex flex-col text-center">
                        <a href="{{ route('dashboard') }}" class="p-2 text-lg hover:text-yellow-300 transition duration-300 hover:bg-gray-900">
                            Main Site
                        </a>
                        <a href="{{ route('dashboard') }}" class="p-2 text-lg hover:text-yellow-300 transition duration-300 hover:bg-gray-900">
                            Settings
                        </a>
                        <a href="{{ route('dashboard') }}" class="p-2 text-lg hover:text-yellow-300 transition duration-300 hover:bg-gray-900">
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
            <div class="min-h-screen col-span-4">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
                <main class="h-screen">
                    {{ $slot }}
                </main>
            </div>
            <!-- Page Content -->
        </div>
    </body>
</html>
