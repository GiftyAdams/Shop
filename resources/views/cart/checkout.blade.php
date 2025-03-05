<x-auth-layout>
    <main class="px-20 py-8">
        <x-header>Shipping Address</x-header>

        <div>
            {{-- <ul class="center flex justify-between">
                <li>
                    <a href="/cart/checkout"
                        class="{{ request()->is('#') ? 'font-extrabold ' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm"><x-svg.home />
                        Address
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="{{ request()->is('/') ? 'font-extrabold ' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm"><x-svg.wallet/>
                        Payment Method
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="{{ request()->is('/') ? 'font-extrabold ' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm"><x-svg.review/>
                        Review
                    </a>
                </li>
            </ul> --}}
      
            
        </div>
        <div>
            <h1>
                Select a delivery address
            </h1>
            <p>
                Is the address you would like to use below? If not complete the form before to enter a new address.
            </p>
        </div>
        <div class="border border-black rounded w-64 p-4 space-y-2">
            <span class="font-bold">
                {{ Auth::user()->first_name }}
            </span>
            <p>
                @if (Auth::user()->address)
                    {{ Auth::user()->address }}
                @else
                    <a href="{{ route('profile.edit') }}" class="text-red-500 underline">Update your profile to add an address</a>
                @endif
            </p>
            
            <button>
                Edit
            </button>
        </div>
    </main>
</x-auth-layout>
