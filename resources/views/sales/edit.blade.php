<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Edit Sale') }}
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
    <form action="{{ route('sales.update', $sale->id) }}" method="POST" class="p-5 w-full h-full flex flex-col gap-2 text-lg">
        @csrf
        @method('PUT')
        <input type="text" name="employee_id" value="{{ auth()->user()->id }}" hidden>
        <div class="flex flex-col gap-1">
            <label for="customer_id">Customer</label>
            <select id="customer_id" name="customer_id" placeholder="Customer ID">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $sale->customer_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-1">
            <label for="total_cost">Total Cost</label>
            <input type="number" id="total_cost" name="total_cost" value="{{ $sale->total_cost }}" placeholder="Total Cost">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="p-1 text-white bg-black rounded-xl transition duration-300 hover:bg-gray-800">Update</button>
            <a href="{{ route('sales.index') }}" class="p-1 bg-gray-300 rounded-xl transition duration-300 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</x-app-layout>