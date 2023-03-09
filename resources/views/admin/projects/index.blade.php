<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>All Projects</strong></li>
            </ol>
        </nav>

        <hr>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="card mb-4 shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1><i class="fas fa-table me-1"></i> All Projects</h1>
                    </div>
                    @if(session('project-deleted-message'))
                        <div class="card-body alert alert-danger">{{session('project-deleted-message')}}</div>
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
                                    <th>Title</th>
                                    <th>Links</th>
                                    <th>Category</th>
                                    <th>Images</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <!-- <th>Owner</th> -->
                                    <th>Title</th>
                                    <th>Links</th>
                                    <th>Category</th>
                                    <th>Images</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($projects as $project)
                                <tr>
                                    <!-- <td>{{ $i++ }}</td> -->
                                    <td>    {{ $projects->firstItem()+$loop->index }}</td>
                                    <!-- <td>{{$project->user->name}}</td> -->
                                    <td><a class="btn btn-block" href="{{route('project.edit', $project->id)}}">{{$project->title}}</a></td>
                                    <td><a target="__blank" href="{{$project->links}}">{{$project->links}}</a></td>
                                    <td>{{$project->project_category->name}}</td>
                                    <td><img height="60px" width="60px" src="{{asset($project->thumbnail)}}" alt=""></td>
                                    <td>
                                        <form method="post" action="{{route('project.destroy', $project->id)}}" enctype="multipart/form-data">
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
            {!! $projects->links() !!}
        </div>
    </div>
                        
    @endsection
</x-admin-master>