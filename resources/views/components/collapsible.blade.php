<div class="bg-white" data-collapsible>
    <button class="flex items-center justify-between w-full text-left font-medium text-sm" data-toggle aria-expanded="false">
        <span>{{ $title }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mt-1 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
</svg>
    </button>
    <div data-content style="display: none;" class="mt-2 space-y-2">
        {{ $slot }}
    </div>
</div>