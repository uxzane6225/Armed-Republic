<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Add Type') }}
        </h2>
    </x-slot>
    @if($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('types.store') }}" method="POST" class="p-5 w-full h-full flex flex-col gap-5 text-lg">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="type">Type</label>
            <input type="text" id="type" name="type" placeholder="Type">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="py-1 px-5 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Add</button>
            <a href="{{ route('types.index') }}" class="py-1 px-5 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</x-app-layout>