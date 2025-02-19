 <x-auth-layout>
     <main class="px-20 py-4 mx-auto">
         <div class="grid grid-cols-4 ">
             <div class="col-span-1">
                 <div>
                     <div class="grid gap-4  rounded border w-64 p-4 space-y-2">
                         <div>
                             <div class="space-y-4">
                                 <!-- Collapsible: Product Categories -->
                                 <p>
                                     Filter By
                                 </p>
                                 <x-collapsible title="Gender">
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Zara</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Fragrance World</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Dior</span>
                                     </label>
                                 </x-collapsible>
                                 <x-collapsible title="Brand">
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Men</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Women</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Unisex</span>
                                     </label>
                                 </x-collapsible>
                                 <x-collapsible title="Type">
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Men</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Women</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Unisex</span>
                                     </label>
                                 </x-collapsible>
                                 <x-collapsible title="Department">
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Men</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Women</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Unisex</span>
                                     </label>
                                 </x-collapsible>
                                 <x-collapsible title="Scent Notes">
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Men</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Women</span>
                                     </label>
                                     <label class="flex items-center space-x-2">
                                         <input type="checkbox" class="rounded  text-indigo-600 ">
                                         <span>Unisex</span>
                                     </label>
                                 </x-collapsible>
                                 <div x-data="{ openPriceRange: false }" class="border border-gray-300 rounded-md p-4 bg-white">
                                     <!-- Collapsible Header -->
                                     <button class="flex items-center justify-between w-full text-left font-bold"
                                         @click="openPriceRange = !openPriceRange">
                                         <span>Price Range</span>
                                         <svg :class="{ 'rotate-180': openPriceRange }"
                                             class="w-5 h-5 transform transition-transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 d="M19 9l-7 7-7-7" />
                                         </svg>
                                     </button>

                                     <!-- Collapsible Content -->
                                     <div x-show="openPriceRange" class="mt-4 space-y-3" x-transition>
                                         <!-- Minimum Price -->
                                         <label class="flex flex-col space-y-1">
                                             <span class="text-sm text-gray-700">Minimum Price</span>
                                             <input type="number" placeholder="$¢0"
                                                 class="rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full px-3 py-2 text-gray-900" />
                                         </label>

                                         <!-- Maximum Price -->
                                         <label class="flex flex-col space-y-1">
                                             <span class="text-sm text-gray-700">Maximum Price</span>
                                             <input type="number" placeholder="$1000"
                                                 class="rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full px-3 py-2 text-gray-900" />
                                         </label>

                                         <!-- Apply Button -->
                                         <button
                                             class="w-full bg-black text-white rounded-md py-2 focus:outline-none focus:ring focus:ring-white">
                                             Apply
                                         </button>
                                     </div>
                                 </div>
                                 <script>
                                     document.addEventListener("DOMContentLoaded", () => {
                                         const collapsibleSections = document.querySelectorAll("[data-collapsible]");

                                         collapsibleSections.forEach((section) => {
                                             const button = section.querySelector("[data-toggle]");
                                             const content = section.querySelector("[data-content]");

                                             button.addEventListener("click", () => {
                                                 const isExpanded = button.getAttribute(
                                                     "aria-expanded") === "true";
                                                 button.setAttribute("aria-expanded", !isExpanded);
                                                 content.style.display = isExpanded ? "none" : "block";
                                             });
                                         });
                                     });
                                 </script>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


             <!-- If there are any products, display them -->
             <div class="col-span-3 ml-4">
                 <div>


                     @if ($products->count())
                         @if ($query)
                             <h3>Showing results for: <strong>{{ $query }}</strong></h3>
                         @endif
                         <div class="grid grid-cols-3 gap-x-4 gap-y-5 py-4">
                             @foreach ($products as $product)
                                 <x-product-card :$product />
                             @endforeach
                         </div>
                     @else
                         <span class="text-xl">Oops..No results found for: <strong>{{ $query }}</strong></span>
                     @endif
                     <div>
                         {{ $products->links() }}
                     </div>
                 </div>
             </div>

     </main>
     <div class="mt-10">
         <x-core-values />
     </div>
 </x-auth-layout>
