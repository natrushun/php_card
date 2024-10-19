<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="antialiased">
    <div>
        <?php if(Route::has('login')): ?>
        <div>
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>">Log in</a>
                <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div>
            <p>Üdvözöllek!</p>
            <p>Ez egy egyjátékos módú, körökre osztott, arcade típusú harcolós,fantasy témájú játék</p>
            <p>Karakterek száma: <?php echo e($charactersCount); ?></p>
            <p>Mérkőzések száma:<?php echo e($contestsCount); ?> </p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Misike\Desktop\laravelbeadando\Game\resources\views/welcome.blade.php ENDPATH**/ ?>