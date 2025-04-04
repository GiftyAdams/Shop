<x-layout>
    <div class="flex flex-col h-screen">
        <!-- Top Navigation -->
        <nav class="bg-gray-100 shadow-md p-4 flex justify-between items-center">
            <div class="text-lg font-bold">
                <x-logo />
            </div>
            <ul class="flex space-x-4 text-sm">
                <li>
                    <form action="/search" method="GET" id="searchForm" class="flex items-center">
                        <input id="searchInput" type="text"
                            class="hidden rounded-xl border px-2 outline-none transition-all duration-300"
                            name="q" placeholder="Search for products..." value="{{ request('q') }}"
                            autocomplete="off" required>
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
                <li><a href="#"
                        class="text-white hover:text-black border border-transparent bg-blue-300 px-3 py-2 rounded text-xs">Admin</a>
                </li>
                {{-- <li><a href="#" class="text-gray-700 hover:text-black">Logout</a></li> --}}
            </ul>
        </nav>

        <!-- Main Content with Sidebar -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <x-admin-sidebar />

            <!-- Main Content Area -->
            <main class="flex-1 p-6 bg-white">
                <h2 class="text-xl font-semibold mb-4">Product Details</h2>


                <div class="space-y-2">
                    <div class="center">
                        @foreach ($product->images as $image)
                            <img src="{{ asset('storage/' . $image->image_url) }}" alt="Image"
                                class="w-28 h-28 rounded-md">
                        @endforeach
                    </div>
                    <div>
                        <strong> Product Name </strong> : {{ $product->name }}
                    </div>
                    <div>
                        <strong> Product Price </strong>: {{ $product->price }}
                    </div>
                    <div>
                        <strong> Product Stock</strong> : {{ $product->stock }}
                    </div>
                    <div>
                        <strong> Product Size</strong> : {{ $product->size ?? 'N/A' }}
                    </div>
                    <div>
                        <strong> Product Brand</strong> : {{ $product->brand->name ?? 'N/A' }}
                    </div>
                    <div>
                        <strong> Product Category </strong>: {{ $product->category->name ?? 'N/A' }}
                    </div>
                    <div>
                        <strong> Product Gender</strong> : {{ $product->gender->name ?? 'N/A' }}
                    </div>
                    <div>
                        <strong> Product Description </strong> : {{ $product->description }}
                    </div>


                    <div class="mb-4 p-2">
                        <p><strong>Created At:</strong> {{ $product->created_at->format('M d, Y') }}</p>
                        <p><strong>Updated At:</strong> {{ $product->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
                <div class="center space-x-4">
                    <div>
                        <button><a href="{{ route('admin.products.index') }}" class="bg-green-500 text-white text-sm px-4 py-2 rounded hover:bg-green-600">Back To
                                Products</a></button>
                    </div>
                    <div>
                        <!-- Submit Button -->
                        <a href="{{ route('products.edit', $product->id) }}">
                            <button type="submit"
                                class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600">
                                Update Product
                            </button>
                        </a>
                    </div>

                </div>
            </main>
        </div>
</x-layout>
