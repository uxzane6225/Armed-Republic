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
            <div class="h-screen w-full lg:w-6/12 flex flex-col justify-evenly items-center bg-white">
                <header class="flex flex-col items-center gap-2 text-center">
                    <h1 class="text-4xl font-bold border-black border-b-4 lg:hidden">Armed Republic</h1>
                    <h1 class="hidden text-4xl font-bold border-black border-b-4 lg:block">Choose</h1>
                    <p class="px-20 lg:hidden">The right to protect and defend!</p>
                    <p class="hidden px-20 lg:block">If you have an account, press the 'Login' button, but if you don't have an account, feel free to press the 'Register' button.</p>
                </header>
                <div class="px-20 w-full flex flex-col gap-5 text-center text-xl">
                    <a href="{{ route('login') }}" class="py-2 w-100 bg-black text-white rounded-xl transition duration-400 hover:bg-gray-800">Login</a>
                    <a href="{{ route('register') }}" class="py-2 w-100 border-2 border-black rounded-xl transition duration-400 hover:bg-black hover:text-white">Register</a>
                </div>
            </div>
            <div class="h-screen w-full flex-col justify-center items-center text-center text-white bg-[url(../../../../storage/app/public/images/bg2.jpg)] bg-no-repeat bg-cover bg-bottom hidden lg:flex">
                <h1 class="text-5xl text-shadow-lg/20 font-bold border-white border-b-4">Armed Republic</h1>
                <p class="text-lg text-shadow-lg/20">The right to protect and defend!</p>
            </div> 
        </main>
    </body>
</html>
