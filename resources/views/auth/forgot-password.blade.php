<x-layout>
    <main class="h-screen flex">
        <!-- Left Section: Image -->
        <div class="w-3/5 h-screen bg-cover bg-center">
            <img src="{{ Vite::asset('public/images/reset-image.jpg') }}" alt=""
                class="w-full h-full object-cover">
        </div>

        <!-- Right Section: Form -->
        <div class="w-2/5 flex items-center justify-center">
            <div class="w-full max-w-md p-8">
                <div class="mb-4">
                    <ul class="space-y-1">
                        <li class="mb-4">
                            <button class="center text-[12px]" onclick="window.history.back();">
                                <x-svg.chevron-left /> Back
                            </button>
                        </li>
                        <li class=" font-bold text-2xl">
                            Forgot Password
                        </li>
                        <li class="text-xs text-subHeader w-80">
                            Enter your registered email address. we will send you a code to reset your password.
                        </li>
                    </ul>
                </div>
                <form method="POST" action="/forgot-password">
                    @csrf

                    <div class="grid grid-cols-1 gap-y-3 sm:grid-cols-2 w-80 justify-center">
                        <x-form-field>
                            <x-form-label for="email">Email Address</x-form-label>

                            <div>
                                <x-form-input name="email" id="email" type="email" :value="old('email')" required />

                                <x-form-error name="email" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-button class="w-80 mt-6" type="submit">Send OTP</x-form-button>
                        </x-form-field>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
