<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <title><?php echo e($title); ?></title>
</head>
<body>
    <header>
        <div class="bg-gray-900 text-white py-4">
            <div class="container mx-auto flex justify-between items-center">
                <div>
                    <a href="<?php echo e(route('home')); ?>" class="font-semibold text-lg">Főoldal</a>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('character.index')); ?>" class="ml-4">Karakterek</a>
                        <a href="<?php echo e(route('character.create')); ?>" class="ml-4">Új Karakter</a>
                        <?php if(auth()->user()->admin): ?>
                        <a href="<?php echo e(route('place.index')); ?>" class="ml-4">Helyszínek</a>
                        <a href="<?php echo e(route('place.create')); ?>" class="ml-4">Új Helyszín</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div>
                    <?php if(Route::has('login')): ?>
                        <div class="space-x-4">
                            <?php if(auth()->guard()->check()): ?>
                                <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout">
                                    <?php echo csrf_field(); ?>
                                    <a href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault(); document.querySelector('#logout').submit();"
                                        class="font-semibold">Kijelentkezés</a>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="font-semibold">Bejelentkezés</a>

                                <?php if(Route::has('register')): ?>
                                    <a href="<?php echo e(route('register')); ?>" class="font-semibold">Regisztráció</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <?php echo e($slot); ?>

</body>

</html>
<?php /**PATH C:\Users\Misike\Desktop\laravelbeadando\Game\resources\views/components/header.blade.php ENDPATH**/ ?>