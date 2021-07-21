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
    
        <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
            <h1 style="text-align:center;">Add Screen <i>for</i> <?php echo e(ucwords($theater->name)); ?></h1>
            <form method="POST" action="/addscreen/<?php echo e($theater->id); ?>" class="mt-10">

                <?php echo csrf_field(); ?>


                <div class="form-group col-8">
                    <label  for="gold_row">Gold Row</label>

                    <input  class="form-control" type="text" name="gold_row" id="gold_row" value="<?php echo e(old('gold_row')); ?>" required>

                    <?php $__errorArgs = ['gold_row'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                    <?php echo e($message); ?>

                </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div><br>

                <div class="form-group col-8">
                    <label  for="gold_column">Gold Column</label>

                    <input  class="form-control" type="text" name="gold_column" id="gold_column" value="<?php echo e(old('gold_column')); ?>" required>

                    <?php $__errorArgs = ['gold_column'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                    <?php echo e($message); ?>

                </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div><br>

                <div class="form-group col-8">
                    <label  for="platinum_row">Platinum Row</label>

                    <input  class="form-control" type="text" name="platinum_row" id="platinum_row" value="<?php echo e(old('platinum_row')); ?>" required>

                    <?php $__errorArgs = ['platinum_row'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                    <?php echo e($message); ?>

                </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div><br>

                <div class="form-group col-8">
                    <label  for="platinum_column">Platinum Column</label>

                    <input  class="form-control" type="text" name="platinum_column" id="platinum_column" value="<?php echo e(old('platinum_column')); ?>" required>

                    <?php $__errorArgs = ['platinum_column'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                    <?php echo e($message); ?>

                </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div><br>

                <div class="form-group col-8">
                    <label  for="normal_row">Normal Row</label>

                    <input  class="form-control" type="text" name="normal_row" id="normal_row" value="<?php echo e(old('normal_row')); ?>" required>

                    <?php $__errorArgs = ['normal_row'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                    <?php echo e($message); ?>

                </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div><br>

                <div class="form-group col-8">
                    <label  for="normal_column">Normal Column</label>

                    <input  class="form-control" type="text" name="normal_column" id="normal_column" value="<?php echo e(old('normal_column')); ?>" required>

                    <?php $__errorArgs = ['normal_column'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" role="alert">
                    <?php echo e($message); ?>

                </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div><br>


                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Add</button>
                    <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                </div><br>
    
            </form>
        </div> 
    
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH G:\cinembs\resources\views/admin/screen/addscreen.blade.php ENDPATH**/ ?>