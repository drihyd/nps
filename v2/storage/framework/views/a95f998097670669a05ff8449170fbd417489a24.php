<?php

$organization=DB::table('users')->join('organizations', 'users.organization_id', '=', 'organizations.id')
        ->where('users.organization_id',Auth::user()->organization_id)
        ->where('users.role',2)
        ->get(['users.*','organizations.company_name as companyname'])->first();
?>

<div class="breadcrumbbar">
<div class="row align-items-center">
<div class="col-md-8 col-lg-8">
<h4 class="page-title"><?php echo e(Str::upper($organization->companyname??'')); ?> - Dashboard</h4>
<div class="breadcrumb-list">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo e(url(Config::get('constants.admin').'/dashboard')); ?>">Home</a></li>
<li class="breadcrumb-item" active aria-current="page"><a href="#"><?php echo e($pageTitle??''); ?></a></li>
</ol>
</div>
</div>
<div class="col-md-4 col-lg-4">
<?php if(isset($addlink)): ?>
<div class="widgetbar">
<a href="<?php echo e($addlink??''); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>ADD</a>
</div> 
<?php else: ?>
&nbsp;
<?php endif; ?>                     
</div>
</div>          
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/breadcrump_manager.blade.php ENDPATH**/ ?>