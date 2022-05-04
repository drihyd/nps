<div class="form-group mb-2">
<label for="staticEmail2" class="sr-only">From Date</label>
@if(isset($from_date) && !empty($from_date))
<input type="date" class="form-control form-control-sm mx-sm-1" id="from_date"  name="from_date" value="{{$from_date??Carbon\Carbon::now()->format('Y-m-01')}}" >
@else 
<input type="date" class="form-control form-control-sm mx-sm-1" id="from_date"  name="from_date" value="{{Carbon\Carbon::now()->format('Y-m-01')}}">	
@endif

</div>
<div class="form-group mx-sm-1 mb-2">
<label for="inputPassword2" class="sr-only">To Date</label>
@if(isset($to_date) && !empty($to_date))
<input type="date" class="form-control form-control-sm mx-sm-3" id="to_date"  name="to_date" value="{{$to_date??Carbon\Carbon::now()->format('Y-m-01')}}">
@else 
	<input type="date" class="form-control form-control-sm mx-sm-3" id="to_date"  name="to_date" value="{{Carbon\Carbon::now()->format('Y-m-t')}}">
@endif
	
</div>
