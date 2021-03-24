<x-admin-master>
    @section('content') 
        <h1>All Subjects</h1>
          @if(Session::has('message'))
            <div class="alert alert-danger">{{Session::get('message')}}</div>
            @elseif(session('created-post-message')) 
            <div class="alert alert-success">{{session('created-subject-message')}}</div> 
            @elseif(session('post-updated-message'))
            <div class="alert alert-success">{{session('subject-updated-message')}}</div>  
          @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Tutor</th>
                      <th>Subject</th>
                      <th>Room</th>
                      <th>Description</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Tutor</th>
                      <th>Subject</th>
                      <th>Room</th>
                      <th>Description</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{$subject->id}}</td>
                        <td>{{$subject->user->name}}</td>
                        <td><a href="{{route('subjects.edit' , $subject->id)}}">{{$subject->subject}}</a></td>
                        <td>{{$subject->room}}</td>
                        <td>
                            <textarea name="description" id="description" cols="30" rows="10">{{$subject->description}}</textarea>
                        </td>
                        <td>{{$subject->created_at->diffForHumans()}}</td>
                        <td>{{$subject->updated_at->diffForHumans()}}</td>
                        <td>
                        <form method="post" action="{{route('subjects.destroy' , $subject->id)}}" enctype="multipart/form-data">
                              @csrf 
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
        
          
      
    @endsection
      
    @section('scripts')
              <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
 
            <!-- Page level custom scripts -->
            <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->

    @endsection
</x-admin-master>