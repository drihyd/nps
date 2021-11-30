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
                        <form  action="{{url('organizations/update_license')}}" method="post">
                        	@csrf
                            <input type="hidden" name="id" value="{{$comapany_id}}">
                            <div>
                                <h3>Licensing</h3>
                                                <section>
                                                    <div class="form-group">
                                                        <label for="username">Start Date<span class="text-danger">*</span></label>
                                                        <div class="input-group">                                  
                                <input type="date" name="license_startdate" class="form-control"/ required="required" value="{{old('license_startdate',$organizations_data->license_startdate??'')}}">
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
                                                            <option value="1" @if($organizations_data->license_period_year??'' == '1') selected @else @endif>1</option>
                                                            <option value="2" @if($organizations_data->license_period_year??'' == '2') selected @else @endif>2</option>
                                                            <option value="3" @if($organizations_data->license_period_year??'' == '3') selected @else @endif>3</option>
                                                            <option value="4" @if($organizations_data->license_period_year??'' == '4') selected @else @endif>4</option>
                                                            <option value="5" @if($organizations_data->license_period_year??'' == '5') selected @else @endif>5</option>
                                                        </select>
                                                            
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <select class="form-control" name="license_period_month" id="formControlSelect4" required="required">
                                                            <option value="" >Months</option>
                                                            <option value="0" @if($organizations_data->license_period_month??'' == '0') selected @else @endif>00</option>
                                                            <option value="1" @if($organizations_data->license_period_month??'' == '1') selected @else @endif>01</option>
                                                            <option value="2" @if($organizations_data->license_period_month??'' == '2') selected @else @endif>02</option>
                                                            <option value="3" @if($organizations_data->license_period_month??'' == '3') selected @else @endif>03</option>
                                                            <option value="4" @if($organizations_data->license_period_month??'' == '4') selected @else @endif>04</option>
                                                            <option value="5" @if($organizations_data->license_period_month??'' == '5') selected @else @endif>05</option>
                                                            <option value="6" @if($organizations_data->license_period_month??'' == '6') selected @else @endif>06</option>
                                                            <option value="7" @if($organizations_data->license_period_month??'' == '7') selected @else @endif>07</option>
                                                            <option value="8" @if($organizations_data->license_period_month??'' == '8') selected @else @endif>08</option>
                                                            <option value="9" @if($organizations_data->license_period_month??'' == '9') selected @else @endif>09</option>
                                                            <option value="10" @if($organizations_data->license_period_month??'' == '10') selected @else @endif>10</option>
                                                            <option value="11" @if($organizations_data->license_period_month??'' == '11') selected @else @endif>11</option>
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
                                    <a href="{{ url('organizations/add-admin-details/'.Crypt::encryptString($comapany_id)) }}" class="btn btn-danger btn-sm">Back</a>
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
@endsection