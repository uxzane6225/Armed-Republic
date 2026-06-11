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
                    <h1 class="w-50 text-4xl font-bold border-b-4">Choose</h1>
                    <p class="px-35">If you have an account, press the 'Login' button, but if you don't have an account, feel free to press the 'Register' button.</p>
                </header>
                <div class="flex flex-col gap-5 text-center text-xl">
                    <a href="" class="py-2 w-100 bg-black text-white rounded-xl transition duration-400 hover:bg-gray-800">Login</a>
                    <a href="" class="py-2 w-100 border-2 border-black rounded-xl transition duration-400 hover:bg-black hover:text-white">Register</a>
                </div>
            </div>
            <div class="h-screen w-full flex flex-col justify-center items-center text-center text-white bg-black">
                <h1 class="text-4xl font-bold border-b-4">Armed Republic</h1>
                <p>The right to protect and defend!</p>
            </div> 
        </main>
        {{-- <header class="text-center">
            <h1 class="text-4xl font-bold border-b-4">Armed Republic</h1>
            <p>The right to protect and defend!</p>
        </header>
        <main>
            <div class="p-10 flex gap-10 bg-black text-xl text-white border border-white rounded-xl drop-shadow-xl">
                <a href="#" class="p-3 bg-white text-black rounded-xl hover:bg-gray-200 transition duration-400">Login</a>
                <a href="#" class="p-3 border border-white border-2 rounded-xl hover:bg-white hover:text-black transition duration-400">Register</a>
            </div>
        </main> --}}
    </body>
</html>
