@props(['cartitem', 'loopindex' => 0])

<div class="rounded shadow border border-transparent relative group p-4 ">
    <div class="flex justify-between">
        <div class="flex space-x-2">
            <div onclick="window.location.href = '{{ route('detail', ['id' => $cartitem->product['id']]) }}'">
                {{-- @dd($cartitem->images[0]->image_url) --}}
                <x-product-image :imageurl="asset($cartitem->product->images[0]->image_url)"  alt="Image" class="w-32 h-32 rounded-md" />
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

            <div class="pl-16">
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