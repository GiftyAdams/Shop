@props(['product', 'loopindex' => 0])
<div>
    
</div>
<div class=" rounded shadow border border-transparent relative group p-4 ">
    <div class="flex justify-between">
        <div class="flex space-x-2">
            <div onclick="window.location.href = '{{ route('detail', ['id' => $product->product['id']]) }}'">
                <x-product-image class="w-32 h-32 rounded-md" />
            </div>
            <div class="space-y-8">
                <div>
                    <a href="#" class="self-start font-medium text-2xl mb-2">{{ $product->product['name'] }}</a>
                    <p>
                        Size:{{ $product->product['size'] }}
                    </p>
                </div>

                <div>
                    <p class="font-medium">
                        <span class="item-quantity-{{ $loopindex }}">{{ $product['quantity'] }}</span> x
                        {{ $product->product['price'] }}
                    </p>
                    <p class="font-bold text-xl total-cal-{{ $loopindex }}">
                        ¢ {{ (int) $product['quantity'] * (float) $product->product['price'] }}
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-16 ml-6">
            <div>
                <form action=""></form>
                <x-quantity-check :quantity="$product['quantity']" :loopindex="$loopindex" :price="$product->product['price']" :cart_item_id="$product['id']" />
            </div>

            <div class="pl-16">
                <form action="{{ route('cart.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product['id'] }}">
                    <button type="submit">
                        <x-svg.trash />
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

