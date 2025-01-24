<x-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/5 bg-gray-800 p-4">
            <h2 class="text-lg font-bold mb-4">Side Navigation</h2>
            <ul class="space-y-2">
                <li><a href="#" class="block hover:bg-gray-700 rounded-md px-2 py-1">Dashboard</a></li>
                <li><a href="#" class="block hover:bg-gray-700 rounded-md px-2 py-1">Products</a></li>
                <li><a href="#" class="block hover:bg-gray-700 rounded-md px-2 py-1">Settings</a></li>
                <li><a href="#" class="block hover:bg-gray-700 rounded-md px-2 py-1">Logout</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-1 bg-gray-100 p-6 space-y-4">
            <!-- Section 1 -->
            <div class="bg-white border border-gray-300 rounded-md p-4 shadow-sm">
                <h1 class="text-2xl font-bold mb-4">Poducts</h1>
            </div>

            <!-- Section 2 -->
            <div class="bg-white border border-gray-300 rounded-md p-4 shadow-sm">
                <h2 class="text-xl font-semibold mb-2">Additional Section</h2>
                <p class="text-gray-700">
                    This is another section, neatly separated and styled with a white background and a border.
                </p>
            </div>


        </div>

    </div>

</x-layout>