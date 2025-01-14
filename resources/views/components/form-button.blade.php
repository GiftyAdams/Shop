<button {{ $attributes->merge(['class' => 'w-80 rounded-md bg-black px-6 py-2 text-[12px] text-white outline-none', 'type' => 'submit']) }}>
    {{ $slot }}
</button>