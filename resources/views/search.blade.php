 <x-auth-layout>
     <main class="px-20 py-4 mx-auto">
         <div class="grid grid-cols-4 ">
             <div class="col-span-1">
                 <div>
                     <div class="grid gap-4  rounded border w-64 p-4 space-y-2">
                         <div>
                             <x-user-sidenav :genders="$genders" :categories="$categories" :brands="$brands" />
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
