<x-auth-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="flex">
            <div class="grid grid-cols-4 gap-4 ">
                <div class="col-span-1">
                    <x-user-nav />
                </div>

                <div class="col-span-2">
                    <div class="grid grid-cols-3 gap-4 w-full">
                        <div class="p-6 bg-white shadow rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Shipping Address</h2>
                            <p><strong>First Name</strong> {{ $address->first_name }}</p>
                            <p><strong>Last Name</strong> {{ $address->last_name }}</p>
                            <p><strong>Phone Number</strong> {{ $address->phone_number }}</p>
                            <p><strong>Address</strong> {{ $address->address }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

</x-auth-layout>
