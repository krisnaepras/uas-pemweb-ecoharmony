@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-poppins text-sm text-grey-800 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
