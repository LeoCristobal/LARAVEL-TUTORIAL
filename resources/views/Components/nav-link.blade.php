@props(['active' => false])
<a
    class="{{ $active ? 'bg-gray-900 text-white rounded-md px-3 py-2' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}"
    aria-current="{{ $active ? 'page' : 'false'}}"
    {{ $attributes }}>
    {{ $slot }}
</a>
