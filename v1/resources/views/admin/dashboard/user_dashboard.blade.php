
        <!-- Start row -->
        <div class="row">
            <!-- <div class="col-lg-4 col-xl-4">
                <a href="{{url(Config::get('constants.admin').'/departments')}}">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Total number of Departments</p>
                            <h5 class="mb-0">{{$all_admin_departments??''}}</h5>                      
                        </div>
                    </div>
                    </div>
        </div>
        </a>
    </div> -->
            <!-- <div class="col-lg-4 col-xl-4">
                <a href="{{url(Config::get('constants.admin').'/users')}}">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Customers</p>
                            <h5 class="mb-0">{{$all_admin_users??''}}</h5>                      
                        </div>
                    </div>
                    </div>
        </div>

                    </a>
    </div> -->
            
    <div class="col-lg-4 col-xl-4">
        <a href="{{url(Config::get('constants.user').'/responses')}}">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Customers Survey</p>
                            <h5 class="mb-0">{{$all_admin_surveys??''}}</h5>                      
                        </div>
                    </div>
                    </div>
        </div>
                    </a>
    </div>
</div>
           <div class="row"> 
    <div class="clearfix"></div>
    <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Net Promoter Score</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-doughnut-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
            
    <div class="col-lg-6 col-xl-6">
        <div class="card m-b-30" style="min-height:200px">
            <!-- <div class="card-header">                                
                <h5 class="card-title mb-0">Validity</h5>
            </div> -->
            <div class="card-body text-center">
                <div class="course-slider">
                    <div class="course-slider-item">
                        <h4 class="my-0 pull-left">Net Promoter Score</h4>
                        <div class="clearfix"></div>
                        <div class="row align-items-center my-4 py-3">
                            <div class="col-4 py-3 bg-danger-rgba rounded">
                                <h4 class="text-danger">{{$final_score->Promoters??''}}</h4>
                                <p class="text-danger mb-0">Promoters</p>
                            </div>
                            <div class="col-4 py-3 px-0">
                                <h4 class="text-warning">{{$final_score->Neutral??''}}</h4>
                                <p class="text-warning mb-0">Neutral</p>
                            </div>
                            <div class="col-4 p-0">
                                <h4>{{$final_score->Detractors??''}}</h4>
                                <p class="mb-0">Detractors</p>
                            </div>
                        </div>
                        
                        <!-- <div class="row align-items-center">
                            <div class="col-4 text-center">
                               <button class="btn btn-danger">Send Alert</button>
                            </div>
                            <div class="col-4 text-center">
                                <button class="btn btn-warning">Send Alert</button>
                            </div>
                            <div class="col-4 text-center">
                                <button class="btn btn-dark">Send Alert</button>
                            </div>
                        </div> -->
                    </div>
                    
                    
                </div>                                        
            </div>
        </div>
    </div>
            
    </div>
        <!-- End row --> 