<x-auth-layout>
    <main class="mx-20">
        <div>
            <div class="grid grid-cols-2 space-x-6">
                <div>
                    <div>
                        <!-- Main Product Image -->
                        <img id="mainProductImage" src="{{ asset($product->images[0]->image_url) }}"
                            class="w-80 h-80 object-cover rounded-lg" />

                        <!-- Other Product Images -->
                        <div class="flex space-x-2 mt-4">
                            @foreach ($product->images as $image)
                                <img src="{{ asset($product->images[$loop->index]->image_url) }}"
                                    class="w-16 h-16 rounded cursor-pointer hover:opacity-75"
                                    onclick="changeMainImage(this)" />
                            @endforeach
                        </div>
                    </div>

                    <script>
                        function changeMainImage(thumbnail) {
                            // Get the main product image element
                            let mainImage = document.getElementById("mainProductImage");

                            // Change the main image src to the clicked thumbnail src
                            mainImage.src = thumbnail.src;
                        }
                    </script>
                </div>

                <div>
                    <p class="text-xs mb-2">{{ $product->name }}</p>
                    <div class="center between font-bold text-xl">
                        <h1 class="text-3xl"> {{ $product->name }}</h1>
                       
                        {{-- if item is in stock then show this if not show out of stock --}}
                        @if ($product->stock > 0)
                            <p class="bg-green-500 text-white text-xs px-2 py- rounded">In Stock</p>
                        @else
                            <p class="bg-red-500 text-white text-xs px-2 py- rounded">Out of Stock</p>
                        @endif
                    </div>

                    <div class="my-4 mt-8">
                        <div style="border-top: 1px solid black; width: 100%; margin: 10px 0;"></div>

                        <span class="font-medium text-2xl space-y-3">¢{{ $product->price }}</span>
                        <div style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>

                    </div>
                    <div class="mt-8 space-y-8">
                        <p>
                            {{ $product->description }}
                        </p>
                        <p class="border border-black w-20 px-2 py-2 rounded text-center bg-gray-200">
                            Size: {{ $product->size }}
                        </p>
                    </div>

                    <section class="flex p-12 space-x-4 mt-20">
                        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart"
                            onsubmit="changeButtonText(event, this)">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            @php
                                // Check if the product is already in the cart
                                $isInCart = \App\Models\CartItem::where('user_id', auth()->id())
                                    ->where('product_id', $product->id)
                                    ->exists();
                            @endphp
                            <button type="submit"
                                class="w-80 rounded-md px-8 py-3 text-[12px] text-white outline-none {{ $isInCart ? 'bg-gray-500' : 'bg-black' }}"
                                {{ $isInCart ? 'disabled' : '' }}>
                                {{ $isInCart ? 'Added to Cart' : 'Add to Cart' }}
                        </form>
                        <script>
                            function changeButtonText(event, form) {
                                event.preventDefault(); // Stop form submission for now

                                let button = form.querySelector("button");
                                button.innerText = "Adding...";
                                button.disabled = true;

                                // Simulate form submission (remove this if you have AJAX handling)
                                setTimeout(() => {
                                    button.innerText = "Added to Cart";
                                    form.submit(); // Now submit the form
                                }, 1000);
                            }
                        </script>
                        @php
                            $isInWishlist = \App\Models\Wishlist::where('user_id', auth()->id())
                                ->where('product_id', $product['id'])
                                ->exists();
                        @endphp
                        <form id="wishlist-form-{{ $product['id'] }}" action="{{ route('wishlist.add') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <input type="hidden" id="wishlist-action-{{ $product['id'] }}" name="wishlist_action"
                                value="add">

                            <button type="submit" class="border border-black rounded px-4 py-3 outline-none"
                                onclick="toggleWishlist(event, {{ $product['id'] }})">

                                <span id="heart-{{ $product['id'] }}" class="{{ $isInWishlist ? 'hidden' : '' }}">
                                    <x-svg.heart />
                                </span>
                                <span id="heart-solid-{{ $product['id'] }}"
                                    class="{{ $isInWishlist ? '' : 'hidden' }}">
                                    <x-svg.heart-solid />
                                </span>
                            </button>
                        </form>
                    </section>
                </div>
            </div>

            <div class="flex gap-4 font-bold cursor-pointer  my-4">
                <span class="nav-link text-blue-500 border-b-2 border-blue-500 pb-1"
                    data-target="description">Description</span>
                <span class="nav-link text-gray-500" data-target="reviews">Reviews</span>
            </div>

            <!-- Content Sections -->
            <div id="content" class="max-w-2xl">
                <!-- Description -->
                <div id="description" class="content-section">
                    <p>
                        {{ $product->description }}
                    </p>
                </div>

                <!-- Reviews (With a Form) -->
                <div id="reviews" class="content-section hidden">
                    <h2 class="text-xl font-semibold mb-2">Customer Reviews</h2>
                    <p class="text-gray-700 mb-4">See what others are saying about this product.</p>
                    <div>
                        @if ($reviews->isEmpty())
                            <p class="text-gray-500">No reviews yet. Be the first to review this product!</p>
                        @else
                            @foreach ($reviews as $review)
                                <div class="border p-4 rounded-lg mb-2">
                                    <p class="font-semibold">{{ $review->name }} ({{ $review->email }})</p>
                                    <p class="text-gray-700">{{ $review->review }}</p>
                                    <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Review Form -->
                    <form class="p-4 rounded-lg space-y-2" method="POST"
                        action="{{ route('reviews.store', $product->id) }}">
                        @csrf
                        <label class="block mb-2 font-semibold">Add Your Review</label>
                        <div>
                            <x-form-field>
                                <x-form-label for="name">Name</x-form-label>

                                <div>
                                    <x-form-input class="py-3" name="name"
                                        value="{{ auth()->user()->first_name ?? '' }}" id="name" required />

                                    <x-form-error name="name" />
                                </div>
                            </x-form-field>
                        </div>
                        <div>
                            <x-form-field>
                                <x-form-label for="email">Email Address</x-form-label>

                                <div>
                                    <x-form-input class="py-3" name="email"
                                        value="{{ auth()->user()->email ?? '' }}" id="email" type="email"
                                        required />

                                    <x-form-error name="email" />
                                </div>
                            </x-form-field>
                        </div>
                        <div>
                            <x-form-field>
                                <x-form-label for="review">Your Review</x-form-label>

                                <div>
                                    <x-form-input class="py-4" name="review" id="review" required />

                                    <x-form-error name="review" />
                                </div>
                            </x-form-field>
                        </div>
                        <div class="mt-4">
                            <x-form-field>
                                <x-form-button class="w-40 justify-items-end">Submit</x-form-button>
                                {{-- <x-form-error name="success" /> --}}
                            </x-form-field>
                        </div>
                    </form>
                </div>
            </div>

            <!-- JavaScript -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const navLinks = document.querySelectorAll(".nav-link");
                    const sections = document.querySelectorAll(".content-section");

                    navLinks.forEach(link => {
                        link.addEventListener("click", function() {
                            // Remove active styles from all links
                            navLinks.forEach(l => {
                                l.classList.remove("text-blue-500", "border-blue-500", "border-b-2",
                                    "pb-1");
                                l.classList.add("text-gray-500");
                            });

                            // Hide all sections
                            sections.forEach(section => section.classList.add("hidden"));

                            // Show the selected section
                            const target = this.getAttribute("data-target");
                            document.getElementById(target).classList.remove("hidden");

                            // Add active styles to the clicked link
                            this.classList.add("text-blue-500", "border-blue-500", "border-b-2", "pb-1");
                            this.classList.remove("text-gray-500");
                        });
                    });
                });
            </script>

            <div class="mt-10">
                <x-header>Related Products</x-header>
                <div>
                    {{-- products in the same category should show here or brand --}}
                    <div>
                        {{-- <div class="grid grid-cols-4 gap-4 py-14 px-12">
                            @foreach ($products as $product)
                                <x-product-card :$product />
                            @endforeach
                        </div> --}}
                    </div>
                    <div class="grid grid-cols-4 gap-4 py-14 px-12">
                        @foreach ($products as $product)
                            <x-product-card :$product />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-core-values />
        </div>
    </main>
</x-auth-layout>
