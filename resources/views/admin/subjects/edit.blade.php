<x-admin-master>
    @section('content')
        <h1>Edit the {{$subject->subject}}</h1>
        <form method="post" action="{{route('subjects.update' , $subject->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject" value="{{$subject->subject}}" aria-describedby="" placeholder="Enter subject">
            </div>
            <div class="form-group">
                 <label for="subject">Room</label>
                <input type="text" name="room" class="form-control" id="room" value="{{$subject->room}}" aria-describedby="" placeholder="Enter subject">
            </div>
            <div class="form-group"> 
                <textarea name="description" class="form-control" id="body" cols="30" rows="10">{{$subject->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    @endsection
</x-admin-master>