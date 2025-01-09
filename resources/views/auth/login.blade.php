<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen flex">
    <!-- Left Section: Image -->
    <div class="w-3/5 h-screen bg-cover bg-center">
        <img src="{{ Vite::asset('resources/images/loginimage.jpg') }}" alt="" class="w-full h-full object-cover">
    </div>

    <!-- Right Section: Form -->
    <div class="w-2/5 flex items-center justify-center">
        <div class="w-full max-w-md p-8">
            <div class="mb-4">
                <ul class="space-y-1">
                    <li class=" font-bold text-xl">
                        Welcome
                    </li>
                    <li class="text-xs text-slate-400">
                        Please login here
                    </li>
                </ul>
            </div>
            <form method="POST" action="/register">
                @csrf

                <div>
                    <div>
                        <div class="grid grid-cols-1 gap-x- gap-y-4 sm:grid-cols-2 justify-center">


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
                                <div class="flex items-center justify-between font-medium">
                                    <div class="flex items-center">
                                        <x-form-checkout />
                                        <label for="remember-me" class="ms-2 text-xs">
                                            Remember Me
                                        </label>
                                    </div>
                                    <a href="#" class="text-xs pr-16 hover:underline">
                                        Forgotten Password?
                                    </a>
                                </div>

                            </x-form-field>
                            
                        </div>
                    </div>
                </div>

                <div>
                    <x-form-button>Login</x-form-button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>