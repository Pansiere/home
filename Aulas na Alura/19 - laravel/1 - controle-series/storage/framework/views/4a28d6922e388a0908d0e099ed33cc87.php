<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Series</title>
</head>

<body>
    <h1>Séries</h1>
    <ul>
        <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($serie); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>

</html><?php /**PATH /home/jp/CODIGOS/home/Aulas na Alura/19 - laravel/1 - controle-series/resources/views/listar-series.blade.php ENDPATH**/ ?>