<!-- resources/views/components/alert.blade.php -->
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['message' => '']));

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

foreach (array_filter((['message' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div x-data="{ show: false, currentMessage: '<?php echo e($message); ?>' }"
     x-on:category-deleted.window="show = true; currentMessage = $event.detail.message; setTimeout(() => show = false, 1000)"
     x-on:category-created.window="show = true; currentMessage = $event.detail.message; setTimeout(() => show = false, 1000)"
     x-on:category-updated.window="show = true; currentMessage = $event.detail.message; setTimeout(() => show = false, 1000)"
     x-show="show"
     x-transition:leave="transition ease-in-out duration-1000"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="mb-4 p-2 text-green-800 bg-green-200 border border-green-400 rounded">
    <span x-text="currentMessage"></span>
</div>
<?php /**PATH /home/joaopv/SECON-Pansiere/resources/views/components/message.blade.php ENDPATH**/ ?>