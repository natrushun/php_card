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
    Places
 <?php $__env->endSlot(); ?>
<div class="max-w-6xl mx-auto flex flex-wrap gap-8">
    <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="w-64 h-60 bg-white shadow-md rounded-lg overflow-hidden hover:border-blue-500 border-2 border-solid border-white relative">
        <div class="h-40 overflow-hidden">
            <img src="<?php echo e($place->img_filename!=null ? Storage::url('images/'.$place->img_filename): 'images/default_place.jpg'); ?>" alt="bg-image" class="w-full h-full object-cover object-center">
        </div>
        <div class="p-4">
            <div class="absolute top-2 right-2">
                <a href="<?php echo e(route('place.edit', $place)); ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded mr-2">
                    Edit
                </a>
                <form action="<?php echo e(route('place.destroy', $place)); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                        Delete
                    </button>
                </form>
            </div>
            
            <h2 class="text-xl font-semibold mb-2"><?php echo e($place->name); ?></h2>
        </div>
    </div>
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
<?php endif; ?><?php /**PATH C:\Users\Misike\Desktop\laravelbeadando\Game\resources\views/place/index.blade.php ENDPATH**/ ?>