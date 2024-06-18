
@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-green-800 dark:border-white dark:bg-white dark:text-green-800 focus:border-green-800 dark:focus:border-green-300 focus:ring-green-700 dark:focus:ring-green-400 rounded-md shadow-sm']) !!}>