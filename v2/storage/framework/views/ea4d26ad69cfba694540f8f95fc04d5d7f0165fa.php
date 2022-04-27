
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- End col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Onboard a new Organization</h5>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-xl-6">
                        <form  action="<?php echo e(url('organizations/update_license')); ?>" method="post">
                        	<?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($comapany_id); ?>">
                            <div>
                                <h3>Licensing</h3>
                                                <section>
                                                    <div class="form-group">
                                                        <label for="username">Start Date<span class="text-danger">*</span></label>
                                                        <div class="input-group">                                  
                                <input type="date" name="license_startdate" class="form-control"/ required="required" value="<?php echo e(old('license_startdate',$organizations_data->license_startdate??'')); ?>">
                                <!-- <input type="date" name="license_startdate" id="default-date" class="datepicker-here form-control" placeholder="dd/mm/yyyy" aria-describedby="basic-addon2"/> --><!-- 
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span> -->
                                  </div>
                                </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="pincode">License Period<span class="text-danger">*</span></label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <select class="form-control" name="license_period_year" id="formControlSelect3" required="required">
                                                            <option value="">Years</option>
                                                            <option value="1" <?php if($organizations_data->license_period_year??'' == '1'): ?> selected <?php else: ?> <?php endif; ?>>1</option>
                                                            <option value="2" <?php if($organizations_data->license_period_year??'' == '2'): ?> selected <?php else: ?> <?php endif; ?>>2</option>
                                                            <option value="3" <?php if($organizations_data->license_period_year??'' == '3'): ?> selected <?php else: ?> <?php endif; ?>>3</option>
                                                            <option value="4" <?php if($organizations_data->license_period_year??'' == '4'): ?> selected <?php else: ?> <?php endif; ?>>4</option>
                                                            <option value="5" <?php if($organizations_data->license_period_year??'' == '5'): ?> selected <?php else: ?> <?php endif; ?>>5</option>
                                                        </select>
                                                            
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <select class="form-control" name="license_period_month" id="formControlSelect4" required="required">
                                                            <option value="" >Months</option>
                                                            <option value="0" <?php if($organizations_data->license_period_month??'' == '0'): ?> selected <?php else: ?> <?php endif; ?>>00</option>
                                                            <option value="1" <?php if($organizations_data->license_period_month??'' == '1'): ?> selected <?php else: ?> <?php endif; ?>>01</option>
                                                            <option value="2" <?php if($organizations_data->license_period_month??'' == '2'): ?> selected <?php else: ?> <?php endif; ?>>02</option>
                                                            <option value="3" <?php if($organizations_data->license_period_month??'' == '3'): ?> selected <?php else: ?> <?php endif; ?>>03</option>
                                                            <option value="4" <?php if($organizations_data->license_period_month??'' == '4'): ?> selected <?php else: ?> <?php endif; ?>>04</option>
                                                            <option value="5" <?php if($organizations_data->license_period_month??'' == '5'): ?> selected <?php else: ?> <?php endif; ?>>05</option>
                                                            <option value="6" <?php if($organizations_data->license_period_month??'' == '6'): ?> selected <?php else: ?> <?php endif; ?>>06</option>
                                                            <option value="7" <?php if($organizations_data->license_period_month??'' == '7'): ?> selected <?php else: ?> <?php endif; ?>>07</option>
                                                            <option value="8" <?php if($organizations_data->license_period_month??'' == '8'): ?> selected <?php else: ?> <?php endif; ?>>08</option>
                                                            <option value="9" <?php if($organizations_data->license_period_month??'' == '9'): ?> selected <?php else: ?> <?php endif; ?>>09</option>
                                                            <option value="10" <?php if($organizations_data->license_period_month??'' == '10'): ?> selected <?php else: ?> <?php endif; ?>>10</option>
                                                            <option value="11" <?php if($organizations_data->license_period_month??'' == '11'): ?> selected <?php else: ?> <?php endif; ?>>11</option>
                                                        </select>
                                                            
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                        </div>
                                                    </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                    <a href="<?php echo e(url('organizations/add-admin-details/'.Crypt::encryptString($comapany_id))); ?>" class="btn btn-danger btn-sm">Back</a>
                                    <button type="submit" class="btn btn-primary btn-sm">Save & Finish</button>
                                </section>
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
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepred/public_html/demos/nps/v1/resources/views/admin/organizations/add_license_details.blade.php ENDPATH**/ ?>