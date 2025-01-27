@props(['product'])

{{-- @dd($product) --}}

<div class=" max-w-sm rounded-xl shadow-lg border border-transparent">
    <x-product-image />
    <div class="px-2 py-2">
        <div>
            <a href="#" class="self-start font-bold text-xl mb-2">{{ $product['name'] }}</a>
        </div>
        <div>
            <ul>
                <li>
                    {{ $product['description'] }}
                </li>
                <li>
                    {{ $product['price'] }}
                </li>
            </ul>
        </div>
    </div>
</div>