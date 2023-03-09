<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active"><a href="{{route('roles.index')}}"><strong>All Roles</strong></a></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>{{$role->name}}</strong></li>
            </ol>
        </nav>
        <hr>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-3 card mb-4 shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1>Roles: <strong class="text-muted">{{$role->name}}</strong></h1>
                    </div>
                    @if(session()->has('role-updated'))
                        <div class="alert alert-info">
                            {{session('role-updated')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('roles.update', $role->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}">
                                 <label for="name">Name</label>
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 card mb-4 shadow p-4 bg-body rounded">
                    @if($permissions->isNotEmpty())
                    <div class="card-header">
                        <h1><i class="fas fa-table me-1"></i><strong> Permissions</strong> Table</h1>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
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
                                @foreach($permissions as $permission)
                                <tr>
                                    <td><input type="checkbox" 
                                        @foreach($role->permissions as $role_permission)
                                            @if($role_permission->slug == $permission->slug)
                                                checked
                                            @endif
                                        @endforeach
                                    ></td>
                                    <td>{{$permission->id}}</td> 
                                    <td>{{$permission->name}}</td>    
                                    <td>{{$permission->slug}}</td>    
                                    <td>
                                        <form action="{{route('role.permission.attach', $role)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="permission" value="{{$permission->id}}">
                                            <button type="submit" class="btn btn-primary" 
                                                @if($role->permissions->contains($permission))
                                                    disabled
                                                @endif>
                                                Attach
                                            </button>
                                        </form>
                                    </td>  
                                    <td>
                                        <form action="{{route('role.permission.detach', $role)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="permission" value="{{$permission->id}}">
                                            <button type="submit" class="btn btn-danger" 
                                                @if(!$role->permissions->contains($permission))
                                                    disabled
                                                @endif>
                                                Detach
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-admin-master>