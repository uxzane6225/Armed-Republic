<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" href="{{ asset('images/icon.png') }}">
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
            <div class="h-screen w-full flex-col justify-center items-center text-center text-white bg-black bg-[url(https://images.unsplash.com/photo-1619760563678-02e23d15f69f?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D)] bg-no-repeat bg-cover bg-center hidden lg:flex">
                <h1 class="text-5xl text-shadow-lg/20 font-bold border-white border-b-4">Armed Republic</h1>
                <p class="text-lg text-shadow-lg/20">The right to protect and defend!</p>
            </div> 
        </main>
    </body>
</html>