<x-auth-user-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <x-user-nav />
            </div>

            <div class="col-span-3">
                @if ($wishlistItems->isEmpty())
                    <p class="text-center text-gray-500">No items in your wishlist.</p>
                @endif

                <div class="grid col-span-4">
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($wishlistItems as $wishlistItem)
                            <x-product-card :product="$wishlistItem->product" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10">

            <x-header>Related Products</x-header>
            {{-- <div>
            <div class="grid grid-cols-4 gap-4 py-14 px-12">
                @foreach ($products as $product)
                <x-product-card :$product />
                @endforeach
            </div> 
         </div> --}}
        </div>
    </main>

</x-auth-user-layout>
