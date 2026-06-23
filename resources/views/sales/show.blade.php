<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales Detail') }}
        </h2>
        <p>Sale ID: {{ $sale->id }}</p>
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
    <div class="p-5 w-full h-full flex flex-col gap-5">
        <div class="h-full flex flex-col gap-10 lg:grid grid-cols-2 lg:gap-5">
            <form action="{{ route('saleDetails.store') }}" method="POST" class="flex flex-col gap-2">
                @csrf
                <input type="text" name="sales_id" value="{{ $sale->id }}" hidden>
                <div class="flex flex-col gap-1">
                    <label for="product_id">Products</label>
                    <select id="product_id" name="product_id" placeholder="Products">
                        @foreach ($product as $prod)
                            <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="1"placeholder="Total Cost">
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="py-1 px-5 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Add</button>
                    <a href="{{ route('sales.index', $sale->id) }}" class="py-1 px-5 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
                </div>
            </form>
            <div class="h-full w-full bg-gray-200 border border-b-black overflow-y-scroll">
                <table class="bg-gray-200 w-full">
                    <thead class="text-white bg-black">
                        <tr>
                            <th class="p-2">ID</th>
                            <th class="p-2">Sale ID</th>
                            <th class="p-2">Product</th>
                            <th class="p-2">Quantity</th>
                            <th class="p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($saleDetails as $saleDetail)
                            @if($saleDetail->sales_id == $sale->id)
                                <tr class="even:bg-gray-300 border border-b-gray-400">
                                    <td class="p-2">{{ $saleDetail->id }}</td>
                                    <td class="p-2">{{ $saleDetail->sales_id }}</td>
                                    <td class="p-2">{{ $saleDetail->product->name }}</td>
                                    <td class="p-2">{{ $saleDetail->quantity }}</td>
                                    <td class="p-2 flex justify-center gap-2">
                                        <a href="{{ route('saleDetails.edit', $saleDetail->id) }}" class="py-1 px-2 text-white bg-blue-600 rounded-lg transition duration-300 hover:bg-blue-500">Edit</a>
                                        <form action="{{ route('saleDetails.destroy', $saleDetail->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="py-1 px-2 text-white bg-red-600 rounded-lg transition duration-300 hover:bg-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                            
                        @endforeach
                    </tbody>
                </table>
                @if($saleDetails->hasPages())
                    <div class="p-2 text-white bg-black">
                        {{ $saleDetails->links() }}
                    </div>
                @endif
            </div>
        </div>
        <div class="w-full flex justify-end gap-2">
            {{-- <a href="{{ route('saleDetails.create', $sale->id) }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Add Product to the Sale</a> --}}
            <a href="{{ route('sales.index') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Go Back</a>
        </div>
    </div>
</x-app-layout>