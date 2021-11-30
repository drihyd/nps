@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <!-- End col -->
    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
				<h4>Basic Info</h4>
               
            </div>
            <div class="card-body">
				<small><b>Company name</b></small>&ensp;
                <form action="" method="post">
                    <input type="hidden" name="id" value="{{$organizations_data->id}}">
  {{csrf_field()}}
                <a href="#" id="xeditable-company_name" data-pk="{{ $organizations_data->id }}">{{$organizations_data->company_name??''}}</a>
				<br>
				<small><b>Short name</b></small>&ensp;
                <a href="#" id="xeditable-shortname" data-pk="{{ $organizations_data->id }}">{{$organizations_data->short_name??''}}</a><br>

                
				<small><b>Entity type</b></small>&ensp;
                <a href="#" id="xeditable-entitytype" data-pk="{{ $organizations_data->id }}" data-value="{{ $organizations_data->is_group}}">@if($organizations_data->is_group == 'yes')Group Company @else Single Entity @endif</a><br>

                </form>
				<small>&nbsp;</small>
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
                    <input type="hidden" name="id" value="{{$organizations_data->id}}">
                <small><b>Address line - 1</b></small>&ensp;
				<a href="#" id="xeditable-address1" data-pk="{{ $organizations_data->id }}">{{$organizations_data->address_1??''}}</a>
				<br>
				<small><b>Address line - 2</b></small>&ensp;
				<a href="#" id="xeditable-address2" data-pk="{{ $organizations_data->id }}">{{$organizations_data->address_2??''}}</a>
				<br><br>
				<small><b>Pincode</b></small>&ensp;
				<a href="#" id="xeditable-pincode" data-pk="{{ $organizations_data->id }}">{{$organizations_data->pincode??''}}</a>&ensp;&ensp;&ensp;
            </form>
				<small><b>City</b></small>&ensp;
				<a href="#" id="xeditable-city" data-pk="{{ $organizations_data->id }}">{{$organizations_data->city??''}}</a>
				&ensp;&ensp;&ensp;
				<!-- <small><b>Country</b></small>&ensp;
				<a href="#" id="xeditable-country" class="editable editable-click" style="color: #777777;">not selected</a> -->
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
                    <input type="hidden" name="id" value="{{$organizations_data->id}}">
                <small><b>GSTNO</b></small>&ensp;
                <a href="#" id="xeditable-gst" data-pk="{{ $organizations_data->id }}">{{$organizations_data->gst_no??''}}</a>
            </form>
                <!-- <br>
                <small><b>Billing Address 1</b></small>&ensp;
                <a href="#" id="xeditable-billing_address1">{{$organizations_data->short_name??''}}</a><br> -->
                
                <small>&nbsp;</small>
            </div>
        </div>
    </div>  
    <!-- End col -->
    <!-- End col -->
    <!-- <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Basic Info</h4>
               
            </div>
            <div class="card-body">
                <small><b>Company name</b></small>&ensp;
                <a href="#" id="xeditable-username">{{$organizations_data->company_name??''}}</a>
                <br>
                <small><b>Short name</b></small>&ensp;
                <a href="#" id="xeditable-username1">{{$organizations_data->short_name??''}}</a><br>
                
                <small>&nbsp;</small>
            </div>
        </div>
    </div> -->  
    <!-- End col -->
    
    
    <!-- Start col -->
    <div class="col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Combodate (date)</h5>
            </div>
            <div class="card-body">
                <a href="#" id="xeditable-dob"></a>
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
@endsection

@push('scripts')

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
        url: '{{route("update_company")}}',
        type:"text",
        pk: organization_id,
        title: 'Enter Company Name',
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
    $('#xeditable-shortname').editable({
        url: '{{route("update_shortname")}}',
        type:"text",
        pk: organization_id,
        title: 'Enter Short Name',
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
    $('#xeditable-entitytype').editable({
        url: '{{route("update_entitytype")}}',
        pk: organization_id,
        type: 'select',
        title: 'Select options',
        value: ['{{$organizations_data->is_group}}'],    
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
        url: '{{route("update_address_1")}}',
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
        url: '{{route("update_address_2")}}',
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
        url: '{{route("update_pincode")}}',
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
        url: '{{route("update_city")}}',
        pk: organization_id, 
        title: 'Enter City',
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


    // country

    $('#xeditable-gst').editable({


        type: 'text',
        url: '{{route("update_gst_details")}}',
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
    $('#xeditable-billing_address1').editable({


        type: 'text',
        url: '{{route("update_billing_address1")}}',
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




    $('#xeditable-firstname').editable({
        type: 'text',
        pk: 1, 
        placement: 'right',
        placeholder: 'Required',
        title: 'Enter your firstname',  
        inputclass: 'form-control form-control-sm',
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        }
    });
    $('#xeditable-country').editable({
        prepend: 'not selected',
        type: 'select',
        pk: 1,
        value: '1',
        title: 'India',
        source: [
            {value: 1, text: 'India'},
            {value: 2, text: 'Afghanistan'},
            {value: 3, text: 'Angola'},
            {value: 4, text: 'Africa'},
            {value: 5, text: 'Algeria'},
            {value: 6, text: 'Italy'},
            {value: 7, text: 'United States'},
            {value: 8, text: 'United Kingdom'},
            {value: 9, text: 'Uzbekistan'},
            
        ],
        inputclass: 'form-control form-control-sm',
        display: function(value, sourceData) {
             var colors = {"": "#777777", 1: "#2bcd72", 2: "#4c7cf3"},
                 elem = $.grep(sourceData, function(o){return o.value == value;});
                 
             if(elem.length) {    
                 $(this).text(elem[0].text).css("color", colors[value]); 
             } else {
                 $(this).empty(); 
             }
        }   
    });
    $('#xeditable-status').editable({
          type: 'select',
          pk: 1,
          value: '0',   
          title: 'Select Status',
          inputclass: 'form-control form-control-sm'
    });
    $('#xeditable-dob').editable({
          type: 'combodate',
          pk: 1,
          value: '2018-10-25',
          title: 'Select date',
          format: 'YYYY-MM-DD',    
          viewformat: 'DD.MM.YYYY',    
          template: 'D / MMMM / YYYY',    
          combodate: {
               minYear: 2000,
               maxYear: 2015,
               minuteStep: 1
          },
          inputclass: 'form-control form-control-sm'
     });
     $('#xeditable-event').editable({
        type: 'combodate',
        pk: 1,  
        title: 'Setup event date and time',
        placement: 'right',
        format: 'YYYY-MM-DD HH:mm',    
        viewformat: 'MMM D, YYYY, HH:mm',    
        template: 'D MMM YYYY  HH:mm',
        combodate: {
            firstItem: 'name'
        },
        inputclass: 'form-control form-control-sm'
    });
    $('#xeditable-comments').editable({
        title: 'Enter comments',
        rows: 5,
        inputclass: 'form-control form-control-sm'
    });     
    
});
</script>




@endpush