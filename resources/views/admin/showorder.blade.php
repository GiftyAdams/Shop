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
                <h1 class="text-2xl font-bold mb-4">Order #{{ $order->order_number }}</h1>

                <div class="mb-6">
                    <p><strong>Customer:</strong> {{ $order->user?->name ?? 'Unknown' }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                    <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                </div>
            
                <h2 class="text-xl font-bold mb-3">Order Items</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">Product</th>
                            <th class="border p-2">Quantity</th>
                            <th class="border p-2">Price</th>
                            <th class="border p-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr class="text-center">
                                <td class="border p-2">{{ $item->product?->name ?? 'n/a' }}</td>
                                <td class="border p-2">{{ $item->quantity }}</td>
                                <td class="border p-2">${{ number_format($item->price, 2) }}</td>
                                <td class="border p-2">${{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
                <!-- Order Status Update Form -->
                <h2 class="text-xl font-bold mt-6 mb-3">Update Order Status</h2>
                <form method="POST" action="{{ route('orders.updateStatus', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <label class="block mb-2">Select Status:</label>
                    <select name="status" class="w-full p-2 border rounded">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                    <button type="submit" class="mt-3 bg-blue-500 text-white px-4 py-2 rounded">Update Status</button>
                </form>
            
                <div class="mt-4">
                    <a href="{{ route('admin.orders') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Orders</a>
                </div>
        </div>
</x-layout>
