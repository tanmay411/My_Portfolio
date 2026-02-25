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
      width: 50px;
      height: 50px;
      background-color: rgba(13, 202, 240, 0.8);
      border-radius: 50%;
      top: 50%;
      transform: translateY(-50%);
      opacity: 1;
      transition: all 0.3s ease;
    }

    .carousel-control-prev {
      left: -60px;
    }

    .carousel-control-next {
      right: -60px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
      background-color: rgba(13, 202, 240, 1);
      transform: translateY(-50%) scale(1.1);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      width: 20px;
      height: 20px;
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

      .carousel-control-prev {
        left: 10px;
      }

      .carousel-control-next {
        right: 10px;
      }

      .carousel-control-prev,
      .carousel-control-next {
        width: 40px;
        height: 40px;
      }

      .carousel-indicators {
        margin-bottom: -1.5rem;
      }
    }

    @media (max-width: 480px) {
      .certification-carousel img {
        max-height: 300px;
      }

      .carousel-control-prev,
      .carousel-control-next {
        width: 35px;
        height: 35px;
      }
    }

    /* ===== FOOTER ===== */
    .footer-section {
      background-color: #6c757d;
      color: white;
      padding: 3rem 0 1rem;
      margin-top: 0;
    }

    /* ===== DOWNLOAD BUTTON ===== */
    .download-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 12px 30px;
      border-radius: 50px;
      text-decoration: none;
      font-size: 16px;
      font-weight: 500;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
      border: none;
      cursor: pointer;
    }

    .download-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
      color: white;
    }

    .download-btn:active {
      transform: translateY(-1px);
    }

    .download-btn i {
      font-size: 18px;
    }
  </style>
</head>

