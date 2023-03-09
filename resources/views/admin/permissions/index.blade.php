<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>All Permissions</strong></li>
            </ol>
        </nav>

        <hr>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-3 card mb-4 shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1>Create a <strong>Permission</strong></h1>
                    </div>
                    @if(session()->has('permission-created'))
                        <div class="alert alert-success">
                            {{session('permission-created')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('permissions.store')}}" method="post">
                        @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Example: Create Project">
                                <label for="name">Permission's Name</label>
                                <div>
                                    @error('name')
                                        <span><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 card mb-4 shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1><i class="fas fa-table me-1"></i> All Permissions</h1>
                    </div>
                    @if(session()->has('permission-deleted'))
                        <div class="alert alert-danger">
                            {{session('permission-deleted')}}
                        </div>
                    @elseif(session()->has('permission-updated'))
                        <div class="alert alert-success">
                            {{session('permission-updated')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php($i = 1)
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a class="btn btn-block" href="{{route('permissions.edit', $permission->id)}}">{{$permission->name}}</a></td>
                                    <td>{{$permission->slug}}</td>
                                    <td>
                                        <form action="{{route('permissions.destroy', $permission->id)}}" method="post">
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
        </div>
    </div>

    @endsection
</x-admin-master>