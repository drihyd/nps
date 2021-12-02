@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12 col-xl-12">
        <!-- Start row -->
        @if(Auth::user()->role==1)
    

@include('admin.dashboard.superadmin_dashboard')

@elseif(Auth::user()->role==2)


@include('admin.dashboard.admin_dashboard')
@elseif(Auth::user()->role==3)

@elseif(Auth::user()->role==4)

@else

@endif
        <!-- End row -->                        
    </div>
    <!-- End col -->                    
    <!-- Start col -->
    
    <!-- End col -->
</div>
@endsection