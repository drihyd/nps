<div class="row">


<?php if(isset($Data) && $Data->count()>0): ?>

<div class="col-md-12">

	
	<div class="card">
		<div class="card-body p-0">
			<div class="row no-gutters align-items-top">
				<div class="col-auto bg-omni-black text-center">						
					<span class="cus-head" style="width:100px">Score</span>
				</div>
				<div class="col bg-omni-blue">
					<span class="cus-head">Customer Info</span>
				</div>
				<div class="col bg-omni-green">
					<span class="cus-head">Status</span>
				</div>
			</div>
		</div>
	</div>
 <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
	<div class="card info-card bg-white border">
		<div class="card-body p-0">
			<div class="row no-gutters align-items-top">
				<div class="col-sm-auto col-12">
				
		
			<div class="cus-score">
			
			<h1>
			<?php echo e($response->rating??0); ?>

			
			
			</h1>
<?php if(Auth::user()->role==2): ?> 


<a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="btn btn-primary btn-sm" title="Edit" ><?php echo e(Str::title($response->ticker_final_number??'')); ?>


<?php elseif(Auth::user()->role==3): ?>

<a href="<?php echo e(url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="btn btn-primary btn-sm" title="Edit" ><?php echo e(Str::title($response->ticker_final_number??'')); ?>


<?php elseif(Auth::user()->role==4): ?>

<a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="btn btn-primary btn-sm" title="Edit" ><?php echo e(Str::title($response->ticker_final_number??'')); ?>

<?php elseif(Auth::user()->role==1): ?>
<a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="btn btn-primary btn-sm" title="Edit" ><?php echo e(Str::title($response->ticker_final_number??'')); ?>

<?php elseif(Auth::user()->role==7): ?>
<a href="<?php echo e(url(Config::get('constants.support').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="btn btn-primary btn-sm" title="Edit" ><?php echo e(Str::title($response->ticker_final_number??'')); ?>

<?php else: ?>
	
<a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="btn btn-primary btn-sm" title="Edit" >#
<?php endif; ?>
		
			
			
			
			</a>
		
			</div>
					
					
					
				</div>
				<div class="col-sm col-12 bg-omni-blue-light">
					<div class="cus-info">	



<?php if(Auth::user()->role==2): ?> 


<a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" title="Edit" >

<?php elseif(Auth::user()->role==3): ?>

<a href="<?php echo e(url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))); ?>" title="Edit" >

<?php elseif(Auth::user()->role==4): ?>

<a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" title="Edit" >
<?php elseif(Auth::user()->role==1): ?>

<a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" title="Edit" >
<?php elseif(Auth::user()->role==7): ?>
<a href="<?php echo e(url(Config::get('constants.support').'/responses/view/'.Crypt::encryptString($response->id))); ?>" title="Edit" >

<?php else: ?>
	
<a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" title="Edit" >#
<?php endif; ?>
					
						<span>
						
						<b><?php echo e(Str::title($response->firstname??'')); ?></b>
						
						
						
						</span>
						
						</a>
						
						<br>
						<span>UHID No: <?php echo e(Str::title($response->uhid??'')); ?></span><br>
						<span>Bed No: <?php echo e(Str::title($response->bed_name??'')); ?></span><br>
						<span><a href="mailto:<?php echo e($response->email??''); ?>" title="<?php echo e($response->email??''); ?>"><i class="fa fa-envelope "></i></a></span>
						<span><a href="telto:<?php echo e($response->mobile??''); ?>" title="<?php echo e($response->mobile??''); ?>"><i class="fa fa-phone-square"></i></a> </span>
					</div>
				</div>
				<div class="col-sm col-12 bg-omni-green-light">
					<div class="cus-status">
	<?php if(Auth::user()->role==2): ?>         
	<a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><?php echo $__env->make('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
	<?php elseif(Auth::user()->role==3): ?>
	<a href="<?php echo e(url(Config::get('constants.hod').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><?php echo $__env->make('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
	<?php elseif(Auth::user()->role==4): ?>
	<a href="<?php echo e(url(Config::get('constants.user').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><?php echo $__env->make('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
	<?php elseif(Auth::user()->role==1): ?>
	<a href="<?php echo e(url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><?php echo $__env->make('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
	<?php elseif(Auth::user()->role==7): ?>
	<a href="<?php echo e(url(Config::get('constants.support').'/responses/view/'.Crypt::encryptString($response->id))); ?>" class="text-primary mr-2" title="Edit" ><?php echo $__env->make('admin.common_pages.status_of_ticket',['ticket_status'=>$response->ticket_status??'','assigned_user'=>$response->assigned_user??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
	<?php else: ?>
	<?php endif; ?>
<p class='mb-0 mt-0'><small>Updated on: <?php echo e(date('d M, Y', strtotime($response->last_action_date??''))); ?></small></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	
	
	<?php else: ?>
		<div class="col-md-10">
		<h5>No Data found.</h5>
		</div>
	<?php endif; ?>

</div>
</div>


<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/response_card_view.blade.php ENDPATH**/ ?>