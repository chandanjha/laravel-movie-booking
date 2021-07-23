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
            <div><a class="btn btn-success" href="/addmovie">Add Movie</a></div>
            
            <?php if(count($movies) > 0): ?>
            <section class="panel">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                <td>S.no</td>
                <td>Name</td>
                <td>Actor</td>
                <td>Actress</td>
                <td>Director</td>
                <td>Producer</td>
                <td>Rating</td>
                <td>Duration</td>
                <td>Release Date</td>
                <td>Genre</td>
                <td>Movie Banner</td>
                <td><i class="icon_cogs"></i>Action</td>
                </tr>
                <?php $i=0 ?>
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i=$i+1); ?></td>
                    <td><?php echo e(ucwords($movie->name)); ?></td>
                    <td>
                    <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($cast->type == "actor" ): ?>
                        <?php echo e(ucwords($cast->name)); ?> ,
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <div>
                        <a class="btn btn-primary btn-sm" href="/addcast/<?php echo e($movie->id); ?>"><i class="icon_plus_alt2"></i></a>
                      </div> 
                    </td>
                    <td>
                    <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($cast->type == "actress" ): ?>
                        <?php echo e(ucwords($cast->name)); ?> ,
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <a class="btn btn-primary btn-sm" href="/addcast/<?php echo e($movie->id); ?>"><i class="icon_plus_alt2"></i></a>
                      </div> 

                    </td>
                    <td>
                    <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($cast->type == "director" ): ?>
                        <?php echo e(ucwords($cast->name)); ?> ,
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <div>
                        <a class="btn btn-primary btn-sm" href="/addcast/<?php echo e($movie->id); ?>"><i class="icon_plus_alt2"></i></a>
                      </div>  
                    </td>
                    <td>
                    <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($cast->type == "producer" ): ?>
                        <?php echo e(ucwords($cast->name)); ?> ,
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <div>
                        <a class="btn btn-primary btn-sm" href="/addcast/<?php echo e($movie->id); ?>"><i class="icon_plus_alt2"></i></a>
                      </div> 
                    </td>
                    <td><?php echo e($movie->rating); ?></td>
                    <td><?php echo e($movie->duration); ?></td>
                    <td><?php echo e($movie->release_date); ?></td>
                    <td><?php echo e(ucwords($movie->genre->name)); ?></td>
                    <td><img src="/movieimage/<?php echo e($movie->movie_banner); ?>" alt="" width="100" height="100"></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="editmovie/<?php echo e($movie->id); ?>"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger btn-sm" href="/deletemovie/<?php echo e($movie->id); ?>"><i class="icon_close_alt2"></i></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            </section>
            <?php else: ?>
            <h1>No Movies Found</h1>
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
<?php endif; ?><?php /**PATH G:\New folder\laravel-movie-booking\resources\views/admin/movie/allmovies.blade.php ENDPATH**/ ?>