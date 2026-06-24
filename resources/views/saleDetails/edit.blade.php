<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Edit Sale Detail') }}
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
    <form action="{{ route('saleDetails.update', $saleDetail->id) }}" method="POST" class="p-5 w-full h-full flex flex-col gap-2 text-lg">
        @csrf
        @method('PUT')

        <div class="flex flex-col gap-1">
            <label for="product_id">Products</label>
            <select id="product_id" name="product_id" placeholder="Products">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $saleDetail->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
            @if($errors->has('product_id'))
                <p class="text-red-500">{{ $errors->first('product_id') }}</p>
            @endif
        </div>
        <div class="flex flex-col gap-1">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="{{ $saleDetail->quantity }}"placeholder="Total Cost">
            @if($errors->has('quantity'))
                <p class="text-red-500">{{ $errors->first('quantity') }}</p>
            @endif
        </div>
        <div class="flex gap-2">
            <button type="submit" class="py-1 px-5 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Edit</button>
            <a href="{{ route('sales.show', $saleDetail->sales_id) }}" class="py-1 px-5 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</x-app-layout>