<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
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
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="p-5 w-full h-full flex flex-col gap-5 text-lg">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-2">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ $category->category }}" placeholder="Type">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="p-1 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Edit</button>
            <a href="{{ route('categories.index') }}" class="p-1 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</x-app-layout>