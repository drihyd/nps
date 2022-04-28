
<?php $__env->startSection('title', 'SLA Configurations'); ?>
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
                        <th>Level</th>
                        <th>X Minutes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php $__currentLoopData = $sla_configurations_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sla_configuration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                              
                              <td><?php echo e($loop->iteration); ?></td>
                              <td><?php echo e(Str::upper($sla_configuration->group_levels_alias??'')); ?></td>
                              <td width="50%"><?php echo e($sla_configuration->x_minutes??''); ?></td>
                              
                              <td>
							  <a href="<?php echo e(url(Config::get('constants.admin').'/sla_configurations/edit/'.Crypt::encryptString($sla_configuration->id))); ?>" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
                                <a href="<?php echo e(url(Config::get('constants.admin').'/sla_configurations/delete/'.Crypt::encryptString($sla_configuration->id))); ?>" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
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

            



<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/sla_configurations/sla_configurations_list.blade.php ENDPATH**/ ?>