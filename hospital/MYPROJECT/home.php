<!-- configure file 
 <?php
include_once('../hms/admin/include/config.php');

?>-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>

    <link rel="stylesheet" href="style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&display=swap"
        rel="stylesheet">


</head>

<body>
    <nav class="navbar navbar-expand-xl bg-white shadow-sm sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fs-2 fw-bold" href="#">
                Medi<span class="text-info fw-semibold">Hub</span>
            </a>

            <!-- Hamburger Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-3 me-5">
                    <li class="nav-item"><a class="nav-link text-info active" href="#Home">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#About">About</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#Departments">Departments</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#Services">Services</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#Doctor">Doctors</a></li>
                    <!-- <li class="nav-item"><a class="nav-link text-dark" href="#">More Pages</a></li> -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-bs-toggle="dropdown">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item"><a class="nav-link text-dark" href="contact.html">Contact</a></li> -->
                </ul>
                <!-- Appointment Button -->
                <a href="../hms/admin/index.php" class="btn btn-info px-4 text-white ms-lg-5">Register Now</a>
            </div>
        </div>
    </nav>

<section id="Home">
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6 text-center mb-4 position-relative shifted">
                    <img src="images/staff-1.webp" alt="Doctor" class="doctor_img   ">

                    <div class="info-card position-absolute top-0 start-0 m-3 d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill text-info fs-4"></i>
                        <div>
                            <small class="d-block text-muted">24/7 Emergency</small>
                            <strong>+91 98765 43210</strong>
                        </div>
                    </div>

                    <div class="info-card info-card2 position-absolute mb-3 d-flex justify-content-between w-80">
                        <div class="text-center px-3">
                            <h5 class="mb-0 text-info fw-bold fs-3">25K+</h5>
                            <small class="text-muted fs-6">Patients Treated</small>
                        </div>
                        <div class="text-center px-3">
                            <h5 class="mb-0 text-success   fw-bold fs-3">98%</h5>
                            <small class="text-muted fs-6">Satisfaction Rate</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="badge bg-info text-dark mb-3 px-4 py-2 fs-6 rounded-pill">
                        TRUSTED HEALTHCARE PROVIDER
                    </span>

                    <h1 class="fw-bold display-5 mb-3">
                        Excellence in Medical Care Since 1985
                    </h1>

                    <p class="text-muted fs-5 mb-4">
                        Established in 1985, our healthcare center stands as a symbol of trust, excellence, and
                        innovation. With state-of-the-art facilities, highly qualified specialists, and a patient-first
                        philosophy, we strive to deliver the highest standard of medical care that exceeds expectations
                        and enhances lives every day.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-4 col-md-3">
                            <div class="bg-light rounded-4 p-3 text-center shadow h-100">
                                <i class="bi bi-award text-info fs-2 mb-2 d-block"></i>
                                <h5 class="fw-bold mb-1">35+</h5>
                                <small class="text-muted">Years Experience</small>
                            </div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="bg-light rounded-4 p-3 text-center shadow h-100">
                                <i class="bi bi-people text-info fs-2 mb-2"></i>
                                <h5 class="fw-bold mb-1">150+</h5>
                                <small class="text-muted">Medical Specialists</small>
                            </div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="bg-light rounded-4 p-3 text-center shadow h-100">
                                <i class="bi bi-geo-alt text-info fs-2 mb-2"></i>
                                <h5 class="fw-bold mb-1">12</h5>
                                <small class="text-muted">Clinic Locations</small>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="d-flex gap-3">
                        <a href="#" class="btn btn-info text-white fw-bold px-4 py-2 rounded-3 shadow-sm">
                            Schedule Consultation
                        </a>
                        <a href="#" class="btn btn-outline-dark px-4 py-2 rounded-3">
                            <i class="bi bi-play-circle me-2"></i> Watch Our Story
                        </a>
                    </div> -->

                    <div class="container">
                        <div class="row service-row mt-3">
                            <div class="col-md-auto">
                                <div class="service-box">
                                    <i class="bi bi-calendar-check"></i>
                                    <span>Find Available Times</span>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="service-box">
                                    <i class="bi bi-chat-dots"></i>
                                    <span>Chat with Support</span>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="service-box">
                                    <i class="bi bi-file-earmark-medical"></i>
                                    <span>Patient Portal</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-5 mb-5">
                    <h1 class="display-5 fw-semibold mb-4 custom-text">Excellence in Healthcare Since 1985</h1>
                    <p class="text-muted fs-5">We are committed to providing world-class medical care through</p>
                    <p class="text-muted fs-5">innovation, compassion, and unwavering dedication to our</p>
                    <p class="text-muted fs-5">patients' wellbeing and recovery.</p>
                </div>
            </div>

            <div class="container mb-5">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 mb-3 col-sm-12 image-large">
                        <div class="image-card">
                            <img src="images/facilities-6.webp" alt="facilities" class="rounded-4 img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-6">
                                <div class="image-card">
                                    <img src="images/consultation-3.webp" alt="consultation"
                                        class="img-fluid rounded-4">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 mb-3">
                                <div class="image-card">
                                    <img src="images/surgery-2.webp" alt="surgery" class="img-fluid rounded-4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-md-3">
                        <div class="info-box mb-4">
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi bi-heart-pulse text-info fs-2"></i>
                                <div>
                                    <h5 class="fw-bold">Patient-Centered Approach</h5>
                                    <p class="text-muted">Every treatment plan is carefully customized to meet
                                        individual
                                        patient needs and medical history.</p>
                                </div>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-4 ms-2">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-3"></i>Advanced diagnostic
                                technology and imaging</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-3"></i>Board-certified
                                physicians
                                and specialists</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-3"></i>Comprehensive
                                rehabilitation
                                programs</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-3"></i>24/7 emergency and
                                critical
                                care services</li>
                        </ul>

                        <div class="d-flex align-items-center mb-4 gap-5 ms-2">
                            <div class="align-items-center d-flex flex-column">
                                <h1 class="text-info fw-normal mb-0">98%</h1>
                                <small class="text-muted fs-6">Patient Satisfaction</small>
                            </div>
                            <div class="align-items-center d-flex flex-column">
                                <h1 class="text-info fw-normal mb-0">35K+</h1>
                                <small class="text-muted fs-6">Lives Improved</small>
                            </div>
                        </div>

                        <!-- <div class="d-flex gap-3 mb-4 ms-2">
                            <a href="#" class="btn btn-info text-white fw-bold px-4">Explore Our Services</a>
                            <a href="#" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-telephone me-2"></i> Schedule Consultation
                            </a>
                        </div> -->

                    </div>
                </div>
            </div>
    </section>

    <section id="Departments">
    <section class="featured-departments">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1>Featured Departments</h1>
                    <p class="text-muted mt-2 mb-5">Explore our key departments that provide specialized care with
                        advanced technology and expert medical professionals dedicated to your health and well-being.
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row align-items-center my-4">
                <div class="col-lg-6 mb-4 mt-4">
                    <h6 class="text-uppercase text-info fw-bold mb-4" style="letter-spacing: 1px;">Emergency Medicine
                    </h6>
                    <h2 class="fw-bold mt-2 mb-4">24/7 Emergency Care Services</h2>
                    <p class="mb-4 lh-md">Our 24/7 Emergency Department is always ready to provide immediate medical
                        attention for accidents, critical illnesses, and urgent care needs. A team of skilled doctors
                        and nurses ensures quick, life-saving treatment around the clock.</p>
                    <ul class="list-unstyled mt-4 mb-4">
                        <li class="mb-3"><i class="bi bi-check-circle-fill me-3"></i>24/7 Emergency Response</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill me-3"></i>Advanced Life Support</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill me-3"></i>Trauma Care Specialists</li>
                    </ul>

                    <a href="#" class="learn-more mt-2 mb-3">Learn More </a>
                </div>

                <div class="col-lg-6 services-img">
                    <div class="image-card">
                        <img src="images/emergency-3.webp" alt="emergency-3" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card service-card1 h-100">
                        <div class="icon-circle">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <div class="card-content text-start mt-2">
                            <h5 class="fs-3">Cardiology</h5>
                            <p class="text-muted mb-3">Comprehensive heart care with advanced diagnostics and expert
                                cardiac specialists ensuring healthier hearts.</p>
                        </div>
                        <div class="row stats text-start mt-4">
                            <div class="col-6">
                                <strong class="d-block fs-4">15+</strong>
                                <small class="text-muted">SPECIALISTS</small>
                            </div>
                            <div class="col-6">
                                <strong class="d-block fs-4">500+</strong>
                                <small class="text-muted">PROCEDURES</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card service-card1 h-100">
                        <div class="icon-circle">
                            <i class="fa-solid fa-brain"></i>
                        </div>
                        <div class="card-content text-start mt-2">
                            <h5 class="fs-3">Neurology</h5>
                            <p class="text-muted mb-3">Specialized treatment for brain and nervous system disorders with
                                modern diagnostic and therapeutic methods.</p>
                        </div>
                        <div class="row stats text-start mt-4">
                            <div class="col-6">
                                <strong class="d-block fs-4">8+</strong>
                                <small class="text-muted">SPECIALISTS</small>
                            </div>
                            <div class="col-6">
                                <strong class="d-block fs-4">200+</strong>
                                <small class="text-muted">TREATMENTS</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card service-card1 h-100">
                        <div class="icon-circle">
                            <i class="bi bi-scissors"></i>
                        </div>
                        <div class="card-content text-start mt-2">
                            <h5 class="fs-3">Surgery</h5>
                            <p class="text-muted mb-3">Expert surgical care using modern techniques and state-of-the-art
                                facilities for safe and effective procedures across multiple specialties.</p>
                        </div>
                        <div class="row stats text-start mt-4">
                            <div class="col-6">
                                <strong class="d-block fs-4">12+</strong>
                                <small class="text-muted">SURGEONS</small>
                            </div>
                            <div class="col-6">
                                <strong class="d-block fs-4">1000+</strong>
                                <small class="text-muted">OPERATIONS</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card1 h-100">
                        <div class="icon-circle">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div class="card-content text-start mt-2">
                            <h5 class="fs-3">Pediatrics</h5>
                            <p class="text-muted mb-3">Compassionate healthcare for infants, children, and adolescents
                                focusing on growth and wellness.</p>
                        </div>
                        <div class="row stats text-start mt-4">
                            <div class="col-6">
                                <strong class="d-block fs-4">10+</strong>
                                <small class="text-muted">PEDIATRICIANS</small>
                            </div>
                            <div class="col-6">
                                <strong class="d-block fs-4">2000+</strong>
                                <small class="text-muted">YOUNG PATIENTS</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card1 h-100">
                        <div class="icon-circle">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="card-content text-start mt-2">
                            <h5 class="fs-3">Ophthalmology</h5>
                            <p class="text-muted mb-3">Advanced eye care services including laser treatments, cataract
                                surgery, and vision correction.</p>
                        </div>
                        <div class="row stats text-start mt-4">
                            <div class="col-6">
                                <strong class="d-block fs-4">6+</strong>
                                <small class="text-muted">EYE DOCTORS</small>
                            </div>
                            <div class="col-6">
                                <strong class="d-block fs-4">800+</strong>
                                <small class="text-muted">EYE EXAMS</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card1 h-100">
                        <div class="icon-circle">
                            <i class="fas fa-band-aid"></i>
                        </div>
                        <div class="card-content text-start mt-2">
                            <h5 class="fs-3">Dermatology</h5>
                            <p class="text-muted mb-3">Comprehensive skin, hair, and nail care with advanced treatments
                                for acne, allergies, infections, and cosmetic concerns..</p>
                        </div>
                        <div class="row stats text-start mt-4">
                            <div class="col-6">
                                <strong class="d-block fs-4">7+</strong>
                                <small class="text-muted">DERMATOLOGIST</small>
                            </div>
                            <div class="col-6">
                                <strong class="d-block fs-4">600+</strong>
                                <small class="text-muted">SKIN TREATMENTS</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container py-2">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="department-all">
                        <div class="department-content">
                            <h3 class="mb-4">Explore all Our Medical Departments</h3>
                            <p>Our hospital offers a wide array of medical departments, ensuring high-quality,
                                compassionate care for every patient. Experience healthcare excellence across all
                                specialties.
                            <p class="mb-2">Explore all our medical departments and access expert care across every
                                specialty.</p>
                            </p>
                            <a href="#" class="btn btn-info text-light p-3 rounded-11">View All Departments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
