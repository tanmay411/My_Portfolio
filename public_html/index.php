<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tanmay Srivastava - Web Developer Portfolio</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    /* ===== RESET & BASE STYLES ===== */
    * {
      scroll-behavior: smooth;
    }

    html,
    body {
      overflow-x: hidden;
      max-width: 100%;
      margin: 0;
      padding: 0;
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
      width: 250px;
      background-color: #212529;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: 1000;
      overflow-y: auto;
      overflow-x: hidden;
    }

    /* Hide scrollbar but keep functionality */
    .sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
      background: transparent;
    }

    .sidebar::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.2);
      border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
    }

    .sidebar-nav {
      list-style: none;
      padding: 0;
      margin-top: 2rem;
    }

    .sidebar-nav li {
      margin: 0.5rem 0;
    }

    .sidebar-nav a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      padding: 0.5rem 1.5rem;
      display: block;
      transition: all 0.3s ease;
    }

    .sidebar-nav a:hover {
      color: #fff;
      background-color: rgba(255, 255, 255, 0.1);
    }

    /* ===== MAIN CONTENT ===== */
    .main-content {
      margin-left: 250px;
      padding: 0;
    }

    /* ===== HERO SECTION ===== */
    .hero-section {
      position: relative;
      height: 100vh;
      width: calc(100vw - 250px);
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #000;
    }

    .hero-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      position: absolute;
      top: 0;
      left: 0;
    }

    .hero-text {
      position: absolute;
      bottom: 30%;
      left: 10%;
      color: white;
      z-index: 10;
    }

    .hero-text h1 {
      font-size: clamp(24px, 5vw, 46px);
      margin: 0;
    }

    .cursor {
      font-size: inherit;
      color: white;
    }

    /* ===== SECTIONS ===== */
    section {
      padding: 4rem 2rem;
      min-height: 100vh;
    }

    section#contact {
      min-height: auto;
      padding: 3rem 2rem 1rem;
    }

    .section-title {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .section-underline {
      height: 5px;
      background: linear-gradient(to right, #0dcaf0, transparent);
      width: 150px;
      margin-bottom: 2rem;
    }

    /* ===== ABOUT SECTION ===== */
    .about-img {
      width: 100%;
      max-width: 350px;
      height: auto;
      border-radius: 10px;
    }

    .info-list {
      list-style: none;
      padding: 0;
    }

    .info-list li {
      margin: 1rem 0;
      display: flex;
      align-items: center;
    }

    .info-list i {
      margin-right: 0.5rem;
      color: #0dcaf0;
    }

    /* ===== SKILLS SECTION ===== */
    .skill-item {
      margin-bottom: 1.5rem;
    }

    .skill-item h4 {
      margin-bottom: 0.5rem;
      font-size: 1.1rem;
    }

    /* ===== MOBILE HAMBURGER ===== */
    .hamburger-menu {
      display: none;
      position: fixed;
      top: 1rem;
      left: 1rem;
      z-index: 1100;
    }

    .hamburger-btn {
      background-color: #0dcaf0;
      border: none;
      width: 50px;
      height: 50px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
      cursor: pointer;
    }

    .hamburger-btn:active {
      transform: scale(0.95);
    }

    .hamburger-btn i {
      font-size: 1.5rem;
      color: white;
    }

    .mobile-nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 280px;
      height: 100vh;
      background-color: #212529;
      z-index: 1099;
      padding: 2rem 1rem;
      transform: translateX(-100%);
      transition: transform 0.3s ease;
      overflow-y: auto;
    }

    .mobile-nav.active {
      transform: translateX(0);
    }

    .mobile-nav ul {
      list-style: none;
      padding: 0;
      margin-top: 3rem;
    }

    .mobile-nav .nav-link {
      font-size: 1.2rem;
      padding: 1rem 1.5rem;
      display: block;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.2s ease;
    }

    .mobile-nav .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    /* Overlay backdrop */
    .menu-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 1098;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .menu-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
      }

      .main-content {
        margin-left: 0;
      }

      .hero-section {
        width: 100vw;
      }

      .hamburger-menu {
        display: block;
      }

      .hero-text {
        left: 5%;
        bottom: 20%;
      }

      section {
        padding: 2rem 1rem;
      }

      .about-img {
        margin-bottom: 2rem;
      }
    }

    @media (min-width: 769px) and (max-width: 991px) {
      .sidebar {
        width: 200px;
      }

      .main-content {
        margin-left: 200px;
      }

      .hero-section {
        width: calc(100vw - 200px);
      }
    }

    @media (min-width: 992px) {
      .hero-section {
        width: calc(100vw - 250px);
      }
    }

    /* ===== PROJECTS ===== */
    .project-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }

    .project-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* ===== CERTIFICATION SECTION ===== */
    .certification-carousel {
      max-width: 900px;
      margin: 0 auto;
    }

    .certification-carousel img {
      width: 100%;
      height: auto;
      max-height: 600px;
      object-fit: contain;
      border-radius: 8px;
    }

    .carousel-control-prev,
    .carousel-control-next {
      width: 5%;
      opacity: 0.8;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
      opacity: 1;
    }

    .carousel-indicators {
      margin-bottom: -2rem;
    }

    .carousel-indicators button {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: #0dcaf0;
    }

    @media (max-width: 768px) {
      .certification-carousel img {
        max-height: 400px;
      }

      .carousel-control-prev,
      .carousel-control-next {
        width: 10%;
      }

      .carousel-indicators {
        margin-bottom: -1.5rem;
      }
    }

    @media (max-width: 480px) {
      .certification-carousel img {
        max-height: 300px;
      }
    }

    /* ===== FOOTER ===== */
    .footer-section {
      background-color: #6c757d;
      color: white;
      padding: 3rem 0 1rem;
      margin-top: 0;
    }
  </style>
