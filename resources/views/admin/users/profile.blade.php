<x-admin-master>
        @section('content')
            <h1>User Profile for {{$user->name}}</h1>
            <div class="row">
                <div class="col-sm-6">
                    
                    <form action="{{route('user.profile.update' , $user)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <img class="img-profile rounded-circle" src="{{$user->avatar}}">
                        </div>
                        <div class="form-group">
                            <input type="file" name="avatar" id="avatar">
                        </div>
                       <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" value="{{$user->username}}">
                            @error('username')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" value="{{$user->name}}">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$user->email}}">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirmation">Password Confirmation</label>
                            <input type="text" name="password-confirmation" id="password-confirmation" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}">
                            @error('password_confirmation') 
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td><input type="checkbox"
                                                @foreach($user->roles as $user_role)
                                                    @if($user_role->slug == $role->slug)
                                                        checked
                                                    @endif                                                
                                                @endforeach
                                            ></td>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->slug}}</td>
                                            <td>
                                                <form action="{{route('user.role.attach' , $user)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="role" value="{{$role->id}}">
                                                    <button class="btn btn-primary" 
                                                        @if($user->roles->contains($role))
                                                            disabled
                                                        @endif
                                                    >Attach</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{route('user.role.detach' , $user)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="role" value="{{$role->id}}">
                                                    <button class="btn btn-danger"
                                                    @if(!$user->roles->contains($role))
                                                            disabled
                                                        @endif
                                                    >Detach</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
</x-admin-master>