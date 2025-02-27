<x-auth-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="grid grid-cols-5 gap-4">
            <div class="col-span-1">
                <x-user-nav />
            </div>

            <div class="col-span-2">
                <form>
                    <div class="gap-4">
                        <x-form-field>
                            <x-form-label for="first_name">First Name</x-form-label>

                            <div>
                                <x-form-input class="py-3" name="first_name" id="first_name" required />

                                <x-form-error name="first_name" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="phone_number">Phone Number</x-form-label>

                            <div>
                                <x-form-input class="py-3" name="phone_number" id="phone_number" required />

                                <x-form-error name="phone_number" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="last_name">Last Name</x-form-label>

                            <div>
                                <x-form-input class="py-3" name="last_name" id="last_name"readonly required />

                                <x-form-error name="last_name" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="email">Email Address</x-form-label>

                            <div>
                                <x-form-input class="py-3" name="email" id="email" type="email" required />

                                <x-form-error name="email" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="address">Address</x-form-label>

                            <div>
                                <x-form-input class="py-3" name="address" id="address" required />

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
