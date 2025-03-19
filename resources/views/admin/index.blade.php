<x-layout>
    <div class="flex flex-col h-screen">
        <!-- Top Navigation -->
        <nav class="bg-gray-100 shadow-md p-4 flex justify-between items-center">
            <div class="text-lg font-bold">
                <x-logo />
            </div>
            <ul class="flex space-x-4 text-sm center">
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
                        class="text-white hover:text-black border border-transparent bg-blue-300 px-3 py-2 rounded-lg text-xs">Admin</a>
                </li>
                {{-- <li>
                    <form method="POST" action="/logout">
                        @csrf


                        <x-form-button class="nav-button">Log Out</x-form-button>
                    </form>
                </li> --}}
            </ul>
        </nav>

        <!-- Main Content with Sidebar -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <x-admin-sidebar />

            <!-- Main Content Area -->
            <main class="flex-1 p-6 bg-white">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <div class="center space-x-8 flex justify-center py-4">
                    <div class="summary">
                        <span>Total Orders</span>
                        <p>{{ $totalOrders }}</p>
                    </div>
                    <div class="summary">
                        <span>Active Orders</span>
                        <p>{{ $activeOrders }}</p>
                    </div>
                    <div class="summary">
                        <span>Completed Orders</span>
                        <p>{{ $completedOrders }}</p>
                    </div>
                    <div class="summary">
                        <span>Cancelled Orders</span>
                        <p>{{ $cancelledOrders }}</p>
                    </div>
                </div>
                {{-- <div class="flex">
                    <div class="p-8 border border-transparent shadow-md">Sale Graph</div>
                    <div class="p-8 border border-transparent shadow-md">Best Sellers</div>
                </div>
                --}}
                {{-- Recent Orders --}}
                <div class="p-8 border border-gray-200 shadow-md">
                    <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 p-2">Customer Name</th>
                                    <th class="border border-gray-300 p-2">Order Number</th>
                                    <th class="border border-gray-300 p-2">Total Price</th>
                                    <th class="border border-gray-300 p-2">Order Date</th>
                                    <th class="border border-gray-300 p-2">Status</th>
                                    <th class="border border-gray-300 p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentOrders as $order)
                                    <tr class="text-center">
                                        <td class="border border-gray-300 p-2"> {{ $order->user?->first_name ?? 'Guest' }}</td>
                                        <td class="border border-gray-300 p-2">
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                class="text-blue-500 hover:underline">
                                                {{ $order->order_number ?? 'N/A' }}
                                            </a>
                                        </td>
                                        </td>
                                        <td class="border border-gray-300 p-2">{{ $order->total_price ?? 'N/A' }}
                                        </td>
                                        <td class="border border-gray-300 p-2">
                                            {{ $order->created_at ? $order->created_at->format('Y-m-d') : 'N/A' }}
                                        </td>
                                        <td class="border border-gray-300 p-2">
                                            <span
                                                class="px-2 py-1 rounded text-white 
                                    {{ $order->status == 'pending' ? 'bg-yellow-500' : ($order->status == 'completed' ? 'bg-green-500' : 'bg-red-500') }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="border border-gray-300 p-2">
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" 
                                                  onsubmit="return confirm('Are you sure you want to delete this order?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </main>
        </div>
    </div>


</x-layout>
