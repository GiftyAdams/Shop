<x-auth-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="grid grid-cols-5 gap-4">
            <div class="col-span-1">
                <div class="border rounded-xl shadow-lg mb-4">
                    <div class="rounded  py-4 mb-1">
                        <p class="px-4">
                            Hello 👋
                        </p>
                    </div>
                    <div class="grid grid-rows-5 gap-space-y-2">
                        <div>
                            <a href="#" class="center space-x-2 bg-black text-white py-5 px-4">
                                <x-svg.user />
                                <span>Personal Information</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="center space-x-2 px-4">
                                <x-svg.shopping-bag />
                                <span>My Orders</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="center space-x-2 px-4">
                                <x-svg.heart />
                                <span class="active:">My Wishlist</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="center space-x-2 px-4">
                                <x-svg.location />
                                <span>Manage Address</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="center space-x-2 px-4">
                                <x-svg.setting />
                                <span>Settings</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        <div  class="col-span-4 ">
            <form>
                <div class="grid grid-cols-2 gap-4 mt-12 ">
                    <div class="space-y-6">
                        <x-form-field>
                            <x-form-label for="first_name">First Name</x-form-label>

                            <div>
                                <x-form-input  class="py-3" name="first_name" id="first_name" required />

                                <x-form-error name="first_name" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="phone_number">Phone Number</x-form-label>

                            <div>
                                <x-form-input  class="py-3" name="phone_number" id="phone_number" required />

                                <x-form-error name="phone_number" />
                            </div>
                        </x-form-field>
                     
                    </div>
 
                    <div class="space-y-6">
                        <x-form-field>
                            <x-form-label for="last_name">Last Name</x-form-label>

                            <div>
                                <x-form-input  class="py-3" name="last_name" id="last_name" required />

                                <x-form-error name="last_name" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="email">Email Address</x-form-label>
                        
                            <div>
                                <x-form-input  class="py-3" name="email" id="email" type="email" required />
                    
                                <x-form-error name="email" />
                            </div>
                        </x-form-field>
                    </div>
                </div>

                <div class="mt-6">
                    <x-form-field>
                        <x-form-label for="address">Address</x-form-label>

                        <div>
                            <x-form-input  class="py-3" name="address" id="address"  required />

                            <x-form-error name="address" />
                        </div>
                    </x-form-field>
                </div>
                <div class="grid justify-end mt-8 center space-x-4">
                    <x-form-field>
                        <x-form-button class="w-40 justify-items-end">Edit</x-form-button>
                    </x-form-field>
                    <x-form-field>
                        <x-form-button class="w-40 justify-items-end">Save</x-form-button>
                    </x-form-field>
                </div>
            </form>
        </div>
        </div>
    </main>

</x-auth-layout>