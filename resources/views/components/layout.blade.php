<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping website</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-200">
    <div>
        <div class="flex justify-between px-3 py-3 bg-white">
            <div class="flex flex-row items-center">
                <div class="flex flex-row font-bold italic">
                    <a href="/">
                        <img src="{{ Vite::asset('resources/images/logo.svg')}}" alt="">
                    </a>
                    <p>shopNow</p>
                </div>

                <div class="ml-6">
                    <x-second-nav></x-second-nav>
                </div>
                <div>
                    <x-search></x-search>
                </div>
            </div>

            <div class="flex flex-row items-center space-x-4">

                <div class="font-bold">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/images/shopping-cart.svg')}}" alt="">
                    </a>
                </div>
                <div class="font-bold">
                    <a href="/#" class="bg-black/10  py-2 px-2 rounded-xl text-xs">
                        Log In
                    </a>
                </div>
                <div class="font-bold">
                    <a href="/signup" class="bg-black text-white  py-2 px-2 rounded-xl text-xs">
                        Sign Up
                    </a>
                </div>

            </div>
        </div>



        <main class="mt-10 m-8">
            {{$slot}}
        </main>
    </div>
</body>

</html>