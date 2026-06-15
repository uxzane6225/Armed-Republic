<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-12 h-full grid grid-cols-2 justify-items-center items-center">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div> --}}
        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">0</h3>
            <p>Total Users</p>
        </div>

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">0</h3>
            <p>Total Admins</p>
        </div>

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">0</h3>
            <p>Total Employees</p>
        </div>

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">0</h3>
            <p>Total Customers</p>
        </div>

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">0</h3>
            <p>Total Products</p>
        </div>

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">0</h3>
            <p>Total Sales</p>
        </div>
    </div>
</x-app-layout>
