@php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>{{env('APP_NAME')}} - @yield('title')</title>
      <!-- Fevicon -->
    <link rel="shortcut icon" href="{{URL::to('assets/uploads/'.$theme_options_data->favicon??'')}}">
    <!-- Start css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Switchery css -->
    <link href="{{URL::to('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <!-- RWD Table css -->
    <!-- <link href="assets/plugins/rwd-table-patterns/rwd-table.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Apex css -->
    <link href="{{URL::to('assets/plugins/apexcharts/apexcharts.css')}}" rel="stylesheet">

    <link href="{{URL::to('assets/plugins/datepicker/datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <!-- X-editable css -->
    <link href="assets/plugins/bootstrap-xeditable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
    
    <!-- <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"> -->
    <link href="{{URL::to('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- Slick css -->

    <link href="{{URL::to('assets/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/plugins/slick/slick-theme.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- apex css -->
    <link href="{{URL::to('assets/plugins/apexcharts/apexcharts.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::to('assets/plugins/chartist-js/chartist.min.css')}}">
    <!-- End css -->
     

   </head>
   <body class="vertical-layout">    
    <!-- Start Infobar Setting Sidebar -->
    <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
            <h4>Settings</h4><a href="javascript:void(0)" id="infobar-settings-close" class="infobar-settings-close"><img src="assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close"></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Payment Reminders</h6></div>
                    <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-first" checked /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Stock Updates</h6></div>
                    <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-second" checked /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Open for New Products</h6></div>
                    <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-third" /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Enable SMS</h6></div>
                    <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-fourth" checked /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Newsletter Subscription</h6></div>
                    <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-fifth" checked /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Show Map</h6></div>
                    <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-sixth" /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">e-Statement</h6></div>
                    <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-seventh" checked /></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8"><h6 class="mb-0">Monthly Report</h6></div>
                    <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-eightth" checked /></div>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
    <!-- End Infobar Setting Sidebar -->
    <!-- Start Containerbar -->
    <div id="containerbar">
	
	
	
	<!-- Start Breadcrumbbar -->   
@if(Auth::user()->role==1)	
@include('admin.common_pages.sidebar')
@elseif(Auth::user()->role==2)
@include('admin.common_pages.manager_sidebar')
@elseif(Auth::user()->role==3)
@include('admin.common_pages.user_sidebar')
@elseif(Auth::user()->role==4)
@include('admin.common_pages.user_sidebar')
@else

@endif

<!-- Start Leftbar -->

<!-- End Leftbar -->
<!-- Start Rightbar -->
<div class="rightbar">
<!-- Start Topbar Mobile -->




<!-- Start Breadcrumbbar -->   
@if(Auth::user()->role==1)
	

@include('admin.common_pages.top-nav')
@include('admin.common_pages.breadcrump')

@elseif(Auth::user()->role==2)


@include('admin.common_pages.top-nav')
@include('admin.common_pages.breadcrump_manager')

@elseif(Auth::user()->role==3)

@include('admin.common_pages.top-nav')
@include('admin.common_pages.breadcrump_user')

@elseif(Auth::user()->role==4)

@include('admin.common_pages.top-nav')
@include('admin.common_pages.breadcrump_user')

@else

@endif

			
			
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->    
            <div class="contentbar">                
                <!-- Start row -->
                @yield('content')
                <!-- End row -->
               
            </div>
            <!-- End Contentbar -->
            <!-- Start Footerbar -->
            @include('admin.common_pages.footer-nav')
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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

    <!-- Chart js -->
    <script src="{{URL::to('assets/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/chart.js/chart-bundle.min.js')}}"></script>
    <!-- <script src="{{URL::to('assets/js/custom/custom-chart-chartjs.js')}}"></script>  -->
    
     <!-- X-editable js -->
    <script src="{{URL::to('assets/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{URL::to('assets/js/custom/custom-form-xeditable.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


 <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="https//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Oxygen:300' rel='stylesheet' type='text/css'>

<script src="{{URL::to('assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/apexcharts/irregular-data-series.js')}}"></script>

<script src="{{URL::to('assets/js/custom/custom-dashboard-crypto.js')}}"></script>

<script src="{{URL::to('assets/plugins/d3/d3.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/c3/c3.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/chart.js/chart-bundle.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/chartist-js/chartist.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/chartist-js/chartist-plugin-tooltip.min.js')}}"></script>

@include('admin.common_pages.functions_js')
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

<script type="text/javascript">
    $(document).ready(function() {
    /* -- Table - Datatable -- */
    $('#datatable').DataTable({
      
		"lengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
		"responsive": true
		
    });
    $('#default-datatable').DataTable( {   
       
		"lengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
		"responsive": true
    } );    
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
      
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
		"responsive": true
    });
    table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
	
	
	
	
});
</script>

</body>
</html>