<button {{ $attributes->merge(['class' => 'w-80 mt-6 rounded-md bg-black px-6 py-2 text-sm font-semibold text-white outline-none', 'type' => 'submit']) }}>
    {{ $slot }}
</button>