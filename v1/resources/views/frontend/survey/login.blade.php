@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')




	
	
       
			
			
<div class="formify_right_fullwidth d-flex align-items-center justify-content-center">
<div class="formify_box formify_box_checkbox background-white">
<div class="formify_header">
<h4 class="form_title">Login</h4>
<!-- <p>To improve your experiences, can you please help us by answering these simple questions in the survey</p> -->
<div class="border ml-0"></div>
</div>
<form action="{{ route('login.verification') }}" class="signup_form" method="post">

@csrf
 
<div class="box_info">


<div class="container">
  <div class="row">
    <div class="col-sm-12 p-0 m-0">
     <div class="form-group">
          <input type="email" name="email" class="form-control" id="username" placeholder="Enter Email" required data-parsley-type="email">
      </div>
      <div class="form-group">
          <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
      </div>
      </div>
      <button type="submit" class="btn thm_btn next_tab text-transform-inherit">Next</button>
</div>


</form>

</div>

</div>
    
   


@endsection

@push('scripts')


@endpush