
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <p class="nps-score-div"><span class="nps-score">{{$person_responses_data[0]->option_value??''}}</span><br> NPS Score</p>
                    </div>
                    <div class="col-9 nps-score-details">
                        <p><strong>{{Str::title($person_data->firstname??'')}}</strong></p>
                        <p>{{$person_data->email??''}}</p>
                        <p>{{$person_data->mobile??''}}</p>
                        <p class="mt-3">Feedback Date: {{date('F j, Y', strtotime($person_data->created_at??''));}}</p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h4>Areas of Improvement</h4>
                    <table class="responses-table">
                        <tbody>
                            @foreach($person_responses_data as $person_response)
                            <tr>
                                <td><b>{{Str::title($person_response->option_value??'')}}</b></td>
                                <td>too</td>
                                <td>{{Str::title($person_response->answeredby_person??'')}}</td>
                            </tr>
                             @endforeach
                            <!-- <tr>
                                <td><b>House Keeping</b></td>
                                <td>Room Cleanliness</td>
                                <td></td>
                            </tr> -->
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
