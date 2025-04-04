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

            </ul>
        </nav>

        <!-- Main Content with Sidebar -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <x-admin-sidebar />

            <!-- Main Content Area -->
            <main class="flex-1 p-6 bg-white">
                <button class="center text-[12px]" onclick="window.history.back();">
                    <x-svg.chevron-left /> Back
                </button>
                    <div class="p-8">

                        {{-- Table --}}
                        <div class="overflow-x-auto">
                            @if ($products->count())
                                @if ($query)
                                    <h3 class="py-2">Showing results for: <strong>{{ $query }}</strong></h3>
                                @endif
                                <table class="min-w-full border border-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="border px-4 py-2">Product Id</th>
                                            <th class="border px-4 py-2">Image</th>
                                            <th class="border px-4 py-2">ProductName</th>
                                            <th class="border px-4 py-2">Category</th>
                                            <th class="border px-4 py-2">Brand</th>
                                            <th class="border px-4 py-2">Price</th>
                                            <th class="border px-4 py-2">Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="text-center">
                                                <td class="border px-4 py-2">{{ $product->id }}</td>
                                                <td class="border px-4 py-2">
                                                    <img src="{{ asset($product->images[0]->image_url) }}"
                                                        alt="Product Image" class="w-16 h-16 object-cover">
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <a href="{{ route('admin.product.show', $product->id) }}"
                                                        class="text-blue-500 hover:underline">
                                                        {{ $product->name }}
                                                    </a>
                                                </td>
                                                <td class="border px-4 py-2"> {{ $product->category->name ?? '' }}
                                                </td>
                                                <td class="border px-4 py-2"> {{ $product->brand->name ?? '' }}
                                                <td class="border px-4 py-2">${{ number_format($product->price, 2) }}
                                                </td>
                                                <td class="border px-4 py-2">{{ $product->stock }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-4">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="text-xl text-red-500 py-6">
                            Oops.. No results found for: <strong>{{ $query }}</strong>
                        </div>
                        @endif
                    </div>
            </main>
        </div>
    </div>


</x-layout>
