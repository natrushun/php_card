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
        Contest
     <?php $__env->endSlot(); ?>
     <?php $__env->slot('bg', null, []); ?> 
        
     <?php $__env->endSlot(); ?>
    <style>
        body {
            background-image: url('<?php echo e(asset($contest->place->img_filename!=null ? Storage::url('images/'.$contest->place->img_filename): 'images/default_place.jpg')); ?>');
            background-size: cover;
        }

    </style>

    <?php $__currentLoopData = $contest->characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="p-4 bg-white shadow-md mb-4">
            <h3 class="text-lg font-semibold"><?php echo e($character->name); ?></h3>
            <p>Defence: <?php echo e($character->defence); ?></p>
            <p>Strength: <?php echo e($character->strength); ?></p>
            <p>Accuracy: <?php echo e($character->accuracy); ?></p>
            <p>Magic: <?php echo e($character->magic); ?></p>
            <?php if($character->enemy): ?>
                <p>Életerő: <?php echo e($contest->characters()->first()->pivot->enemy_hp); ?></p>
            <?php else: ?>
                <p>Életerő: <?php echo e($contest->characters()->first()->pivot->hero_hp); ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(isset($contest->win)): ?>
        <div class="p-4 bg-<?php echo e($contest->win ? 'green' : 'red'); ?>-500 text-white">
            <h2 class="text-2xl font-bold"><?php echo e($contest->win ? 'Győzelem' : 'Vereség'); ?></h2>
        </div>
    <?php else: ?>
        <form action="<?php echo e(route('contest.update', $contest)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" name="attack_type" id="attack-type" value="">

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mr-2"
                onclick="setAttackType('melee')">Melee</button>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mr-2"
                onclick="setAttackType('ranged')">Ranged</button>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded"
                onclick="setAttackType('magic')">Magic</button>


        </form>
    <?php endif; ?>
    <div class="p-4 bg-white shadow-md mb-4">
        <h3 class="text-lg font-semibold">Cselekedetek:</h3>
        <ul>
            <li><?php echo nl2br($contest->history); ?></li>
        </ul>
    </div>
    <script>
        function setAttackType(type) {
            document.getElementById('attack-type').value = type;
        }
    </script>
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
<?php /**PATH C:\Users\Misike\Desktop\laravelbeadando\Game\resources\views/contest/show.blade.php ENDPATH**/ ?>