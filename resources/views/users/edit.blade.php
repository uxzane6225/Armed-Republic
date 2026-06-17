<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Update User') }}
        </h2>
    </x-slot>
    <div class="p-5 w-full h-full flex justify-center text-lg">
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="p-10 h-fit flex flex-col gap-2 bg-white rounded-xl shadow-xl">
             @csrf
            @method('PUT')
            <div class="flex flex-col gap-2">
                <input type="text" name="name" class="p-1" value="{{ $user->name }}" aria-label="Full Name" placeholder="Full Name">
                <input type="text" name="email" class="p-1" value="{{ $user->email }}" aria-label="Email" placeholder="Email">
                <select name="">
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="flex gap-2 justify-center">
                <button type="submit" class="p-1 text-white bg-blue-600 rounded-xl transition duration-300 hover:bg-blue-500">Update</button>
                <a href="{{ route('users.index') }}" class="p-1 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>