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
                            <div class="col-4 py-3 px-0  success-rgba text-success">
                                <h4 class="text-danger">{{$final_score->Promoters??''}}</h4>
                                <p class="text-danger mb-0">Promoters</p>
                            </div>
							
							
							 <div class="col-4 py-3 px-0 danger-rgba text-danger">
                                <h4>{{$final_score->Detractors??''}}</h4>
                                <p class="mb-0">Detractors</p>
                            </div>
							
                            <div class="col-4 py-3 px-0 primary-rgba text-primary">
                                <h4 class="text-warning">{{$final_score->Neutral??''}}</h4>
                                <p class="text-warning mb-0">Neutral</p>
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