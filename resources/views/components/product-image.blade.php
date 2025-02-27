@props(['width' => 'w-full', 'height' => ''])
<img {{ $attributes->merge(['class' => "$width $height"]) }} 
     src="https://picsum.photos/200" 
     alt="Image">
