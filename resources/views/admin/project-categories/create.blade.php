<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>Create Project Category</strong></li>
            </ol>
        </nav>

        <hr>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="card col-xl-6 col-md-9 shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1>Create a <strong>Project Category</strong></h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('project_category.store')}}" method="post">
                            @csrf
                            <div class="form-group card-body">
                                <label for="name">Category:</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Example: E-commerce">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group card-body">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-admin-master>