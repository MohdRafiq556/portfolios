<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active"><a href="{{route('project.index')}}"><strong>All Projects</strong></a></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>{{$project->title}}</strong></li>
            </ol>
        </nav>

        <hr>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="card shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1 class="mt-4">Update Project : <strong>{{$project->title}}</strong></h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('project.update', $project->id, ['project_image' => $project_images] )}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Title:</span>
                                        <input name="title" type="text" class="form-control" value="{{$project->title}}" aria-label="title" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" input-group mb-3">
                                        <span class="input-group-text" id="basic-addon2">Author:</span>
                                        <input name="author" type="text" class="form-control" value="{{$project->author}}" aria-label="author" aria-describedby="basic-addon2" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">Links:</span>
                                <input name="links" type="text" class="form-control" value="{{$project->links}}" aria-label="links" aria-describedby="basic-addon3">
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text" for="project_category_id">Category:</label>
                                <select class="form-select" name="project_category_id" id="project_category_id">
                                    <!-- <option value="{{$project->project_category_id}}" disabled selected>{{$project->project_category->name}}</option> -->
                                    @foreach($project_categories as $project_category)
                                        @if($project_category->id == $project->project_category_id)
                                            <option selected value="{{$project_category->id}}">{{$project_category->name}}</option>
                                            @else
                                            <option value="{{$project_category->id}}">{{$project_category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class=" form-floating mb-3">
                                <textarea name="intro" class="form-control" value="{{$project->intro}}" id="intro" cols="30" rows="3" >{{$project->intro}}</textarea>
                                <label for="intro">Intro</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="feature" class="form-control" value="{{$project->feature}}" id="feature" cols="30" rows="3">{{$project->feature}}</textarea>
                                <label for="feature">Features</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea name="language" class="form-control" value="{{$project->language}}" id="language" cols="30" rows="3">{{$project->language}}</textarea>
                                        <label for="language">Programming Languages</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea name="framework" class="form-control" value="{{$project->framework}}" id="framework" cols="30" rows="3">{{$project->framework}}</textarea>
                                        <label for="framework">Framework</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea name="styling" class="form-control" value="{{$project->styling}}" id="styling" cols="30" rows="3">{{$project->styling}}</textarea>
                                        <label for="styling">Styling</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea name="others" class="form-control" value="{{$project->others}}" id="others" cols="30" rows="3">{{$project->others}}</textarea>
                                        <label for="others">Others</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="details" class="form-control" value="{{$project->details}}" id="detaills" cols="30" rows="3">{{$project->details}}</textarea>
                                <label for="detaills">Details</label>
                            </div>

                            <div class="card-header mb-3">
                                <p class="fs-4 text-center"><strong>Thumbnail & Images</strong></p>
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <div class="">
                                    <img class="img-fluid mx-auto d-block border mb-3" src="{{ asset($project->thumbnail) }}" style="max-height:120px; max-width:220px;" alt="" >
                                
                                    <div class="input-group mb-3">
                                        <input name="thumbnail" id="thumbnail" type="file" class="form-control @error('thumbnail') is-invalid @enderror">
                                        <label class="input-group-text" for="thumbnail">Thumbnail</label>
                                    </div>
                                    @error('thumbnail')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>
                            
                            <div class="row mb-3 ">
                                @foreach($project_images as $project_image)
                                <div class="col-md-6">
                                    <img class="img-fluid mx-auto d-block border mb-3" src="{{ asset($project_image->first_image) }}" style="max-height:140px; max-width:280px;" alt="" >
                                
                                    <div class="input-group mb-3 controls">   
                                        <input name="1st_image[ {{$project_image->first_image}} ]" multiple="" type="file" class="form-control @error('1st_image') is-invalid @enderror">
                                        <label class="input-group-text" for="1st_image">1st Image</label>
                                        <div class="row" id="preview_img"></div>       
                                    </div>
                                    @error('1st_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endforeach

                                @foreach($project_images as $project_image)
                                <div class="col-md-6">
                                    <img class="img-fluid mx-auto d-block border mb-3" src="{{ asset($project_image->second_image) }}" style="max-height:140px; max-width:280px;" alt="" >    

                                    <div class="input-group mb-3 controls">
                                        <input name="2nd_image[ {{$project_image->second_image}} ]" multiple="" type="file" class="form-control @error('2nd_image') is-invalid @enderror">          
                                        <label class="input-group-text" for="2nd_image">2nd Image</label> 
                                        <div class="row" id="preview_img"></div>
                                    </div>
                                    @error('2nd_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endforeach
                            </div>
                            
                            <hr>

                            <div class="row mb-3">
                                @foreach($project_images as $project_image)
                                <div class="col-md-6 ">
                                    <img class="img-fluid mx-auto d-block border mb-3" src="{{ asset($project_image->third_image) }}" style="max-height:140px; max-width:280px;" alt="" >
                                    
                                    <div class="input-group mb-3 controls">
                                        <input name="3rd_image[ {{$project_image->third_image}} ]" multiple="" type="file" class="form-control @error('3rd_image') is-invalid @enderror">
                                        <label class="input-group-text" for="3rd_image">3rd Image:</label>
                                        <div class="row" id="preview_img"></div>
                                    </div>
                                    @error('3rd_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endforeach

                                @foreach($project_images as $project_image)
                                <div class="col-md-6">
                                    <img class="img-fluid mx-auto d-block border mb-3" src="{{ asset($project_image->fourth_image) }}" style="max-height:140px; max-width:280px;" alt="" >
                                    
                                    <div class="input-group mb-3 controls">
                                        <input name="4th_image[ {{$project_image->fourth_image}} ]" multiple="" type="file" class="form-control @error('4th_image') is-invalid @enderror">
                                        <label class="input-group-text" for="4th_image">4th Image:</label>
                                        <div class="row" id="preview_img"></div>
                                    </div>
                                    @error('4th_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endforeach
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