</section>

    <section id="Services">
    <section class="featured-services">
        <div class="container">
            <div class="row text-center mt-5">
                <div class="col-lg-12">
                    <h1>Featured Services</h1>
                    <p class="text-muted mt-2 mb-5">Discover our featured services designed to provide advanced,
                        compassionate, and comprehensive healthcare.</p>
                </div>
            </div>
        </div>

        <div class="container py-3">
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6">
                    <div class="card service-card2 h-100">
                        <div class="service-img">
                            <img src="images/cardiology-2.webp" alt="Cardiology">
                            <div class="icon-badge">
                                <i class="bi bi-heart-pulse text-white"></i>
                            </div>
                        </div>
                        <div class="service-body mt-3">
                            <h5>Cardiology Excellence</h5>
                            <p>Our Cardiology department provides advanced heart care with modern diagnostics and
                                treatment options.
                                We manage conditions such as heart disease, arrhythmia, and hypertension with expert
                                cardiologists..</p>
                            <a href="#" class="learn-more">Learn More </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card2 h-100">
                        <div class="service-img">
                            <img src="images/neurology-3.webp" alt="Cardiology">
                            <div class="icon-badge">
                                <i class="fa-solid fa-brain text-white"></i>
                            </div>
                        </div>
                        <div class="service-body mt-3">
                            <h5>Neurology Care</h5>
                            <p>Specialized care for brain, spine, and nervous system disorders.
                                We offer treatment for stroke, epilepsy, migraines, and neurodegenerative conditions.
                                Our neurologists use advanced technology for accurate diagnosis and effective therapies.
                            </p>
                            <a href="#" class="learn-more">Learn More </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card2 h-100">
                        <div class="service-img">
                            <img src="images/orthopedics-1.webp" alt="Cardiology">
                            <div class="icon-badge">
                                <i class="fas fa-bone text-white"></i>
                            </div>
                        </div>
                        <div class="service-body mt-3">
                            <h5>Orthopedic Surgery</h5>
                            <p>Comprehensive care for bones, joints, and musculoskeletal injuries.
                                Services include trauma management, joint replacement, and minimally invasive surgeries.
                                We focus on restoring mobility, reducing pain, and improving overall function.</p>
                            <a href="#" class="learn-more">Learn More </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card2 h-100">
                        <div class="service-img">
                            <img src="images/pediatrics-4.webp" alt="Cardiology">
                            <div class="icon-badge">
                                <i class="fas fa-baby text-white"></i>
                            </div>
                        </div>
                        <div class="service-body mt-3">
                            <h5>Pediatric Care</h5>
                            <p>Dedicated healthcare for infants, children, and adolescents.
                                We provide preventive checkups, immunizations, and treatment for childhood illnesses.
                                Our pediatricians focus on growth, development, and the overall well-being of every
                                child.</p>
                            <a href="#" class="learn-more">Learn More </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card2 h-100">
                        <div class="service-img">
                            <img src="images/oncology-2.webp" alt="Cardiology">
                            <div class="icon-badge">
                                <i class="fas fa-ribbon text-white"></i>
                            </div>
                        </div>
                        <div class="service-body mt-3">
                            <h5>Oncology Treatment</h5>
                            <p>Expert cancer care including early detection, chemotherapy, radiotherapy, and surgery.
                                We offer personalized treatment plans with a multidisciplinary team approach.
                                Our focus is on improving patient outcomes while providing compassionate support.</p>
                            <a href="#" class="learn-more">Learn More </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card service-card2 h-100">
                        <div class="service-img">
                            <img src="images/laboratory-3.webp" alt="Cardiology">
                            <div class="icon-badge">
                                <i class="fas fa-flask text-white"></i>
                            </div>
                        </div>
                        <div class="service-body mt-3">
                            <h5>Surgery Services</h5>
                            <p>Comprehensive surgical care with advanced technology and expert surgeons. We provide
                                general, laparoscopic, orthopedic, and cosmetic surgeries in a safe, sterile
                                environment. Our focus is on precision, patient safety, and faster recovery.</p>
                            <a href="#" class="learn-more">Learn More </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<section id="Doctor">
    <section class="find-a-doctor">
        <div class="container">
            <div class="row text-center my-5">
                <div class="col-lg-12">
                    <h2>Find A Doctor</h2>
                    <p class="text-muted mt-2 mb-5">Easily search and connect with our expert doctors across all
                        specialties for personalized care.</p>
                </div>
            </div>
        </div>

        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="search-header">
                        <h2 class="fw-bold">Discover Your Ideal Medical Specialist</h2>
                        <p class="fs-6 text-muted">Connect with our network of certified healthcare professionals across
                            all medical disciplines</p>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="container my-5">
            <div class="search-box">
                <form>
                    <div class="row g-3 align-items-end">

                        <div class="col-md-4">
                            <label class="fw-semibold fs-6 mb-2">Practitioner Name</label>
                            <div class="input-icon">
                                <i class="bi bi-search"></i>
                                <input type="text" class="form-control" placeholder="Search by name...">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="fw-semibold fs-6 mb-2">Medical Specialty</label>
                            <div class="input-icon">
                                <i class="bi bi-plus-lg"></i>
                                <select class="form-control">
                                    <option>Select specialty</option>
                                    <option>Cardiovascular Medicine</option>
                                    <option>Neurological Sciences</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="fw-semibold fs-6 mb-2">Location</label>
                            <div class="input-icon">
                                <i class="bi bi-geo-alt"></i>
                                <select class="form-control">
                                    <option>All locations</option>
                                    <option>Ahmedabad</option>
                                    <option>Mumbai</option>
                                    <option>Delhi</option>
                                    <option>Bangalore</option>
                                    <option>Jaipur</option>
                                    <option>Bhopal</option>
                                    <option>Patna</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-12 d-flex justify-content-center">
                            <button type="submit" class="btn-search">
                                <i class="bi bi-arrow-right text-white"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div> -->

        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="doctor-card h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="position-relative">
                                <img src="images/staff-8.webp" class="doctor-img me-3 img-fluid rounded-4">
                                <div class="badge active-class text-bg-success text-success rounded-circle">1</div>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Dr. Rajesh Nair</h5>

                                <div>
                                    <span class="badge bg-info text-dark mb-2 me-1">MD, FACC</span>
                                    <span class="text-muted">18 years</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <span class="text-warning">★★★★★</span>
                            <span class="fw-bold ms-2">4.9</span>
                            <small class="text-muted ms-2">(142 patients)</small>
                        </div>
                        <h4 class="text-muted">Senior Cardiologist</h4>
                        <!-- <div class="d-flex justify-content-start mt-3 gap-2">
                            <button class="btn btn-outline-secondary btn-custom w-100">Profile</button>
                            <button class="btn btn-info text-white btn-custom w-100">Consult</button>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="doctor-card h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="position-relative">
                                <img src="images/staff-12.webp" class="doctor-img me-3 rounded-4">
                                <div class="badge active-class text-bg-warning text-warning rounded-circle">1</div>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Dr. Priya Mehta</h5>

                                <div>
                                    <span class="badge bg-info text-dark mb-2 me-1">MD, PhD</span>
                                    <span class="text-muted">24 years</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <span class="text-warning">★★★★★</span>
                            <span class="fw-bold ms-2">4.8</span>
                            <small class="text-muted ms-2">(98 patients)</small>
                        </div>
                        <h4 class="text-muted">Neurosurgeon</h4>
                        <!-- <div class="d-flex justify-content-start mt-3 gap-2">
                            <button class="btn btn-outline-secondary btn-custom w-100">Profile</button>
                            <button class="btn btn-info text-white btn-custom w-100">Schedule</button>
                        </div> -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="doctor-card h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="position-relative">
                                <img src="images/staff-3.webp" class="doctor-img me-3 rounded-4">
                                <div class="badge active-class text-bg-dark text-dark rounded-circle">1</div>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Dr. Anjali Sharma</h5>

                                <div>
                                    <span class="badge bg-info text-dark mb-2 me-1">MD, FAAP</span>
                                    <span class="text-muted">12 years</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <span class="text-warning">★★★★★</span>
                            <span class="fw-bold ms-2">5.0</span>
                            <small class="text-muted ms-2">(156 patients)</small>
                        </div>
                        <h4 class="text-muted">Pediatric Specialist</h4>
                        <!-- <div class="d-flex justify-content-start mt-3 gap-2">
                            <button class="btn btn-outline-secondary btn-custom w-100">Profile</button>
                            <button class="btn btn-info text-white btn-custom w-100">Book Now</button>
                        </div> -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="doctor-card h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="position-relative">
                                <img src="images/staff-5.webp" class="doctor-img me-3 rounded-4">
                                <div class="badge active-class text-bg-success text-success rounded-circle">1</div>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Dr. Arjun Patel</h5>

                                <div>
                                    <span class="badge bg-info text-dark mb-2 me-1">MD, FAAOS</span>
                                    <span class="text-muted">20 years</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <span class="text-warning">★★★★★</span>
                            <span class="fw-bold ms-2">4.7</span>
                            <small class="text-muted ms-2">(134 patients)</small>
                        </div>
                        <h4 class="text-muted">Orthopedic Surgeon</h4>
                        <!-- <div class="d-flex justify-content-start mt-3 gap-2">
                            <button class="btn btn-outline-secondary btn-custom w-100">Profile</button>
                            <button class="btn btn-info text-white btn-custom w-100">Request</button>
                        </div> -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="doctor-card h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="position-relative">
                                <img src="images/staff-7.webp" class="doctor-img me-3 rounded-4">
                                <div class="badge active-class text-bg-success text-success rounded-circle">1</div>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Dr. Karan Bansal</h5>

                                <div>
                                    <span class="badge bg-info text-dark mb-2 me-1">MD, FAAD</span>
                                    <span class="text-muted">15 years</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <span class="text-warning">★★★★★</span>
                            <span class="fw-bold ms-2">4.6</span>
                            <small class="text-muted ms-2">(89 patients)</small>
                        </div>
                        <h4 class="text-muted">Dermatologist</h4>
                        <!-- <div class="d-flex justify-content-start mt-3 gap-2">
                            <button class="btn btn-outline-secondary btn-custom w-100">Profile</button>
                            <button class="btn btn-info text-white btn-custom w-100">Consult</button>
                        </div> -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="doctor-card h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="position-relative">
                                <img src="images/staff-9.webp" class="doctor-img me-3 rounded-4">
                                <div class="badge active-class text-bg-success text-success rounded-circle">1</div>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Dr. Neha Reddy</h5>

                                <div>
                                    <span class="badge bg-info text-dark mb-2 me-1">MD, FASCO</span>
                                    <span class="text-muted">21 years</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center my-2">
                            <span class="text-warning">★★★★★</span>
                            <span class="fw-bold ms-2">4.9</span>
                            <small class="text-muted ms-2">(211 patients)</small>
                        </div>
                        <h4 class="text-muted">Oncology Expert</h4>
                        <!-- <div class="d-flex justify-content-start mt-3 gap-2">
                            <button class="btn btn-outline-secondary btn-custom w-100">Profile</button>
                            <button class="btn btn-info text-white btn-custom w-100">Appointment</button>
                        </div> -->
                    </div>
                </div>

            </div>

            <!-- <div class="text-center mt-4">
                <button class="btn btn-outline-info text-dark px-4 py-2 btn-custom">
                    Browse Complete Directory →
                </button>
            </div> -->
        </div>

    </section>
