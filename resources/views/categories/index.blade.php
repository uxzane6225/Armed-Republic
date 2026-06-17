<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <div class="p-5 w-full h-full flex flex-col gap-5">
        <div class="h-full w-full bg-gray-200 border border-b-black">
            <table class="bg-gray-200 w-full">
                <thead class="text-white bg-black">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Cateogory</th>
                        <th class="p-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($categories as $category)
                        <tr class="even:bg-gray-300 border border-b-gray-400">
                            <td class="p-2">{{ $category->id }}</td>
                            <td class="p-2">{{ $category->category }}</td>
                            <td class="p-2 flex justify-center gap-2">
                                <a href="{{ route('categories.edit', $category->id) }}" class="p-1 text-white bg-blue-600 rounded-lg transition duration-300 hover:bg-blue-500">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-1 text-white bg-red-600 rounded-lg transition duration-300 hover:bg-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($categories->hasPages())
                <div class="p-2 text-white bg-black">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
        <div class="w-full flex justify-end gap-2">
            <a href="{{ route('categories.create') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Add Category</a>
            <a href="{{ route('types.index') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Type</a>
            <a href="{{ route('products.index') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Products</a>
        </div>
        
    </div>
</x-app-layout>