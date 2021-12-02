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
                        <form  action="{{url('organizations/update_gst/')}}" method="post">
                        	@csrf
                            <input type="hidden" name="id" value="{{$comapany_id}}">

                            <input type="hidden" name="address_1" class="form-control" id="address_1" value="{{$organizations_data->address_1??''}}">
                            <input type="hidden" name="address_2" class="form-control" id="address_2" value="{{$organizations_data->address_2??''}}">
                            <input type="hidden" name="pincode" class="form-control" id="pincode" value="{{$organizations_data->pincode??''}}">
                            <input type="hidden" name="city" class="form-control" id="city" value="{{$organizations_data->city??''}}">
                            <select type="hidden" class="form-control" name="country" id="country" hidden="">

                                                           <option value="">-- Select --</option>
                                                           <option value="india" @if($organizations_data->country??'' == 'india') selected @else @endif>India</option>
                                                       </select>

                            <div>
                                <h3>GST Details</h3>
                                                <section>
                                                    <div class="form-group">
                                                        <label for="username">GSTIN Number<span class="text-danger">*</span>&ensp; <small>[Sample code: 05ABDCE1234F1Z2]</small></label>
                                                        <input type="text" name="gst_no" class="form-control gst" id="gstin" required="required" data-parsley-maxlength="15" maxlength="15" value="{{old('gst_no',$organizations_data->gst_no??'')}}">
                                                    </div>
                                                    <h4 class="font-22 mb-3">Billing Address</h4>
                                                    <div class="form-group">
                                                        <input type="checkbox" id="check-address" name="get_permanent_address" class="checkbox primary" data-pk="{{ $organizations_data->id }}"/>
                                                        <label for="groupcompany" class="primary-rgba">Same as company address<span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address1">Address line 1<span class="text-danger">*</span></label>
                                                        <input type="text" name="billing_address_1" class="form-control" id="billing_address_1" required="required" value="{{old('billing_address_1',$organizations_data->billing_address_1??'')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address2">Address line 2</label>
                                                        <input type="text" name="billing_address_2" class="form-control" id="billing_address_2" value="{{old('billing_address_2',$organizations_data->billing_address_2??'')}}">
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pincode">Pincode<span class="text-danger">*</span></label>
                                                        <input type="number" name="billing_pincode" class="form-control" id="billing_pincode" required="required" data-parsley-type="number" data-parsley-maxlength="6" value="{{old('billing_pincode',$organizations_data->billing_pincode??'')}}">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City<span class="text-danger">*</span></label>
                                                        <input type="text" name="billing_city" class="form-control" id="billing_city" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i" value="{{old('city',$organizations_data->billing_city??'')}}">
                                                    </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="country">Country<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="billing_country" id="billing_country" required="required" id="billing_country">
                                                            <option value="">-- Select --</option>
                                                           <option value="india" @if($organizations_data->billing_country??'' == 'india') selected @else @endif>India</option>
                                                           
                                                        </select>
                                                    </div>
                                                    <a href="{{ url('organizations/add-address/'.Crypt::encryptString($comapany_id))}}" class="btn btn-danger btn-sm">Back</a>
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
@push('scripts')
    <!-- <script>
$('#get_permanent_address').change(function() {
        if(this.checked) {
            getpermanentaddress();

        }else{
      /*    $('#address_1').val('{{$single_data->address_1??''}}');
          $('#address_2').val('{{$single_data->address_2??''}}');
          $('#city').val('{{$single_data->city??''}}');
          $('#pincode').val('{{$single_data->pincode??''}}');
          $('#district').val('{{$single_data->district??''}}');
          $('#state').val('{{$single_data->state_id??''}}');
          $('#country').val('{{$single_data->country_id??''}}');*/

          $('#billing_address_1').val('');
          $('#billing_address_2').val('');
          $('#billing_pincode').val('');
          $('#billing_city').val('');
          $('#billing_country').val('');
        }
    });

function getpermanentaddress(){


var organization_id = $comapany_id;

 alert(organization_id);
  
  $.ajax("{{url('organizations/get_permanent_address')}}", {
      type: 'POST',  // http method
      
        // data to submit
       data: {'id':'{{$comapany_id}}', type:'object_type',"_token": "{{ csrf_token() }}"},
      
      success: function (data, status, xhr) {
          var user_address = $.parseJSON(data); 
          $('#address_1').val(user_address.address_1);

          $('#address_2').val(user_address.address_2);
          $('#city').val(user_address.city);
          $('#pincode').val(user_address.pincode);
          $('#district').val(user_address.district);
          $('#state').val(user_address.state_id);
          $('#country').val(user_address.country_id);
      },
      error: function (jqXhr, textStatus, errorMessage) {
              $('p').append('Error' + errorMessage);
      }
  });
}
    </script> -->
    <script type="text/javascript">
   $(document).ready(function(){ 
     $('#check-address').click(function(){      
     if ($('#check-address').is(":checked")) {    
      $('#billing_address_1').val($('#address_1').val());
      $('#billing_address_2').val($('#address_2').val());
      $('#billing_pincode').val($('#pincode').val());
      $('#billing_city').val($('#city').val());      
      var country = $('#country option:selected').val();
      $('#billing_country option[value=' + country + ']').attr('selected','selected');
     } else { //Clear on uncheck    
      $('#billing_address_1').val("");
      $('#billing_address_2').val("");
      $('#billing_pincode').val("");
      $('#billing_city').val("");
      $('#billing_country option[value=""]').attr('selected','selected');
     };
    });
 
   });
</script>




    @endpush