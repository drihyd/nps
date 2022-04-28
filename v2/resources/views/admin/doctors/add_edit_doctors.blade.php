@extends('admin.template_v1')
@if(isset($doctors_data->id))
@section('title', 'Edit Doctor')
@else
@section('title', 'Add Doctor')
@endif
@section('content')
  <div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">@yield('title')</h5>
            </div>
            @include('admin.alerts')
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  @if(isset($doctors_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/doctors/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$doctors_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/doctors/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="admin_user_id" value="{{auth()->user()->id??''}}">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Specifications<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="specification_id" id="specification_id" required="required">
          <option value="">-- Select --</option>
          @foreach($specifications_data as $specification)
            <option value="{{$specification->id}}" {{ old('specification_id',$doctors_data->specification_id??'') == $specification->id ? 'selected':''}}>{{$specification->name??''}}</option>
          @endforeach
              
        </select>
      </div>
          <div class="form-group">
            <label><b>Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="doctor_name" value="{{old('doctor_name',$doctors_data->doctor_name??'')}}" required="required"  />
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/doctors')}}" class="btn btn-default btn-sm">Back</a>

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

 @endpush
 