<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Update User') }}
        </h2>
    </x-slot>
    {{-- @if($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="p-10 h-fit flex flex-col gap-2">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-2">
            <div class="flex flex-col">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="p-1" value="{{ $user->name }}" placeholder="Full Name">
                 @if($errors->has('name'))
                    <p class="text-red-500">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="flex flex-col">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="p-1" value="{{ $user->email }}" placeholder="Email">
                 @if($errors->has('email'))
                    <p class="text-red-500">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="flex flex-col">
                <label for="role">Role <span>(Don't forget to re-assign the right role again)</span></label>
                <select id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                    <option value="staff">Staff</option>
                    {{-- @foreach ($users as $usr)
                        <option value="{{ $usr->role }}" {{ $user->role == $usr->role ? 'selected' : '' }}>{{ $usr->role }}</option>
                    @endforeach --}}
                </select>
                 @if($errors->has('role'))
                    <p class="text-red-500">{{ $errors->first('role') }}</p>
                @endif
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="py-1 px-5 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Update</button>
            <a href="{{ route('users.index') }}" class="py-1 px-5 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</x-app-layout>