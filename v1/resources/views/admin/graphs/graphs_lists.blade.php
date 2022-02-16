@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-lg-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-header">                                
                <div class="row align-items-center">
                    <div class="col-9">
                        <h5 class="card-title mb-0">Investment Stack Currency Wise</h5>
                    </div>
                    <div class="col-3">
                        <div class="dropdown">
                            <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetPatientTypes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetPatientTypes">
                                <a class="dropdown-item font-13" href="#">Refresh</a>
                                <a class="dropdown-item font-13" href="#">Export</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-0 pl-0">
                <div id="apex-stacked-chart"></div>
            </div>
        </div>
    </div>
</div>
@endsection

