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
    <div><a class="btn btn-success" href="/addscreen/<?php echo e($id); ?>">Add</a></div>
    
    <?php if(count($screens) > 0): ?>
    <section class="panel">
        <table class="table table-striped table-advance table-hover">
            <thead>
                <tr>
                    <th>Screen Num:- </th>
                    <th>Gold Row</th>
                    <th>Gold Column</th>
                    <th>Gold Seat Count</th>
                    <th>Platinum Row</th>
                    <th>Platinum Column</th>
                    <th>Platinum Seat Count</th>
                    <th>Normal Row</th>
                    <th>Normal Column</th>
                    <th>Normal Seat Count</th>
                    <th><i class="icon_cogs"></i>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0  ?>
                <?php $__currentLoopData = $screens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $screen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php $i = $i+1 ?>
                    <td><?php echo e($i); ?></td>
                    <td><?php echo e($screen->gold_row); ?></td>
                    <td><?php echo e($screen->gold_column); ?></td>
                    <td><?php echo e($screen->gold_row*$screen->gold_column); ?></td>
                    <td><?php echo e($screen->platinum_row); ?></td>
                    <td><?php echo e($screen->platinum_column); ?></td>
                    <td><?php echo e($screen->platinum_row*$screen->platinum_column); ?></td>
                    <td><?php echo e($screen->normal_row); ?></td>
                    <td><?php echo e($screen->normal_column); ?></td>
                    <td><?php echo e($screen->normal_row*$screen->normal_column); ?></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/editscreen/<?php echo e($screen->id); ?>"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#myModal2"><i class="icon_close_alt2"></i></a>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete','data' => []]); ?>
<?php $component->withName('delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?><a style="color:black;"  href="/deletescreen/<?php echo e($screen->id); ?>">Confirm</a> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
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
    <h1>No Record Found</h1>
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
<?php endif; ?><?php /**PATH G:\cinembs\resources\views/admin/screen/allscreen.blade.php ENDPATH**/ ?>