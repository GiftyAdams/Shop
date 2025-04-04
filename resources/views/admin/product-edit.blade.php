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
                <li><a href="#" class="text-gray-700 hover:text-black">Logout</a></li>
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
                    <h2 class="text-2xl font-semibold mb-4">{{ $product->name }} Details</h2>
                    <!-- Product Form -->
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <x-form-field>
                                <x-form-label for="name">Product Name</x-form-label>

                                <div>
                                    <x-form-input name="name" id="name" type="name"
                                        value="{{ old('name', $product->name) }}" required />

                                    <x-form-error name="name" />
                                </div>
                            </x-form-field>
                            <x-form-field>
                                <x-form-label for="description">Description</x-form-label>

                                <div>
                                    <x-form-input name="description" id="description" type="description"
                                        value="{{ old('description', $product->description) }}" required />

                                    <x-form-error name="description" />
                                </div>
                            </x-form-field>
                            <x-form-field>
                                <label for="brand">Select a Brand:</label>
                                <select name="brand_id" id="brand" class="border p-2 rounded">
                                    <option value="">Choose a Brand </option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="price">Price</x-form-label>

                                <div>
                                    <x-form-input name="price" id="price" type="number" step="0.01"
                                        min="0" value="{{ old('price', $product->price) }}" required />

                                    <x-form-error name="price" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <label for="category">Select Category:</label>
                                <select name="category_id" id="category" class="border p-2 rounded">
                                    <option value=""> Choose a Category </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </x-form-field>
                            <x-form-field>
                                <x-form-label for="size">Size (ml)</x-form-label>

                                <div>
                                    <x-form-input name="size" id="size" type="size"
                                        value="{{ old('size', $product->size) }}" required />

                                    <x-form-error name="size" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <label for="gender">Select Gender:</label>
                                <select name="gender_id" id="gender" class="border p-2 rounded">
                                    <option value=""> Choose a Gender </option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}"
                                            {{ old('gender_id', $product->gender_id) == $gender->id ? 'selected' : '' }}>
                                            {{ $gender->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </x-form-field>
                            <x-form-field>
                                <x-form-label for="stock">Stock</x-form-label>

                                <div>
                                    <x-form-input name="stock" id="stock" type="stock"
                                        value="{{ old('stock', $product->stock) }}" required />

                                    <x-form-error name="stock" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="images">Product Images</x-form-label>
                            
                                <!-- Show Existing Images -->
                                <div class="flex flex-wrap gap-2 mb-2" id="imagePreviewContainer">
                                    @foreach ($product->images as $image)
                                        <div class="relative w-24 h-24 border rounded overflow-hidden existing-image" id="image-{{ $image->id }}">
                                            <img src="{{ asset('storage/' . $image->image_url) }}" alt="Product Image" class="w-full h-full object-cover">
                                            <button type="button" onclick="deleteImage({{ $image->id }})" 
                                                    class="absolute top-0 right-0 bg-red-500 text-white px-1 text-xs rounded">
                                                ✕
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            
                                <!-- Indicate Number of Uploaded Images -->
                                <p class="text-gray-500 mb-2">
                                    {{ $product->images->count() }} image(s) uploaded.
                                </p>
                            
                                <!-- Upload New Images -->
                                <input type="file" name="images[]" id="imageUploadInput" accept=".jpeg,.png,.jpg,.gif,.svg" multiple class="w-full p-2 border rounded">
                            
                                <!-- Hidden input to track deleted images -->
                                <input type="hidden" name="deleted_images" id="deletedImages">
                            </x-form-field>
                            
                            
                            <div class="flex justify-end">
                                <x-form-button>Save</x-form-button>
                            </div>
                        </div>
                    </form>
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs mt-2">{{ $error }}</p>
                    @endforeach
                </div>


            </main>
        </div>
        <script>
            document.getElementById('imageUploadInput').addEventListener('change', function(event) {
                let container = document.getElementById('imagePreviewContainer');
            
                for (let file of event.target.files) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let div = document.createElement('div');
                        div.classList.add('relative', 'w-24', 'h-24', 'border', 'rounded', 'overflow-hidden', 'new-image');
                        div.innerHTML = `
                            <img src="${e.target.result}" class="w-full h-full object-cover">
                            <button type="button" class="absolute top-0 right-0 bg-red-500 text-white px-1 text-xs rounded"
                                    onclick="this.parentElement.remove();">
                                ✕
                            </button>
                        `;
                        container.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Function to delete old images (backend will remove them)
            function deleteImage(imageId) {
                document.getElementById('image-' + imageId).remove();
            
                // Store deleted image IDs for backend processing
                let deletedImagesInput = document.getElementById('deletedImages');
                let deletedImages = deletedImagesInput.value ? JSON.parse(deletedImagesInput.value) : [];
                deletedImages.push(imageId);
                deletedImagesInput.value = JSON.stringify(deletedImages);
            }
            </script>
            
</x-layout>
