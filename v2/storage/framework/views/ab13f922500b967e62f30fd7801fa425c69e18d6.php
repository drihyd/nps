<div class="form-group mb-2">
<label for="staticEmail2" class="sr-only">From Date</label>
<input type="date" class="form-control form-control-sm mx-sm-1" id="from_date"  name="from_date" value="<?php echo e(Carbon\Carbon::now()->format('Y-m-01')); ?>">
</div>
<div class="form-group mx-sm-1 mb-2">
<label for="inputPassword2" class="sr-only">To Date</label>
<input type="date" class="form-control form-control-sm mx-sm-3" id="to_date"  name="to_date" value="<?php echo e(Carbon\Carbon::now()->format('Y-m-t')); ?>">
</div>
<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/dates_input.blade.php ENDPATH**/ ?>