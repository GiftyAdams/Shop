<x-auth-layout>
    <main class="mx-20">
        <div>
        <div class="grid grid-cols-2">
            <div>
                <x-product-image />
            </div>
            <div>
               <div class=" center between">
                <h1> {{ $product->name }}</h1>
                <p>In Stock</p>
               </div>
                <p>
                    {{ $product->description }}
                </p>
                <section>
                    <div class="center">
                      @for ($i = 0; $i < 5; $i++)
                        <x-svg.star />
                      @endfor
                    </div>
                    
                    <div>
                        <span class="font-bold text-lg">${{ $product->price }}</span>
                     </div>
                  
                    <div class="center space-x-4 ">
                        <div class="flex items-center space-x-2 border border-black rounded-md">
                            <!-- Minus Button -->
                            <button onclick="decreaseQuantity(this)" class="px-3 text-lg">−</button>
                        
                            <!-- Quantity Display -->
                            <input type="text" class="w-10 text-center " value="1" min="1" readonly />
                        
                            <!-- Plus Button -->
                            <button onclick="increaseQuantity(this)" class="px-3 text-lg">+</button>
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
                        
                        <x-form-button>Add to Cart</x-form-button>
                    </div>
                </section>
            </div>
        </div>


      <div>
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
    </main>
</x-auth-layout>