<nav class="p-5 w-full flex items-center justify-between text-white bg-black">
    <div class="flex gap-10 items-center">
        <h1 class="font-bold text-xl"><a href="{{ route('home') }}">Armed Republic</a></h1>
        <ul class="flex gap-5">
            <li><a href="{{ route('home') }}" class="transition duration-300 hover:text-yellow-300">Home</a></li>
            <li><a href="{{ route('store') }}" class="transition duration-300 hover:text-yellow-300">Store</a></li>
            <li><a href="{{ route('articles') }}" class="transition duration-300 hover:text-yellow-300">Articles</a></li>
            <li><a href="{{ route('forums') }}" class="transition duration-300 hover:text-yellow-300">Forums</a></li>
            <li><a href="{{ route('contact') }}" class="transition duration-300 hover:text-yellow-300">Contact</a></li>
            <li><a href="{{ route('about') }}" class="transition duration-300 hover:text-yellow-300">About</a></li>
            <li><a href="{{ route('profile') }}" class="transition duration-300 hover:text-yellow-300">Profile</a></li>
            @if(auth()->user()->role == "admin")
                <li><a href="{{ route('dashboard') }}" class="transition duration-300 hover:text-yellow-300">Control Panel</a></li>
            @endif
        </ul>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="transition duration-300 hover:text-yellow-300">
            Logout
        </button>
    </form>
</nav>