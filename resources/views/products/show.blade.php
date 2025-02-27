<x-auth-layout>
    <main class="px-20 py-4 mx-auto">
        <div class="grid grid-cols-4">
            <div class="col-span-1">
                <div>
                    <div class="grid gap-4  rounded border w-64 p-4 space-y-2">
                        <div>
                            <div class="space-y-4">
                                <!-- Collapsible: Product Categories -->
                                <p>
                                    Filter By
                                </p>
                                <x-collapsible title="Gender">
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Zara</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Fragrance World</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Dior</span>
                                    </label>
                                </x-collapsible>
                                <x-collapsible title="Brand">
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Men</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Women</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Unisex</span>
                                    </label>
                                </x-collapsible>
                                <x-collapsible title="Type">
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Men</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Women</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Unisex</span>
                                    </label>
                                </x-collapsible>
                                <x-collapsible title="Department">
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Men</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Women</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Unisex</span>
                                    </label>
                                </x-collapsible>
                                <x-collapsible title="Scent Notes">
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Men</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Women</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="rounded  text-indigo-600 ">
                                        <span>Unisex</span>
                                    </label>
                                </x-collapsible>
                                <div x-data="{ openPriceRange: false }" class="border border-gray-300 rounded-md p-4 bg-white">
                                    <!-- Collapsible Header -->
                                    <button class="flex items-center justify-between w-full text-left font-bold"
                                        @click="openPriceRange = !openPriceRange">
                                        <span>Price Range</span>
                                        <svg :class="{ 'rotate-180': openPriceRange }"
                                            class="w-5 h-5 transform transition-transform"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    <!-- Collapsible Content -->
                                    <div x-show="openPriceRange" class="mt-4 space-y-3" x-transition>
                                        <!-- Minimum Price -->
                                        <label class="flex flex-col space-y-1">
                                            <span class="text-sm text-gray-700">Minimum Price</span>
                                            <input type="number" placeholder="$¢0"
                                                class="rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full px-3 py-2 text-gray-900" />
                                        </label>

                                        <!-- Maximum Price -->
                                        <label class="flex flex-col space-y-1">
                                            <span class="text-sm text-gray-700">Maximum Price</span>
                                            <input type="number" placeholder="$1000"
                                                class="rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full px-3 py-2 text-gray-900" />
                                        </label>

                                        <!-- Apply Button -->
                                        <button
                                            class="w-full bg-black text-white rounded-md py-2 focus:outline-none focus:ring focus:ring-white">
                                            Apply
                                        </button>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        const collapsibleSections = document.querySelectorAll("[data-collapsible]");

                                        collapsibleSections.forEach((section) => {
                                            const button = section.querySelector("[data-toggle]");
                                            const content = section.querySelector("[data-content]");

                                            button.addEventListener("click", () => {
                                                const isExpanded = button.getAttribute(
                                                    "aria-expanded") === "true";
                                                button.setAttribute("aria-expanded", !isExpanded);
                                                content.style.display = isExpanded ? "none" : "block";
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3 mx-4">
                <div class="justify-items-end">
                    <x-sort buttonId="sort-button" buttonText="Sort by">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">Popularity</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">Newest Arrivals</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">Price: Low to High</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">Price: High to Low</a>
                    </x-sort>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            // Function to toggle dropdown visibility
                            const toggleDropdown = (buttonId) => {
                                const button = document.getElementById(buttonId);
                                const menu = document.getElementById(`${buttonId}-menu`);
                                const isVisible = menu.classList.contains("hidden");

                                // Close any open dropdowns
                                document.querySelectorAll('[id$="-menu"]').forEach((dropdown) => {
                                    dropdown.classList.add("hidden");
                                });

                                // Toggle visibility of the current dropdown
                                if (isVisible) {
                                    menu.classList.remove("hidden");
                                } else {
                                    menu.classList.add("hidden");
                                }
                            };

                            // Attach click event listeners to all dropdown buttons
                            document.querySelectorAll('[id$="-menu"]').forEach((menu) => {
                                const buttonId = menu.getAttribute("aria-labelledby");
                                const button = document.getElementById(buttonId);

                                if (button) {
                                    button.addEventListener("click", () => toggleDropdown(buttonId));
                                }
                            });

                            // Close dropdown when clicking outside
                            document.addEventListener("click", (event) => {
                                if (!event.target.closest(".relative")) {
                                    document.querySelectorAll('[id$="-menu"]').forEach((menu) => {
                                        menu.classList.add("hidden");
                                    });
                                }
                            });
                        });
                    </script>
                </div>
                <div>
                    <div class="grid grid-cols-3 gap-x-4 gap-y-5 py-4 ">
                        @foreach ($products as $product)
                            <x-product-card :$product />
                        @endforeach
                    </div>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="mt-10">
            <x-core-values />
        </div>
    </main>
</x-auth-layout>
