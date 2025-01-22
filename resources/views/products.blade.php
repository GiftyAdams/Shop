<x-auth-layout>
    <main class="px-20 py-4">

        <div class=" grid grid-cols-4">
            <div class="col-span-1">
                <div>
                    <div class="grid grid-rows-5 gap-4  rounded border border-black w-64 p-4 space-y-2 h-full">
                        <div>
                            <a href="#" class="flex items-center bold">
                                <span>Product Categories</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="flex items-center  bold">
                                <span>Filter by Price</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="flex items-center bold">
                                <span>Filter by Brand</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
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
                    @php
                    $products = [
                    [
                    'imageUrl' => URL('images/one.jpg'),
                    'title' => 'Pure Black Perfume',
                    'description' => 'Sweet-scented fragrance',
                    'price' => '$4.00',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/2.png'),
                    'title' => 'Floral Essence',
                    'description' => 'Fresh, flowery scent',
                    'price' => '$5.50',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/3.jpg'),
                    'title' => 'Citrus Breeze',
                    'description' => 'Citrus-infused freshness',
                    'price' => '$3.50',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/4.jpg'),
                    'title' => 'Lavender Dream',
                    'description' => 'Relaxing lavender aroma',
                    'price' => '$6.00',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/5.jpg'),
                    'title' => 'Ocean Mist',
                    'description' => 'Refreshing ocean scent',
                    'price' => '$4.50',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/one.jpg'),
                    'title' => 'Spiced Wood',
                    'description' => 'Warm and woody fragrance',
                    'price' => '$7.00',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/2.png'),
                    'title' => 'Tropical Paradise',
                    'description' => 'Sweet tropical notes',
                    'price' => '$5.00',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/3.jpg'),
                    'title' => 'Berry Bliss',
                    'description' => 'Fruity berry scent',
                    'price' => '$3.75',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/4.jpg'),
                    'title' => 'Woodland Escape',
                    'description' => 'Earthy and fresh wood aroma',
                    'price' => '$6.50',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/5.jpg'),
                    'title' => 'Summer Citrus',
                    'description' => 'Bright and citrusy fragrance',
                    'price' => '$4.25',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/5.jpg'),
                    'title' => 'Summer Citrus',
                    'description' => 'Bright and citrusy fragrance',
                    'price' => '$4.25',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/5.jpg'),
                    'title' => 'Summer Citrus',
                    'description' => 'Bright and citrusy fragrance',
                    'price' => '$4.25',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/5.jpg'),
                    'title' => 'Summer Citrus',
                    'description' => 'Bright and citrusy fragrance',
                    'price' => '$4.25',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/5.jpg'),
                    'title' => 'Summer Citrus',
                    'description' => 'Bright and citrusy fragrance',
                    'price' => '$4.25',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    [
                    'imageUrl' => URL('images/5.jpg'),
                    'title' => 'Summer Citrus',
                    'description' => 'Bright and citrusy fragrance',
                    'price' => '$4.25',
                    'tags'=>['black', 'perfume', 'scented'],
                    ],
                    ];
                    @endphp
                    <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 py-8">
                        @foreach ($products as $product)
                        <x-product-card :imageUrl="$product['imageUrl']" :title="$product['title']"
                            :description="$product['description']" :price="$product['price']" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <x-pagination />
    </main>
</x-auth-layout>