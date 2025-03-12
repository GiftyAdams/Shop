
<div class="border p-4 rounded-lg mb-4">
    <div class="flex justify-between">
        <div class="flex space-x-2">
            <div class="">
                <x-product-image class="w-32 h-32 rounded" />
            </div>
            <div>
                <a href="#", class ="font-medium text-2xl">
                    {{ $order->product['name'] }} 
                </a>
                <p>
                    {{ $order->product['size'] }}
                </p>
                <p>
                    {{ $order->product['quantity'] }}
                </p>
            </div>
        </div>
        <div>
            <p>
                {{ $order->product['price'] }}
            </p>
        </div>
        <div>
            <button class="border border-black rounded-md text-[12px]  px-6 py-2 text-center">
                View Order
            </button>
            <button class="border border-black rounded-md text-[12px]  px-6 py-2 text-center">
                Cancel
            </button>
        </div>
    </div>
    <div class="flex mt-2 space-x-2">
        <p class="bg-green-500 text-white text-xs px-2 py- rounded w-16 text-center">Delivered</p>
        <p>
            Your product has been delivered
        </p>
    </div>
    
</div>
