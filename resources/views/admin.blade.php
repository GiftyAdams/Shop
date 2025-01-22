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
        <div class="flex-1 bg-gray-100 p-6">
            <h1 class="text-2xl font-bold mb-4 border px-2 py-4 bg-white">Products</h1>
            <p class="text-gray-700">
                This is the main content area. You can add anything you want here. The width automatically adjusts to
                take up the remaining space after the sidenav.
            </p>
        </div>
    </div>

</x-layout>