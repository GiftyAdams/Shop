@props(['product', 'loopindex' => 0])
<div class="relative group py-2">
    <div class="flex space-x-2">
        <div onclick="window.location.href = '{{ route('detail', ['id' => $product->product['id']]) }}'">
            <x-product-image class="w-[60px] rounded-md" />
        </div>
        <div class="space-y-8">
            <div>
                <a href="#" class="self-start font-medium mb-2">{{ $product->product['name'] }}</a>

                <p class="font-bold calculated-total total-cal-{{ $loopindex }}">
                    ¢ {{ (int) $product['quantity'] * (float) $product->product['price'] }}
                </p>
                <p>
                    Size:{{ $product->product['size'] }}
                </p>
            </div>
        </div>
    </div>
    <div class="mt-2 border border-gray-300 w-80"></div>
</div>
