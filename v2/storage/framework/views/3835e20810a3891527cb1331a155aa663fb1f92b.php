
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- End col -->
    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Basic Info</h4>
               
            </div>
            <div class="card-body">
                
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo e($organizations_data->id); ?>">
  <?php echo e(csrf_field()); ?>

                <b>Company name</b>&ensp;
                <a href="#" id="xeditable-company_name" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->company_name??''); ?></a>
                <br>
                <b>Short name</b>&ensp;
                <a href="#" id="xeditable-shortname" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->short_name??''); ?></a><br>

                
                <!-- <b>Entity type</b>&ensp;
                <a href="#" id="xeditable-entitytype" data-pk="<?php echo e($organizations_data->id); ?>" data-value="<?php echo e($organizations_data->is_group); ?>"><?php if($organizations_data->is_group == 'yes'): ?>Group Company <?php else: ?> Single Entity <?php endif; ?></a><br> -->

                </form>
                &nbsp;
            </div>
        </div>
    </div>  
    <!-- End col -->
    <!-- Start col -->
    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Address</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo e($organizations_data->id); ?>">
                <b>Address line - 1</b>&ensp;
                <a href="#" id="xeditable-address1" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->address_1??''); ?></a>
                <br>
                <b>Address line - 2</b>&ensp;
                <a href="#" id="xeditable-address2" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->address_2??''); ?></a>
                <br><br>
                <small><b>Pincode</b></small>&ensp;
                <a href="#" id="xeditable-pincode" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->pincode??''); ?></a>&ensp;&ensp;&ensp;
                <small><b>City</b></small>&ensp;
                <a href="#" id="xeditable-city" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->city??''); ?></a>
                &ensp;&ensp;&ensp;
                <small><b>Country</b></small>&ensp;
                <a href="#" id="xeditable-country" class="editable editable-click" data-pk="<?php echo e($organizations_data->id); ?>" data-value="<?php echo e($organizations_data->country); ?>"><?php if($organizations_data->country == 'india'): ?>India <?php else: ?> Not selected <?php endif; ?></a>
            </div>
        </div>
    </div>  
    <!-- End col -->
    <!-- End col -->
    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4>GST/Billing Details</h4>
               
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo e($organizations_data->id); ?>">
                <small><b>GSTNO</b></small>&ensp;
                <a href="#" id="xeditable-gst" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->gst_no??''); ?></a>
            
                <br><br>
                <small><b>Billing Address 1</b></small>&ensp;
                <a href="#" id="xeditable-billing_address1" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->billing_address_1??''); ?></a><br>
                <small><b>Billing Address 2</b></small>&ensp;
                <a href="#" id="xeditable-billing_address2" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->billing_address_2??''); ?></a><br>
                </form>
                <br>
                <small><b>Pincode</b></small>&ensp;
                <a href="#" id="xeditable-billing_pincode" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->billing_pincode??''); ?></a>&ensp;&ensp;&ensp;
                <small><b>City</b></small>&ensp;
                <a href="#" id="xeditable-billing_city" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->billing_city??''); ?></a>
                &ensp;&ensp;&ensp;
                <small><b>Country</b></small>&ensp;
                <a href="#" id="xeditable-billing_country" class="editable editable-click" data-pk="<?php echo e($organizations_data->id); ?>" data-value="<?php echo e($organizations_data->billing_country); ?>"><?php if($organizations_data->billing_country == 'india'): ?>India <?php else: ?> Not selected <?php endif; ?></a>
            </div>
        </div>
    </div>   
    <!-- End col -->
    <!-- End col -->
    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Admin Details</h4>
               
            </div>
            <div class="card-body">
                <b>Admin name</b>&ensp;
                <a href="#" id="xeditable-admin_name" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->admin_name??''); ?></a>
                <br>
                <b>Email</b>&ensp;
                <a href="#" id="xeditable-admin_email" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->admin_email??''); ?></a><br><br>
                <b>Mobile</b>&ensp;
                <a href="#" id="xeditable-admin_mobile" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->admin_mobile??''); ?></a><br>
                <b>Alternative Mobile</b>&ensp;
                <a href="#" id="xeditable-admin_alt_mobile" data-pk="<?php echo e($organizations_data->id); ?>"><?php echo e($organizations_data->admin_alter_mobile??''); ?></a><br>
                
                &nbsp;
            </div>
        </div>
    </div>  
    <!-- End col -->
    
    
    <!-- Start col -->
    
    
    <div class="col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 >Licence Details</h4>
            </div>
            <div class="card-body">
                <b>Licence Start Date</b>&ensp;
                <a href="#" id="xeditable-date" data-pk="<?php echo e($organizations_data->id); ?>"></a>
                <br>
                <br>

                <b>License Period</b>&ensp;
                <small><b>Years</b></small>&ensp;
                <a href="#" id="xeditable-license_period_year" data-pk="<?php echo e($organizations_data->id); ?>" data-value="<?php echo e($organizations_data->license_period_year); ?>"><?php echo e($organizations_data->license_period_year??''); ?></a>
                &ensp;&ensp;&ensp;
                <small><b>Months</b></small>&ensp;
                <a href="#" id="xeditable-license_period_month" class="editable editable-click" data-pk="<?php echo e($organizations_data->id); ?>" data-value="<?php echo e($organizations_data->license_period_month); ?>"><?php echo e($organizations_data->license_period_month??''); ?></a>
            </div>
        </div>
    </div> 
    <div class="col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 >Change Password</h4>
            </div>
            <div class="card-body">
                <form method="POST" class="Addnewblog" action="<?php echo e(url(Config::get('constants.superadmin').'/organizations/update_password')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
