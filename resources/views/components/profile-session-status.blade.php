@props(['status'])

@if ($status)
    <div x-data="{ show: true }"
         x-show="show"
         x-transition
         x-init="setTimeout(() => show = false, 2000)"
         {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}
    >
        {{ $status }}
    </div>
@endif
