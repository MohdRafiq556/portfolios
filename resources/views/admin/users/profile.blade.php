<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>Profile</strong></li>
            </ol>
        </nav>

        <hr>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="card shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1 class="mt-4"><strong class="text-uppercase">{{$user->name}}</strong><small class="text-muted"> Profile</small></h1>
                    </div>
                    @if(session('profile-updated-message'))
                        <div class=" alert alert-success">{{session('profile-updated-message')}}</div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('user.profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                            <input type="hidden" name="old_avatar" value="{{$user->avatar}}">

                            <div class="mb-3 d-flex justify-content-center">
                                <div class="">
                                    <img class="border rounded mb-3 mx-auto d-block" height="240px" width="240px" style="max-height:240px; max-width:240px;" src="{{ asset($user->avatar) }}" alt="">
                                    <div class="input-group mb-3">
                                        <input type="file" id="avatar" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                                        <label class="input-group-text" for="avatar">Avatar</label>
                                    </div>
                                    @error('avatar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input value="{{$user->username}}" id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror">
                                        <label for="username">Username:</label>
                                        @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input value="{{$user->name}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                                        <label for="name">Name:</label>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input value="{{$user->email}}" type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                <label for="email">Email:</label>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                        <label for="password">Password:</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password_confirmation" id="password-confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                        <label for="password-confirmation">Confirm Password:</label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->userHasRole('Admin'))
    <div class="container-fluid px-4">
        <hr>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="card shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        For <strong>Administrator</strong> User Only (Users Table)
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @php($i = 1)
                            @foreach($roles as $role)
                                <tr>
                                    <td>
                                        <input type="checkbox" 
                                        @foreach($user->roles as $user_role)
                                            @if($user_role->slug == $role->slug)
                                                checked
                                            @endif
                                        @endforeach
                                            ></td>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>
                                        <form method="post" action="{{route('user.role.attach', $user)}}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button type="submit" class="btn btn-primary @if($user->roles->contains($role)) disabled @endif">Attach</button>
                                        </form>      
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('user.role.detach', $user)}}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button type="submit" class="btn btn-danger @if(!$user->roles->contains($role)) disabled @endif">Detach</button>
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
    </div>
    @endif

    @endsection
</x-admin-master>