<input type="hidden" name="id" value="<?php echo e($organizations_data->id); ?>">
                <div class="form-group">
        <!-- <label>Brand Logo<span style="color: red">*</span></label>        -->
        <input type="password" class="form-control form-control-sm" name="password" id="" value="" required />
      </div>
      <button  id="" type="submit" class="btn btn-primary submit_btn btn-sm">Submit</button>
  </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 >Update Brand Logo</h4>
            </div>
            <div class="card-body">
                <form method="POST" class="Addnewblog" action="<?php echo e(url(Config::get('constants.superadmin').'/organizations/update_brand_logo')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
<input type="hidden" name="id" value="<?php echo e($organizations_data->id); ?>">
                <div class="form-group">
        <!-- <label>Brand Logo<span style="color: red">*</span></label>        -->
        <input type="file"  name="brand_logo" class="file-input" <?php if(isset($organizations_data->brand_logo)): ?> <?php else: ?> required <?php endif; ?>  />
      </div>
      <div class="form-group">
        <?php if(isset($organizations_data->brand_logo) && !empty($organizations_data->brand_logo)): ?>
        <img src="<?php echo e(asset('assets/uploads/' . $organizations_data->brand_logo)); ?>" width="100"   />
        <?php else: ?>
        <?php endif; ?>
      </div>
      <button  id="" type="submit" class="btn btn-primary submit_btn btn-sm">Submit</button>
  </form>
            </div>
        </div>
    </div>


    
    <!-- End col -->
    <!-- Start col -->
    <!-- <div class="col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Combodate (datetime)</h5>
            </div>
            <div class="card-body">                                
                <a href="#" id="xeditable-event" class="editable editable-click editable-empty"></a>
            </div>
        </div>
    </div>  --> 
    <!-- End col -->
</div>
<div class=" pb-5">

