<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Add Product to the Sale') }}
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
    <form action="{{ route('saleDetails.store') }}" method="POST" class="p-5 w-full h-full flex flex-col gap-2 text-lg">
        @csrf
        <input type="text" name="sales_id" value="{{ $sale->id }}">
        <div class="flex flex-col gap-1">
            <label for="product_id">Products</label>
            <select id="product_id" name="product_id" placeholder="Products">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-1">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="1"placeholder="Total Cost">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="p-1 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Add</button>
            <a href="{{ route('sales.index', $sale->id) }}" class="p-1 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</x-app-layout>