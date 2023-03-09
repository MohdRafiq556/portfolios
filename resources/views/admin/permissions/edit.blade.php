<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}"><strong>All Permissions</strong></a></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>{{$permission->name}}</strong></li>
            </ol>
        </nav>
        <hr>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="card col-xl-6 col-md-9 shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1>Edit Permission: <strong class="text-muted">{{$permission->name}}</strong></h1>
                    </div>
                    @if(session()->has('permission-updated'))
                        <div class="alert alert-info">
                            {{session('permission-updated')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('permissions.update', $permission->id)}}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="name" value="{{$permission->name}}" class="form-control" placeholder="Example: Create Project">
                                <label for="name">Name</label>
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

    @endsection
</x-admin-master>