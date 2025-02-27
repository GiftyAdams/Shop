@props([
    'name' => 'toggle', // Default name
    'checked' => false, // Default state
])

<label class="inline-flex items-center cursor-pointer">
    <input type="checkbox" name="{{ $name }}" value="1" class="sr-only peer" {{ $checked ? 'checked' : '' }}>
    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer 
                peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full 
                peer-checked:after:border-white 
                after:content-[''] after:absolute after:top-0.5 after:start-[2px] 
                after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all 
                peer-checked:bg-green-600">
    </div>
</label>
