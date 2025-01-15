<div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full" src="{{ $imageUrl }}" alt="{{ $title }}">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $title }}</div>
        <ul class="text-gray-700 text-base">
            <li>
                {{ $description }}
            </li>
            <li>
                {{ $price }}
            </li>
        </ul>
    </div>
</div>