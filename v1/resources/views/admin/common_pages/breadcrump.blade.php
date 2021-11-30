<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">SuperAdmin - Dashboard</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item" active aria-current="page"><a href="#">{{$pageTitle??''}}</a></li>
                                
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        @if (isset($addlink))
                        <div class="widgetbar">
                            <a href="{{$addlink??''}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>ADD</a>
                        </div> 
                        @else

                        &nbsp;
                        @endif                     
                    </div>
                </div>          
            </div>