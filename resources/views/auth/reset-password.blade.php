<x-layout>
    @if (session('success'))
        <div id="success-message" class="bg-green-100 border border-green-400 text-center text-green-700 px-4 py-3 rounded relative"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.getElementById("success-message");
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 5000);
            }
        })
    </script>

    <main class="h-screen flex">
        <!-- Left Section: Image -->
        <div class="w-3/5 h-screen bg-cover bg-center">
            <img src="{{ asset('images/reset-image.jpg') }}" alt=""
                class="w-full h-full object-cover">
        </div>

        <!-- Right Section: Form -->
        <div class="w-2/5 flex items-center justify-center">
            <div class="w-full max-w-md p-8">
                <button class="center text-[12px] my-3" onclick="window.history.back();">
                    <x-svg.chevron-left /> Back
                </button>
                <div class="mb-4 center justify-center">
                    <ul class="space-y-1">
                        <li class=" font-bold text-2xl">
                            Reset Password
                        </li>
                        <li class="text-xs text-subHeader w-80">
                            Enter your new password.
                        </li>
                    </ul>
                </div>
                <form method="POST" action="/reset-password">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-3 sm:grid-cols-2 w-80 justify-center">
                        <x-form-field>
                            <x-form-label for="password">New Password</x-form-label>

                            <div>
                                <x-form-input name="password" id="password" type="password" required />

                                <x-form-error name="password" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="password_confirmation">Confirm Password</x-form-label>

                            <div>
                                <x-form-input name="password_confirmation" id="password_confirmation" type="password"
                                    required />

                                <x-form-error name="password_confirmation" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-button class="w-80 mt-6" type="submit">Reset</x-form-button>
                        </x-form-field>
                    </div>
                </form>
                <x-form-error name="email" />
            </div>
        </div>
    </main>
</x-layout>
