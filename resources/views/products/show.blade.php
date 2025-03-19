<x-auth-layout>
    <main class="px-20 py-4 mx-auto">
        <div class="grid grid-cols-4">
            <div class="col-span-1">
                <div>
                    <div class="grid gap-4  rounded border w-64 p-4 space-y-2">
                        <div>
                            <x-user-sidenav :genders="$genders" :categories="$categories" :brands="$brands" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3 mx-4">
                {{-- <div class="justify-items-end">
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
                </div> --}}
                <div>
                    <div class="grid grid-cols-3 gap-x-4 gap-y-5  ">
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
