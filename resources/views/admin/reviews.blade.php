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
            </ul>
        </nav>

        <!-- Main Content with Sidebar -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <x-admin-sidebar />

            <!-- Main Content Area -->
            <main class="flex-1 p-6 bg-white">
                <h2 class="text-xl font-semibold mb-4">Reviews</h2>
                
                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 p-2">Customer Name</th>
                                <th class="border border-gray-300 p-2">Email</th>
                                <th class="border border-gray-300 p-2">Product Name</th>
                                <th class="border border-gray-300 p-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr class="text-center">
                                    <td class="border border-gray-300 p-2">{{ $review->name}}</td>
                                    <td class="border border-gray-300 p-2">{{ $review->email}}</td>
                                    <td class="border border-gray-300 p-2">{{ $review->product?->name ?? 'n/a' }}</td>
                                    <td class="border border-gray-300 p-2">
                                        {{ $review->created_at ? $review->created_at->format('Y-m-d') : 'N/A' }}
                                    </td>
                                    <td class="border border-gray-300 p-2">
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination
                <div class="mt-4">
                    {{ $products->links() }}
                </div> --}}
            </div>

        </div>
            </main>
        </div>
    </div>
</x-layout>
