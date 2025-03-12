<x-auth-layout>
    <main class="px-20 py-8">
        <div>
            <x-header>Review Your Order</x-header>
        </div>

        <div class="flex justify-between">
            <div>
                <div>
                    <span>
                        Estimated Delivery: 14th March, 2025.
                    </span>

                    <div>
                        @foreach ($cartItems as $cartItem)
                            <x-review-card :product="$cartItem" :loopindex="$loop->index" />
                        @endforeach
                    </div>
                </div>

                <div>
                    <span class="font-bold">Shipping Address</span>
                    <p class="font-bold">
                        {{ $address->first_name }}
                    </p>
                    <div class="flex justify-between">
                        <span>
                            {{ $address->address }}
                        </span>
                        <a href="{{ route('cart.checkout') }}">
                            <button type="submit" class="bg-gray-200 p-1 rounded">
                                <x-svg.edit />
                            </button>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="mt-2 border border-gray-300 w-80"></div>
                </div>

                <div class="py-2">
                    <span class="font-bold">Payment Method</span>
                    <div class="flex justify-between">
                        <span>
                            {{ $paymentMethod }}
                        </span>
                        <a href="/cart/checkout/payment">
                            <button type="submit" class="bg-gray-200 p-1 rounded">
                                <x-svg.edit />
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <div class="border border-transparent shadow-sm w-48 p-6">
                    <h2>
                        Total: GHC
                        <span class="cart-total">{{ $cartTotal }}</span>
                    </h2>
                    <form action="{{ route('profile.orders') }}" method="POST">
                        @csrf
                        <x-form-button class="mt-4">
                            Place an order
                        </x-form-button>
                    </form>                    
                </div>
            </div>
        </div>

      

    </main>
</x-auth-layout>
