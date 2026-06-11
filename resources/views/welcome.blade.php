<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-screen">
        <main class="h-screen flex flex-row">
            <div class="h-screen w-full flex flex-col justify-evenly items-center bg-white">
                <header class="flex flex-col items-center gap-2 text-center">
                    <h1 class="text-4xl font-bold border-black border-b-4">Choose</h1>
                    <p class="px-20">If you have an account, press the 'Login' button, but if you don't have an account, feel free to press the 'Register' button.</p>
                </header>
                <div class="px-20 w-full flex flex-col gap-5 text-center text-xl">
                    <a href="{{ route('login') }}" class="py-2 w-100 bg-black text-white rounded-xl transition duration-400 hover:bg-gray-800">Login</a>
                    <a href="{{ route('register') }}" class="py-2 w-100 border-2 border-black rounded-xl transition duration-400 hover:bg-black hover:text-white">Register</a>
                </div>
            </div>
            <div class="h-screen w-full flex flex-col justify-center items-center text-center text-white bg-black">
                <h1 class="text-4xl font-bold border-b-4">Armed Republic</h1>
                <p>The right to protect and defend!</p>
            </div> 
        </main>
    </body>
</html>
