<?php $attributes = $attributes->exceptProps(['cast']); ?>
<?php foreach (array_filter((['cast']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Cast</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                        <input type="email" class="form-control sm-input" id="exampleInputEmail5" value="<?php echo e($cast->name); ?>" >
                    </div>
                    
                    <button type="submit" class="btn btn-success">Edit Cast</button>
                </form>

            </div>

        </div>
    </div>
</div><?php /**PATH G:\New folder\laravel-movie-booking\resources\views/components/edit.blade.php ENDPATH**/ ?>