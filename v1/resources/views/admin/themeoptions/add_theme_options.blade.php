@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{$pageTitle??''}}</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  @if(isset($theme_options_data->id))
<form method="POST" class="Addnewblog" action="{{ url(Config::get('constants.superadmin').'/theme_options/update') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$theme_options_data->id}}">
@else
<form method="POST" class="Addnewblog" action="{{ url(Config::get('constants.superadmin').'/theme_options/store') }}" enctype="multipart/form-data">
@endif
      @csrf
      <div class="row">
        <div class="col-sm-5">
      <div class="form-group">
        <label>Header Logo<span style="color: red">*</span></label>       
        <input type="file"  name="header_logo" class="file-input" @if(isset($theme_options_data->header_logo)) @else required @endif  />
      </div>
      <div class="form-group">
        @if(isset($theme_options_data->header_logo) && !empty($theme_options_data->header_logo))
        <img src="{{ asset('assets/uploads/' . $theme_options_data->header_logo) }}" width="100"   />
        @else
        @endif
      </div>
      <div class="form-group">
          <label>Favicon</label>
        <input type="file" name="favicon" class="file-input" @if(isset($theme_options_data->favicon)) @else required @endif>
      </div>
      <div class="form-group">
        
        @if(isset($theme_options_data->favicon) && !empty($theme_options_data->favicon))
        <img src="{{ asset('assets/uploads/' . $theme_options_data->favicon) }}" width="100" />
        @else
        @endif
      </div>
          <div class="form-group">
            <label>Copyright Description<span style="color: red">*</span></label>
            <textarea  name="copyright" id="title" class="form-control" value="" required="required" rows="1">@if(isset($theme_options_data->id)){{$theme_options_data->copyright??''}}@else{{ old('copyright') }}@endif</textarea>
          </div>
          <button  id="" type="submit" class="btn btn-primary submit_btn btn-sm">Submit</button>
          <a href="{{url('admin/theme_options')}}" class="btn btn-danger btn-sm">Back</a>
    </div>
    <div class="col-sm-5">
      </div>
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