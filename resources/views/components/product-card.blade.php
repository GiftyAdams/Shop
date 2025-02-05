@props(['product'])
<div class=" max-w-xs rounded shadow border border-transparent" onclick="window.location.href = '{{ route('detail', ['id'=> $product['id']]) }}'" >
   
    <div class="relative group">
        <x-product-image class="w-ful"  />
        <button class="absolute text-xs bottom-2 rounded-xl left-1/2 -translate-x-1/2 bg-black text-white px-4 py-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
            Add to Cart
        </button>
    </div>
    
    <div class="px-2 py-2">
        <div>
            <a href="{{ route('detail', ['id'=> $product['id']]) }}" class="self-start font-bold text-xl mb-2">{{ $product['name'] }}</a>
        </div>
        <div>
            <ul>
                <li>
                    {{ $product['price'] }}
                </li>
            </ul>
        </div>
    </div>
</div>