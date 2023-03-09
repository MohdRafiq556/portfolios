<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Portfolio - Mohd Rafiq</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('landpage/assets/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('landpage/css/styles.css')}}" rel="stylesheet" />

        <!-- Animations Fade top -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"/>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- Animations Fade top -->

        <style>
            #btn-back-to-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                display: none;
            }
        </style>

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">Mohd Rafiq</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-secondary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- About Section-->
        <section class="page-section bg-secondary text-white mb-0" data-aos="fade-top" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fa-sharp fa-solid fa-code"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="text-center lead">My Name is Mohd Rafiq Bin Misyam. I am a fresh graduate from University Tun Hussein Onn Malaysia (UTHM) with Bachelor of Degree in Information Technology (IT) with honours.</p></div>
                    <div class="col-lg-4 me-auto"><p class="text-center lead">During my studies, I have been exposed to different types of challenges and gained knowledge as much as possible and developed the skills to compete with others.</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="{{asset('landpage/assets/resume/rafiq_resume.pdf')}}" download="Resume_Mohd_Rafiq">
                        <i class="fas fa-download me-2"></i>
                        Download My Resume!
                    </a>
                </div>
            </div>
        </section>

        <!-- Contact Section-->
        <section class="page-section" data-aos="fade-bottom" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fa-sharp fa-solid fa-code"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer text-center" data-aos="fade-top">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4 text-white-50"><i class="fa-sharp fa-solid fa-location-dot"></i> Location</h4>
                        <p class="lead mb-0">
                            Segamat, Johor.
                            <br />
                            Malaysia.
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0 text-white-50">
                        <h4 class="text-uppercase mb-4"><i class="fa-sharp fa-solid fa-address-card"></i> Social Media</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://web.facebook.com/profile.php?id=100019647697800" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/MohdRafiq556" target="_blank"><i class="fa-brands fa-github"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.linkedin.com/in/mohdrafiqmisyam/" target="_blank"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4 text-white-50"><i class="fa-sharp fa-solid fa-user"></i> Portfolio</h4>
                        @if(Auth::check())
                            <a class="nav-link text-white" href="{{route('admin.index')}}"><p class="lead mb-0">Admin</p></a>
                        @else
                            <a class="nav-link text-white" href="/login"><p class="lead mb-0">Mohd Rafiq</p></a>
                        @endif
                    </div>
                </div>
            </div>
        </footer>

        <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top" >
            <i class="fas fa-arrow-up"></i>
        </button>
        
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white bg-dark">
            <div class="container"><small>Copyright &copy; Portfolio - Mohd Rafiq 2022</small></div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('landpage/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <!-- Button Go Up -->
        <script>
            //Get the button
            let mybutton = document.getElementById("btn-back-to-top");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
            scrollFunction();
            };

            function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }
            // When the user clicks on the button, scroll to the top of the document
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- Button Go Up -->

        <!-- Animations Fade top -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            AOS.init();
        </script>
        <!-- Animations Fade top -->

    </body>
</html>
