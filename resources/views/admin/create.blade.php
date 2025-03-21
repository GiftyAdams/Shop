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
                <h1 class="text-xl font-bold">Product Details</h1>

                <div class="max-w-4xl mx-auto bg-white p-6 rounded-md shadow-md">
                    <h2 class="text-2xl font-semibold mb-4">Add New Product</h2>

                    <!-- Product Form -->
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <x-form-field>
                                <x-form-label for="name">Product Name</x-form-label>

                                <div>
                                    <x-form-input name="name" id="name" type="name"
                                        value="{{ old('name') }}" required />

                                    <x-form-error name="name" />
                                </div>
                            </x-form-field>
                            <x-form-field>
                                <x-form-label for="description">Description</x-form-label>

                                <div>
                                    <x-form-input name="description" id="description" type="description"
                                        value="{{ old('description') }}" required />

                                    <x-form-error name="description" />
                                </div>
                            </x-form-field>
                            <x-form-field>
                                <x-form-label for="brand">Brand</x-form-label>

                                <div>
                                    <x-form-input name="brand" id="brand" type="brand"
                                        value="{{ old('brand') }}" required />

                                    <x-form-error name="brand" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="department">Department</x-form-label>

                                <div>
                                    <x-form-input name="department" id="department" type="department"
                                        value="{{ old('department') }}" required />

                                    <x-form-error name="department" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="scent_note">Scent Note</x-form-label>

                                <div>
                                    <x-form-input name="scent_note" id="scent_note" type="scent_note"
                                        value="{{ old('scent_note') }}" required />

                                    <x-form-error name="scent_note" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="price">Price</x-form-label>

                                <div>
                                    <x-form-input name="price" id="price" type="price"
                                        value="{{ old('price') }}" required />

                                    <x-form-error name="price" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="size">Size (ml)</x-form-label>

                                <div>
                                    <x-form-input name="size" id="size" type="size"
                                        value="{{ old('size') }}" required />

                                    <x-form-error name="size" />
                                </div>
                            </x-form-field>


                            <x-form-field>
                                <x-form-label for="stock">Stock</x-form-label>

                                <div>
                                    <x-form-input name="stock" id="stock" type="stock"
                                        value="{{ old('stock') }}" required />

                                    <x-form-error name="stock" />
                                </div>
                            </x-form-field>



                            <x-form-field>
                                <x-form-label for="stock">Product Images</x-form-label>
                                <input type="file" name="images[]" multiple class="w-full p-2 border rounded">
                            </x-form-field>

                            <div class="flex justify-end">
                           <x-form-button>Create Product</x-form-button>
                        </div>
                        </div>
                    </form>
                </div>


            </main>
        </div>
</x-layout>
