<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="p-5 w-full h-full flex flex-col gap-5">
        <div class="h-full w-full bg-gray-200 border border-b-black overflow-y-scroll">
            <table class="bg-gray-200 w-full">
                <thead class="text-white bg-black">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Full Name</th>
                        <th class="p-2">Email</th>
                        {{-- <th>Phone #</th>
                        <th>Address</th> --}}
                        <th class="p-2">Role</th>
                        <th class="p-2">Join Date</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                        <tr class="even:bg-gray-300 border border-b-gray-400">
                            <td class="p-2">{{ $user->id }}</td>
                            <td class="p-2">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            {{-- <td>{{ $user->phone }}<td>
                            <td>{{ $user->address }}</td> --}}
                            <td class="p-2">{{ $user->role }}</td>
                            <td class="p-2">{{ $user->created_at }}</td>
                            <td class="p-2 flex justify-center gap-2">
                                <a href="{{ route('users.edit', $user->id) }}" class="p-1 text-white bg-blue-600 rounded-lg transition duration-300 hover:bg-blue-500">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-1 text-white bg-red-600 rounded-lg transition duration-300 hover:bg-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($users->hasPages())
                <div class="p-2 text-white bg-black">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
        
        <a href="{{ route('users.create') }}" class="p-2 w-fit self-end text-white bg-black hover:bg-gray-800 rounded-lg transition duration-300">
            Create User
        </a>
    </div>
</x-app-layout>