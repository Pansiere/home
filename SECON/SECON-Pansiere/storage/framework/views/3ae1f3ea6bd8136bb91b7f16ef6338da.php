<!-- resources/views/components/button.blade.php -->
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['variant' => 'default', 'type' => 'button']));

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

foreach (array_filter((['variant' => 'default', 'type' => 'button']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $variants = [
        'edit' => [
            'class' => 'px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded',
            'icon' => 'fas fa-edit',
        ],
        'delete' => [
            'class' => 'px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded',
            'icon' => 'fas fa-trash',
        ],
        'default' => [
            'class' =>
                'inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150',
            'icon' => null,
        ],
    ];
    $selected = $variants[$variant] ?? $variants['default'];
    $class = $selected['class'];
    if ($type === 'submit') {// If true, it will be a blue button
        $class = preg_replace('/\b(bg|hover:bg)-[^ ]+/', '', $class);
        $class .= ' bg-blue-600 hover:bg-blue-700';
        $class = preg_replace('/\s+/', ' ', trim($class));
    }
?>



<button <?php echo e($attributes->merge(['type' => $type])->except('class')); ?> class="<?php echo e($attributes->get('class', $class)); ?>">
    <!--[if BLOCK]><![endif]--><?php if($selected['icon']): ?>
        <i class="<?php echo e($selected['icon']); ?>"></i>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php echo e($slot); ?>

</button>
<?php /**PATH /home/joaopv/SECON-Pansiere/resources/views/components/button.blade.php ENDPATH**/ ?>