@props(['disabled' => false, 'value'])

<label>
    <input {{ $disabled ? 'disabled' : '' }} value="{{ $value }}" {!! $attributes->merge(['type' => 'hidden']) !!}>
</label>
