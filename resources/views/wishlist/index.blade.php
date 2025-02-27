<x-auth-user-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header class="font-medium"> My Profile</x-header>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1 mb-8">
                <x-user-nav />
            </div>

            <div class="col-span-3">
                @if ($wishlistItems->isEmpty())
                    <p class="text-center text-gray-500">No items in your wishlist.</p>
                @endif

                <div class="grid col-span-4">
                    <div class="grid grid-cols-3 gap-x-4 gap-y-5 mb-10">
                        @foreach ($wishlistItems as $wishlistItem)
                            <x-product-card :product="$wishlistItem->product" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-auth-user-layout>
