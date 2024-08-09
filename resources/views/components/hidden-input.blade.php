@props(['disabled' => false, 'value'])

<input {{ $disabled ? 'disabled' : '' }} value="{{ $value }}" {!! $attributes->merge(['type' => 'hidden']) !!}>
