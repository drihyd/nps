
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Score</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($responses_data as $response)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{Str::title($response->firstname??'')}}</td>
                              <td>{{$response->email??''}}</td>
                              <td>{{$response->mobile??''}}</td>
                              <td>{{$response->qoptions[0]['answer']??0}}</td>
                              <td>{{date('F j, Y', strtotime($response->created_at??''))}}</td>
                              <td>             
							  <a href="{{url(Config::get('constants.admin').'/responses/view/'.Crypt::encryptString($response->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-eye"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/responses/delete/'.Crypt::encryptString($response->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
			
			</div>



