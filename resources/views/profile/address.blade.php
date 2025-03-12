<x-auth-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="grid grid-cols-4 gap-4 ">
            <div class="col-span-1">
                <x-user-nav />
            </div>

            <div class="col-span-2">
                <div class="p-6 bg-white shadow rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Shipping Address</h2>
                
                    @if($order && $order->address)
                        <p><strong>Street:</strong> {{ $order->address->street }}</p>
                        <p><strong>City:</strong> {{ $order->address->city }}</p>
                        <p><strong>State:</strong> {{ $order->address->state ?? 'N/A' }}</p>
                        <p><strong>Zip Code:</strong> {{ $order->address->zip_code }}</p>
                        <p><strong>Country:</strong> {{ $order->address->country }}</p>
                    @else
                        <p class="text-red-500">No shipping address found.</p>
                    @endif
                </div>
                
            
            </div>
        </div>
      
    </main>

</x-auth-layout>
