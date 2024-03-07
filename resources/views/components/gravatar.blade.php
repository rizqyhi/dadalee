@props(['email', 'size' => 96])

@php
$emailHash = hash('sha256', trim($email));
@endphp

<img {{ $attributes->merge([
    'src' => "https://gravatar.com/avatar/$emailHash?s=$size",
    'class' => ''
]) }}>
