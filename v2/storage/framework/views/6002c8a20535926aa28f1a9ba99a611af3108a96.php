
<?php $__env->startSection('title', 'Questions'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title"><?php echo $__env->yieldContent('title'); ?></h5>
            </div>

            
         
<div class="card-body mb-2">   
<form class="table-filter form-inline mb-4" action="<?php echo e(route('filter.questions')); ?>" method="post">
<?php echo csrf_field(); ?>
<?php echo $__env->make('admin.common_pages.surveys',['quetion'=>$quetion??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;
<?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;
<div class="form-group mb-2">
<?php if(auth()->user()): ?>
<?php if(auth()->user()->role==2): ?>
<a href="<?php echo e(url(Config::get('constants.admin').'/questions')); ?>">Clear filter</a>
<?php else: ?>
<a href="<?php echo e(url(Config::get('constants.user').'/questions')); ?>">Clear filter</a>
<?php endif; ?>
<?php else: ?>
<a href="#">
<?php endif; ?>

</div>




</form>


			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <!-- <th>Questionnaire</th> -->
                        <th>Label</th>
                        <th>Is Active?</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $questions_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <!-- <td><?php echo e(Str::title($question->survey_title??'')); ?></td> -->
                              <td><?php echo e(Str::title($question->label??'')); ?></td>
                              <td><?php echo e(Str::title($question->active??'')); ?></td>
                              
                           
                              
                              <td>
							  
							  <a href="<?php echo e(url(Config::get('constants.admin').'/questions/edit/'.Crypt::encryptString($question->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/questions/delete/'.Crypt::encryptString($question->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
                              </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      
            </table>
			
			</div>
        </div>
      </div>
</div>
</div>
        <?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/questions/questions_list.blade.php ENDPATH**/ ?>