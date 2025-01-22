<div class="relative inline-block text-left">
    <!-- Dropdown Button -->
    <div>
        <button type="button" id="{{ $buttonId }}"
            class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
            aria-expanded="false" aria-haspopup="true">
            {{ $buttonText }}
            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <!-- Dropdown Menu -->
    <div id="{{ $buttonId }}-menu"
        class="hidden absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="{{ $buttonId }}" tabindex="-1">
        <div class="py-1" role="none">
            {{ $slot }}
        </div>
    </div>
</div>