<a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations')); ?>" class="btn btn-default btn-sm">Back</a>
<a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations/delete/'.Crypt::encryptString($organizations_data->id))); ?>" class="delete btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete this?')" >Delete</i></a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">
$(document).ready(function() {
    /* -- Form - X-editable -- */   
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editableform.buttons='<button type="submit" class="btn btn-success editable-submit btn-sm"><i class="mdi mdi-check"></i></button><button type="button" class="btn btn-danger editable-cancel btn-sm"><i class="mdi mdi-close"></i></button>';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    organization_id = $(this).data('pk');

    toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };

    $('#xeditable-company_name').editable({
        url: '<?php echo e(route("update_company")); ?>',
        type:"text",
        pk: organization_id,
        title: 'Enter Company Name',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '')             
               {
                return 'This field is required';
               }
               else{
                   
                var inputvalues = value;                
                var comapyformat = new RegExp(/^[a-z\d\-_\s]+$/i);    
                if (comapyformat.test(inputvalues)) {    
                      
                } else {  
    
                    return 'Please Enter Alpha numeric only';               
                            
                } 
                   
               }
        },
        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
        
    });
    $('#xeditable-shortname').editable({
        url: '<?php echo e(route("update_shortname")); ?>',
        type:"text",
        pk: organization_id,
        title: 'Enter Short Name',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '')             
               {
                return 'This field is required';
               }
               else{
                   
                var inputvalues = value;                
                var comapyformat = new RegExp(/^[a-z\d\-_\s]+$/i);    
                if (comapyformat.test(inputvalues)) {    
                      
                } else {  
    
                    return 'Please Enter Alpha numeric only';               
                            
                } 
                   
               }
        },
        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }

    });
    $('#xeditable-entitytype').editable({
        url: '<?php echo e(route("update_entitytype")); ?>',
        pk: organization_id,
        type: 'select',
        title: 'Select options',
        value: ['<?php echo e($organizations_data->is_group); ?>'],    
        source: [
              {value: 'yes', text: 'Group Company'},
              {value: 'no', text: 'Single Entity'},
           ],

        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    $('#xeditable-address1').editable({
        url: '<?php echo e(route("update_address_1")); ?>',
        pk: organization_id,
        type: 'text',
        title: 'Enter addressline1',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
        
    });
    $('#xeditable-address2').editable({
        type: 'text',
        url: '<?php echo e(route("update_address_2")); ?>',
        pk: organization_id,   
        title: 'Enter addressline2',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    $('#xeditable-pincode').editable({
        type: 'number',
        url: '<?php echo e(route("update_pincode")); ?>',
        pk: organization_id,  
        title: 'Enter pincode',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    $('#xeditable-city').editable({
        type: 'text',
        url: '<?php echo e(route("update_city")); ?>',
        pk: organization_id, 
        title: 'Enter City',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '')             
               {
                return 'This field is required';
               }
               else{
                   
                var inputvalues = value;                
                var comapyformat = new RegExp(/^[a-z\d\-_\s]+$/i);    
                if (comapyformat.test(inputvalues)) {    
                      
                } else {  
    
                    return 'Please Enter Alpha numeric only';               
                            
                } 
                   
               }
        },
        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });


    // country



    $('#xeditable-country').editable({
        prepend: 'not selected',
        type: 'select',
        url: '<?php echo e(route("update_country")); ?>',
        pk: organization_id,

        value: ['<?php echo e($organizations_data->country??''); ?>'],
        source: [
            {value: 'india', text: 'India'},
            
        ],
        inputclass: 'form-control form-control-sm',

        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
        // display: function(value, sourceData) {
        //      var colors = {"": "#777777", 1: "#2bcd72", 2: "#4c7cf3"},
        //          elem = $.grep(sourceData, function(o){return o.value == value;});
                 
        //      if(elem.length) {    
        //          $(this).text(elem[0].text).css("color", colors[value]); 
        //      } else {
        //          $(this).empty(); 
        //      }
        // }   
    });

    $('#xeditable-gst').editable({


        type: 'text',
        url: '<?php echo e(route("update_gst_details")); ?>',
        pk: organization_id, 
        title: 'Enter GST',
        inputclass: 'form-control form-control-sm gst',
        validate: function(value) {
            
        
           if($.trim(value) == '')             
               {
                return 'This field is required';
               }
               else{
                   
                var inputvalues = value;                
                var gstinformat = new RegExp('^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$');    
                if (gstinformat.test(inputvalues)) {    
                      
                } else {  
    
                    return 'Please Enter Valid GSTIN Number';               
                            
                } 
                   
               }
               
               
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    $('#xeditable-billing_address1').editable({


        type: 'text',
        url: '<?php echo e(route("update_billing_address1")); ?>',
        pk: organization_id, 
        title: 'Enter GST',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    $('#xeditable-billing_address2').editable({


        type: 'text',
        url: '<?php echo e(route("update_billing_address2")); ?>',
        pk: organization_id, 
        title: 'Enter GST',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });$('#xeditable-billing_pincode').editable({


        type: 'text',
        url: '<?php echo e(route("update_billing_pincode")); ?>',
        pk: organization_id, 
        title: 'Enter GST',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });$('#xeditable-billing_city').editable({


        type: 'text',
        url: '<?php echo e(route("update_billing_city")); ?>',
        pk: organization_id, 
        title: 'Enter GST',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '')             
               {
                return 'This field is required';
               }
               else{
                   
                var inputvalues = value;                
                var comapyformat = new RegExp(/^[a-z\d\-_\s]+$/i);    
                if (comapyformat.test(inputvalues)) {    
                      
                } else {  
    
                    return 'Please Enter Alpha numeric only';               
                            
                } 
                   
               }
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });



    $('#xeditable-billing_country').editable({
        prepend: 'not selected',
        type: 'select',
        url: '<?php echo e(route("update_billing_country")); ?>',
        pk: organization_id,

        value: ['<?php echo e($organizations_data->billing_country??''); ?>'],
        source: [
            {value: 'india', text: 'India'},
            
        ],
        inputclass: 'form-control form-control-sm',

        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
        // display: function(value, sourceData) {
        //      var colors = {"": "#777777", 1: "#2bcd72", 2: "#4c7cf3"},
        //          elem = $.grep(sourceData, function(o){return o.value == value;});
                 
        //      if(elem.length) {    
        //          $(this).text(elem[0].text).css("color", colors[value]); 
        //      } else {
        //          $(this).empty(); 
        //      }
        // }   
    });

    $('#xeditable-admin_name').editable({


        type: 'text',
        url: '<?php echo e(route("update_admin_name")); ?>',
        pk: organization_id, 
        title: 'Enter GST',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '')             
               {
                return 'This field is required';
               }
               else{
                   
                var inputvalues = value;                
                var comapyformat = new RegExp(/^[a-z\d\-_\s]+$/i);    
                if (comapyformat.test(inputvalues)) {    
                      
                } else {  
    
                    return 'Please Enter Alpha numeric only';               
                            
                } 
                   
               }
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    $('#xeditable-admin_email').editable({


        type: 'email',
        url: '<?php echo e(route("update_admin_email")); ?>',
        pk: organization_id, 
        title: 'Enter Email',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '')             
               {
                return 'This field is required';
               }
               else{
                   
                var inputvalues = value;                
                var comapyformat = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');    
                if (comapyformat.test(inputvalues)) {    
                      
                } else {  
    
                    return 'Please Enter valid Email';               
                            
                } 
                   
               }
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    $('#xeditable-admin_mobile').editable({


        type: 'text',
        url: '<?php echo e(route("update_admin_mobile")); ?>',
        pk: organization_id, 
        title: 'Enter Mobile',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    $('#xeditable-admin_alt_mobile').editable({


        type: 'text',
        url: '<?php echo e(route("update_admin_alt_mobile")); ?>',
        pk: organization_id, 
        title: 'Enter Alternative Mobile',
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        },
        success:function(value){
                if(value.statsCode==200)
                {            

                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });


    $('#xeditable-date').editable({
          type: 'combodate',
          url: '<?php echo e(route("update_license_startdate")); ?>',
          pk: organization_id, 
          value: '<?php echo e($organizations_data->license_startdate??''); ?>',
          title: 'Select date',
          format: 'YYYY-MM-DD',    
          viewformat: 'DD.MM.YYYY',    
          template: 'D / MMMM / YYYY',    
          combodate: {
               minYear: 2000,
               maxYear: 2022,
               minuteStep: 1
          },
          inputclass: 'form-control form-control-sm'
     });

    
    $('#xeditable-status').editable({
          type: 'select',
          pk: 1,
          value: '0',   
          title: 'Select Status',
          inputclass: 'form-control form-control-sm'
    });


    $('#xeditable-license_period_year').editable({
        url: '<?php echo e(route("update_license_period_year")); ?>',
        pk: organization_id,
        type: 'select',
        title: 'Select options',
        value: ['<?php echo e($organizations_data->license_period_year); ?>'],    
        source: [
              {value: '1', text: '1'},
              {value: '2', text: '2'},
              {value: '3', text: '3'},
              {value: '4', text: '4'},
              {value: '5', text: '5'},
           ],

        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });

    $('#xeditable-license_period_month').editable({
        url: '<?php echo e(route("update_license_period_month")); ?>',
        pk: organization_id,
        type: 'select',
        title: 'Select options',
        value: ['<?php echo e($organizations_data->license_period_month); ?>'],    
        source: [
              {value: '1', text: '1'},
              {value: '2', text: '2'},
              {value: '3', text: '3'},
              {value: '4', text: '4'},
              {value: '5', text: '5'},
              {value: '6', text: '6'},
              {value: '7', text: '7'},
              {value: '8', text: '8'},
              {value: '9', text: '9'},
              {value: '10', text: '10'},
              {value: '11', text: '11'},
           ],

        success:function(value){
                if(value.statsCode==200)
                {  
                    toastr.success(value.success);
                }
                else{
                    toastr.error(value.error);
                }
           }
    });
    
    //  $('#xeditable-event').editable({
    //     type: 'combodate',
    //     pk: 1,  
    //     title: 'Setup event date and time',
    //     placement: 'right',
    //     format: 'YYYY-MM-DD HH:mm',    
    //     viewformat: 'MMM D, YYYY, HH:mm',    
    //     template: 'D MMM YYYY  HH:mm',
    //     combodate: {
    //         firstItem: 'name'
    //     },
    //     inputclass: 'form-control form-control-sm'
    // });
    // $('#xeditable-comments').editable({
    //     title: 'Enter comments',
    //     rows: 5,
    //     inputclass: 'form-control form-control-sm'
    // });     
    
});
</script>




<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/organizations/single_organization.blade.php ENDPATH**/ ?>