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
                <a href="/contact" class="{{ request()->is('contact') ? 'font-extrabold ' : 'font-medium' }} 
              text-black rounded-md px-3 py-2 text-sm">
                    Contact Us
                </a>
            </li>

        </ul>
    </div>

    <div>
        <ul class="center space-x-4">
            <li class="center">
                {{-- <form action="#">
                    <input type="text" placeholder="search">
                </form>
                <x-svg.search /> --}}
                {{-- <form action="#" method="GET">
                    <input :label="false" type="text" class="rounded-xl border px-2 outline-none" name="q" placeholder="Search" required>
                    <button type="submit" aria-label="Search" style="background: none; border: none; padding: 0; cursor: pointer;">
                        <x-svg.search />
                    </button>
                </form> --}}
                <form action="#" method="GET" id="searchForm" class="flex items-center">
                    <input id="searchInput" type="text" class="hidden rounded-xl border px-2 outline-none transition-all duration-300" 
                        name="q" placeholder="Search" required>
                    <button type="button" id="searchButton" aria-label="Search" style="background: none; border: none; padding: 0; cursor: pointer;">
                        <x-svg.search />
                    </button>
                </form>
                
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const searchButton = document.getElementById("searchButton");
                        const searchInput = document.getElementById("searchInput");
                
                        searchButton.addEventListener("click", function () {
                            searchInput.classList.toggle("hidden");  // Show/hide input
                            searchInput.focus(); // Focus on input when shown
                        });
                
                        document.addEventListener("click", function (event) {
                            if (!searchButton.contains(event.target) && !searchInput.contains(event.target)) {
                                searchInput.classList.add("hidden"); // Hide input when clicking outside
                            }
                        });
                    });
                </script>
                
            </li>
            <li>
                <x-svg.heart />
            </li>
            <li class="relative center">
                <button id="cartButton">
                    <x-svg.cart />
                </button>
                <div id="cartDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg p-2 hidden">
                    <p class="text-gray-700">Your cart is empty</p>
                    <a href="#">
                    <button class="w-full text-left text-blue-500 mt-2">View Cart</button>
                </a>
                </div>
            </li>
            <li class="center">
                <a href="/profile"><x-svg.profile /></a>
            </li>
            
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const cartButton = document.getElementById("cartButton");
                    const cartDropdown = document.getElementById("cartDropdown");
            
                    cartButton.addEventListener("click", function (event) {
                        event.stopPropagation(); // Prevent event from bubbling to document
                        cartDropdown.classList.toggle("hidden");
                    });
            
                    document.addEventListener("click", function (event) {
                        if (!cartButton.contains(event.target) && !cartDropdown.contains(event.target)) {
                            cartDropdown.classList.add("hidden");
                        }
                    });
                });
            </script>
            
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