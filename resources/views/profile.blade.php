<x-auth-layout>
    <main class="px-28">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class=" grid grid-cols-5 gap-4">
            <div>
                <div class="border border-black rounded w-64 py-4 mb-1">
                    <p>
                        Hello 👋
                    </p>
                </div>
                <div class="grid grid-rows-5 gap-4  rounded border border-black w-64 p-4 space-y-2">
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.user />
                            <span>Personal Information</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.shopping-bag />
                            <span>My Orders</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.heart />
                            <span>My Wishlist</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.location />
                            <span>Manage Address</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="flex items-center space-x-2">
                            <x-svg.setting />
                            <span>Settings</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-span-1 space-y-6 py-14">
                <div>
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>

                        <div>
                            <x-form-input class="py-3" name="first_name" id="first_name" required />

                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>
                </div>
                <div>
                    <x-form-field>
                        <x-form-label for="phone_number">Phone Number</x-form-label>

                        <div>
                            <x-form-input class="py-3" name="phone_number" id="phone_number" required />

                            <x-form-error name="phone_number" />
                        </div>
                    </x-form-field>
                </div>
            </div>

            <div class="col-span-1 space-y-6 py-14">
                <div>
                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>

                        <div>
                            <x-form-input class="py-3" name="last_name" id="last_name" required />

                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>
                </div>

                <div>
                    <x-form-field>
                        <x-form-label for="email">Email Address</x-form-label>

                        <div>
                            <x-form-input class="py-3" name="email" id="email" type="email" required />

                            <x-form-error name="email" />
                        </div>
                    </x-form-field>
                </div>
                <div class="pt-14 flex justify-end">
                <x-form-button class="w-24">Edit</x-form-button>
                </div>
            </div>
        </div>
    </main>

</x-auth-layout>