</section>

<section id="About">
    <section class="call-to-action">
        <div class="container-fluid bg-color-cta my-4">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="fw-normal mt-2 mb-4 display-4">Exceptional Care for Your Health Journey</h1>
                        <p class="mb-4 lh-md fs-5 text-muted">Discover comprehensive healthcare services delivered with
                            compassion and
                            expertise. Our dedicated team is committed to providing personalized medical care that puts
                            you first.</p>
                        <!-- <a href="#" type="button" class="btn btn-info mt-2 mb-3 btn-lg text-white">Schedule
                            Consultation</a>
                        <a href="#" class="learn-more mb-5 mx-4 fs-5">Explore Services </a> -->
                    </div>

                    <div class="col-lg-6">
                        <div class="image-showcase">
                            <img src="images/showcase-2.webp" alt="emergency-3" class="img-fluid rounded-3 ">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row border-top border-bottom py-4">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-2">
                    <div class="align-items-center d-flex flex-column">
                        <h1 class="text-info fw-normal mb-0">25+</h1>
                        <small class="text-muted fs-6">Years Experienc</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-2">
                    <div class="align-items-center d-flex flex-column">
                        <h1 class="text-info fw-normal mb-0">15K+</h1>
                        <small class="text-muted fs-6">Happy Patients</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-2">
                    <div class="align-items-center d-flex flex-column">
                        <h1 class="text-info fw-normal mb-0">50+</h1>
                        <small class="text-muted fs-6">Medical Experts</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-2">
                    <div class="align-items-center d-flex flex-column">
                        <h1 class="text-info fw-normal mb-0">24/7</h1>
                        <small class="text-muted fs-6">Emergency Care</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-3">
            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 service-card3 text-center p-3">
                        <div class="icon-circle2 mb-3">
                            <i class="bi bi-heart-pulse fs-1"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fs-3">Cardiology</h5>
                            <p class="card-text text-muted">
                                Advanced heart care with expert cardiologists and modern diagnostic technology.
                                We provide treatment for heart disease, hypertension, and other cardiac conditions.
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="#" class="s3-learn-more fs-5 text-decoration-none">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 service-card3 text-center p-3">
                        <div class="icon-circle2 mb-3">
                            <i class="fa-solid fa-brain fs-1"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fs-3">Neurology Center</h5>
                            <p class="card-text text-muted">
                                Specialized care for brain, spine, and nervous system disorders.
                                Our neurologists offer accurate diagnosis and effective treatment for all neurological
                                conditions.
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="#" class="s3-learn-more fs-5 text-decoration-none">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 service-card3 text-center p-3">
                        <div class="icon-circle2 mb-3">
                            <i class="fas fa-shield-alt fs-1"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fs-3">Preventive Care</h5>
                            <p class="card-text text-muted">
                                Comprehensive preventive health services to detect issues early and maintain wellness.
                                Includes routine checkups, screenings, and personalized health guidance for every
                                patient.
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="#" class="s3-learn-more fs-5 text-decoration-none">Learn More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container my-5">
            <div class="assistance-box">
                <div class="row align-items-center">

                    <div class="col-md-8 d-flex align-items-center mb-3 mb-md-0">
                        <div class="contact-icon bg-white bg-opacity-25 me-3">
                            <i class="fas fa-phone fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Need Immediate Assistance?</h5>
                            <p class="mb-0">Our medical team is available around the clock for urgent consultations and
                                emergency support.</p>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex justify-content-md-end align-items-center">
                        <a href="tel:+919876543210" class="btn btn-light fw-semibold me-3">
                            <i class="bi bi-telephone-fill me-2"></i> +91 98765 43210
                        </a>
                        <!-- <a href="#" tel:98765 43210 class="text-dark fw-semibold text-decoration-none btn btn-outline-light">Get
                            Directions</a> -->
                    </div>

                </div>
            </div>
        </div>

    </section>
