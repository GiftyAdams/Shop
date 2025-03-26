<x-auth-layout>
    <main>
        <!-- Carousel Container -->
        <div class="relative w-full h-[95vh]">
            <!-- Background Image -->
            <div id="carousel" class="w-full h-full bg-cover bg-center transition-all duration-1000"
                style="background-image: url('/images/splash.jpg');">
                <div class="flex items-center justify-end">
                    <div class="space-y-4 mt-48">
                        <h1 class="text-slate-700 font-bold text-3xl mr-20 max-w-sm" style="text-shadow: -2px -2px 0 #FFFFFF, 2px -2px 0 #FFFFFF, -2px 2px 0 #FFFFFF, 2px 2px 0 #FFFFFF;">
                            MEET OUR BESTSELLERS AND SEE WHY OUR CUSTOMERS LOVE THEM
                        </h1>
                        <div>
                            <a href="/products">
                                <x-form-button class="w-40">Shop Now →</x-form-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Left Arrow -->
            <button id="prev"
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black">
                &#10094;
            </button>

            <!-- Right Arrow -->
            <button id="next"
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black">
                &#10095;
            </button>
        </div>

        <script>
            // List of background images
            const images = [
                "/images/splash.jpg",
                "/images/secondbg.jpg",
                "/images/thirdbg.jpg",
                "/images/fourthbg.jpg",
                "/images/fifthbg.jpg",
                "/images/sixthbg.jpg"
            ];

            let currentIndex = 0;
            const carousel = document.getElementById("carousel");
            const prevButton = document.getElementById("prev");
            const nextButton = document.getElementById("next");

            function changeBackground(index) {
                currentIndex = index;
                carousel.style.backgroundImage = `url('${images[currentIndex]}')`;
            }

            function nextImage() {
                currentIndex = (currentIndex + 1) % images.length;
                changeBackground(currentIndex);
            }

            function prevImage() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                changeBackground(currentIndex);
            }

            // Auto-slide every 5 seconds
            let interval = setInterval(nextImage, 5000);

            // Event Listeners for Arrows
            nextButton.addEventListener("click", () => {
                clearInterval(interval);
                nextImage();
                interval = setInterval(nextImage, 5000); // Restart auto-slide
            });

            prevButton.addEventListener("click", () => {
                clearInterval(interval);
                prevImage();
                interval = setInterval(nextImage, 5000); // Restart auto-slide
            });

            // Initialize first image
            changeBackground(0);
        </script>


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









            <div class="grid grid-cols-3 gap-y-6 gap-x-4 mx-32 my-10">
                @foreach ($products as $product)
                    <x-product-card :$product />
                @endforeach
            </div>

            <div class="grid grid-cols-4 gap-4 mb-10">
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
            <div>
                <x-core-values />
            </div>



        </div>

        </div>
    </main>
</x-auth-layout>
