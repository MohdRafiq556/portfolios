<x-home-master>
@section('content')

<!-- Masthead-->
<header class="masthead bg-secondary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-4 img-thumbnail rounded-circle" src="{{asset('landpage/assets/img/rafiq_img.png')}}" alt="100x100" />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Mohd Rafiq</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fa-sharp fa-solid fa-code"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Programmer - Freelancer - Content Creator</p>
    </div>
</header>

        <!-- Portfolio Section-->
        <section class="page-section portfolio" data-aos="fade-top" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fa-sharp fa-solid fa-code"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    @foreach($projects as $project)
                        <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                            <div class="portfolio-item mx-auto py-2 " data-aos="fade-bottom" data-bs-toggle="modal" data-bs-target="#portfolioModal_{{$project->id}}" data-id="{{$project->id}}">
                                <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 bg-secondary">
                                    <div class="portfolio-item-caption-content text-center text-white">
                                        <p class="lead fw-bold">{{$project->title}}</p>
                                        <i class="fas fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                <div class="">
                                    <img class="img-fluid rounded" src="{{asset($project->thumbnail) }}" alt="..." />
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Portfolio Item 2 -->
                    <!-- <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{asset('landpage/assets/img/portfolio/cake.png')}}" alt="..." />
                        </div>
                    </div> -->
                    <!-- Portfolio Item 3 -->
                    <!-- <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{asset('landpage/assets/img/portfolio/circus.png')}}" alt="..." />
                        </div>
                    </div>  -->
                    <!-- Portfolio Item 4-->
                    <!-- <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{asset('landpage/assets/img/portfolio/game.png')}}" alt="..." />
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        @foreach($projects as $project)
        <div class="portfolio-modal modal fade" id="portfolioModal_{{$project->id}}" tabindex="-1" aria-labelledby="portfolioModal_{{$project->id}}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$project->title}}</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fa-sharp fa-solid fa-code"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="{{asset($project->thumbnail) }}" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">{{$project->intro}}</p>
                                    @if(Auth::check())
                                        <a href="{{route('project', $project->id)}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> 
                                            View More
                                        </a>
                                        @else
                                            <a href="{{route('view_project', $project->id)}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                                                View More
                                            </a>
                                    @endif
                                    <button class="btn btn-danger" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        
@endsection
</x-home-master>