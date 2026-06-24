<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales') }}
        </h2>
    </x-slot>
    <div class="p-5 w-full h-full flex flex-col gap-5">
        <div class="h-full w-full bg-gray-200 border border-b-black overflow-y-scroll lg:overflow-hidden">
            <table class="bg-gray-200 w-full">
                <thead class="text-white bg-black">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Customer</th>
                        <th class="p-2">Employee</th>
                        <th class="p-2">Total Cost</th>
                        <th class="p-2">Conducted</th>
                        <th class="p-2">Updated</th>
                        <th class="p-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($sales as $sale)
                        <tr class="even:bg-gray-300 border border-b-gray-400">
                            <td class="p-2">{{ $sale->id }}</td>
                            <td class="p-2">{{ $sale->customer->name }}</td>
                            <td class="p-2">{{ $sale->employee->name }}</td>
                            <td class="p-2">{{ $sale->total_cost }}</td>
                            <td class="p-2">{{ $sale->created_at }}</td>
                            <td class="p-2">{{ $sale->updated_at }}</td>
                            <td class="p-2 flex justify-center gap-2">
                                <a href="{{ route('sales.edit', $sale->id) }}" class="py-1 px-5 text-white bg-blue-600 rounded-lg transition duration-300 hover:bg-blue-500">Edit</a>
                                <a href="{{ route('sales.show', $sale->id) }}" class="py-1 px-5 text-white bg-purple-600 rounded-lg transition duration-300 hover:bg-purple-500">Details</a>
                                <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="py-1 px-5 text-white bg-red-600 rounded-lg transition duration-300 hover:bg-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($sales->hasPages())
                <div class="p-2 text-white bg-black">
                    {{ $sales->links() }}
                </div>
            @endif
        </div>
        <div class="w-full flex justify-end gap-2">
            <a href="{{ route('sales.create') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">Add Sale</a>
        </div>
        
    </div>
</x-app-layout>