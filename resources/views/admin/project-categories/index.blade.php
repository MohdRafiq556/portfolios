<x-admin-master>
@section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>All Categories</strong></li>
            </ol>
        </nav>

        <hr>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="card mb-4 shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1><i class="fas fa-table me-1"></i> All Project Categories</h1>
                    </div>
                    @if(session('project-category-deleted-message'))
                        <div class="card-body alert alert-danger"><strong>{{session('project-category-deleted-message')}} </strong></div>
                    @elseif(session('project-category-created-message'))
                        <div class="card-body alert alert-success">
                            <strong>{{session('project-category-created-message')}}</strong>
                        </div>
                    @elseif(session('project-category-updated-message'))
                        <div class="card-body alert alert-success">
                            <strong>{{session('project-category-updated-message')}}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($project_categories as $project_category)
                                <tr>
                                    <!-- <td>{{$i++}}</td> -->
                                    <td>{{ $project_categories->firstItem()+$loop->index }}</td>
                                    <td><a class="btn btn-block" href="{{route('project_category.edit', $project_category->id)}}">{{$project_category->name}}</a></td>
                                    <td>{{$project_category->created_at->diffForHumans()}}</td>
                                    <td>
                                        <form method="post" action="{{route('project_category.destroy', $project_category->id)}}" enctype="multipart/form-data">
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
            {!! $project_categories->links() !!}
        </div>
    </div>
                        
@endsection
</x-admin-master>