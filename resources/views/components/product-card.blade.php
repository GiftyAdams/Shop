@props(['product'])
<div class="max-w-xs rounded shadow border border-transparent relative group">
    @php
        $isInWishlist = \App\Models\Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product['id'])
            ->exists();
    @endphp
    <form id="wishlist-form-{{ $product['id'] }}" action="{{ route('wishlist.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
        <input type="hidden" id="wishlist-action-{{ $product['id'] }}" name="wishlist_action" value="add">

        <button type="submit"
            class="absolute top-2 right-2 rounded-xl bg-white/25 text-white px-2 py-2 opacity-0 group-hover:opacity-100 transition-all duration-300 z-50"
            onclick="toggleWishlist(event, {{ $product['id'] }})">

            <span id="heart-{{ $product['id'] }}" class="{{ $isInWishlist ? 'hidden' : '' }}">
                <x-svg.heart />
            </span>
            <span id="heart-solid-{{ $product['id'] }}" class="{{ $isInWishlist ? '' : 'hidden' }}">
                <x-svg.heart-solid />
            </span>
        </button>
    </form>

    <script>
        function toggleWishlist(event, productId) {
            let heart = document.getElementById(`heart-${productId}`);
            let solidHeart = document.getElementById(`heart-solid-${productId}`);
            let form = document.getElementById(`wishlist-form-${productId}`);
            let actionInput = document.getElementById(`wishlist-action-${productId}`);

            // Prevent default form submission
            event.preventDefault();

            if (solidHeart.classList.contains('hidden')) {
                // Currently not in wishlist, so we add
                actionInput.value = "add";
                heart.classList.add('hidden');
                solidHeart.classList.remove('hidden');
            } else {
                // Currently in wishlist, so we remove
                form.action = "{{ route('wishlist.remove') }}"; // Change action to remove route
                actionInput.value = "remove";
                heart.classList.remove('hidden');
                solidHeart.classList.add('hidden');
            }

            // Submit the form
            form.submit();
        }
    </script>

<form action="{{ route('cart.add') }}" method="POST" class="add-to-cart" onsubmit="changeButtonText(event, this)">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product['id'] }}">

    @php
        // Check if the product is already in the cart
        $isInCart = \App\Models\CartItem::where('user_id', auth()->id())
                    ->where('product_id', $product['id'])
                    ->exists();
    @endphp

    <button type="submit"
        class="z-50 absolute text-xs top-48 rounded-xl left-1/2 -translate-x-1/2 bg-black text-white px-4 py-2 opacity-0 group-hover:opacity-100 transition-all duration-300"
        {{ $isInCart ? 'disabled' : '' }}>
        {{ $isInCart ? 'Added to Cart' : 'Add to Cart' }}
    </button>
</form>

<script>
function changeButtonText(event, form) {
    event.preventDefault(); // Prevent the default form submission

    let button = form.querySelector("button");
    button.innerText = "Adding...";
    button.disabled = true;

    // Simulate a short delay before submitting the form
    setTimeout(() => {
        button.innerText = "Added to Cart";
        form.submit(); // Submit the form
    }, 1000);
}
</script>

    <div class="cursor-pointer" onclick="window.location.href = '{{ route('detail', ['id' => $product['id']]) }}'">
        <div class="relative group">
            <x-product-image class="w-full" />
        </div>

        <div class="px-2 py-2">
            <div>
                <a href="{{ route('detail', ['id' => $product['id']]) }}"
                    class="self-start font-bold text-xl mb-2">{{ $product['name'] }}</a>
            </div>
            <div>
                <ul>
                    <li>
                        ¢ {{ $product['price'] }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
