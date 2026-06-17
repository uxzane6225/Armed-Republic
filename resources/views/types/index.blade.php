<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>
    <div class="p-5 w-full h-full flex flex-col gap-5">
        <div class="h-full w-full bg-gray-200 border border-b-black overflow-y-scroll">
            <table class="bg-gray-200 w-full">
                <thead class="text-white bg-black">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Type</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($types as $type)
                        <tr class="even:bg-gray-300 border border-b-gray-400">
                            <td class="p-2">{{ $type->id }}</td>
                            <td class="p-2">{{ $type->type }}</td>
                            <td class="p-2 flex justify-center gap-2">
                                <a href="{{ route('products.edit', $type->id) }}" class="p-1 text-white bg-blue-600 rounded-lg transition duration-300 hover:bg-blue-500">Edit</a>
                                <form action="{{ route('products.destroy', $type->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-1 text-white bg-red-600 rounded-lg transition duration-300 hover:bg-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full flex justify-end gap-2">
            <a href="{{ route('users.create') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Add Product</a>
            <a href="{{ route('types.index') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Type</a>
            <a href="{{ route('categories.index') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Category</a>
        </div>
    </div>
</x-app-layout>