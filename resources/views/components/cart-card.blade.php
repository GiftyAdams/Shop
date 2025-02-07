@props(['product'])
<div class="flex" onclick="window.location.href = '{{ route('detail', ['id'=> $product['id']]) }}'">
    <div>
<x-product-image class="w-10 h-10" />
    </div>
    <div>
        <a href="{{ route('detail', ['id'=> $product['id']]) }}" class="self-start font-bold text-xl mb-2">{{ $product['name'] }}</a>
        <p class="font-medium">
            {{ $product['quantity'] }} x {{ $product['price'] }}
        </p>
    </div>
    <div>
        <x-svg.trash />
    </div>
</div>