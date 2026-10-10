<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('images/icon.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-screen">
        <main class="h-screen lg:grid grid-cols-3">
            <div class="h-full w-full flex flex-col justify-evenly items-center bg-white">
                {{ $slot }}
            </div>
            <div style="background-image: url('{{ asset('images/bg2.jpg') }}')" class="h-full w-full hidden col-span-2 lg:flex flex-col justify-center items-center text-center text-white bg-black bg-no-repeat bg-cover bg-bottom">
                <h1 class="text-4xl font-bold border-b-4">Armed Republic</h1>
                <p>The right to protect and defend!</p>
            </div> 
        </main>
    </body>
    {{-- <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body> --}}
</html>
