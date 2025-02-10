<x-layout>
    <main class="h-screen flex">
        <!-- Left Section: Image -->
        <div class="w-3/5 h-screen bg-cover bg-center">
            <img src="{{ Vite::asset('public/images/shopping.jpg') }}" alt="" class="w-full h-full object-cover">
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
                                    <x-form-label for="first_name" >First Name</x-form-label>

                                    <div>
                                        <x-form-input value="{{ old('first_name') }}" name="first_name" id="first_name" required />

                                        <x-form-error name="first_name" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-form-label for="last_name" >Last Name</x-form-label>

                                    <div>
                                        <x-form-input name="last_name" id="last_name" value="{{ old('last_name') }}" required />

                                        <x-form-error name="last_name" />
                                    </div>
                                </x-form-field>

                                <x-form-field>
                                    <x-form-label for="email">Email Address</x-form-label>

                                    <div>
                                        <x-form-input name="email" id="email" type="email"  value="{{ old('email') }}" required />

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
                                        <x-form-input name="password_confirmation" id="password_confirmation"
                                            type="password" required />

                                        <x-form-error name="password_confirmation" />
                                    </div>
                                </x-form-field>
                                
                                <!-- Terms and Conditions Checkbox -->
                                <x-form-field>
                                    <div class="flex items-center">
                                        <x-form-checkout id="terms" name="terms" value="accept" />
                                        <label for="terms" class="ms-2 text-xs center justify-center">
                                            I agree with the
                                            <a href="/terms" class="text-blue-500 hover:underline text-sm ml-1">Terms
                                                and Conditions</a>.
                                        </label>
                                    </div>
                                    <x-form-error name="terms" />
                                </x-form-field>

                                <!-- Signup Button (Initially Disabled) -->
                                <x-form-field>
                                    <x-form-button id="signup-btn" class="w-80 opacity-50 cursor-not-allowed" type="submit" disabled>
                                        Signup
                                    </x-form-button>
                                </x-form-field>

                                <!-- JavaScript -->
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const termsCheckbox = document.getElementById("terms");
                                        const signupButton = document.getElementById("signup-btn");

                                        termsCheckbox.addEventListener("change", function() {
                                            if (this.checked) {
                                                signupButton.disabled = false;
                                                signupButton.classList.remove("opacity-50", "cursor-not-allowed");
                                            } else {
                                                signupButton.disabled = true;
                                                signupButton.classList.add("opacity-50", "cursor-not-allowed");
                                            }
                                        });
                                    });
                                </script>

                                <x-form-field>
                                    <div class="center justify-center">
                                        <p>
                                            Have an account?
                                        </p>
                                        <a href="/login" class="text-blue-500  hover:underline text-sm ml-1">Login</a>
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