<body>
  <!-- SIDEBAR (Desktop) -->
  <aside class="sidebar d-none d-md-block">
    <div class="text-center mt-4">
      <img src="assets/my.jpg" class="profile-img rounded-circle" alt="Tanmay Srivastava Profile Picture" />
      <h4 class="text-white mt-3">Tanmay Srivastava</h4>

      <div class="d-flex gap-3 justify-content-center mt-3">
        <a href="https://www.instagram.com/tsrivastava411/" aria-label="Instagram">
          <i class="text-white fa-brands fa-instagram fs-5"></i>
        </a>
        <a href="https://www.facebook.com/share/1D9yjX9q49/" aria-label="Facebook">
          <i class="text-white fa-brands fa-facebook fs-5"></i>
        </a>
        <a href="https://www.linkedin.com/in/tanmay-srivastava-42503934a" aria-label="LinkedIn">
          <i class="text-white fa-brands fa-linkedin fs-5"></i>
        </a>
        <a href="https://github.com/tanmay411" aria-label="GitHub">
          <i class="text-white fa-brands fa-github fs-5"></i>
        </a>
      </div>
    </div>

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

  <!-- HAMBURGER MENU -->
  <div class="hamburger-menu">
    <button class="hamburger-btn" onclick="toggleMenu()" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <div class="menu-overlay" id="menuOverlay" onclick="closeMenu()"></div>

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

  <main class="main-content">
    <!-- HERO SECTION -->
    <section id="home" class="hero-section">
      <img src="assets/me1.jpg" class="hero-image" alt="Tanmay Srivastava" />
      <div class="hero-text" data-aos="fade-right" data-aos-duration="800">
        <h1 id="typewriter"></h1>
        <span class="cursor">_</span>
      </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about">
      <div class="container">
        <h2 class="section-title" data-aos="fade-up">About</h2>
        <div class="section-underline" data-aos="fade-up" data-aos-delay="50"></div>

        <p class="fs-5" data-aos="fade-up" data-aos-delay="100">
          I am a skilled web developer with expertise in <strong>HTML, CSS, JavaScript, jQuery, Bootstrap,
            PHP, and Laravel</strong>, capable of building responsive and dynamic web applications. I also have a
          solid grasp of <strong>C programming</strong>, which strengthens my problem-solving and logical thinking.
          I'm passionate about clean code, user-friendly design, and continuously learning new technologies.
        </p>

        <div class="row align-items-center mt-5">
          <div class="col-md-4 text-center" data-aos="zoom-in" data-aos-delay="150">
            <img src="assets/me2.jpg" class="about-img" alt="Tanmay Srivastava" />
          </div>

          <div class="col-md-8" data-aos="fade-left" data-aos-delay="200">
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
                    <strong>Email:</strong> tsrivastava413@gmail.com
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

        <p class="fs-5 mt-4" data-aos="fade-up" data-aos-delay="250">
          I build responsive and dynamic websites using HTML, CSS, JavaScript, Bootstrap, jQuery, PHP, and MySQL.
        </p>
      </div>
    </section>

    <!-- SKILLS SECTION -->
    <section id="skills">
      <div class="container">
        <h2 class="section-title" data-aos="fade-up">Skills</h2>
        <div class="section-underline" data-aos="fade-up" data-aos-delay="50"></div>

        <p class="fs-5" data-aos="fade-up" data-aos-delay="100">
          Proficient in modern web technologies for creating responsive, dynamic, and scalable applications.
        </p>

        <div class="row mt-5">
          <div class="col-md-6" data-aos="fade-right" data-aos-delay="150">
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

          <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
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

        <p class="fs-5 mt-5 text-center" data-aos="fade-up" data-aos-delay="250">
          Continuously expanding my skill set through hands-on projects and staying updated with the latest industry
          trends and best practices.
        </p>
      </div>
    </section>

    <!-- RESUME SECTION -->
    <section id="resume">
      <div class="container">
        <h2 class="section-title text-center" data-aos="fade-up">Resume</h2>
        <div class="section-underline mx-auto" data-aos="fade-up" data-aos-delay="50"></div>

        <p class="fs-5" data-aos="fade-up" data-aos-delay="100">
          Motivated and detail-oriented professional with a proven ability to deliver high-quality
          results in fast-paced environments. Skilled in teamwork, problem-solving, and adapting to new
          challenges to drive organizational success.
        </p>

        <div class="text-center mt-4 mb-4" data-aos="zoom-in" data-aos-delay="150">
          <a href="https://drive.google.com/file/d/1-2KIwWLwA0OD55AA2sAr_yDF6pa1bFul/view?usp=drive_link"
            class="download-btn" target="_blank" download>
            <i class="fas fa-download"></i>
            Download Resume
          </a>
        </div>

        <div class="row mt-5">
          <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
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
              <li>tsrivastava413@gmail.com</li>
            </ul>

            <h3 class="mt-5">Education</h3>
            <hr style="height: 3px; background-color: #0dcaf0;" class="w-50" />

            <h4 class="mt-4">High School</h4>
            <strong>The Millennium School, Lucknow</strong>
            <p class="text-muted">2022 - 2023</p>
            <p>Completed secondary education with focus on computer science and mathematics.</p>
            <h4 class="mt-4">Diploma in Information Technology</h4>
            <strong>Hewett Polytechnic Lucknow</strong>
            <p class="text-muted">2023 - 2026</p>
            <p>Completed diploma in Information Technology with focus on web development and programming.</p>
          </div>

          <div class="col-md-6" data-aos="fade-left" data-aos-delay="250">
            <h3>Professional Experience</h3>
            <hr style="height: 3px; background-color: #0dcaf0;" class="w-50" />

            <h4 class="mt-4">Freelance Web Developer</h4>
            <p class="text-muted">2026 - Present</p>
            <p>
              Developing custom websites and web applications for clients using modern technologies
              including HTML, CSS, JavaScript, PHP, and Laravel framework.
            </p>
            <ul>
              <li>Built responsive websites for various clients</li>
              <li>Implemented custom PHP/Laravel solutions</li>
              <li>Maintained and updated existing web applications</li>
            </ul>
            <h4 class="mt-4">Kryotek Softwares</h4>
            <p class="text-muted">2026 - Present</p>
            <p>
              Developing custom websites and web applications for clients using modern technologies
              including HTML, CSS, JavaScript, PHP, Wordpress and Laravel framework.
            </p>
            <ul>
              <li>Built responsive websites for various clients</li>
              <li>Implemented custom PHP/Laravel solutions</li>
            </ul>
            <h4 class="mt-4">Techtro Football Academy</h4>
            <p class="text-muted">NOV 2025 - JAN 2026</p>
            <p>
              Developing custom websites and web applications for football academy using modern technologies
              including HTML, CSS, JavaScript,Wordpress.
            </p>
            <ul>
              <li>Built responsive websites for football academy</li>
              <li>Implemented custom WordPress themes and plugins</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- CERTIFICATION SECTION -->
    <section id="certification">
      <div class="container">
        <h2 class="section-title text-center" data-aos="fade-up">Certifications</h2>
        <div class="section-underline mx-auto" data-aos="fade-up" data-aos-delay="50"></div>

        <p class="fs-5 text-center" data-aos="fade-up" data-aos-delay="100">
          Professional certifications validating my expertise in web development and modern technologies.
        </p>

        <div id="certCarousel" class="carousel slide certification-carousel mt-5" data-bs-ride="carousel"
          data-aos="zoom-in" data-aos-delay="150">
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

          <button class="carousel-control-prev" type="button" data-bs-target="#certCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#certCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <p class="fs-5 mt-5 text-center" data-aos="fade-up" data-aos-delay="200">
          Each certification represents dedicated learning and mastery of essential web development skills and
          frameworks.
        </p>
      </div>
    </section>

    <!-- PROJECTS SECTION -->
    <section id="projects">
      <div class="container">
        <h2 class="section-title text-center" data-aos="fade-up">Projects</h2>
        <div class="section-underline mx-auto" data-aos="fade-up" data-aos-delay="50"></div>

        <div class="row g-4 mt-4">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Digital Calculator</h5>
                <p class="card-text">A functional calculator built with HTML, CSS, and JavaScript.</p>
                <a href="assets/calculator.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Analog Watch</h5>
                <p class="card-text">An animated analog clock using CSS and JavaScript.</p>
                <a href="assets/analogclock/analogclock.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Weather App</h5>
                <p class="card-text">Real-time weather application with API integration.</p>
                <a href="assets/weather_app/index.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="250">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">Pokémon Encyclopedia</h5>
                <p class="card-text">Interactive encyclopedia for Pokémon information.</p>
                <a href="assets/pokemon.php" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card project-card">
              <div class="card-body text-center">
                <h5 class="card-title">To-Do List</h5>
                <p class="card-text">A simple and interactive to-do list application built with PHP.</p>
                <a href="https://tanmay-project.42web.io/" target="_blank" class="btn btn-primary">View Project</a>
              </div>
            </div>s
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="350">
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
          <div class="col-md-6 text-center mb-4" data-aos="fade-right">
            <h4>Social Media</h4>
            <div class="d-flex gap-3 justify-content-center mt-3">
              <a href="https://www.instagram.com/tsrivastava411/" aria-label="Instagram">
                <i class="text-white fa-brands fa-instagram fs-4"></i>
              </a>
              <a href="https://www.facebook.com/share/1D9yjX9q49/" aria-label="Facebook">
                <i class="text-white fa-brands fa-facebook fs-4"></i>
              </a>
              <a href="https://www.linkedin.com/in/tanmay-srivastava-42503934a" aria-label="LinkedIn">
                <i class="text-white fa-brands fa-linkedin fs-4"></i>
              </a>
              <a href="https://github.com/tanmay411" aria-label="GitHub">
                <i class="text-white fa-brands fa-github fs-4"></i>
              </a>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-left">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    AOS.init({
      duration: 600,
      once: true,
      offset: 100
    });

    gsap.registerPlugin(TextPlugin);
    const typewriterTimeline = gsap.timeline({ repeat: -1 });
    typewriterTimeline
      .to("#typewriter", { duration: 2, text: "I am a WEB DEVELOPER!", ease: "none" })
      .to({}, { duration: 1.5 })
      .to("#typewriter", { duration: 2, text: "I am a Freelancer!", ease: "none" })
      .to({}, { duration: 1.5 });

    gsap.to(".cursor", { opacity: 0, ease: "steps(1)", repeat: -1, duration: 0.5 });

    gsap.registerPlugin(ScrollTrigger);
    document.querySelectorAll('.progress-bar').forEach((bar) => {
      const targetVal = bar.getAttribute('aria-valuenow');
      gsap.to(bar, {
        scrollTrigger: { trigger: bar, start: "top 80%", toggleActions: "play none none none" },
        width: targetVal + "%",
        duration: 1.5,
        ease: "power2.out",
        onUpdate: function () {
          const percentage = Math.round(parseFloat(bar.style.width));
          bar.innerText = percentage + "%";
        }
      });
    });

    function toggleMenu() {
      document.getElementById('mobileNav').classList.toggle('active');
      document.getElementById('menuOverlay').classList.toggle('active');
    }

    function closeMenu() {
      document.getElementById('mobileNav').classList.remove('active');
      document.getElementById('menuOverlay').classList.remove('active');
    }
  </script>
</body>

</html>