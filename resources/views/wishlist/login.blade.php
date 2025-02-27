<x-auth-layout>
    <main class="px-20 py-8 mx-auto">
        <div class="flex space-x-12">
            <div>
                <div>
                    <x-header>WISHLIST </x-header>
                </div>
                <div>
                    <h1>
                        Looking for your wishlist?
                    </h1>
                    <h1>
                        <a href="{{ route('login') }}" class="text-blue-500 hover:underline font-medium">Login</a> to save
                        and view items in your wishlist.
                    </h1>
                </div>
            </div>
            <div>
                <x-svg.wish />
            </div>
        </div>
    </main>
</x-auth-layout>
