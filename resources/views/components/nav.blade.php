<div class="flex justify-between space-x-8 px-14 mt-2 mb-3" id="nav">
    <div>
        <a href="/"> <x-logo /></a>
    </div>
    <div class="center">
        <ul class="center text-sm space-x-4">
            <li>
                <a href="/"
                    class="{{ request()->is('/') ? 'font-extrabold ' : 'font-medium' }} 
              text-black rounded-md px-3 py-2 text-sm">
                    Home
                </a>
            </li>

            <li>
                <a href="/products"
                    class="{{ request()->is('products') ? 'font-extrabold ' : 'font-medium' }} 
              text-black rounded-md px-3 py-2 text-sm">
                    Shop
                </a>
            </li>

            <li>
                <a href="/contact"
                    class="{{ request()->is('contact') ? 'font-extrabold ' : 'font-medium' }} 
              text-black rounded-md px-3 py-2 text-sm">
                    Contact Us
                </a>
            </li>

        </ul>
    </div>

    <div>
        <ul class="center space-x-4">
            <li class="center">
                <form action="/search" method="GET" id="searchForm" class="flex items-center">
                    <input id="searchInput" type="text"
                        class="hidden rounded-xl border px-2 outline-none transition-all duration-300" name="q"
                        placeholder="Search for products..." value="{{ request('q') }}" autocomplete="off" required>
                    <button type="button" id="searchButton" aria-label="Search">
                        <x-svg.search />
                    </button>
                </form>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const searchButton = document.getElementById("searchButton");
                        const searchInput = document.getElementById("searchInput");
                        const searchForm = document.getElementById("searchForm");

                        searchButton.addEventListener("click", function() {
                            if (searchInput.classList.contains("hidden")) {
                                let length = searchInput.value.length; // Get current input length
                                // Show input and focus on it
                                searchInput.classList.remove("hidden");
                                searchInput.focus();
                                searchInput.setSelectionRange(length, length);
                            } else {
                                // If input is already visible, trigger search only if it has a value
                                if (searchInput.value.trim() !== "") {
                                    searchForm.submit();
                                }
                            }
                        });

                        // Allow "Enter" key to trigger search
                        searchInput.addEventListener("keypress", function(event) {
                            if (event.key === "Enter") {
                                event.preventDefault(); // Prevent default form submission
                                searchForm.submit();
                            }
                        });

                        // Hide search input when clicking outside
                        document.addEventListener("click", function(event) {
                            if (!searchButton.contains(event.target) && !searchInput.contains(event.target)) {
                                searchInput.classList.add("hidden");
                            }
                        });
                    });
                </script>

            </li>
            <li>
                <a href="/wishlist">
                    <x-svg.heart />
                </a>
            </li>
            <li>
                <a href="/cart">
                    <x-svg.cart />
                </a>
            </li>
            @auth
                <li class="center">
                    <a href="/profile"><x-svg.profile /></a>
                </li>
            @endauth


            {{-- <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const cartButton = document.getElementById("cartButton");
                    const cartDropdown = document.getElementById("cartDropdown");

                    cartButton.addEventListener("click", function(event) {
                        event.stopPropagation(); // Prevent event from bubbling to document
                        cartDropdown.classList.toggle("hidden");
                    });

                    document.addEventListener("click", function(event) {
                        if (!cartButton.contains(event.target) && !cartDropdown.contains(event.target)) {
                            cartDropdown.classList.add("hidden");
                        }
                    });
                });
            </script> --}}

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
