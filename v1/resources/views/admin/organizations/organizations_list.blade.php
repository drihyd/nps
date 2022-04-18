@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
<div class="row">

                    <div class="col-md-10">
                        <div class="mailbox mb-5">
                            <div class="message-center message-body row">
                                <!-- Message -->          
                                @foreach($data as $organization)           
                                <div class="col-12 col-md-6 mb-4">
                                    <div class="card rounded-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="{{url(Config::get('constants.superadmin').'/organizations/edit/'.Crypt::encryptString($organization->id) )}}" class="message-item border-0">                                            
                                            <span class="user-img">
                                                @if(isset($organization->brand_logo) && !empty($organization->brand_logo))
                                                <img src="{{URL::to('assets/uploads/'.$organization->brand_logo??'')}}" alt="" class="rounded-circle">
                                                @else
                                                    <img src="{{URL::to('assets/img/dummylogo.png')}}" alt="" class="rounded-circle">
                                                @endif  
                                            </span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">{{$organization->short_name??''}}</h5> <span class="mail-desc text-muted">{{$organization->company_name??''}}</span> </span>
                                        </a>
                                            </div>
                                
                                        </div>
                                        
                                           
                                    </div>
                                </div>
                                @endforeach
                                <!-- Message -->
                                

                            </div>
                        </div>
                    </div>
                </div>
@endsection
@push('scripts')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('organizations_lists.index') }}",
        columns: [
            {data: 'short_name', name: 'short_name'},
            {data: 'entity_group', name: 'entity_group'},
            {data: 'city', name: 'city'},          
            {data: 'license_startdate', name: 'license_startdate'},
            // {data: 'license_startdate', name: 'license_startdate'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    
    
  });
</script>
@endpush