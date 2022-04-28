
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><?php echo e($pageTitle??''); ?></h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <?php if(isset($theme_options_data->id)): ?>
<form method="POST" class="Addnewblog" action="<?php echo e(url(Config::get('constants.superadmin').'/theme_options/update')); ?>" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo e($theme_options_data->id); ?>">
<?php else: ?>
<form method="POST" class="Addnewblog" action="<?php echo e(url(Config::get('constants.superadmin').'/theme_options/store')); ?>" enctype="multipart/form-data">
<?php endif; ?>
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-sm-5">
      <div class="form-group">
        <label>Header Logo<span style="color: red">*</span></label>       
        <input type="file"  name="header_logo" class="file-input" <?php if(isset($theme_options_data->header_logo)): ?> <?php else: ?> required <?php endif; ?>  />
      </div>
      <div class="form-group">
        <?php if(isset($theme_options_data->header_logo) && !empty($theme_options_data->header_logo)): ?>
        <img src="<?php echo e(asset('assets/uploads/' . $theme_options_data->header_logo)); ?>" width="100"   />
        <?php else: ?>
        <?php endif; ?>
      </div>
      <div class="form-group">
          <label>Favicon</label>
        <input type="file" name="favicon" class="file-input" <?php if(isset($theme_options_data->favicon)): ?> <?php else: ?> required <?php endif; ?>>
      </div>
      <div class="form-group">
        
        <?php if(isset($theme_options_data->favicon) && !empty($theme_options_data->favicon)): ?>
        <img src="<?php echo e(asset('assets/uploads/' . $theme_options_data->favicon)); ?>" width="100" />
        <?php else: ?>
        <?php endif; ?>
      </div>
          <div class="form-group">
            <label>Copyright Description<span style="color: red">*</span></label>
            <textarea  name="copyright" id="title" class="form-control" value="" required="required" rows="1"><?php if(isset($theme_options_data->id)): ?><?php echo e($theme_options_data->copyright??''); ?><?php else: ?><?php echo e(old('copyright')); ?><?php endif; ?></textarea>
          </div>
          <button  id="" type="submit" class="btn btn-primary submit_btn btn-sm">Submit</button>
          <a href="<?php echo e(url('admin/theme_options')); ?>" class="btn btn-danger btn-sm">Back</a>
    </div>
    <div class="col-sm-5">
      </div>
      </div>
    </form>


                </div>
              </div>
                
            </div>
        </div>

    </div>
    <!-- End col -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/themeoptions/add_theme_options.blade.php ENDPATH**/ ?>