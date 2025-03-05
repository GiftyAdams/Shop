<x-auth-layout>
    <main class="px-20 py-8">
        @if ($cartItems->isEmpty())
            <p class="text-center text-gray-500">No items in your wishlist.</p>
        @endif
        @php
            $cartTotal = 0;
        @endphp
        <div class="space-y-4 mb-10">
            @foreach ($cartItems as $cartItem)
                <x-cart-product-card :product="$cartItem" :loopindex="$loop->index" />
            @endforeach
        </div>
        @php
            foreach ($cartItems as $cartItem) {
                $cartTotal += $cartItem->product->price * $cartItem->quantity;
            }
        @endphp
        @if ($cartItems->isNotEmpty())
            <div class="flex justify-end">
                <div>
                    <h2>
                        Total: GHC
                        <span class="cart-total">{{ $cartTotal }}</span>
                    </h2>
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <x-form-button class="mt-4">
                            Proceed to Checkout
                        </x-form-button>
                    </form>
                </div>
            </div>
        @endif
    </main>

    <script>
        function updateQuantity(button, change, loopIndex, price, cart_item_id) {
            let inputField = button.parentElement.querySelector("input"); // Get input within the same div
            let currentValue = parseInt(inputField.value) || 1; // Default to 1 if NaN
            let newValue = Math.max(1, currentValue + change); // Prevent going below 1
            inputField.value = newValue;

            let itemQuantity = document.querySelector(`.item-quantity-${loopIndex}`);
            let totalCal = document.querySelector(`.total-cal-${loopIndex}`);

            totalCal.textContent = newValue * price;
            itemQuantity.textContent = newValue;

            updateDB(newValue, cart_item_id);

            let cartTotal = document.querySelector('.cart-total');
            let totalPriceOfCart = parseFloat(cartTotal.textContent);

            if (change === -1 && currentValue > 1) {
                cartTotal.textContent = (totalPriceOfCart - price).toFixed(2);
            }
            if (change === 1) {
                cartTotal.textContent = (totalPriceOfCart + price).toFixed(2);
            }

        }

        function updateDB(quantity, cart_item_id) {
            fetch('{{ route('cart.update') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    quantity,
                    cart_item_id
                })
            })
        }
    </script>

</x-auth-layout>
