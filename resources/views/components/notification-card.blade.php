<div>
    @if ($product->stock === 0)
        <div class="flex justify-between">
            <p>The product <strong>{{ $product->name }}</strong> is currently out
                of stock.</p>
            <button class="text-white bg-blue-500 text-sm px-4 py-2 rounded">Restock</button>
        </div>
    @elseif($product->stock <= 5)
        <div class="flex justify-between">
            <p>The product <strong>{{ $product->name }}</strong> is running
                low on stock.</p>
            <button class="text-white bg-blue-500 text-sm px-4 py-2 rounded">Restock</button>
        </div>
    @endif
</div>
