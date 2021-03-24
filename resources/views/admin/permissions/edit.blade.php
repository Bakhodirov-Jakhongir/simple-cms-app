<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-6">
                 @if(session()->has('permission-update'))
                    <div class="alert alert-success">{{session('permission-update')}}</div>
                @endif
            <h2>Edit Permission: {{$permissions->name}}</h2>
            <form action="{{route('permissions.update' , $permissions->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$permissions->name}}">
                </div>
            
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection
</x-admin-master>