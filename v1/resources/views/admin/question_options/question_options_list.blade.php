@extends('admin.template_v1')
@section('title', 'Questions Options')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
			<form class="table-filter form-inline mb-4" action="{{route('filter.questions_options')}}" method="post">
@csrf
@include('admin.common_pages.surveys',['quetion'=>$quetion??''])
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/questions_options')}}">Clear filter</a>
@else
<a href="{{url(Config::get('constants.user').'/questions_options')}}">Clear filter</a>
@endif
@else
<a href="#">
@endif

</div>




</form>
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Question</th>
                        <th>Option Value</th>
                        <!-- <th>Is Active</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($questions_options_data as $question)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{Str::title($question->question_label??'')}}</td>
                              <td>{{Str::title($question->option_value??'')}}</td>
                              <!-- <td>{{$question->active??''}}</td> -->
                              
                           
                              
                              <td>
							  
							  <a href="{{url(Config::get('constants.admin').'/questions_options/edit/'.Crypt::encryptString($question->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/questions_options/delete/'.Crypt::encryptString($question->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
			
			</div>
        </div>
      </div>
</div>
</div>
        @endsection



