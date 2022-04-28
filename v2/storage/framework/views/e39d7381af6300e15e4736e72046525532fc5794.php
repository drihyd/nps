<?php

$organization=DB::table('users')->join('organizations', 'users.organization_id', '=', 'organizations.id')
        ->where('users.organization_id',Auth::user()->organization_id)
        ->where('users.role',2)
        ->get(['users.*','organizations.company_name as companyname'])->first();
?>

<div class="breadcrumbbar">
<div class="row align-items-center">
<div class="col-md-8 col-lg-8">
<h4 class="page-title">Welcome to Operational Head - Dashboard</h4>
<div class="breadcrumb-list">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo e(url(Config::get('constants.optlhead').'/dashboard')); ?>"><i class="feather icon-home mr-2"></i></a></li>
<li class="breadcrumb-item" active aria-current="page"><a href="#"><?php echo e($pageTitle??''); ?></a></li>
</ol>
</div>
</div>
<div class="col-md-4 col-lg-4">
                    
</div>
</div>          
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/breadcrump_opthead.blade.php ENDPATH**/ ?>