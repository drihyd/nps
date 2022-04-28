
<?php $__env->startSection('title', 'Customer Fields Configurables'); ?>
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
                        <th>Label</th>
                        <th>Input Type</th>
                        <th>Input Name</th>
                        <th>Is Active?</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $customer_fields_configurables_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer_fields_configurables): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><?php echo e(Str::title($customer_fields_configurables->label??'')); ?></td>
                              <td ><?php echo e($customer_fields_configurables->input_type??''); ?></td>
                              <td ><?php echo e($customer_fields_configurables->input_name??''); ?></td>
                              <td ><?php echo e(Str::title($customer_fields_configurables->is_display??'')); ?></td>
                              
                              <td>
							  <a href="<?php echo e(url(Config::get('constants.admin').'/customer_fields_configurables/edit/'.Crypt::encryptString($customer_fields_configurables->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/customer_fields_configurables/delete/'.Crypt::encryptString($customer_fields_configurables->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
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

            



<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/customer_fields_configurables/customer_fields_configurables_list.blade.php ENDPATH**/ ?>