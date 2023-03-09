<x-home-master>
@section('content')

    <section class="portfolio" id="portfolio">
        
        <!-- Start Project Images -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                @foreach($project_images as $project_image)
                <div class="carousel-item active">
                    <img src="{{asset($project_image->first_image) }}" class="d-block img-fluid" style="max-height:640px; min-width:100%;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-uppercase font-weight-bold fs-5 lead text-dark">{{$project->title}}</h5>
                        <p class="font-weight-bold fs-6 lead text-dark">{{$project->project_category->name}}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset($project_image->second_image) }}" class="d-block img-fluid" style="max-height:640px; min-width:100%;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset($project_image->third_image) }}" class="d-block img-fluid" style="max-height:640px; min-width:100%;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset($project_image->fourth_image) }}" class="d-block img-fluid" style="max-height:640px; min-width:100%;" alt="...">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- End Project Images -->

        <div class="page-section-heading">
            <div class="container">
                <!-- Start Project Title -->
                <div class="masthead-heading">
                    <div class="mt-3">
                        <h1 class="text-uppercase mb-0">{{$project->title}}</h1>
                    </div>

                    <div class="row px-4 py-2">
                        <div class="col-md-3">
                            <p class="mb-0 fs-6"><i class="fa-sharp fa-solid fa-tags"></i>  {{$project->project_category->name}}</p>
                        </div>

                        <div class="col-md-3">  
                            <p class="mb-0 fs-6"><i class="fa-sharp fa-solid fa-clock"></i>  {{$project->created_at->diffForHumans()}}</p>
                        </div>

                        <div class="col-md-3">
                            <p class="mb-0 text-uppercase fs-6"><i class="fa-sharp fa-solid fa-user-large"></i>  {{$project->user->name}}</p>
                        </div>

                    </div>
                </div>
                <!-- End Project Title -->

                <!-- Start Project Links -->
                <div class="container page-section-heading ">
                    <div class="row">
                        <div class="my-3 ">
                            <a class="fs-5" href="{{$project->links}}" target="_blank"><strong><i class="fa-solid fa-link"></i>  {{$project->links}}</strong></a>
                        </div>
                    </div>
                </div>
                <!-- Start Project Links -->

                <div class="carousel">
                    <div class="row mb-3">
                        
                        <!-- Start Project Features -->
                        <div class="col-lg-8 mb-lg-0 mb-3" data-aos="fade-right">
                            <div class="card shadow bg-body rounded">
                                <div class="card-body ">
                                    <div class="card-header">
                                        <h5 class="card-title fs-5"><i class="fa-sharp fa-solid fa-rectangle-list"></i>  Features:</h5>
                                    </div>
                                    <p class="card-text mt-2 px-4 fs-6" style="white-space: pre-line" id="Desc" >{{$project->feature}}</p>
                                        
                                    <div class="card-header">
                                        <h5 class="card-title fs-5"><i class="fa-sharp fa-solid fa-circle-info"></i>  Details:</h5>
                                    </div>
                                    <p class="card-text mt-2 px-4 fs-6" style="white-space: pre-line" id="Desc" >{{$project->details}}</p>
                                        
                                    <div class="card-header">
                                        <h5 class="card-title fs-5"><i class="fa-sharp fa-solid fa-database"></i> Others:</h5>
                                    </div>
                                    <p class="card-text mt-2 px-4 fs-6" style="white-space: pre-line" id="Desc">{{$project->others}}</p>  
                                </div>
                            </div>
                        </div>
                        <!-- End Project Features -->

                        <!-- Start Project Framework -->
                        <div class=" col-lg-4 mb-lg-0 mb-3" data-aos="fade-right">
                            <div class="card shadow  bg-body rounded">
                                <div class="card-body ">
                                    <div class="card-header">
                                        <h5 class="card-title fs-5"><i class="fa-sharp fa-solid fa-folder-open"></i>  Framework:</h5>
                                    </div>
                                    <p class="card-text mt-2 px-4 fs-6" style="white-space: pre-line" id="Desc" >{{$project->framework}}</p>
                                        
                                    <div class="card-header">
                                        <h5 class="card-title fs-5"><i class="fa-sharp fa-solid fa-code"></i>  Programming Languages:</h5>
                                    </div>
                                    <p class="card-text mt-2 px-4 fs-6" style="white-space: pre-line" id="Desc" >{{$project->language}}</p>
                                        
                                    <div class="card-header">
                                        <h5 class="card-title fs-5"><i class="fa-sharp fa-solid fa-icons"></i>  Website Styling:</h5>
                                    </div>
                                    <p class="card-text mt-2 px-4 fs-6" style="white-space: pre-line" id="Desc" >{{$project->styling}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Project Framework -->

                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
</x-home-master>