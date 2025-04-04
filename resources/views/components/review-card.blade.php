@props(['cartitem', 'loopindex' => 0])
<div class="relative group py-2">
    <div class="flex space-x-2">
        <div onclick="window.location.href = '{{ route('detail', ['id' => $cartitem->product['id']]) }}'">
            <x-product-image :imageurl="asset($cartitem->product->images[0]->image_url)" class="w-28 h-28 rounded-md" />
        </div>
        <div class="space-y-8">
            <div>
                <a href="#" class="self-start font-medium mb-2">{{ $cartitem->product['name'] }}</a>

                <p class="font-bold calculated-total total-cal-{{ $loopindex }}">
                    ¢ {{ (int) $cartitem['quantity'] * (float) $cartitem->product['price'] }}
                </p>
                <p>Qty:{{ $cartitem['quantity'] }}</p>
                <p>
                    Size:{{ $cartitem->product['size'] }}
                </p>
            </div>
        </div>
    </div>
    <div class="mt-2 border border-gray-300 w-80"></div>
</div>
