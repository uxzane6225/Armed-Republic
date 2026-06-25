<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
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
    <form action="{{ route('products.update', $product->id) }}" method="POST" class="p-10 h-fit flex flex-col gap-2">
        @csrf
        @method('PUT')
        
        <input type="text" name="employee_id" value="{{ auth()->user()->id }}" hidden>
        <div class="flex flex-col gap-1">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" placeholder="Product Name">
            @if($errors->has('name'))
                <p class="text-red-500">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="flex flex-col gap-1">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" placeholder="Price">
            @if($errors->has('price'))
                <p class="text-red-500">{{ $errors->first('price') }}</p>
            @endif
        </div>
        <div class="flex flex-col gap-1">
            <label for="stock">Stock</label>
            <input type="number" id="stock" value="{{ $product->stock }}" name="stock" placeholder="Stock">
            @if($errors->has('stock'))
                <p class="text-red-500">{{ $errors->first('stock') }}</p>
            @endif
        </div>
        <div class="flex flex-col gap-1">
            <label for="type">Product Type</label>
            <select id="type" name="type_id" placeholder="Product Type">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $product->type_id == $type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                @endforeach
            </select>
            @if($errors->has('type_id'))
                <p class="text-red-500">{{ $errors->first('type_id') }}</p>
            @endif
        </div>
        <div class="flex flex-col gap-1">
            <label for="category">Product Categories</label>
            <select id="category" name="category_id" placeholder="Product Categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                @endforeach
            </select>
            @if($errors->has('category_id'))
                <p class="text-red-500">{{ $errors->first('category_id') }}</p>
            @endif
        </div>
        <div class="flex gap-2">
            <button type="submit" class="py-1 px-5 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Update</button>
            <a href="{{ route('products.index') }}" class="py-1 px-5 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</x-app-layout>