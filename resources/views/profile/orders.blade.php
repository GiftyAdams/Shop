<x-auth-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header> My Orders</x-header>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <x-user-nav />
            </div>

            <div class="col-span-3">
                <div class="grid grid-cols-2 gap-4 space-x-4 ">
                    @foreach ($orders as $order)
                        <div class="bg-white shadow-md rounded-lg p-6 mb-6 border w-80">
                            <!-- Order Header -->
                            <div class="flex justify-between items-center border-b pb-3">
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-800">Order #{{ $order->order_number }}
                                    </h2>
                                    <p class="text-sm text-gray-600">Placed on
                                        {{ $order->created_at->format('M d, Y') }}
                                    </p>
                                    {{-- <p>Address {{ $address->address }} </p> --}}
                                    <p class="text-sm font-medium text-blue-600">Status: {{ ucfirst($order->status) }}
                                    </p>
                                </div>
                                <p class="text-lg font-semibold text-gray-800">Total: GHC
                                    {{ number_format($order->total_price, 2) }}</p>
                            </div>

                            <!-- Order Items -->
                            <div class="mt-4">
                                <h3 class="text-md font-semibold text-gray-700">Items:</h3>
                                <ul class="mt-2">
                                    @foreach ($order->orderItems as $item)
                                        <li class="flex items-center border-b py-2">
                                            {{-- @dd($item->product->images[0]) --}}
                                            <img src="{{ asset($item->product->images[0]->image_url) }}" alt="{{ $item->product->name }}"
                                                class="w-16 h-16 rounded-md object-cover">
                                            <div class="ml-4">
                                                <p class="font-medium text-gray-800">{{ $item->product->name }}</p>
                                                <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                                                <p class="text-sm font-semibold text-gray-700">GHC
                                                    {{ number_format($item->price, 2) }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-4 flex justify-between">
                                <!-- View Details Button -->
                                <a href="{{ route('orders.show', $order->id) }}"
                                    class="text-sm border border-black text-black px-4 py-2 rounded-md shadow hover:bg-black hover:text-white">
                                    View Details
                                </a>

                                <!-- Cancel Order Button -->
                                @if ($order->status === 'Processing')
                                    <form action="{{ route('orders.cancel', $order->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded-md shadow hover:bg-red-600">
                                            Cancel Order
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</x-auth-layout>