</section>

    <footer>
        <div class="container py-3 mt-5 border-top border-bottom">
            <div class="row gy-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold fs-4 mb-4 text-primary   ">Medi Hub</h5>
                    <p>123 HealthCare Avenue <br>
                        Satellite, Ahmedabad, Gujarat 380015, India</p>
                    <p><strong>Phone: </strong>+91 98765 43210</p>
                    <p><strong>Email:</strong> medical3444@inilas.com</p>

                    <div class="footer-social d-flex gap-2 mt-3">
                        <a href="#" class="bg-dark text-decoration-none"><i class="fab fa-x-twitter text-white"></i></a>
                        <a href="#" class="bg-primary text-decoration-none"><i
                                class="fab fa-facebook-f text-white"></i></a>
                        <a href="#" class="bg-danger text-decoration-none"><i
                                class="fab fa-instagram text-white"></i></a>
                        <a href="#" class="bg-info text-decoration-none"><i
                                class="fab fa-linkedin-in text-white"></i></a>
                    </div>
                </div>

                <div class="offset-lg-1 col-lg-2 col-md-6">
                    <h6 class="fw-bold fs-5 mb-3">Useful Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Home</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">About</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Services</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Terms Of Service</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold fs-5 mb-3">Our Services</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Cardiology</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Neurology</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Orthopedics</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Pediatrics</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Oncology</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Dermatology</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Surgery</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold fs-5 mb-3">Resources</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Appointment Booking</a>
                        </li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">FAQs</a>
                        </li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Emergency Care</a>
                        </li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Visiting Hours</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Health Tips & Articles</a>
                        </li>
                    </ul>
                </div>


                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold fs-5 mb-3">About Us</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">About Our Hospital</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Mission & Vision</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Meet Our Doctors</a></li>
                        <li><a href="#" class="text-decoration-none d-block mb-2 text-muted">Careers</a></li>
                    </ul>
                </div>

                <div class="text-center border-top mt-4 pt-3">
                    <p class="mb-1">© Copyright <strong>MediHub</strong> All Rights Reserved</p>
                    <!-- <p class="mb-0">Designed by <a href="https://bootstrapmade.com/" target="_blank"
                            class="text-primary fw-semibold text-decoration-none">BootstrapMade</a></p> -->
                </div>

            </div>
        </div>
    </footer>
</body>
<script>
    // <script>
// Smooth scroll with offset for fixed navbar
document.addEventListener('DOMContentLoaded', function() {
    const navbarHeight = document.querySelector('.navbar').offsetHeight;
    console.log(navbarHeight);
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            // console.log(this.getAttribute('href'));
            if(targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if(targetElement) {
                const targetPosition = targetElement.offsetTop - navbarHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>
</html>