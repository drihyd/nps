@extends('admin.template_v1')
@if(isset($questions_data->id))
@section('title', 'Edit a Designation')
@else
@section('title', 'Add a Designation')
@endif
@section('content')
  <div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
              @include('admin.alerts')
              <div class="row">

                <div class="col-sm-12">
                  @if(isset($group_level_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/designation_roles/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$group_level_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/designation_roles/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Parent Level<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="designation_id" id="designation" required="required">
          <option value="">-- Select --</option>
          @foreach($designations_data as $key => $designation)
            <option value="{{$designation->id}}" {{ old('designation_id',$group_level_data->designation_id??'') == $designation->id ? 'selected':''}}>{{$designation->name??''}}</option>
          @endforeach
              
        </select>
      </div>
      <div class="form-group">
      <label for="designation_level">Sub level:</label>
      <select name="designation_role_id" id="designation_level" class="form-control"></select>
    </div>
          <div class="form-group">
            <label><b>Name</b><span style="color: red;">*</span><small>(Example: Manager)</small></label>
            <input type="text" class="form-control" name="role_name" value="{{old('role_name',$group_level_data->role_name??'')}}" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i"/>
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/designation_roles')}}" class="btn btn-danger btn-sm">Back</a>

        </div>
        <div class="col-md-5">
          
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
<script type=text/javascript>
  $('#designation').change(function(){
  var designationID = $(this).val(); 
  // alert(designationID);
  if(designationID){
    $.ajax({
      type:"GET",
      url:"{{url('admin/getrole_level')}}?designation_id="+designationID,
      success:function(res){        
      if(res){
        $("#designation_level").empty();
        $("#designation_level").append('<option>Select Level</option>');
        $.each(res,function(key,value){
          $("#designation_level").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#designation_level").empty();
      }
      }
    });
  }else{
    $("#designation_level").empty();
  }   
  });
 </script> 
 @endpush
 