@extends('admin.template_v1')
@section('title', $pageTitle??'')
@section('content')
<div class="row">
<!-- Start col -->
<div class="col-lg-12 col-xl-12">
<!-- Start row -->
@include('admin.dashboard.admin_dashboard')
<!-- End row -->                        
</div>
<!-- End col -->                    

</div>
@endsection