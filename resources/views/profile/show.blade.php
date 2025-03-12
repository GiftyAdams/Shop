<x-auth-layout>
    <main class="px-20 py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-800">Order Details</h1>
            <p class="text-sm text-gray-600">Order Number: <strong>{{ $order->order_number }}</strong></p>
            <p class="text-sm text-gray-600">Order Date: {{ $order->created_at->format('M d, Y') }}</p>
            <p class="text-sm text-gray-600">Status: <strong class="text-blue-500">{{ ucfirst($order->status) }}</strong></p>
    
            <h2 class="mt-4 font-semibold text-lg">Items Ordered:</h2>
            <ul class="mt-2 border-t pt-2">
                @foreach ($order->orderItems as $item)
                    <li class="flex items-center py-2 border-b">
                        <img src="{{ $item->product->image ?? '/placeholder.jpg' }}" class="w-16 h-16 object-cover rounded-md" alt="{{ $item->product->name }}">
                        <div class="ml-4">
                            <p class="font-medium">{{ $item->product->name }}</p>
                            <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                            <p class="text-sm font-semibold">GHC {{ number_format($item->price, 2) }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
    
            <div class="mt-4 flex justify-between">
                <p class="text-lg font-semibold text-gray-800">Total: GHC {{ number_format($order->total_price, 2) }}</p>
                <a href="{{ route('profile.orders') }}" class="border border-black text-black px-4 py-2 rounded-md shadow hover:bg-black hover:text-white">
                    Back to Orders
                </a>
            </div>
        </div>
    </main>
</x-auth-layout>