</head>

<body>
  <!-- SIDEBAR (Desktop) -->
  <aside class="sidebar d-none d-md-block">
    <div class="text-center mt-4">
      <img src="assets/my.jpg" class="profile-img rounded-circle" alt="Tanmay Srivastava Profile Picture" />
      <h4 class="text-white mt-3">Tanmay Srivastava</h4>

      <!-- Social Links -->
      <div class="d-flex gap-3 justify-content-center mt-3">
        <a href="https://www.instagram.com/tsrivastava411/" aria-label="Instagram">
          <i class="text-white fa-brands fa-instagram fs-5"></i>
        </a>
        <a href="https://www.facebook.com/share/1D9yjX9q49/" aria-label="Facebook">
          <i class="text-white fa-brands fa-facebook fs-5"></i>
        </a>
        <a href="https://www.linkedin.com/in/tanmay-srivastava-42503934a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
          aria-label="LinkedIn">
          <i class="text-white fa-brands fa-linkedin fs-5"></i>
        </a>
        <a href="#" aria-label="GitHub">
          <i class="text-white fa-brands fa-github fs-5"></i>
        </a>
      </div>
    </div>

    <!-- Navigation -->
    <ul class="sidebar-nav">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#resume">Resume</a></li>
      <li><a href="#certification">Certification</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </aside>

  <!-- HAMBURGER MENU (Mobile) -->
  <div class="hamburger-menu">
    <button class="hamburger-btn" onclick="toggleMenu()" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <!-- MENU OVERLAY -->
  <div class="menu-overlay" id="menuOverlay" onclick="closeMenu()"></div>

  <!-- MOBILE NAVIGATION -->
  <div class="mobile-nav" id="mobileNav">
    <ul>
      <li><a href="#home" class="nav-link text-white" onclick="closeMenu()">Home</a></li>
      <li><a href="#about" class="nav-link text-success" onclick="closeMenu()">About</a></li>
      <li><a href="#skills" class="nav-link text-warning" onclick="closeMenu()">Skills</a></li>
      <li><a href="#resume" class="nav-link text-light" onclick="closeMenu()">Resume</a></li>
      <li><a href="#certification" class="nav-link text-info" onclick="closeMenu()">Certification</a></li>
      <li><a href="#projects" class="nav-link text-danger" onclick="closeMenu()">Projects</a></li>
      <li><a href="#contact" class="nav-link text-white" onclick="closeMenu()">Contact</a></li>
    </ul>
  </div>

  <!-- MAIN CONTENT -->
  <main class="main-content">
    <!-- HERO SECTION -->
    <section id="home" class="hero-section">
      <img src="assets/me1.jpg" class="hero-image" alt="Tanmay Srivastava" />
      <div class="hero-text">
        <h1 id="typewriter"></h1>
        <span class="cursor">_</span>
      </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <h2 class="section-title">About</h2>
        <div class="section-underline"></div>

        <p class="fs-5">
          I am a skilled web developer with expertise in <strong>HTML, CSS, JavaScript, jQuery, Bootstrap,
            PHP, and Laravel</strong>, capable of building responsive and dynamic web applications. I also have a
          solid grasp of <strong>C programming</strong>, which strengthens my problem-solving and logical thinking.
          I'm passionate about clean code, user-friendly design, and continuously learning new technologies.
        </p>

        <div class="row align-items-center mt-5">
          <div class="col-md-4 text-center">
            <img src="assets/me2.jpg" class="about-img" alt="Tanmay Srivastava" />
          </div>

          <div class="col-md-8">
            <h3 class="mb-4">UI/UX Designer & Web Developer</h3>

            <div class="row">
              <div class="col-lg-6">
                <ul class="info-list">
                  <li>
                    <i class="bi bi-caret-right-square fs-5"></i>
                    <strong>Birthday:</strong> 2 January 2008
                  </li>
                  <li>
                    <i class="bi bi-caret-right-square fs-5"></i>
                    <strong>Website:</strong> tanmay-srivastava.kryotek.in
                  </li>
                  <li>
                    <i class="bi bi-caret-right-square fs-5"></i>
                    <strong>Phone:</strong> 7376913272
                  </li>
                  <li>
                    <i class="bi bi-caret-right-square fs-5"></i>
                    <strong>City:</strong> Lucknow
                  </li>
                </ul>
              </div>

              <div class="col-lg-6">
                <ul class="info-list">
                  <li>
                    <i class="bi bi-caret-right-square fs-5"></i>
                    <strong>Age:</strong> 17
                  </li>
                  <li>
                    <i class="bi bi-caret-right-square fs-5"></i>
                    <strong>Email:</strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                      data-cfemail="10646362796671636471667124212350777d71797c3e737f7d">[email&#160;protected]</a>
                  </li>
                  <li>
                    <i class="bi bi-caret-right-square fs-5"></i>
                    <strong>Freelance:</strong> Available
                  </li>
                  <li>
                    <i class="bi bi-caret-right-square fs-5"></i>
                    <strong>Languages:</strong> English, Hindi
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <p class="fs-5 mt-4">
          I build responsive and dynamic websites using HTML, CSS, JavaScript, Bootstrap, jQuery, PHP, and MySQL.
        </p>
      </div>
    </section>

    <!-- SKILLS SECTION -->
    <section id="skills">
      <div class="container">
        <h2 class="section-title">Skills</h2>
        <div class="section-underline"></div>

        <p class="fs-5">
          Skilled in front-end development using HTML, CSS, JavaScript, Bootstrap, and jQuery to create
          responsive web interfaces, with strong back-end expertise in PHP and the Laravel framework for building
          dynamic and scalable web applications.
        </p>

        <div class="row mt-5">
          <div class="col-md-6">
            <div class="skill-item">
              <h4>HTML, CSS, JS</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="95"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>

            <div class="skill-item">
              <h4>WordPress</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="90"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>

            <div class="skill-item">
              <h4>MySQL</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="90"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="skill-item">
              <h4>Bootstrap</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="85"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>

            <div class="skill-item">
              <h4>PHP</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="85"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>

            <div class="skill-item">
              <h4>Laravel</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="85"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- RESUME SECTION -->
    <section id="resume">
      <div class="container">
        <h2 class="section-title text-center">Resume</h2>
        <div class="section-underline mx-auto"></div>

        <p class="fs-5">
          Motivated and detail-oriented professional with a proven ability to deliver high-quality
          results in fast-paced environments. Skilled in teamwork, problem-solving, and adapting to new
          challenges to drive organizational success.
        </p>

        <div class="row mt-5">
          <div class="col-md-6">
            <h3>Summary</h3>
            <hr style="height: 3px; background-color: #0dcaf0;" class="w-50" />

            <h4 class="mt-4">Tanmay Srivastava</h4>
            <p>
              Web Developer with expertise in HTML, CSS, JavaScript, PHP, and WordPress, skilled in
              creating responsive and user-friendly websites.
            </p>
            <ul>
              <li>Lucknow, Uttar Pradesh, India</li>
              <li>+91 7376913272</li>
              <li><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                  data-cfemail="95e1e6e7fce3f4e6e1f4e3f4a1a4a6d5f2f8f4fcf9bbf6faf8">[email&#160;protected]</a></li>
            </ul>

            <h3 class="mt-5">Education</h3>
            <hr style="height: 3px; background-color: #0dcaf0;" class="w-50" />

            <h4 class="mt-4">High School</h4>
            <p class="text-muted">2020 - 2024</p>
            <p>Completed secondary education with focus on computer science and mathematics.</p>
          </div>

          <div class="col-md-6">
            <h3>Professional Experience</h3>
            <hr style="height: 3px; background-color: #0dcaf0;" class="w-50" />

            <h4 class="mt-4">Freelance Web Developer</h4>
            <p class="text-muted">2023 - Present</p>
            <p>
              Developing custom websites and web applications for clients using modern technologies
              including HTML, CSS, JavaScript, PHP, and Laravel framework.
            </p>
            <ul>
              <li>Built responsive websites for various clients</li>
              <li>Implemented custom PHP/Laravel solutions</li>
              <li>Maintained and updated existing web applications</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- CERTIFICATION SECTION -->
    <section id="certification">
      <div class="container">
        <h2 class="section-title text-center">Certifications</h2>
        <div class="section-underline mx-auto"></div>

        <div id="certCarousel" class="carousel slide certification-carousel mt-5" data-bs-ride="carousel">
          <!-- Carousel Indicators -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#certCarousel" data-bs-slide-to="0" class="active" aria-current="true"
              aria-label="Certificate 1"></button>
            <button type="button" data-bs-target="#certCarousel" data-bs-slide-to="1"
              aria-label="Certificate 2"></button>
            <button type="button" data-bs-target="#certCarousel" data-bs-slide-to="2"
              aria-label="Certificate 3"></button>
            <button type="button" data-bs-target="#certCarousel" data-bs-slide-to="3"
              aria-label="Certificate 4"></button>
            <button type="button" data-bs-target="#certCarousel" data-bs-slide-to="4"
              aria-label="Certificate 5"></button>
          </div>

          <!-- Carousel Items -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/certificate5.jpg" class="d-block w-100" alt="Certificate 1">
            </div>
            <div class="carousel-item">
              <img src="assets/certificate2.jpg" class="d-block w-100" alt="Certificate 2">
            </div>
            <div class="carousel-item">
              <img src="assets/certificate3.jpg" class="d-block w-100" alt="Certificate 3">
            </div>
            <div class="carousel-item">
              <img src="assets/certificate4.jpg" class="d-block w-100" alt="Certificate 4">
            </div>
            <div class="carousel-item">
              <img src="assets/certificate1.jpg" class="d-block w-100" alt="Certificate 5">
            </div>
          </div>

          <!-- Carousel Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#certCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#certCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>

    <!-- PROJECTS SECTION -->
    <section id="projects">
      <div class="container">
        <h2 class="section-title text-center">Projects</h2>
        <div class="section-underline mx-auto"></div>

        <div class="row g-4 mt-4">
          <div class="col-md-4">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Digital Calculator</h5>
                <p class="card-text">A functional calculator built with HTML, CSS, and JavaScript.</p>
                <a href="assets/calculator.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Analog Watch</h5>
                <p class="card-text">An animated analog clock using CSS and JavaScript.</p>
                <a href="assets/analogclock/analogclock.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Weather App</h5>
                <p class="card-text">Real-time weather application with API integration.</p>
                <a href="assets/weather_app/index.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Pokémon Encyclopedia</h5>
                <p class="card-text">Interactive encyclopedia for Pokémon information.</p>
                <a href="assets/pokemon.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Ledger</h5>
                <p class="card-text">Financial tracking and management application.</p>
                <a href="newPro" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Tic Tac Toe</h5>
                <p class="card-text">Classic game built with JavaScript.</p>
                <a href="assets/tictactoe.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center mb-4">
            <h4>Social Media</h4>
            <div class="d-flex gap-3 justify-content-center mt-3">
              <a href="https://www.instagram.com/tsrivastava411/" aria-label="Instagram">
                <i class="text-white fa-brands fa-instagram fs-4"></i>
              </a>
              <a href="#" aria-label="Facebook">
                <i class="text-white fa-brands fa-facebook fs-4"></i>
              </a>
              <a href="#" aria-label="LinkedIn">
                <i class="text-white fa-brands fa-linkedin fs-4"></i>
              </a>
              <a href="#" aria-label="GitHub">
                <i class="text-white fa-brands fa-github fs-4"></i>
              </a>
            </div>
          </div>

          <div class="col-md-6">
            <h4 class="text-center mb-3">Contact Form</h4>
            <form action="registration.php" method="post">
              <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required />
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required />
              </div>
              <div class="mb-3">
                <textarea class="form-control" name="message" rows="3" placeholder="Your Message" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Send Message</button>
              </div>
            </form>
          </div>
        </div>

        <div class="text-center mt-4 pt-3 border-top">
          <p>&copy; 2024 Tanmay Srivastava. All rights reserved.</p>
        </div>
      </div>
    </section>
  </main>

  <!-- Bootstrap JS -->
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    // Initialize AOS
    AOS.init({
      duration: 1000,
      once: true
    });

    // Typewriter Effect
    gsap.registerPlugin(TextPlugin);

    const typewriterTimeline = gsap.timeline({ repeat: -1 });
    typewriterTimeline
      .to("#typewriter", {
        duration: 2,
        text: "I am a WEB DEVELOPER!",
        ease: "none"
      })
      .to({}, { duration: 1.5 })
      .to("#typewriter", {
        duration: 2,
        text: "I am a Freelancer!",
        ease: "none"
      })
      .to({}, { duration: 1.5 });

    // Cursor Blink
    gsap.to(".cursor", {
      opacity: 0,
      ease: "steps(1)",
      repeat: -1,
      duration: 0.5
    });

    // Progress Bar Animation
    gsap.registerPlugin(ScrollTrigger);

    document.querySelectorAll('.progress-bar').forEach((bar) => {
      const targetVal = bar.getAttribute('aria-valuenow');

      gsap.to(bar, {
        scrollTrigger: {
          trigger: bar,
          start: "top 80%",
          toggleActions: "play none none none"
        },
        width: targetVal + "%",
        duration: 1.5,
        ease: "power2.out",
        onUpdate: function () {
          const percentage = Math.round(parseFloat(bar.style.width));
          bar.innerText = percentage + "%";
        }
      });
    });

    // Mobile Menu Toggle Functions
    function toggleMenu() {
      const mobileNav = document.getElementById('mobileNav');
      const menuOverlay = document.getElementById('menuOverlay');
      mobileNav.classList.toggle('active');
      menuOverlay.classList.toggle('active');
    }

    function closeMenu() {
      const mobileNav = document.getElementById('mobileNav');
      const menuOverlay = document.getElementById('menuOverlay');
      mobileNav.classList.remove('active');
      menuOverlay.classList.remove('active');
    }
  </script>
</body>

</html>