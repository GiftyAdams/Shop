<x-layout>
    <main class="h-screen flex">
        <!-- Left Section: Image -->
        <div class="w-3/5 h-screen bg-cover bg-center">
            <img src="{{ Vite::asset('resources/images/shopping.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>

        <!-- Right Section: Form -->
        <div class="w-2/5 flex items-center justify-center">
            <div class="w-full max-w-md p-8">
                <div class="mb-4">
                    <ul class="space-y-1">
                        <li class=" font-bold text-2xl">
                            Create New Account
                        </li>
                        <li class="text-xs text-subHeader">
                            Please enter details
                        </li>
                    </ul>
                </div>
                <form method="POST" action="/register">
                    @csrf

                    <div>
                        <div>
                            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 w-80 justify-center">
                                <x-form-field>
                                    <x-form-label for="first_name">First Name</x-form-label>

                                    <div>
                                        <x-form-input name="first_name" id="first_name" required />

                                        <x-form-error name="first_name" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-form-label for="last_name">Last Name</x-form-label>

                                    <div>
                                        <x-form-input name="last_name" id="last_name" required />

                                        <x-form-error name="last_name" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-form-label for="email">Email Address</x-form-label>

                                    <div>
                                        <x-form-input name="email" id="email" type="email" required />

                                        <x-form-error name="email" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-form-label for="password">Password</x-form-label>

                                    <div>
                                        <x-form-input name="password" id="password" type="password" required />

                                        <x-form-error name="password" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-form-label for="password_confirmation">Confirm Password</x-form-label>

                                    <div>
                                        <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />

                                        <x-form-error name="password_confirmation" />
                                    </div>
                                </x-form-field>
                                <x-form-field>
                                    <div class="flex items-center">
                                        <x-form-checkout id="terms" name="terms" />
                                        <label for="terms" class="ms-2 text-xs text-gray-900 dark:text-gray-400">
                                            I agree with the <a href="#" class="text-black font-bold hover:underline">Terms and Conditions</a>.
                                        </label>
                                    </div>

                                </x-form-field>
                                <x-form-field>
                                    <x-form-button>Signup</x-form-button>
                                </x-form-field>
                                <x-form-field>
                                    <div class="center justify-center">
                                        <p>
                                            Have an account?
                                        </p>
                                        <a href="/login" class="text-blue-500 hover:underline text-sm ml-1">Login</a>
                                    </div>
                                </x-form-field>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>