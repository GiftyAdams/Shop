<div class="border border-gray-300 rounded-md p-4 bg-white" data-collapsible>
    <button class="flex items-center justify-between w-full text-left font-bold" data-toggle aria-expanded="false">
        <span>{{ $title }}</span>
        <svg class="w-5 h-5 transform transition-transform" data-icon>
            <path d="M19 9l-7 7-7-7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
    <div data-content style="display: none;" class="mt-2 space-y-2">
        {{ $slot }}
    </div>
</div>