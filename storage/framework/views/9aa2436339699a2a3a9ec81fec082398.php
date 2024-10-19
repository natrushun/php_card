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
        <?php echo e($character->name); ?>

     <?php $__env->endSlot(); ?>
    
    <div class="bg-white shadow-md rounded-lg overflow-hidden character-card">
        <div class="p-4">
            <?php if(isset($success)): ?>
            <div class="bg-green-200 text-green-800 p-4 mb-4 rounded-md">
                <?php echo e($success); ?>

            </div>
        <?php endif; ?>
            <h2 class="text-xl font-semibold mb-2"><?php echo e($character->name); ?></h2>
            <p><strong>Defence:</strong> <?php echo e($character->defence); ?></p>
            <p><strong>Strength:</strong> <?php echo e($character->strength); ?></p>
            <p><strong>Accuracy:</strong> <?php echo e($character->accuracy); ?></p>
            <p><strong>Magic Power:</strong> <?php echo e($character->magic); ?></p>
            <div class="flex items-center mt-4">
                <?php if(!$character->enemy): ?>
                <div>
                    <a href="<?php echo e(route('contest.store',$character->id)); ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded mr-2">
                        Új mérkőzés
                    </a>
                </div>
                <?php endif; ?>
                <div>
                    <a href="<?php echo e(route('character.edit', $character)); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mr-2">
                        Edit
                    </a>
                </div>
                <div>
                    <form action="<?php echo e(route('character.destroy', $character)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded ">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <h3 class="text-lg font-semibold mt-4 mb-2">Contests:</h3>
            <div class="flex flex-wrap gap-4">
                <?php $__currentLoopData = $character->contests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('contest.show',$contest)); ?>">
                    <div class="bg-blue-200 rounded-lg p-2 transition-colors duration-300 hover:bg-blue-400">
                        <p><?php echo e($contest->place->name); ?> -
                            <?php echo e($contest->characters()->where('enemy', !($character->enemy))->first()->name); ?></p>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
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
<?php /**PATH C:\Users\Misike\Desktop\laravelbeadando\Game\resources\views/character/show.blade.php ENDPATH**/ ?>