@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge([
        'class' =>
            'w-full px-4 py-2 text-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 dark:bg-gray-100 dark:text-gray-900 dark:border-gray-300 dark:focus:ring-blue-300 dark:focus:border-blue-300 rounded-md shadow-sm',
    ]) }}>
