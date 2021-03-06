@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
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
                        <form  action="{{url(Config::get('constants.superadmin').'/organizations/update_address')}}" method="post">
                        	@csrf
                            <input type="hidden" name="id" value="{{$comapany_id}}">
                            <div>
                                <h3>Address</h3>
                                                <section>
                                                    <div class="form-group">
                                                        <label for="address1">Address line 1<span class="text-danger">*</span></label>
                                                        <input type="text" name="address_1" class="form-control" id="addressline1" required="required" value="{{old('address_1',$organizations_data->address_1??'')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address2">Address line 2</label>
                                                        <input type="text" name="address_2" class="form-control" id="addressline2" value="{{old('address_2',$organizations_data->address_2??'')}}">
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pincode">Pincode<span class="text-danger">*</span></label>
                                                        <input type="number" name="pincode" class="form-control" id="pincode" required="required" data-parsley-type="number" data-parsley-maxlength="6" value="{{old('pincode',$organizations_data->pincode??'')}}">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City<span class="text-danger">*</span></label>
                                                        <input type="text" name="city" class="form-control" id="city" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i" value="{{old('city',$organizations_data->city??'')}}">
                                                    </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                        </div>
														
                                                    <div class="form-group">
													
                                                        <label for="country">Country<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="country" id="country" required="required">
                                                           <option value="">-- Select --</option>
                                                           <option value="india" selected>India</option>
                                                        
                                                        </select>
                                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Save & Continue</button>
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
@endsection