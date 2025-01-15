<x-auth-layout>
    <div style="background-image: url('/images/splash.jpg'); height: 95vh; background-size: cover; background-position: center;"
        class="flex items-center justify-end">
        <div>
            <div>
                <h1 class="text-black font-bold text-xl">
                    MEET OUR BESTSELLERS AND
                    SEE <br>-WHY OUR CUSTOMERS LOVE THEM
                </h1>
                <x-form-button class="w-40 ">Shop Now →</x-form-button>
            </div>
        </div>
    </div>

    <div class="px-20">
        <div class="flex justify-between items-center px-14 py-2">
            <div>
                <span class="text-xl font-medium">
                    Latest Perfumes
                </span>
            </div>
            <div class="space-x-2">
                <x-form-button id="scroll-left" class="bg-slate-300 w-8">
                    <x-svg.arrow-left />
                </x-form-button>
                <x-form-button id="scroll-right" class="w-8">
                    <x-svg.arrow-right />
                </x-form-button>
            </div>
        </div>

        <!-- Horizontal Scrollable Image Row -->
        <!-- <div class="overflow-y relative px-14">
            <div id="image-container" class="flex space-x-4 transition-transform duration-300 scroll-auto">
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
                <img src="{{ URL('images/2.png') }}" alt="Perfume 2" class="w-32 h-32 object-cover rounded-lg" />
                <img src="{{ URL('images/3.jpg') }}" alt="Perfume 3" class="w-32 h-32 object-cover rounded-lg" />
                <img src="{{ URL('images/4.jpg') }}" alt="Perfume 4" class="w-32 h-32 object-cover rounded-lg" />
                <img src="{{ URL('images/5.jpg') }}" alt="Perfume 5" class="w-32 h-32 object-cover rounded-lg" />
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
                <img src="{{ URL('images/2.png') }}" alt="Perfume 2" class="w-32 h-32 object-cover rounded-lg" />
                <img src="{{ URL('images/3.jpg') }}" alt="Perfume 3" class="w-32 h-32 object-cover rounded-lg" />
                <img src="{{ URL('images/4.jpg') }}" alt="Perfume 4" class="w-32 h-32 object-cover rounded-lg" />
            </div>
        </div> -->

        <div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>
                <img src="{{ URL('images/one.jpg') }}" alt="Perfume 1" class="w-32 h-32 object-cover rounded-lg" />
            </div>
            <div>

            </div>
        </div>

        @php
        $products = [
        [
        'imageUrl' => URL('images/one.jpg'),
        'title' => 'Pure Black Perfume',
        'description' => 'Sweet-scented fragrance',
        'price' => '$4.00',
        ],
        [
        'imageUrl' => URL('images/2.png'),
        'title' => 'Floral Essence',
        'description' => 'Fresh, flowery scent',
        'price' => '$5.50',
        ],
        [
        'imageUrl' => URL('images/3.jpg'),
        'title' => 'Citrus Breeze',
        'description' => 'Citrus-infused freshness',
        'price' => '$3.50',
        ],
        [
        'imageUrl' => URL('images/4.jpg'),
        'title' => 'Lavender Dream',
        'description' => 'Relaxing lavender aroma',
        'price' => '$6.00',
        ],
        [
        'imageUrl' => URL('images/5.jpg'),
        'title' => 'Ocean Mist',
        'description' => 'Refreshing ocean scent',
        'price' => '$4.50',
        ],
        [
        'imageUrl' => URL('images/one.jpg'),
        'title' => 'Spiced Wood',
        'description' => 'Warm and woody fragrance',
        'price' => '$7.00',
        ],
        [
        'imageUrl' => URL('images/2.png'),
        'title' => 'Tropical Paradise',
        'description' => 'Sweet tropical notes',
        'price' => '$5.00',
        ],
        [
        'imageUrl' => URL('images/3.jpg'),
        'title' => 'Berry Bliss',
        'description' => 'Fruity berry scent',
        'price' => '$3.75',
        ],
        [
        'imageUrl' => URL('images/4.jpg'),
        'title' => 'Woodland Escape',
        'description' => 'Earthy and fresh wood aroma',
        'price' => '$6.50',
        ],
        [
        'imageUrl' => URL('images/5.jpg'),
        'title' => 'Summer Citrus',
        'description' => 'Bright and citrusy fragrance',
        'price' => '$4.25',
        ],
        [
        'imageUrl' => URL('images/5.jpg'),
        'title' => 'Summer Citrus',
        'description' => 'Bright and citrusy fragrance',
        'price' => '$4.25',
        ],
        [
        'imageUrl' => URL('images/5.jpg'),
        'title' => 'Summer Citrus',
        'description' => 'Bright and citrusy fragrance',
        'price' => '$4.25',
        ],
        [
        'imageUrl' => URL('images/5.jpg'),
        'title' => 'Summer Citrus',
        'description' => 'Bright and citrusy fragrance',
        'price' => '$4.25',
        ],
        [
        'imageUrl' => URL('images/5.jpg'),
        'title' => 'Summer Citrus',
        'description' => 'Bright and citrusy fragrance',
        'price' => '$4.25',
        ],
        [
        'imageUrl' => URL('images/5.jpg'),
        'title' => 'Summer Citrus',
        'description' => 'Bright and citrusy fragrance',
        'price' => '$4.25',
        ],
        ];
        @endphp

        <div class="grid sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 py-8">
            @foreach ($products as $product)
            <x-product-card :imageUrl="$product['imageUrl']" :title="$product['title']"
                :description="$product['description']" :price="$product['price']" />
            @endforeach
        </div>

        <div class="grid grid-cols-4 gap-4 py-14 px-12">
            <div class="col-span-2 mt-20 space-y-4">
                <h1 class="font-bold text-4xl italic"> New Arrivals Just For You </h1>
                <h1> Discover this and many more products that will suit your taste.</h1>
                <x-form-button class="w-40">Shop Now →</x-form-button>
            </div>

            <div class="col-span-2">
                <img src="{{ URL('images/login-image.jpg') }}" alt="" class="" />
            </div>
        </div>


        <section class="py-8">
            <div class="flex justify-center text-xl font-bold py">
                Core Values
            </div>
            <div class="flex justify-center py-2">
                <ul class="center space-x-10">
                    <li class="center">
                        <x-svg.wallet />
                        <p>
                            Flexible Payment
                        </p>
                    </li>
                    <li class="center">
                        <x-svg.wallet />
                        <p>
                            Flexible Payment
                        </p>
                    </li>
                    <li class="center">
                        <x-svg.wallet />
                        <p>
                            Flexible Payment
                        </p>
                    </li>
                    <li class="center">
                        <x-svg.wallet />
                        <p>
                            Flexible Payment
                        </p>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    </div>
</x-auth-layout>