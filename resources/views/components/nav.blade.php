<div class="flex items-center justify-between space-x-8 px-14 mt-2 mb-3" id="nav">
    <x-logo />
    <div>
        <ul class="center text-sm space-x-4">
            <li>
                <a href="/" class="{{ request()->is('/') ? 'font-extrabold ' : 'font-medium' }} 
              text-black rounded-md px-3 py-2 text-sm">
                    Home
                </a>
            </li>

            <li>
                <a href="/products" class="{{ request()->is('products') ? 'font-extrabold ' : 'font-medium' }} 
              text-black rounded-md px-3 py-2 text-sm">
                    Shop
                </a>
            </li>

            <li>
                <a href="/" class="{{ request()->is('#') ? 'font-extrabold ' : 'font-medium' }} 
              text-black rounded-md px-3 py-2 text-sm">
                    Contact Us
                </a>
            </li>

        </ul>
    </div>

    <div>
        <ul class="center space-x-4">
            <li>
                <x-svg.search />
            </li>
            <li>
                <x-svg.heart />
            </li>
            <li>
                <x-svg.cart />
            </li>
            @guest
            <li>
                <a href="/login">
                    <x-form-button class="nav-button">Login</x-form-button>
                </a>
            <li>
                <a href="/register">
                    <x-form-button class="nav-button">Sign Up</x-form-button>
                </a>
            </li>
            </li>
            @endguest
            @auth
            <form method="POST" action="/logout">
                @csrf
                <x-form-button class="nav-button">Log Out</x-form-button>
            </form>
            </li>
            </li>
            @endauth
        </ul>
    </div>
</div>