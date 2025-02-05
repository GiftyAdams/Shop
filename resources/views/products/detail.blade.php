<x-auth-layout>
    <main class="mx-20">
        <div>
        <div class="grid grid-cols-2 space-x-6">
            <div>
                <x-product-image class="w-md"/>
                <div>
                    //4extra images of the product
                </div>
            </div>
            <div>
                <p class="text-xs">{{ $product->name }}</p>
               <div class=" center between font-bold text-xl">
                <h1 class="text-3xl"> {{ $product->name }}</h1>
                <p class="bg-green-500 text-white text-xs px-2 py- rounded">In Stock</p>
               </div>

               <div class="my-4">
                <div style="border-top: 1px solid black; width: 100%; margin: 10px 0;"></div>

                <span class="font-medium text-2xl space-y-3">${{ $product->price }}</span>
                <div style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>

             </div>
                <p>
                    {{ $product->description }}
                </p>
                <p class="border border-blaxk px-2 py-4 bg-gray-200">
                    {{ $product->size }}
                </p>
                <section>
                   
                    
                   
                  
                    <div class="center space-x-4 bottom-0">
                        <div class="flex items-center space-x-2 border border-black rounded-md ">
                            <!-- Minus Button -->
                            <button onclick="decreaseQuantity(this)" class="px-3 py-1 text-lg">−</button>
                        
                            <!-- Quantity Display -->
                            <input type="text" class="w-10 text-center py-1 " value="1" min="1" readonly />
                        
                            <!-- Plus Button -->
                            <button onclick="increaseQuantity(this)" class="px-3  py-1 text-lg">+</button>
                        </div>
                        <script>
                            function increaseQuantity(button) {
                                let inputField = button.previousElementSibling; // Get the input field
                                let currentValue = parseInt(inputField.value);
                                inputField.value = currentValue + 1;
                            }
                        
                            function decreaseQuantity(button) {
                                let inputField = button.nextElementSibling; // Get the input field
                                let currentValue = parseInt(inputField.value);
                                if (currentValue > 1) { // Ensure it doesn't go below 1
                                    inputField.value = currentValue - 1;
                                }
                            }
                        </script>
                        
                        <x-form-button class="py-4 px-2 w-80">Add to Cart</x-form-button>
                        <button class="border border-black rounded-md px-3 py-2">
                            <x-svg.heart/>
                        </button>
                    </div>
                </section>
            </div>
        </div>
{{-- <div class="center">
    <span>Description</span>
    <span>
        Additional Information
    </span>
  <span>Reviews</span>
</div> --}}
<div class="flex gap-4 font-bold cursor-pointer  my-4">
    <span class="nav-link text-blue-500 border-b-2 border-blue-500 pb-1" data-target="description">Description</span>
    <span class="nav-link text-gray-500" data-target="reviews">Reviews</span>
</div>

<!-- Content Sections -->
<div id="content" class="max-w-2xl">
    <!-- Description -->
    <div id="description" class="content-section">
        <p>This is a detailed product description. It includes all the essential information about the product.</p>
    </div>

    <!-- Reviews (With a Form) -->
    <div id="reviews" class="content-section hidden">
        <h2 class="text-xl font-semibold mb-2">Customer Reviews</h2>
        <p class="text-gray-700 mb-4">See what others are saying about this product.</p>
        
        <!-- Review Form -->
        <form class=" p-4 rounded-lg space-y-2">
            <div class="center space-x-8">
                <div>
                    <x-svg.star />
                </div>
                <div class="center">
                    <x-svg.star />
                    <x-svg.star />
                 </div>
                <div class="center">
                    <x-svg.star />
                    <x-svg.star />
                    <x-svg.star />
                </div>
                <div class="center">
                    <x-svg.star />
                    <x-svg.star />
                    <x-svg.star />
                    <x-svg.star />
                </div>
                <div class="center">
                    <x-svg.star />
                    <x-svg.star />
                    <x-svg.star />
                    <x-svg.star />
                    <x-svg.star />
                </div>
            </div>
            <label class="block mb-2 font-semibold">Add Your Review</label>
            
            <div>
                <x-form-field>
                    <x-form-label for="name">Name</x-form-label>

                    <div>
                        <x-form-input  class="py-3" name="name" id="name"  required />

                        <x-form-error name="name" />
                    </div>
                </x-form-field>
            </div>
            <div>
                <x-form-field>
                    <x-form-label for="email">Email Address</x-form-label>
                
                    <div>
                        <x-form-input  class="py-3" name="email" id="email" type="email" required />
            
                        <x-form-error name="email" />
                    </div>
                </x-form-field>
            </div>
            <div>
                <x-form-field>
                    <x-form-label for="review">Your Review</x-form-label>

                    <div>
                        <x-form-input  class="py-4" name="review" id="review"  required />

                        <x-form-error name="review" />
                    </div>
                </x-form-field>
            </div>
         <div class="mt-4">
            <x-form-field>
                <x-form-button class="w-40 justify-items-end">Submit</x-form-button>
            </x-form-field>
         </div>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll(".nav-link");
        const sections = document.querySelectorAll(".content-section");

        navLinks.forEach(link => {
            link.addEventListener("click", function () {
                // Remove active styles from all links
                navLinks.forEach(l => {
                    l.classList.remove("text-blue-500", "border-blue-500", "border-b-2", "pb-1");
                    l.classList.add("text-gray-500");
                });

                // Hide all sections
                sections.forEach(section => section.classList.add("hidden"));

                // Show the selected section
                const target = this.getAttribute("data-target");
                document.getElementById(target).classList.remove("hidden");

                // Add active styles to the clicked link
                this.classList.add("text-blue-500", "border-blue-500", "border-b-2", "pb-1");
                this.classList.remove("text-gray-500");
            });
        });
    });
</script>

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
        </div>

        <div>
            <x-core-values />
        </div>
    </main>
</x-auth-layout>