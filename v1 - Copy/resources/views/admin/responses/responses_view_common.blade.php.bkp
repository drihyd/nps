
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Response from {{Str::title($person_data->firstname??'')}} on {{date('F j, Y', strtotime($person_data->created_at??''));}}</h4>
               
            </div>
            <div class="card-body">
                @foreach($person_responses_data as $person_response)

                <b>{{$loop->iteration}}) {{ Str::replace('*teamname*', $person_response->option_value??'', $person_response->question_label??'') }}</b>&ensp;&nbsp;
                @if($person_response->answeredby_person == '')
                <p>A) {{Str::title($person_response->option_value??'')}}</p>
                @else
                    <p>A) {{Str::title($person_response->answeredby_person??'')}}</p>
                @endif
                <br>
                @endforeach
            </div>
        </div>
