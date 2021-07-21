<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.header','data' => []]); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <div class="frontend">
        <div class="row">
            <img src="/movieimage/<?php echo e($movie->movie_poster); ?>" alt="" width="90%" height="300px">
        </div>
        <div class="row" id="moviecontent">
            <div class="col-md-6">
                <h2>Name: <i><?php echo e(ucwords($movie->name)); ?></i></h2>
                <h2>Duration: <i><?php echo e($movie->duration); ?></i></h2>
                <h2>Rating: <i><?php echo e($movie->rating); ?></i></h2>
                <h2>Genre: <i><?php echo e($movie->genre->name); ?></i></h2>
            </div>
            <div class="col-md-6">
                <h2 style="border-bottom: 1px solid black;">Cast</h2>
                <h3>Actor</h3>
                
                <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cast->type == "actor"): ?>
                        <?php echo e($cast->name); ?>

                        
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <h3>Actress</h3>
                
                <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cast->type == "actress"): ?>
                        <?php echo e($cast->name); ?>

                        
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <h3>Director</h3>
                
                <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cast->type == "director"): ?>
                        <?php echo e($cast->name); ?>

                        
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <h3>Producer</h3>
                
                <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cast->type == "producer"): ?>
                        <?php echo e($cast->name); ?>

                        
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH G:\cinembs\resources\views/viewmovie.blade.php ENDPATH**/ ?>