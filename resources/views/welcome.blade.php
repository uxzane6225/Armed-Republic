<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-screen flex flex-col justify-evenly items-center">
        <header class="text-center">
            <h1 class="text-4xl font-bold border-b-4">Armed Republic</h1>
            <p>The right to protect and defend!</p>
        </header>
        <main>
            <div class="p-10 flex gap-10 bg-black text-xl text-white border border-white rounded-xl drop-shadow-xl">
                <a href="#" class="p-3 bg-white text-black rounded-xl hover:bg-gray-200 transition duration-400">Login</a>
                <a href="#" class="p-3 border border-white border-2 rounded-xl hover:bg-white hover:text-black transition duration-400">Register</a>
            </div>
        </main>
    </body>
</html>
