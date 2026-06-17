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
    <form action="{{ route('products.store') }}" method="POST" class="p-5 w-full h-full flex flex-col gap-2 text-lg">
        @csrf
        <input type="text" name="employee_id" value="{{ auth()->user()->id }}" hidden>
        <div class="flex flex-col gap-1">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" placeholder="Product Name">
        </div>
        <div class="flex flex-col gap-1">
            <label for="price">Price</label>
            <input type="number" id="napriceme" name="price" placeholder="Price">
        </div>
        <div class="flex flex-col gap-1">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" placeholder="Stock">
        </div>
        <div class="flex flex-col gap-1">
            <label for="type">Product Type</label>
            <select id="type" name="type_id" placeholder="Product Type">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-1">
            <label for="category">Product Categories</label>
            <select id="category" name="category_id" placeholder="Product Categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="p-1 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Add</button>
            <a href="{{ route('products.index') }}" class="p-1 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</x-app-layout>