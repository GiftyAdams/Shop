<x-auth-layout>
    <div>
        <div class="grid grid-cols-5">
            <div class="col-span-2">
                <img src="{{ Vite::asset('public/images/2.png') }}" alt="" class="w-full h-full object-cover">
            </div>
            <div class="col-span-3">
                <h1> Zara Man</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id ipsa ducimus quo rerum inventore eveniet
                    nostrum! Perferendis reprehenderit, hic itaque repellat dolore debitis recusandae? Delectus totam
                    rem facilis veniam voluptatibus?
                </p>
                <section>
                    <div>

                    </div>
                    <div>
                        <x-form-button>Add to Cart</x-form-button>
                    </div>
                </section>
            </div>
        </div>


        <div>
            <x-header>Related Products</x-header>
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
            'imageUrl' => URL('images/5.jpg'),
            'title' => 'Ocean Mist',
            'description' => 'Refreshing ocean scent',
            'price' => '$4.50',
            ],
            ];
            @endphp

            <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 py-8">
                @foreach ($products as $product)
                <x-product-card :imageUrl="$product['imageUrl']" :title="$product['title']"
                    :description="$product['description']" :price="$product['price']" />
                @endforeach
            </div>

            <div>
                <h1>Reviews</h1>
            </div>
        </div>
    </div>
</x-auth-layout>