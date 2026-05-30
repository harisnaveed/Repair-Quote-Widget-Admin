@props([
    'variant' => 'primary',
    'type' => 'button',
    'disabled' => false,
])

<button
    type="{{ $type }}"
    @disabled($disabled)
    {{ $attributes->class([
        'btn',
        "btn-{$variant}",
    ]) }}
>
    {{ $slot }}
</button>

{{-- <x-button
    type="submit"
    variant="primary"
    class="w-100"
    date-id=""
    :disabled="false"
> --}}