@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
            	<div>
                <h5 class="card-title">{{$pageTitle??''}}</h5>
                </div>
                @if(!isset($theme_options_data->id))
			<div class="float-right">
			<a href="{{url(Config::get('constants.superadmin').'/theme_options/create')}}" class="btn btn-primary btn-sm ">+ Add</a>
			</div>
			@else
 @endif
            </div>
            <div class="card-body">
            	<div class="row">
		 	<div class="col-sm-6">
		 		<div class="row form-row">
		 			<h4 class="col-auto">Header Logo</h4>
		 			<div class="col">
		 				@if(isset($theme_options_data->header_logo) && !empty($theme_options_data->header_logo)) 
		 				<img src="{{ asset('assets/uploads/' . $theme_options_data->header_logo??'') }}" width="100" />
		 				@else
		 				@endif
		 			</div>
		 		</div><br>
		 		<div class="row form-row">
		 			<h4 class="col-auto">Favicon</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 			<div class="col">
		 				@if(isset($theme_options_data->favicon) && !empty($theme_options_data->favicon)) 
		 				<img src="{{ asset('assets/uploads/' . $theme_options_data->favicon??'') }}" width="50" />
		 				@else
		 				@endif
		 			</div>
		 		</div>						 		
		 	</div>
		 	<div class="col-sm-6">
		 		<div class="row form-row">
		 			<h4 class="col-auto">Copyright</h4>
		 			<div class="col">
		 				{{$theme_options_data->copyright??''}}
		 			</div>
		 		</div>					 		
		 	</div>
		 </div>
                
            </div>
            <div class="card-footer text-right">
        <a href="{{url(Config::get('constants.superadmin').'/theme_options/edit/'.$theme_options_data->id)}}" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
        <a href="{{url(Config::get('constants.superadmin').'/theme_options/delete/'.$theme_options_data->id)}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
    </div>
        </div>

    </div>
    <!-- End col -->
</div>
@endsection