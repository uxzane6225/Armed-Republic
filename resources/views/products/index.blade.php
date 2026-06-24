<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="p-5 w-full h-full flex flex-col gap-5">
        <div class="h-full w-full bg-gray-200 border border-b-2 border-b-black overflow-scroll lg:overflow-hidden">
            <table class="bg-gray-200 w-full">
                <thead class="text-white bg-black">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Product Name</th>
                        <th class="p-2">Category</th>
                        <th class="p-2">Type</th>
                        <th class="p-2">Stock</th>
                        <th class="p-2">Price</th>
                        <th class="p-2">Created</th>
                        <th class="p-2">Updated</th>
                        <th class="p-2">Last Interaction</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($products as $product)
                        <tr class="even:bg-gray-300 border border-b-gray-400">
                            <td class="p-2">{{ $product->id }}</td>
                            <td class="p-2">{{ $product->name }}</td>
                            <td class="p-2">{{ $product->category->category }}</td>
                            <td class="p-2">{{ $product->type->type }}</td>
                            <td class="p-2">{{ $product->stock }}</td>
                            <td class="p-2">{{ $product->price }}</td>
                            <td class="p-2">{{ $product->created_at }}</td>
                            <td class="p-2">{{ $product->updated_at }}</td>
                            <td class="p-2">{{ $product->user->name }}</td>
                            <td class="p-2 flex justify-center gap-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="py-1 px-5 text-white bg-blue-600 rounded-lg transition duration-300 hover:bg-blue-500">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="py-1 px-5 text-white bg-red-600 rounded-lg transition duration-300 hover:bg-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($products->hasPages())
                <div class="p-2 text-white bg-black">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
        <div class="w-full flex justify-end gap-2">
            <a href="{{ route('products.create') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Add Product</a>
            <a href="{{ route('types.index') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Type</a>
            <a href="{{ route('categories.index') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Category</a>
        </div>
    </div>
</x-app-layout>