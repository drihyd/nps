@php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	
	
      <!-- Fevicon -->
    <link rel="shortcut icon" href="{{URL::to('assets/uploads/'.$theme_options_data->favicon??'')}}">
	
    <!-- Bootstrap CSS -->
  <!-- Start css -->
   <!-- Start css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Switchery css -->
    <link href="{{URL::to('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"><!-- 
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Apex css -->
    <link href="{{URL::to('assets/plugins/apexcharts/apexcharts.css')}}" rel="stylesheet">

    <link href="{{URL::to('assets/plugins/datepicker/datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <!-- X-editable css -->
    <link href="assets/plugins/bootstrap-xeditable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Slick css -->

    <link href="{{URL::to('assets/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/plugins/slick/slick-theme.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- End css -->
	
	
    <!-- Frontend css -->
    <link href="{{URL::to('assets/css/frontend/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/css/frontend/responsive.css')}}" rel="stylesheet">

   <title>{{env('APP_NAME')}} - @yield('title')</title>

</head>

<body>



 <div class="body_wrapper frm-vh-md-100">

<div class="formify_body formify_signup_fullwidth formify_signup_fullwidth_two d-flex">
<div class="formify_left_fullwidth formify_left_top_logo frm-vh-md-100 d-flex align-items-center justify-content-center" data-bg-color="#FFEFF9">

@if(Auth::check())
<a href="index.html" class="top_logo"><img src="{{URL::to('assets/img/frontend/logo.png')}}" alt=""></a>


                          
                     
@else	
@endif
<img class="img-fluid" src="{{URL::to('assets/img/frontend/personal_img.png')}}" alt="">
</div>
 
 @if(Auth::check())
<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




@else	
@endif
 
     @yield('content')
	 
	  </div>
	 </div>
	

  <!-- Start js --> 
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <!-- <script src="{{URL::to('assets/js/jquery.min.js')}}"></script> -->
    <script src="{{URL::to('assets/js/popper.min.js')}}"></script>
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('assets/js/modernizr.min.js')}}"></script>
    <script src="{{URL::to('assets/js/detect.js')}}"></script>
    <script src="{{URL::to('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{URL::to('assets/js/vertical-menu.js')}}"></script>
    <!-- Switchery js -->
    <script src="{{URL::to('assets/plugins/switchery/switchery.min.js')}}"></script>
    
    <script src="{{URL::to('assets/js/custom/custom-switchery.js')}}"></script>
    <!-- Apex js -->
    <script src="{{URL::to('assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/apexcharts/irregular-data-series.js')}}"></script>    
    <!-- Slick js -->
    <script src="{{URL::to('assets/plugins/slick/slick.min.js')}}"></script>
    <!-- Custom Dashboard js -->   
    <script src="{{URL::to('assets/js/custom/custom-dashboard.js')}}"></script>
    <!-- Core js -->
    <!-- RWD Table js -->
    <!-- <script src="{{URL::to('assets/plugins/rwd-table-patterns/rwd-table.min.js')}}"></script>     
    <script src="{{URL::to('assets/js/custom/custom-table-rwd.js')}}"></script>  -->   
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
     <!-- Core js -->
    <script src="{{URL::to('assets/js/core.js')}}"></script>
    <!-- Form Step js -->
    <script src="{{URL::to('assets/plugins/jquery-step/jquery.steps.min.js')}}"></script>
    <script src="{{URL::to('assets/js/custom/custom-form-wizard.js')}}"></script>
    <!-- Datepicker JS -->
    <script src="{{URL::to('assets/plugins/datepicker/datepicker.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/datepicker/i18n/datepicker.en.js')}}"></script>
    <script src="{{URL::to('assets/js/custom/custom-form-datepicker.js')}}"></script>
    <!-- Parsley js -->
    <!-- <script src="{{URL::to('assets/plugins/validatejs/validate.min.js')}}"></script> -->
    <!-- Validate js -->
    
     <!-- X-editable js -->
    <script src="{{URL::to('assets/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{URL::to('assets/js/custom/custom-form-xeditable.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script src="{{URL::to('assets/js/frontend/main.js')}}"></script>

  <!-- End js -->
    @stack('scripts')
    <script>
  $('form').parsley();
</script>
    <script>
  @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('message') }}");
  @endif
  
    @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.warning("{{ session('warning') }}");
  @endif
  
  

  
</script>
</body>
</html>