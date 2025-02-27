@props(['product'])
<div class="rounded border borber-transparent p-4">
    <div>
        <h1>CART SUMMARY</h1>
    </div>
    <div class="flex justify-between">
        <p>SubTotal</p>
        <p>¢ {{ $product->product['price'] * $product['quantity'] }}</p>
    </div>
    <div>
        <p>Total</p>
    </div>
</div>
