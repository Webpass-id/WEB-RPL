<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>RPL - SMK PKP 1 JIS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="style/bootsrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="style/style.css" rel="stylesheet" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border" style="width: 3rem; height: 3rem" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <!-- <h2 class="m-0 ">
          <i class="fa fa-book me-3"></i>eLEARNING
        </h2> -->
            <img src="assets/img/pkp-logo.png" style="width: 100px; height: 100px" alt="PKP - LOGO" />
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link">Materi</a>
                <a href="courses.html" class="nav-item nav-link">Activity</a>
                <a href="courses.html" class="nav-item nav-link">Teacher</a>
                <a href="courses.html" class="nav-item nav-link">Student</a>
            </div>
            <div class="buttonlogin">
                <a href="user" class="btn py-4 px-lg-5 d-none d-lg-block"><i class="user bx bx-user-circle"
                        style="font-size: 35px"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-5">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/carousel/1.png" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="assets/img/carousel/1.png" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="assets/img/carousel/1.png" class="d-block w-100" alt="..." />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3">MATERI</h6>
                <h1 class="mb-5">Teaching Materials</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <!-- <i class="fa fa-3x fa-graduation-cap mb-4"></i> -->
                            <i class="bx bxl-html5 mb-4" style="font-size: 40px"></i>
                            <i class="bx bxl-css3 mb-4" style="font-size: 40px"></i>
                            <i class="bx bxl-javascript mb-4" style="font-size: 40px"></i>

                            <h5 class="mb-3">Front End</h5>
                            <p>
                                Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                                amet diam
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="bx bxl-javascript mb-4" style="font-size: 40px"></i>
                            <i class="bx bxl-python mb-4" style="font-size: 40px"></i>
                            <i class="bx bxl-nodejs mb-4" style="font-size: 40px"></i>

                            <h5 class="mb-3">Back End</h5>
                            <p>
                                Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                                amet diam
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="bx bxl-figma mb-4" style="font-size: 40px"></i>
                            <i class="bx bxl-adobe mb-4" style="font-size: 40px"></i>
                            <h5 class="mb-3">UI / UX</h5>
                            <p>
                                Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                                amet diam
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="bx bx-brain mb-4" style="font-size: 40px"></i>
                            <i class="bx bx-money-withdraw mb-4" style="font-size: 40px"></i>
                            <h5 class="mb-3">Entrepreneurship</h5>
                            <p>
                                Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                                amet diam
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3 mb-2">ACTIVITY</h6>
                <h1 class="mb-5">Our Activities</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="assets/img/activity/kls6.jpg" alt="" />
                                <!-- <div
                    class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                    style="margin: 1px"
                  >
                    <h5 class="m-0">Web Design</h5>
                    <small class="">49 Courses</small>
                  </div> -->
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="assets/img/activity/kls5.jpg" alt="" />
                                <!-- <div
                    class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                    style="margin: 1px"
                  >
                    <h5 class="m-0">Graphic Design</h5>
                    <small class="">49 Courses</small>
                  </div> -->
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="assets/img/activity/kls2.jpg" alt="" />
                                <!-- <div
                    class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                    style="margin: 1px"
                  >
                    <h5 class="m-0">Video Editing</h5>
                    <small class="">49 Courses</small>
                  </div> -->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 340px">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="assets/img/activity/kls1.jpg" alt=""
                            style="object-fit: cover" />
                        <!-- <div
                class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                style="margin: 1px"
              >
                <h5 class="m-0">Online Marketing</h5>
                <small class="">49 Courses</small>
              </div> -->
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->

    <!-- Teacher Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Menggunakan 'justify-content-center' untuk memposisikan guru di tengah -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="assets/img/teacher/teacher-1.jpg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Nova Kasyfurrahman</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="assets/img/teacher/teacher-2.png" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Hadis Nur Islam</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="assets/img/teacher/teacher-3.jpg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Afif Syarifudin</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Teacher end -->

    <!-- ==========================================================================================================
    ===============================================================================================================
    ===============================================================================================================
    ===============================================================================================================
    STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT 
    STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT 
    STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT 
    ===============================================================================================================
    ===============================================================================================================
    ===============================================================================================================
    =========================================================================================================== -->
    <!-- Student Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="assets/img/team/frhn.jpg"
                        style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Student End -->
    <!-- ==========================================================================================================
    ===============================================================================================================
    ===============================================================================================================
    ===============================================================================================================
    STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT 
    STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT 
    STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT STUDENT STUDENT STUDENT STUDENR STUDENT 
    ===============================================================================================================
    ===============================================================================================================
    ===============================================================================================================
    =========================================================================================================== -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2">
                        <i class="fa fa-map-marker-alt me-3"></i>SMK PKP 1 JAKARTA, Kota
                        Jakarta Timur, Daerah Khusus Ibukota Jakarta 13730
                    </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>()</p>
                    <p class="mb-2">
                        <i class="fa fa-envelope me-3"></i>info@example.com
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Pratner Industri</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/img/sponsor/axioo.png" alt="" />
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/img/sponsor/intel.png" alt="" />
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/img/sponsor/sit.png" alt="" />
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/img/sponsor/tvone.png" alt="" />
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/img/sponsor/seagate.png" alt="" />
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="assets/img/sponsor/tvri.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">RPL Official Website</a>,
                        All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By
                        <a class="border-bottom" href="http:// webpass.my.id">webpass</a><br /><br />
                        <!-- Distributed By -->
                        <!-- <a class="border-bottom" href="https://themewagon.com"
                >ThemeWagon</a
              > -->
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>