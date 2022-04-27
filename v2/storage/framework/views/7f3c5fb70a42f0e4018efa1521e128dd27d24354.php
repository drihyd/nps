
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Response from <?php echo e(Str::title($person_data->firstname??'')); ?> on <?php echo e(date('F j, Y', strtotime($person_data->created_at??''))); ?></h4>
               
            </div>
            <div class="card-body">
                <?php $__currentLoopData = $person_responses_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person_response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <b><?php echo e($loop->iteration); ?>) <?php echo e(Str::replace('*teamname*', $person_response->option_value??'', $person_response->question_label??'')); ?></b>&ensp;&nbsp;
                <?php if($person_response->answeredby_person == ''): ?>
                <p>A) <?php echo e(Str::title($person_response->option_value??'')); ?></p>
                <?php else: ?>
                    <p>A) <?php echo e(Str::title($person_response->answeredby_person??'')); ?></p>
                <?php endif; ?>
                <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/responses/responses_view_common.blade.php ENDPATH**/ ?>