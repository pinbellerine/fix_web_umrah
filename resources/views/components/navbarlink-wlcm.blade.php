@props(['active' => false])

<a {{ $attributes }} 
class="{{ $active ? 'text-white bg-blue-700 rounded-md md:bg-transparent md:text-blue-700' : 'text-gray-900 rounded-md hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700' }} 
block py-2 px-3 md:p-0" aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
