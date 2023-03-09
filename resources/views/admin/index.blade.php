<x-admin-master>
    @section('content')

@if(auth()->user()->userHasRole('Admin'))
    <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>  
        @else 
            <div class="container-fluid px-4">
                <div class="row ">
                    <div class="d-flex justify-content-center mb-4">
                        @if(Auth::check())
                            <h1 class="mt-4"><em><strong>{{auth()->user()->name}}'s </strong></em><small class="text-muted">Dashboard</small></h1>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="card shadow p-3 mb-4 bg-body rounded">
                            <div class="card-body">
                                <div class="px-5 mb-3 text-center">
                                    <h4 class="text-uppercase fs-3 card-header mb-2"><i class="fa-sharp fa-solid fa-id-card"></i> About</h4>
                                    <div class="col-md-6 offset-md-3"><p class="lead">My Name is <strong>Mohd Rafiq Bin Misyam.</strong> I am a fresh graduate from <em>University Tun Hussein Onn Malaysia (UTHM)</em> with Bachelor of Degree in Information Technology (IT) with honours.</p></div>
                                    <div class="col-md-6 offset-md-3"><p class="lead">During my studies, I have been exposed to different types of challenges and gained knowledge as much as possible and developed the skills to compete with others.</p></div>
                                    <div class="col-md-6 offset-md-3">
                                        <a class="btn btn-xl btn-outline-dark" href="{{asset('landpage/assets/resume/rafiq_resume.pdf')}}" download="Resume_Mohd_Rafiq">
                                            <i class="fas fa-download me-2"></i>Download My Resume!
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <a class="btn btn-primary btn-block btn-lg shadow p-3 bg-body-rounded" href="{{route('home')}}">Back To Portfolio!</a>                
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card shadow p-3 mb-5 bg-body rounded ">
                            <div class="card-body">
                                <div class="px-5 mb-4 text-center ">
                                    <h4 class="text-uppercase fs-3 card-header mb-2"><i class="fa-sharp fa-solid fa-location-dot"></i> Location</h4>
                                    <h4 class="text-muted">Segamat, Johor.</h4>
                                    <h4 class="text-muted"><strong>Malaysia.</strong></h4>
                                </div>
                            </div>
                        </div> 
                        
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="px-5 mb-4 text-center ">
                                    <h4 class="text-uppercase fs-3 card-header mb-2 "><i class="fa-sharp fa-solid fa-address-card"></i> Social Media</h4>                               
                                    <a class="btn btn-outline-dark btn-social mx-1 " href="https://web.facebook.com/profile.php?id=100019647697800" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-dark btn-social mx-1 " href="https://github.com/MohdRafiq556" target="_blank"><i class="fab fa-fw fa-twitter"></i></a>
                                    <a class="btn btn-outline-dark btn-social mx-1 " href="https://www.linkedin.com/in/mohdrafiqmisyam/" target="_blank"><i class="fab fa-fw fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        @endif             
    @endsection
</x-admin-master>