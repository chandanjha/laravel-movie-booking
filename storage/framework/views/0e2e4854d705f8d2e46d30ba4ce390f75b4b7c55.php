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
        <div class="row" id="ticketcontent">
            <div class="col-lg-12">
                <?php if(count($bookings) > 0): ?>

                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($booking->book_status == "confirm"): ?>
                <div class="tickets" style="background-color: #999;
                            width:50%; color:black; padding:1%;
                            margin:auto; margin-top:2%;">
                    <h3>Movie: <i><?php echo e(ucwords($booking->show->movie->name)); ?></i></h3>
                    <h3>Multiplex: <i><?php echo e(ucwords($booking->show->theater->name)); ?></i></h3>
                    <h3>Screen: <i><?php echo e($booking->show->screen_id); ?></i></h3>
                    <h3>Seat Type: <i><?php echo e(ucwords($booking->seat_type)); ?></i></h3>
                    <h3>Total Seats Booked: <i><?php echo e($booking->seats_booked); ?></i></h3>
                    <h3>Show Date: <i><?php echo e($booking->show->show_date); ?></i></h3>
                    <h3>Time Slot: <i></i></h3>
                    <h3>Booking Date Time: <i><?php echo e($booking->booked_at); ?></i></h3>
                    <h3>Status:- <i><?php echo e(ucwords($booking->book_status)); ?></i></h3>


                    <a class="btn btn-primary btn-lg" href="/cancelticket/<?php echo e($booking->id); ?>">Cancel</a>
                </div>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <h1>No Bookings</h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH G:\New folder\laravel-movie-booking\resources\views/bookings.blade.php ENDPATH**/ ?>