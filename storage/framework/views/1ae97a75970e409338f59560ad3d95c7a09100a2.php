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
    
    <div class="col-5" style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Movie</h1>
        <?php if($errors->any()): ?>      
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e($error); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <form action="/addcast" method="post" class="mt-10" >
            <?php echo csrf_field(); ?>
            <div class="form-group col-8">
                <input type="hidden" name="movie_id" value="<?php echo e($movie->id); ?>">
                <input type="hidden" name="type" value="actor">
                <label for="actor">Actor</label>
                
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie actor"  >

            </div><br>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>
        </form>
        <table class="table  table-advance table-hover">
        <?php $i=0 ?>
            <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cast->type == "actor"): ?>
            <?php $i = $i+1; ?> 
            <tbody>
            <tr style="background-color: #222;">
                <th>S.no</th>
                <th>Name</th>
                <th><i class="icon_cogs"></i>Action</th>
            </tr>
            <?php endif; ?>
            <?php if($i == 1): ?>
                <?php break; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $i=0 ?>
            <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cast->type == "actor"): ?>
            <tr style="background-color: #666;">
                <td><?php echo e($i=$i+1); ?></td>
                <td><?php echo e($cast->name); ?></td>
                <td>
                    <a class="btn btn-danger btn-sm"  href="/deletecast/<?php echo e($cast->id); ?>"><i class="icon_close_alt2"></i></a>     
                </td>
            </tr>
            
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </tbody>
        </table>
        
        <br>


        <form action="/addcast" method="post" class="mt-10" >
            <?php echo csrf_field(); ?>
            <div class="form-group col-8">
                <input type="hidden" name="movie_id" value="<?php echo e($movie->id); ?>">
                <input type="hidden" name="type" value="actress">
                <label for="actress">Actress</label>

                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie actress"  > 
            </div><br>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>
        </form>

        <table class="table  table-advance table-hover">
        <?php $i=0 ?>
            <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cast->type == "actress"): ?>
            <?php $i = $i+1; ?> 
            <tbody>
            <tr style="background-color: #222;">
                <th>S.no</th>
                <th>Name</th>
                <th><i class="icon_cogs"></i>Action</th>
            </tr>
            <?php endif; ?>
            <?php if($i == 1): ?>
                <?php break; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php $i=0 ?>
            <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cast->type == "actress"): ?>
            <tr style="background-color: #666;">
                <td><?php echo e($i=$i+1); ?></td>
                <td><?php echo e($cast->name); ?></td>
                <td>
                    <a class="btn btn-danger btn-sm"  href="/deletecast/<?php echo e($cast->id); ?>"><i class="icon_close_alt2"></i></a>            
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </tbody>
        </table>
        <br>


        <form action="/addcast" method="post" class="mt-10" >
            <?php echo csrf_field(); ?>
            <div class="form-group col-8">
                <input type="hidden" name="movie_id" value="<?php echo e($movie->id); ?>">
                <input type="hidden" name="type" value="director">
                <label for="director">Director</label>

                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie director"  >

               
            </div><br>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>
        </form>

        <table class="table  table-advance table-hover">
            <?php $i=0 ?>
            <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cast->type == "director"): ?>
            <?php $i = $i+1; ?> 
            <tbody>
            <tr style="background-color: #222;">
                <th>S.no</th>
                <th>Name</th>
                <th><i class="icon_cogs"></i>Action</th>
            </tr>
            <?php endif; ?>
            <?php if($i == 1): ?>
                <?php break; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $i=0 ?>
            <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cast->type == "director"): ?>
            <tr style="background-color: #666;">
                <td><?php echo e($i=$i+1); ?></td>
                <td><?php echo e($cast->name); ?></td>
                <td>
                    <a class="btn btn-danger btn-sm"  href="/deletecast/<?php echo e($cast->id); ?>"><i class="icon_close_alt2"></i></a>          
                </td>
            </tr>
            
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </tbody>
        </table>
        <br>


        <form action="/addcast" method="post" class="mt-10" >
            <?php echo csrf_field(); ?>
            <div class="form-group col-8">
                <input type="hidden" name="movie_id" value="<?php echo e($movie->id); ?>">
                <input type="hidden" name="type" value="producer">
                <label for="producer">Producer</label>

                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie producer"  >

               
            </div><br>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>
        </form>

        <table class="table  table-advance table-hover">
            <?php $i=0 ?>
            <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cast->type == "producer"): ?>
            <?php $i = $i+1; ?> 
            <tbody>
            <tr style="background-color: #222;">
                <th>S.no</th>
                <th>Name</th>
                <th><i class="icon_cogs"></i>Action</th>
            </tr>
            <?php endif; ?>
            <?php if($i == 1): ?>
                <?php break; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $i=0 ?>
            <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cast->type == "producer"): ?>
            <tr style="background-color: #666;">
                <td><?php echo e($i=$i+1); ?></td>
                <td><?php echo e($cast->name); ?></td>
                <td>
                    <a class="btn btn-danger btn-sm"  href="/deletecast/<?php echo e($cast->id); ?>"><i class="icon_close_alt2"></i></a>            
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </tbody>
        </table>

        <a class="btn btn-danger btn-m" href="/allmovies">Save</a>
    </div>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH G:\New folder\laravel-movie-booking\resources\views/admin/movie/addcast.blade.php ENDPATH**/ ?>