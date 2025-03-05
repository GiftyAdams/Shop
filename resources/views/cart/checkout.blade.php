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
        <div class="border border-transparent rounded w-64 p-4  bg-gray-200">
            <span class="font-bold">
                {{ Auth::user()->first_name }}
            </span>
            <div class="mt-3">
                <p>
                    @if (Auth::user()->address)
                        {{ Auth::user()->address }}
                    @else
                        <a href="{{ route('profile.edit') }}" class="text-red-500 underline">Update your profile to add an
                            address</a>
                    @endif
                </p>
                <p>
                    {{ Auth::user()->phone_number }}
                </p>
            </div>
            <div class="flex justify-between mt-2">
                <button>
                    Edit
                </button>
                <button>
                    <x-svg.trash />
                </button>
            </div>

        </div>
    </main>
</x-auth-layout>
