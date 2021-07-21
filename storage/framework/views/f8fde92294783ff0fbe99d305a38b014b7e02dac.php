<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin_header','data' => []]); ?>
<?php $component->withName('admin_header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav','data' => []]); ?>
<?php $component->withName('nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

  
  <section id="main-content">
    <section class="wrapper">


      <div class="row">
        <div class="col-lg-12">
          <div><a class="btn btn-success" href="/addshow">Add Show</a></div>

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
                    <a class="btn btn-success btn-sm" href="editshow/<?php echo e($show->id); ?>"><i class="icon_plus_alt2"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" href="#myModal2"><i class="icon_close_alt2"></i></a>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete','data' => []]); ?>
<?php $component->withName('delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?><a style="color:black;" href="/deleteshow/<?php echo e($show->id); ?>">Confirm</a> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
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


    </section>
  </section>

 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH G:\New folder\laravel-movie-booking\resources\views/admin/show/allshow.blade.php ENDPATH**/ ?>