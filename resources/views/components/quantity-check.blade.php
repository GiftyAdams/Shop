@props([ 'quantity' => 1, 'loopindex' => 0, 'price', 'cart_item_id' ])

<div class="flex w-fit items-end border border-black rounded-md">
    <!-- Minus Button -->
    <button type="button" onclick="updateQuantity(this, -1, {{ $loopindex}}, {{ (float) $price }}, {{ $cart_item_id }} )" class="px-3 py-1 text-lg">−</button>
    <!-- Quantity Display -->
    <input type="text" name="quantity" class="max-w-10 text-center py-1" value="{{ $quantity ?? 1 }}" min="1" readonly />

    <!-- Plus Button -->
    <button type="button" onclick="updateQuantity(this, 1, {{ $loopindex}}, {{ (float) $price }}, {{ $cart_item_id }} )" class="px-3 py-1 text-lg">+</button>
</div>


{{-- <script>
    function updateQuantity(button, change) {
        let inputField = button.parentElement.querySelector("input"); // Get input within the same div
        let currentValue = parseInt(inputField.value) || 1; // Default to 1 if NaN
        let newValue = Math.max(1, currentValue + change); // Prevent going below 1
        inputField.value = newValue;

        let cartItemElement = document.querySelector(".cartitem" + {{ $product['id'] }});
        cartItemElement.textContent = newValue * {{ $product['price'] }};

        console.log({{ $product['id'] }});
    }
</script> --}}