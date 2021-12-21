<div class="card m-b-30">
    <div class="card-header">                                
        <div class="row align-items-center">
            <div class="col-7">
                <h5 class="card-title mb-0">Recent Activity</h5>
            </div>
            <!-- <div class="col-5">
                <button class="btn btn-secondary-rgba float-right font-13">View All</button>
            </div> -->
        </div>
    </div>
    <div class="card-body">
        <div class="activities-history">
            @foreach($person_responses_status_data as $person_responses_status)
            <div class="activities-history-list">
                <div class="activities-history-item">

                    @if($person_responses_status->ticket_status=="opened")
                    <h6 class="badge badge-danger">{{$person_responses_status->ticket_status}}</h6>
                    @elseif($person_responses_status->ticket_status=="completed")
                    <h6 class="badge badge-success">{{$person_responses_status->ticket_status}}</h6>
                    @else
                    <h6 class="badge badge-primary">{{$person_responses_status->ticket_status}}</h6>
                    @endif                                            
                    
                    <p class="mb-0">{{ date('G:i A.', strtotime($person_responses_status->created_at??'')) }} - {{date('F j, Y', strtotime($person_responses_status->created_at??''))}}</p>
                </div>
            </div>
            @endforeach
            <!-- <div class="activities-history-list">
                <div class="activities-history-item">
                    <h6>Received confirmation from marketing manager.</h6>
                    <p class="mb-0">11:00 AM - 3 Oct, 2019</p>
                </div>
            </div>
            <div class="activities-history-list">
                <div class="activities-history-item">
                    <h6>Zoe Updated quick start guide for development process.</h6>
                    <p class="mb-0">09:25 PM - 27 Sep, 2019</p>
                </div>
            </div> -->
        </div>
    </div>
</div>