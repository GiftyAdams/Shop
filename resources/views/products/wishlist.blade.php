<x-auth-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="grid grid-cols-5 gap-4">
            <div>
                <div class="border rounded-xl shadow-lg">
                    <div class="rounded  py-4 mb-1">
                        <p>
                            Hello 👋
                        </p>
                    </div>
                    <div class="grid grid-rows-5 gap-space-y-2">
                        <div>
                            <a href="#" class="flex items-center center space-x-2">
                                <x-svg.user />
                                <span>Personal Information</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="flex items-center space-x-2">
                                <x-svg.shopping-bag />
                                <span>My Orders</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="flex items-center center space-x-2 bg-black text-white py-5 px-4">
                                <x-svg.heart />
                                <span class="active:">My Wishlist</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="flex items-center space-x-2 ">
                                <x-svg.location />
                                <span>Manage Address</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="flex items-center space-x-2">
                                <x-svg.setting />
                                <span>Settings</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid col-span-4">
                <div class="grid grid-cols-4 gap-4 py- px-12">
                    @foreach($products as $product)
                    <x-product-card :$product />
                    @endforeach
                </div> 
             </div>
        </div>

        <div class="mt-10">

         <x-header>Related Products</x-header>
         <div>
            <div class="grid grid-cols-4 gap-4 py-14 px-12">
                @foreach($products as $product)
                <x-product-card :$product />
                @endforeach
            </div> 
         </div>
        </div>
    </main>

</x-auth-layout>