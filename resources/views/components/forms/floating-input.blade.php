@props([
    'label' => null,
    'id' => null,
    'field' => null,
])

<div class="form-floating mb-3">

    <input
        id="{{ $id }}"
        {{ $attributes->class([
            'form-control',
            'is-invalid' => $field && $errors->has($field),
        ]) }}
    >

    @if($label)
        <label for="{{ $id }}">
            {{ $label }}
        </label>
    @endif

    <div class="invalid-feedback">
        @error($field)
            {{ $message }}
        @enderror
    </div>

</div>

{{-- <x-forms.floating-input
id="name"
name="name"
type="text"
label="Company Name"
:value="old('name')"
placeholder="Company Name"
/> --}}