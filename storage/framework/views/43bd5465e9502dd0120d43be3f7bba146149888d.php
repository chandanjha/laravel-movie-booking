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
    <?php $date = date('Y-m-d') ?> 


    <div class="frontend">
        
        <div class="row" style="background-color: #fff;">
            <?php $i = 0; ?>
            <h1>Released Movies</h1>
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($movie->release_date <= $date): ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php $i = $i + 1 ?>
                <div class="movie_banner">
                    <a href="/viewmovie/<?php echo e($movie->id); ?>"><img src="/movieimage/<?php echo e($movie->movie_banner); ?>" alt="" width="100" height="100"></a>
                </div>

                <h4><a href="/viewmovie/<?php echo e($movie->id); ?>"><?php echo e($movie->name); ?></a></h4>
            </div>
            <?php endif; ?>
            <?php if($i>5): ?>
            <?php break; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a class="btn btn-info pull-right" href="/viewmore/released">View More</a>
        </div>
        <div class="row">
            <?php $i = 0; ?>
            <h1>Upcoming Movies</h1>
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($movie->release_date > $date): ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php $i = $i + 1 ?>
                <div class="movie_banner">
                    <a href="/viewmovie/<?php echo e($movie->id); ?>"><img src="/movieimage/<?php echo e($movie->movie_banner); ?>" alt="" width="100" height="100"></a>
                </div>

                <h4><a href="/viewmovie/<?php echo e($movie->id); ?>"><?php echo e($movie->name); ?></a></h4>
            </div>
            <?php endif; ?>
            <?php if($i>5): ?>
            <?php break; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a class="btn btn-info pull-right" href="/viewmore/upcoming">View More</a>
        </div>
    </div>

 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH G:\cinembs\resources\views/home.blade.php ENDPATH**/ ?>