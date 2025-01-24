<div x-data="{ openPriceRange: false }" class="border border-gray-300 rounded-md p-4 bg-white">
    <!-- Collapsible Header -->
    <button class="flex items-center justify-between w-full text-left font-bold"
        @click="openPriceRange = !openPriceRange">
        <span>Price Range</span>
        <svg :class="{ 'rotate-180': openPriceRange }" class="w-5 h-5 transform transition-transform"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Collapsible Content -->
    <div x-show="openPriceRange" class="mt-4 space-y-3" x-transition>
        <!-- Minimum Price -->
        <label class="flex flex-col space-y-1">
            <span class="text-sm text-gray-700">Minimum Price</span>
            <input type="number" placeholder="¢0"
                class="rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full px-3 py-2 text-gray-900" />
        </label>

        <!-- Maximum Price -->
        <label class="flex flex-col space-y-1">
            <span class="text-sm text-gray-700">Maximum Price</span>
            <input type="number" placeholder="¢1000"
                class="rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full px-3 py-2 text-gray-900" />
        </label>

        <!-- Apply Button -->
        <button class="w-full bg-black text-white rounded-md py-2 focus:outline-none focus:ring focus:ring-white">
            Apply
        </button>
    </div>
</div>