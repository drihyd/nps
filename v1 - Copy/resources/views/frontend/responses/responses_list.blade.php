@extends('frontend.template_v1')
@section('title', 'Survey users')
@section('content')




	
	
       
			
			
<div class="" style="">

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




@include('frontend.common_pages.nav')
	

	
	


<div class="formify_box formify_box_checkbox background-white" style="max-width:620px;">
<div class="formify_header">
<h4 class="form_title">@yield('title')</h4>
<div class="border ml-0"></div>
</div>
<div class="tab-content" id="myTabContent">


 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">
	
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="" style="background:#ffeff9;">
                    <tr>
                        <!-- <th>S.No</th> -->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Score</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($responses_data as $response)  
                          <tr>
                              <td>{{Str::title($response->firstname??'')}}</td>
                              <td>{{$response->email??''}}</td>
                              <td>{{$response->mobile??''}}</td>
                              <td>{{$response->gender??''}}</td>
                              <td>{{$response->qoptions[0]['answer']??0}}</td>
                              <td>{{date('F j, Y', strtotime($response->created_at??''))}}</td>
                              <td>             
							  <a href="{{url('user/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url('user/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
            <a href="{{url('user/survey')}}" class="btn thm_btn next_tab text-transform-inherit mt-3">Back to Start Survey</a>
			
			</div>





</div>




</div>


</div>

</div>

</div>
    
   


@endsection

@push('scripts')


@endpush