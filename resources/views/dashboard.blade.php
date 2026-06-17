<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="h-full grid grid-cols-2 justify-items-center items-center">
        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">{{ $total_users }}</h3>
            <p>Total Users</p>
        </div>

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">{{ $admin_count }}</h3>
            <p>Total Admins</p>
        </div>

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">{{ $user_count }}</h3>
            <p>Total Users</p>
        </div>

        {{-- <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">0</h3>
            <p>Total Customers</p>
        </div> --}}

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">{{ $total_products }}</h3>
            <p>Total Products</p>
        </div>

        <div class="p-5 w-1/2 text-center bg-black text-white rounded-xl transition duration-300 hover:scale-105">
            <h3 class="font-bold text-2xl">0</h3>
            <p>Total Sales</p>
        </div>
    </div>
</x-app-layout>
