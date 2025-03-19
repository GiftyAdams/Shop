@props(['genders', 'categories', 'brands'])
<form method="GET" action="{{ route('filter.product') }}" class="space-y-4">
    <!-- Collapsible: Product Categories -->
    <p class="font-medium">
        Filter By
    </p>
    <x-collapsible title="Gender">
        @foreach ($genders as $gender)
            <label class="flex items-center space-x-2">
                <input type="checkbox"   name="genders[]" value="{{ $gender->id }}"
                    class="rounded text-indigo-600">
                <p>{{ $gender->name }}</p>
            </label>
        @endforeach
    </x-collapsible>
    <x-collapsible title="Category">
        @foreach ($categories as $category)
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                    class="rounded text-indigo-600">
                <p>{{ $category->name }}</p>
            </label>
        @endforeach
    </x-collapsible>

    <x-collapsible title="Brand">
        @foreach ($brands as $brand)
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                    class="rounded text-indigo-600">
                <p>{{ $brand->name }}</p>
            </label>
        @endforeach
    </x-collapsible>

    <div x-data="{ openPriceRange: false }" class="border border-gray-300 rounded-md p-4 bg-white">


        <!-- Collapsible Content -->
        <div x-show="openPriceRange" class="mt-4 space-y-3" x-transition>
            <!-- Minimum Price -->
            <label class="flex flex-col space-y-1">
                <span class="text-sm text-gray-700">Minimum Price</span>
                <input type="price" name="min_price" placeholder="¢0" value="{{ request('min_price') }}" 
                    class="rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full px-3 py-2 text-gray-900" />
            </label>

            <!-- Maximum Price -->
            <label class="flex flex-col space-y-1">
                <span class="text-sm text-gray-700">Maximum Price</span>
                <input type="price" name="max_price" placeholder="¢1000" value="{{ request('max_price') }}" 
                    class="rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full px-3 py-2 text-gray-900" />
            </label>

            <!-- Apply Button -->

        </div>
    </div>
    <x-form-button class="w-full" type="submit">
        Apply Filter
    </x-form-button>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const collapsibleSections = document.querySelectorAll("[data-collapsible]");

            collapsibleSections.forEach((section) => {
                const button = section.querySelector("[data-toggle]");
                const content = section.querySelector("[data-content]");

                button.addEventListener("click", () => {
                    const isExpanded = button.getAttribute(
                        "aria-expanded") === "true";
                    button.setAttribute("aria-expanded", !isExpanded);
                    content.style.display = isExpanded ? "none" : "block";
                });
            });
        });
    </script>
</form>