<x-auth-layout>
    <main class="px-28">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="border border-black rounded w-48 py-4 mb-1">
                    <p>
                        Hello 👋
                    </p>
                </div>
                <div class="grid grid-rows-5 gap-4  rounded border border-black w-48 p-4 space-y-2">
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.user />
                            <span>Personal Information</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.shopping-bag />
                            <span>My Orders</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.heart />
                            <span class="active:">My Wishlist</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.location />
                            <span>Manage Address</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.setting />
                            <span>Settings</span>
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <x-header>Related Products</x-header>
                <div>
                    @php
                    $products = [
                    [
                    'imageUrl' => URL('images/one.jpg'),
                    'title' => 'Pure Black Perfume',
                    'description' => 'Sweet-scented fragrance',
                    'price' => '$4.00',
                    ],
                    [
                    'imageUrl' => URL('images/2.png'),
                    'title' => 'Floral Essence',
                    'description' => 'Fresh, flowery scent',
                    'price' => '$5.50',
                    ],
                    [
                    'imageUrl' => URL('images/3.jpg'),
                    'title' => 'Citrus Breeze',
                    'description' => 'Citrus-infused freshness',
                    'price' => '$3.50',
                    ],

                    [
                    'imageUrl' => URL('images/5.jpg'),
                    'title' => 'Ocean Mist',
                    'description' => 'Refreshing ocean scent',
                    'price' => '$4.50',
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
    </main>

</x-auth-layout>