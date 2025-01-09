<button {{ $attributes->merge(['class' => 'bg-black text-white px-4 py-2 rounded-xl w-80', 'type' => 'submit']) }}>
    {{ $slot }}
</button>
