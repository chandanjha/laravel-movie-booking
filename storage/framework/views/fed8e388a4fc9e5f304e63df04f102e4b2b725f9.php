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
        <div><a class="btn btn-success" href="/addtheater">Add Theater</a></div>
        <?php if(count($theaters) > 0 ): ?>
          <section class="panel">


            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>S.no</th>
                  <th><i class="icon_profile"></i>Name</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Address</th>
                  <th>Screen</th>
                  <th><i class="icon_cogs"></i>Action</th>             
                </tr>
                <?php $i = 0; ?>
                <?php $__currentLoopData = $theaters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                  <td><?php echo e($i = $i + 1); ?></td>
                  <td><?php echo e($theater->name); ?></td>
                    <td>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($state->id == $theater->state_id): ?>
                      <?php echo e($state->name); ?>

                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($city->id == $theater->city_id): ?>
                      <?php echo e(ucwords($city->name)); ?>

                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e(substr($theater->address, 0, 60)); ?> ...</td>
                    <td><a class="btn btn-primary btn-sm" href="allscreen/<?php echo e($theater->id); ?>">Manage</a></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="edittheater/<?php echo e($theater->id); ?>"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger btn-sm"  href="/deletetheater/<?php echo e($theater->id); ?>"><i class="icon_close_alt2"></i></a>
                    </td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </section>
        <?php else: ?>
          <h1>No theaters found</h1>
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
<?php endif; ?><?php /**PATH G:\New folder\laravel-movie-booking\resources\views/admin/theater/alltheaters.blade.php ENDPATH**/ ?>