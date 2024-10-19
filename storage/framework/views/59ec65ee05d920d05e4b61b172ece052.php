<?php if (isset($component)) { $__componentOriginalfd1f218809a441e923395fcbf03e4272 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfd1f218809a441e923395fcbf03e4272 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Characters
     <?php $__env->endSlot(); ?>
    <h1 class="text-4xl font-semibold mb-8">Karakterek</h1>
    <?php if(isset($success)): ?>
        <div class="bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            <?php echo e($success); ?>

        </div>
    <?php endif; ?>
    <div class="max-w-6xl mx-auto flex flex-wrap gap-8">
        <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('character.show', $c)); ?>">
                <div
                    class="bg-white shadow-md rounded-lg overflow-hidden hover:border-blue-500 border-2 border-solid border-white ">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2"><?php echo e($c->name); ?></h2>
                        <p class="mb-2"><strong>Defence:</strong> <?php echo e($c->defence); ?></p>
                        <p class="mb-2"><strong>Strength:</strong> <?php echo e($c->strength); ?></p>
                        <p class="mb-2"><strong>Accuracy:</strong> <?php echo e($c->accuracy); ?></p>
                        <p class="mb-2"><strong>Magic Power:</strong> <?php echo e($c->magic); ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $attributes = $__attributesOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__attributesOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $component = $__componentOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__componentOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>

<?php /**PATH C:\Users\Misike\Desktop\laravelbeadando\Game\resources\views/character/index.blade.php ENDPATH**/ ?>