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
                <h2 class="text-xl font-semibold mb-4">Customers</h2>
                
                        {{-- Table --}}
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border border-gray-300 p-2">Id</th>
                                        <th class="border border-gray-300 p-2">First Name</th>
                                        <th class="border border-gray-300 p-2">Email</th>
                                        <th class="border border-gray-300 p-2">Joined</th>
                                        <th class="border border-gray-300 p-2">Address</th>
                                        <th class="border border-gray-300 p-2">Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="bg-white">
                                            <td class="border border-gray-300 p-2">{{ $user->id }}</td>
                                            <td class="border border-gray-300 p-2">{{ $user->first_name }}</td>
                                            <td class="border border-gray-300 p-2">{{ $user->email }}</td>
                                            <td class="border border-gray-300 p-2">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</td>
                                            <td class="border border-gray-300 p-2">{{ $user->address ?? 'Null' }}</td>
                                            <td class="border border-gray-300 p-2">
                                           {{ $user->phone_number ?? 'Null'}}
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
