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
            <div class="col-lg-12">
                

                <?php if(count($shows) > 0): ?>
                <section class="panel">
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <td>S.no</td>
                                <td>Theater</td>
                                <td>Screen Name</td>
                                <td>Movie</td>
                                <td>Date</td>
                                <td>Slot</td>
                                <td>Seats Available</td>
                                <td><i class="icon_cogs"></i>Action</td>
                            </tr>
                            <?php $i = 0 ?>


                            <?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i=$i+1); ?></td>
                                <td><?php echo e(ucwords($show->theater->name)); ?></td>
                                <td>Screen <?php echo e($show->screen_id); ?></td>
                                <td><?php echo e(ucwords($show->movie->name)); ?></td>
                                <td><?php echo e($show->show_date); ?></td>
                                <td>
                                    <?php if($show->slot == "slot-1"): ?>
                                    <?= "Morning 9-12" ?>
                                    <?php elseif($show->slot == "slot-2"): ?>
                                    <?= "Day 12-3" ?>
                                    <?php elseif($show->slot == "slot-3"): ?>
                                    <?= "Evening 3-6" ?>
                                    <?php elseif($show->slot == "slot-4"): ?>
                                    <?= "Evening 6-9" ?>

                                    <?php else: ?>
                                    <?= "not defined" ?>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo e($show->seats_available); ?></td>

                                <td>
                                   <a class="btn btn-primary btm-md" href="/book/<?php echo e($show->id); ?>">Book</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </section>
                <?php else: ?>
                <h1>No Shows Found</h1>
                <?php endif; ?>

            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH G:\New folder\laravel-movie-booking\resources\views/shows.blade.php ENDPATH**/ ?>