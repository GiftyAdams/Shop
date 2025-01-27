<x-auth-layout>
    <main>
        <div style="background-image: url('/images/splash.jpg'); height: 95vh; background-size: cover; background-position: center;"
            class="flex items-center justify-end">
            <div class="space-y-4">
                <h1 class="text-slate-700 font-bold text-3xl mr-20 max-w-sm">
                    MEET OUR BESTSELLERS AND SEE WHY OUR CUSTOMERS LOVE THEM
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



           <div class="grid grid-cols-4 gap-4">
            @foreach($products as $product)
            <x-product-card :$product />
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