<x-layout>
    <main class="h-screen flex">
        <!-- Left Section: Image -->
        <div class="w-3/5 h-screen bg-cover bg-center">
            <img src="{{ Vite::asset('resources/images/reset-image.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>

        <!-- Right Section: Form -->
        <div class="w-2/5 flex items-center justify-center">
            <div class="w-full max-w-md p-8">
                <div class="mb-4">
                    <ul class="space-y-1">
                        <li class="mb-4">
                            <button class="center text-[12px]">
                                <x-svg.chevron-left /> Back
                            </button>
                        </li>
                        <li class=" font-bold text-2xl">
                            Enter OTP
                        </li>
                        <li class="text-xs text-subHeader w-80">
                            We have shared a code to your registered email address
                        </li>
                    </ul>
                </div>
                <form method="POST" action="/register">
                    @csrf

                    <div class="grid grid-cols-1 gap-y-3 sm:grid-cols-2 w-80 justify-center">
                        <x-form-field>
                            <x-form-label for="email">Email Address</x-form-label>

                            <div>
                                <x-form-input name="email" id="email" type="email" required />

                                <x-form-error name="email" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <div class="max-w-md mx-auto max-w-sm mt-4">
                                <form class="shadow-md px-4 py-4">
                                    <div class="flex justify-center gap-2">
                                        <input class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500 appearance-none" type="number" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code" required>
                                        <input class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500" type="number" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code" required>
                                        <input class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500" type="number" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code" required>
                                        <input class="w-12 h-12 text-center border rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500" type="number" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code" required>
                                    </div>
                                </form>
                            </div>
                        </x-form-field>

                        <x-form-field>
                        <x-form-button id="open-modal-button">Verify</x-form-button>
                        </x-form-field>
                    </div>

            </div>
            </form>
        </div>
        </div>

    </main>
</x-layout>