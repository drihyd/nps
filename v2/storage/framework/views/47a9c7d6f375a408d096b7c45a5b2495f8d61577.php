
<?php $__env->startSection('title', 'Questionnaire'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title"><?php echo $__env->yieldContent('title'); ?></h5>
            </div>
            <div class="card-body">
			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Is Active?</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $surveys_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><?php echo e(Str::title($survey->title??'')); ?></td>
                              <td width="50%"><?php echo e($survey->description??''); ?></td>
                              <td><input data-id="<?php echo e($survey->id); ?>" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" <?php echo e($survey->isopen =='yes'?'checked' : ''); ?>></td>
                              <td>
							  <a href="<?php echo e(url(Config::get('constants.admin').'/questionnaire/edit/'.Crypt::encryptString($survey->id))); ?>" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/questionnaire/delete/'.Crypt::encryptString($survey->id))); ?>" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
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

<?php $__env->startPush('scripts'); ?>
        <script>
  $(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.toggle-class').change(function() {
        // alert('hi');
         toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 'yes' : 'no'; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "post",
            dataType: "json",
            url: "<?php echo e(url(Config::get('constants.admin').'/changeStatus')); ?>",
            data: {'isopen': status, 'id': id},
            success: function(data){

          
              if(data.statusCode==200)
                {            
                    toastr.success(data.success);
                }
                else{
                    toastr.error(data.error);
                }
            }
        });
    })
  })
</script>
<?php $__env->stopPush(); ?>

            



<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/surveys/surveys_list.blade.php ENDPATH**/ ?>