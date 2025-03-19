<x-layout>
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
                    <li><a href="/logout"
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
                    <div class="container">
                        <h2 class="text-xl font-semibold mb-4">Edit Brand</h2>
                
                        <form action="{{ route('brands.update', $brand->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                
                            <div class="mb-3">
                                <label for="name">Brand Name</label>
                                <input type="text" name="name" class="form-control border p-2" value="{{ $brand->name }}" required>
                            </div>
                
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Update</button>
                        </form>
                    </div>
            </div>
        </div>
    </x-layout>
</x-layout>