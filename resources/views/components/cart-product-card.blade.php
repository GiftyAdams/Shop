@props(['cartitem', 'loopindex' => 0])

<div class="rounded shadow border border-transparent relative group p-4">
    <div class="flex justify-between">
        <div class="flex space-x-2">
            <div onclick="window.location.href = '{{ route('detail', ['id' => $cartitem->product['id']]) }}'">
                {{-- @dd($cartitem->images[0]->image_url) --}}
                <x-product-image :imageurl="asset($cartitem->product->images[0]->image_url)" alt="Image" class="w-28 h-28 rounded-md" />
            </div>
            <div class="space-y-8">
                <div>
                    <a href="#" class="self-start font-medium text-2xl mb-2">{{ $cartitem->product['name'] }}</a>
                    <p>
                        Size:{{ $cartitem->product['size'] }}
                    </p>
                </div>

                <div>
                    <p class="font-medium">
                        <span class="item-quantity-{{ $loopindex }}">{{ $cartitem['quantity'] }}</span> x
                        {{ $cartitem->product['price'] }}
                    </p>
                    <p class="font-bold text-xl calculated-total total-cal-{{ $loopindex }}">
                        ¢ {{ (int) $cartitem['quantity'] * (float) $cartitem->product['price'] }}
                    </p>
                </div>
            </div>
        </div>



        <div class="space-y-16 ml-6">
            <div>
                <form action=""></form>
                <x-quantity-check :quantity="$cartitem['quantity']" :loopindex="$loopindex" :price="$cartitem->product['price']" :cart_item_id="$cartitem['id']" />
            </div>
            <div class="flex items-center justify-end gap-4">
                <div class="text-sm">
                    {{-- if item is in stock then show this if not show out of stock --}}
                    @if ($cartitem->product->stock > 0)
                        <p class="bg-green-500 text-white text-xs px-2 rounded">In Stock</p>
                    @else
                        <p class="bg-red-500 text-white text-xs px-2 rounded">Out of Stock</p>
                    @endif
                </div>
                <div>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $cartitem->product['id'] }}">
                        <button type="submit">
                            <x-svg.trash />
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
