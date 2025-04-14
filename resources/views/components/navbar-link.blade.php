@props(['active' => false])

<a {{ $attributes }} 
class="{{ $active ? 'bg-white bg-opacity-50 hover:bg-opacity-25' : 'hover:bg-white hover:bg-opacity-25' }} 
text-white text-sm px-4 py-2 rounded-full" aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
