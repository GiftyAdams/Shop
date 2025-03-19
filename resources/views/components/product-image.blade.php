@props(['width' => 'w-full', 'height' => '', 'imageurl'=> ''])
<img {{ $attributes->merge(['class' => "$width $height "]) }} 
     src="{{ $imageurl }}"
     alt="Image">
