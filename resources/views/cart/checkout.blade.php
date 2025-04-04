<x-auth-layout>
    <main class="px-20 py-8">
        <x-header>Shipping Address</x-header>

        <div class="max-w-md mx-auto mt-4">
            <h1 class="font-medium">
                Select a delivery address
            </h1>
            <p>
                Is the address you would like to use below? If not edit the form to enter a new address.
            </p>
        </div>

        <section>
           
            <div class="w-80 mx-auto ">
                <p class="font-bold mt-4">
                    Add Address
                </p>
                <form action="{{ route('cart.add.address') }}" method="POST">
                    @csrf
                    <div class="space-y-4 mt-3">
                        <x-form-field>
                            <x-form-label for="first_name">First Name</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="first_name" id="first_name"
                                    value="{{ Auth::user()->first_name }}" />

                                <x-form-error name="first_name" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="last_name">Last Name</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="last_name" id="last_name"
                                    value="{{ Auth::user()->last_name }}" />

                                <x-form-error name="last_name" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="phone_number">Phone Number</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="phone_number" placeholder="eg. 054 123 456"
                                    id="phone_number" value="{{ Auth::user()->phone_number ?? old('phone_number') }}" />

                                <x-form-error name="phone_number" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="address">Address</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="address" id="address" placeholder="Address"
                                    value="{{ Auth::user()->address ?? old('address') }}" />

                                <x-form-error name="address" />
                            </div>
                        </x-form-field>

                    </div>
                    <div class="p-2 flex justify-center mt-3">
                        <x-form-field>
                            <x-form-button class="w-24 "
                                type="submit">Save</x-form-button>
                        </x-form-field>
                    </div>
                </form>
            </div>
        </section>
        </div>

    </main>
</x-auth-layout>
