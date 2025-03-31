<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['disabled' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<input <?php if($disabled): echo 'disabled'; endif; ?>
    <?php echo e($attributes->merge([
        'class' =>
            'w-full px-4 py-2 text-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 dark:bg-gray-100 dark:text-gray-900 dark:border-gray-300 dark:focus:ring-blue-300 dark:focus:border-blue-300 rounded-md shadow-sm',
    ])); ?>>
<?php /**PATH /home/joaopv/SECON-Pansiere/resources/views/components/text-input.blade.php ENDPATH**/ ?>