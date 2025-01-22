<x-auth-layout>
    <main>
        <div style="background-image: url('/images/splash.jpg'); height: 95vh; background-size: cover; background-position: center;"
            class="flex items-center justify-end">
            <div class="space-y-4">
                <h1 class="text-black font-bold text-xl mr-20">
                    MEET OUR BESTSELLERS AND
                    SEE <br>-WHY OUR CUSTOMERS LOVE THEM
                </h1>
                <div>
                    <a href="/products">
                        <x-form-button class="w-40">Shop Now →</x-form-button>
                    </a>
                </div>
            </div>
        </div>

        <div class="px-20">

            <ul class="center items-center gap-4 justify-between py-12 ">
                <li>
                    <img src="{{ URL('images/zara.png') }}" alt="Perfume 1" class="images" />
                </li>
                <li>
                    <img src="{{ URL('images/dior.png') }}" alt="Perfume 1" class="images" />
                </li>
                <li>
                    <img src="{{ URL('images/bvlgari.png') }}" alt="Perfume 1" class="images" />
                </li>
                <li>
                    <img src="{{ URL('images/rabanne.png') }}" alt="Perfume 1" class="images" />
                </li>
                <li>
                    <img src="{{ URL('images/fragrance.png') }}" alt="Perfume 1" class="images" />
                </li>
                <li>
                    <img src="{{ URL('images/sauvage.png') }}" alt="Perfume 1" class="images" />
                </li>
                <li>
                    <img src="{{ URL('images/boss.png') }}" alt="Perfume 1" class="images" />
                </li>
                <li>
                    <img src="{{ URL('images/chanel.png') }}" alt="Perfume 1" class="images" />
                </li>
            </ul>

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
                    <a href="/products">
                        <x-form-button class="w-40">Shop Now →</x-form-button>
                    </a>
                </div>

                <div class="col-span-2">
                    <img src="{{ URL('images/login-image.jpg') }}" alt="" class="" />
                </div>
            </div>




        </div>

        </div>
    </main>
</x-auth-layout>