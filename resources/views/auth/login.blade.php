<x-layout>
    <main class="h-screen flex">
        <!-- Left Section: Image -->
        <div class="w-3/5 h-screen bg-cover bg-center">
            <img src="{{ Vite::asset('public/images/login-image.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>

        <!-- Right Section: Form -->
        <div class="w-2/5 flex items-center justify-center">
            <div class="w-full max-w-md p-8">
                <div class="mb-4">
                    <ul class="space-y-1">
                        <li class=" font-bold text-2xl">
                            Welcome 👋
                        </li>
                        <li class="text-xs text-subHeader">
                            Please login here
                        </li>
                    </ul>
                </div>
                <form method="POST" action="/login">
                    @csrf

                    <div>
                        <div>
                            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 w-80 justify-center">


                                <x-form-field>
                                    <x-form-label for="email">Email Address</x-form-label>

                                    <div>
                                        <x-form-input name="email" id="email" type="email" :value="old('email')"
                                            equired />

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


                                <!-- <x-form-field>
                                    <div class="center justify-between font-medium">
                                        <div class="center">
                                            <x-form-checkout />
                                            <label for="remember-me" class="ms-2 text-xs">
                                                Remember Me
                                            </label>
                                        </div>
                                        <a href="#" class="text-xs hover:underline">
                                            Forgotten Password?
                                        </a>
                                    </div>

                                </x-form-field> -->
                                <x-form-field>
                                    <x-form-button class="w-80 mt-8">Login</x-form-button>
                                </x-form-field>
                                <x-form-field>
                                    <div class="center justify-center">
                                        <p>
                                            Don't have an account?
                                        </p>
                                        <a href="/register"
                                            class="text-blue-500 hover:underline text-sm ml-1">Signup</a>
                                    </div>
                                </x-form-field>
                            </div>
                        </div>
                    </div>

                    <div>

                    </div>
                </form>
            </div>
        </div>

    </main>
</x-layout>