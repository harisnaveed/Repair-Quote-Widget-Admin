@props([
    'variant' => 'primary',
    'type' => 'button',
    'disabled' => false,
    'href' => null,
])

@if($href)

    <a
        href="{{ $href }}"
        {{ $attributes->class([
            'btn',
            "btn-{$variant}",
        ]) }}
    >
        {{ $slot }}
    </a>

@else

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

@endif

{{-- <x-button-anchor
    href="{{ route('platform.companies.deleted') }}"
    variant="primary"
    class="w-100"
>
    View Deleted Clients
</x-button-anchor> --}}