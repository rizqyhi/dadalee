@props(['variant' => 'default', 'as' => 'button'])

@php
$variantStyle = match ($variant) {
    'primary' => 'bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 text-white',
    'default' => 'bg-gray-100 hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-300 text-gray-800'
}
@endphp

@if($as === 'button')
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'text-xs inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ' . $variantStyle]) }}>
        {{ $slot }}
    </button>
@elseif($as === 'a')
    <a {{ $attributes->merge(['class' => 'text-xs inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ' . $variantStyle]) }}>
        {{ $slot }}
    </a>
@endif
