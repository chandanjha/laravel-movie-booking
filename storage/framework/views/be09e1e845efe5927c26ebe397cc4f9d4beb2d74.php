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
        <div><a class="btn btn-success" href="/createuser">Add</a></div>
        <?php if(count($users) > 0 ): ?>
          <section class="panel">


            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>S.no</th>
                  <th><i class="icon_profile"></i>Name</th>
                  <th><i class="icon_mail_alt"></i>Email</th>
                  <th><i class="icon_mobile"></i> Mobile</th>
                  <th>Role</th>
                  <th>Created At</th>
                  <th><i class="icon_cogs"></i> Action</th>
                </tr>
                <tr>
                  <?php $i = 0; ?>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <td><?php echo e($i = $i + 1); ?></td>
                  <td><?php echo e($user->name); ?></td>
                  <td><?php echo e($user->email); ?></td>
                  <td><?php echo e($user->phone); ?></td>
                  <td><?php echo e($user->user_role); ?></td>
                  <td><?php echo e($user->created_at); ?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-success" href="/edituser/<?php echo e($user->id); ?>"><i class="icon_plus_alt2"></i></a>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" href="#myModal2"><i class="icon_close_alt2"></i></a>
                      <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete','data' => []]); ?>
<?php $component->withName('delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?><a style="color:black;"  href="/deleteuser/<?php echo e($user->id); ?>">Confirm</a> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                  </td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </section>
        <?php else: ?>
          <h1>No users found</h1>
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
<?php endif; ?><?php /**PATH G:\cinembs\resources\views/admin/users.blade.php ENDPATH**/ ?>