<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>All Users</strong></li>
            </ol>
        </nav>
        <hr>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="card mb-4 shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1><i class="fas fa-table me-1"></i> All Users</h1>
                    </div>
                    @if(session('user-deleted-message'))
                        <div class="card-body alert alert-danger">{{session('user-deleted-message')}}</div>
                    @elseif(session('project-created-message'))
                        <div class="card-body alert alert-success">{{session('project-created-message')}}</div>
                    @elseif(session('project-updated-message'))
                        <div class="card-body alert alert-success">{{session('project-updated-message')}}</div>
                    @endif
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <!-- <th>Owner</th> -->
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Registered Date</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <!-- <th>Owner</th> -->
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Registered Date</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($users as $user)
                                <tr>
                                    <!-- <td>{{ $i++ }}</td> -->
                                    <td>{{ $users->firstItem()+$loop->index }}</td>
                                    <td><a class="btn btn-block" href="{{route('user.profile.show', $user->id)}}">{{$user->name}}</a></td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <form method="post" action="{{route('users.destroy', $user->id)}}" enctype="multipart/form-data">
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
        <!-- {{-- Pagination --}} -->
        <div class="d-flex justify-content-center mx-auto">
            {!! $users->links() !!}
        </div>
    </div>          

    @endsection
</x-admin-master>