<x-admin-master>
    @section('content')
        <h1>Create a Post</h1>
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="post_image" class="form-control-file" id="post_image" aria-describedby="" >
            </div>
            <div class="form-group"> 
                <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    @endsection
</x-admin-master>