
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">List of all the organizations</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-bordered  data-table">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Company Name</th>
                                <th>Entity Type</th>
								<th>City</th>
                                <th>GSTIN</th>
                                <th>Activation Date</th>
                                <!-- <th>License Expiry Date</th> -->
								<th>Status</th>
								<th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('organizations_lists.index')); ?>",
        columns: [
            {data: 'company_name', name: 'company_name'},
            {data: 'entity_group', name: 'entity_group'},
            {data: 'city', name: 'city'},
            {data: 'gst_no', name: 'gst_no'},
            {data: 'license_startdate', name: 'license_startdate'},
            // {data: 'license_startdate', name: 'license_startdate'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(document).on("click",".nddelete",function(e){
    var id = $(this).attr('data-id');
        if (confirm("Are you Sure want to Delete?") == true) {
          var id = id;
          // ajax
          $.ajax({
            type:"POST",
            url: "<?php echo e(route('organizations.delete')); ?>",
            data: {_token: "<?php echo e(csrf_token()); ?>", id: id },
            dataType: 'json',
            success: function(res){
              var oTable = $('.data-table').dataTable();
              oTable.fnDraw(false);
            }
          });
        }
    });
    
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/organizations/organizations_list.blade.php ENDPATH**/ ?>