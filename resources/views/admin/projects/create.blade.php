<x-admin-master>
    @section('content')

    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4 fs-5">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><strong>Dashboard</a></strong></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>Create Project</strong></li>
            </ol>
        </nav>

        <hr>

        <div class="container-fluid px-4">
            <div class="row">
                <div class="card shadow p-4 bg-body rounded">
                    <div class="card-header">
                        <h1 class="mt-4">Create a <strong>Project</strong></h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('project.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="title" type="text" id="title" class="form-control @error('title') is-invalid @enderror">
                                        <label for="title">Name:</label>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="author" id="author" value="@if(Auth::check()){{auth()->user()->name}}@endif" type="text" class="form-control @error('author') is-invalid @enderror">
                                        <label for="author">Author:</label>
                                        @error('author')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-floating mb-3">
                                        <input name="links" id="links" type="text" class="form-control @error('links') is-invalid @enderror">
                                        <label for="links">Links:</label>
                                        @error('links')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control @error('project_category_id') is-invalid @enderror" name="project_category_id" id="project_category_id">
                                            <option value="option_select" disabled selected>Select Category</option>
                                            @foreach($project_categories as $project_category)
                                                <option value="{{$project_category->id}}">{{$project_category->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="project_category_id">Category:</label>
                                        @error('project_category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">                               
                                <textarea id="intro" name="intro" class="form-control @error('intro') is-invalid @enderror" cols="30" rows="4"></textarea>
                                <label for="intro">Introduction:</label>
                                @error('intro')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">                               
                                        <textarea id="feature" style="white-space: pre-wrap;" name="feature" class="form-control @error('feature') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                                        <label for="feature">Extra Features:</label>
                                        @error('feature')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">                               
                                        <textarea id="framework" style="white-space: pre-wrap;" name="framework" class="form-control @error('framework') is-invalid @enderror" cols="30" rows="2"></textarea>
                                        <label for="framework">Framework:</label>
                                        @error('framework')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea id="language" style="white-space: pre-wrap;" name="language" class="form-control @error('language') is-invalid @enderror" cols="30" rows="2"></textarea>
                                        <label for="language">Programming Languages:</label>
                                        @error('language')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea id="styling" style="white-space: pre-wrap;" name="styling" class="form-control @error('styling') is-invalid @enderror" cols="30" rows="2"></textarea>
                                        <label for="styling">Styling:</label>
                                        @error('styling')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea id="others" style="white-space: pre-wrap;" name="others" class="form-control @error('others') is-invalid @enderror" cols="30" rows="2"></textarea>
                                        <label for="others">Others:</label>
                                        @error('others')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea id="details" style="white-space: pre-wrap;" name="details" class="form-control @error('details') is-invalid @enderror" cols="30" rows="4"></textarea>
                                        <label for="details">Details:</label>
                                        @error('details')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-group mb-3"> 
                                    <input name="thumbnail" id="projectImg" onChange="mainThumUrl(this)" type="file" class="form-control @error('thumbnail') is-invalid @enderror">
                                    <label for="thumbnail" class="input-group-text">Thumbnail:</label>
                                </div>
                                @error('thumbnail')
                                    <div class="alert alert-danger">{{ $message }}</div>     
                                @enderror
                            </div>
                            

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input name="1st_image[]" id="projectImg" multiple="" type="file" class="form-control @error('1st_image') is-invalid @enderror">
                                        <label class="input-group-text" for="1st_image">1st Images:</label>
                                        @error('1st_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input name="2nd_image[]" multiple="" type="file" class="form-control @error('2nd_image') is-invalid @enderror">
                                        <label class="input-group-text" for="2nd_image">2nd Images:</label>
                                        @error('2nd_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input name="3rd_image[]" multiple="" type="file" class="form-control @error('3rd_image') is-invalid @enderror">
                                        <label class="input-group-text" for="3rd_image">3rd Images:</label>
                                        @error('3rd_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input name="4th_image[]" multiple="" type="file" class="form-control @error('4th_image') is-invalid @enderror">
                                        <label class="input-group-text" for="4th_image">4th Images:</label>
                                        @error('4th_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group card-body">
                                <button type="submit" class="btn btn-primary btn-lg">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Multi Images Javascript Code -->
    <script type="text/javascript">
        $(document).ready(function(){
        $('#projectImg').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                        .height(80); //create image element 
                            $('#preview_img').append(img); //append image to output element
                        };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
                
            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
        });
    </script>
    <!-- End Code For Show Multi Images Javascript -->

    <script type="text/javascript">
        function ex() {
  const text = document.getElementById("textareaDesc").value;
  const ss = document.getElementById("Desc");
  ss.textContent = text;
}
    </script>

    <script type="text/javascript">
        function mainThumUrl(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThumb').attr('src',e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    @endsection
</x-admin-master>