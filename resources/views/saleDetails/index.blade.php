<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales Detail') }}
        </h2>
    </x-slot>
    <div class="p-5 w-full h-full flex flex-col gap-5">
        <div class="h-full w-full bg-gray-200 border border-b-black overflow-y-scroll">
            <table class="bg-gray-200 w-full">
                <thead class="text-white bg-black">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Sale ID</th>
                        <th class="p-2">Product</th>
                        <th class="p-2">Quantity</th>
                        <th class="p-2">Added At</th>
                        <th class="p-2">Updated At</th>
                        <th class="p-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($saleDetails as $saleDetail)
                        <tr class="even:bg-gray-300 border border-b-gray-400">
                            <td class="p-2">{{ $saleDetail->id }}</td>
                            <td class="p-2">{{ $saleDetail->product_id }}</td>
                            <td class="p-2">{{ $saleDetail->sales_id }}</td>
                            <td class="p-2">{{ $saleDetail->quantity }}</td>
                            <td class="p-2">{{ $saleDetail->created_at }}</td>
                            <td class="p-2">{{ $saleDetail->updated_at }}</td>
                            <td class="p-2 flex justify-center gap-2">
                                <a href="{{ route('saleDetails.edit', $saleDetail->id) }}" class="p-1 text-white bg-blue-600 rounded-lg transition duration-300 hover:bg-blue-500">Edit</a>
                                <form action="{{ route('saleDetails.destroy', $saleDetail->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-1 text-white bg-red-600 rounded-lg transition duration-300 hover:bg-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($saleDetails->hasPages())
                <div class="p-2 text-white bg-black">
                    {{ $saleDetails->links() }}
                </div>
            @endif
        </div>
        <div>
            <p>Sale ID: {{ $sale->id }}</p>
        </div>
        <div class="w-full flex justify-end gap-2">
            <a href="{{ route('saleDetails.create', $sale->id) }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Add Product to the Sale</a>
            <a href="{{ route('sales.index') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Go Back</a>
        </div>
        
    </div>
</x-app-layout>