<x-admin-master>
    @section('content')
        <h1>Create a Subject</h1>
        <form method="POST" action="{{route('subjects.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="title">Subject</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter subject">
            </div>
            <div class="form-group">
                <label for="title">Room</label>
                <input type="text" name="room" class="form-control" id="room" aria-describedby="" placeholder="Enter room">
            </div>
            <div class="form-group"> 
                <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    @endsection
</x-admin-master>