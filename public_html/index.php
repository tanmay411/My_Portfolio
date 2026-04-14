<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tanmay Srivastava - Web Developer Portfolio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
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

    /* ===== ABOUT ===== */
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

    /* ===== SKILLS ===== */
    .skill-item {
      margin-bottom: 1.5rem;
    }

    .skill-item h4 {
      margin-bottom: 0.5rem;
      font-size: 1.1rem;
    }

    /* ===== HAMBURGER ===== */
    .hamburger-menu {
      display: none;
      position: fixed;
      top: 1rem;
      left: 1rem;
      z-index: 1100;
    }

    .hamburger-btn {
      background: linear-gradient(135deg, #0d0d0d 0%, #1a1a2e 100%);
      border: 1.5px solid rgba(13, 202, 240, 0.5);
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      position: relative;
      box-shadow: 0 4px 20px rgba(13, 202, 240, 0.25), inset 0 1px 0 rgba(255, 255, 255, 0.06);
      transition: all 0.3s ease;
      overflow: hidden;
    }

    .hamburger-btn::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(13, 202, 240, 0.15), rgba(13, 202, 240, 0));
      border-radius: 11px;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .hamburger-btn:hover::before {
      opacity: 1;
    }

    .hamburger-btn:hover {
      border-color: #0dcaf0;
      box-shadow: 0 6px 28px rgba(13, 202, 240, 0.45), inset 0 1px 0 rgba(255, 255, 255, 0.1);
      transform: translateY(-1px);
    }

    .hamburger-btn:active {
      transform: scale(0.94);
    }

    .hamburger-icon {
      display: flex;
      flex-direction: column;
      gap: 5px;
      width: 20px;
      z-index: 1;
    }

    .hamburger-icon span {
      display: block;
      height: 2px;
      background: #0dcaf0;
      border-radius: 2px;
      transition: all 0.35s cubic-bezier(0.23, 1, 0.32, 1);
      transform-origin: center;
      box-shadow: 0 0 6px rgba(13, 202, 240, 0.6);
    }

    .hamburger-icon span:nth-child(1) {
      width: 20px;
    }

    .hamburger-icon span:nth-child(2) {
      width: 14px;
      margin-left: auto;
    }

    .hamburger-icon span:nth-child(3) {
      width: 20px;
    }

    .hamburger-btn.open .hamburger-icon span:nth-child(1) {
      transform: translateY(7px) rotate(45deg);
      width: 20px;
    }

    .hamburger-btn.open .hamburger-icon span:nth-child(2) {
      opacity: 0;
      transform: scaleX(0);
    }

    .hamburger-btn.open .hamburger-icon span:nth-child(3) {
      transform: translateY(-7px) rotate(-45deg);
      width: 20px;
    }

    /* ===== MOBILE NAV ===== */
    .mobile-nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 280px;
      height: 100vh;
      background: linear-gradient(160deg, #0d0d1a 0%, #0a141e 50%, #071018 100%);
      border-right: 1px solid rgba(13, 202, 240, 0.12);
      z-index: 1099;
      padding: 0;
      transform: translateX(-100%);
      transition: transform 0.38s cubic-bezier(0.23, 1, 0.32, 1);
      overflow: hidden;
    }

    .mobile-nav::before {
      content: '';
      position: absolute;
      top: -80px;
      left: -80px;
      width: 260px;
      height: 260px;
      background: radial-gradient(circle, rgba(13, 202, 240, 0.12) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .mobile-nav::after {
      content: '';
      position: absolute;
      bottom: -60px;
      right: -60px;
      width: 200px;
      height: 200px;
      background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .mobile-nav.active {
      transform: translateX(0);
    }

    .mobile-nav-header {
      padding: 5rem 1.5rem 1.2rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .mobile-nav-avatar {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      border: 2px solid rgba(13, 202, 240, 0.5);
      object-fit: cover;
    }

    .mobile-nav-name {
      font-size: 0.95rem;
      font-weight: 600;
      color: #fff;
      letter-spacing: 0.5px;
    }

    .mobile-nav-role {
      font-size: 0.72rem;
      color: #0dcaf0;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .mobile-nav ul {
      list-style: none;
      padding: 1rem 0;
      margin: 0;
    }

    .mobile-nav ul li {
      position: relative;
    }

    .mobile-nav .nav-link {
      display: flex;
      align-items: center;
      gap: 14px;
      font-size: 0.95rem;
      font-weight: 500;
      padding: 0.85rem 1.5rem;
      color: rgba(255, 255, 255, 0.6) !important;
      text-decoration: none;
      letter-spacing: 0.5px;
      transition: all 0.25s ease;
      position: relative;
      overflow: hidden;
    }

    .mobile-nav .nav-link::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 3px;
      background: linear-gradient(180deg, #0dcaf0, #667eea);
      border-radius: 0 2px 2px 0;
      transform: scaleY(0);
      transition: transform 0.25s ease;
    }

    .mobile-nav .nav-link:hover {
      color: #fff !important;
      background: rgba(13, 202, 240, 0.07);
      padding-left: 1.8rem;
    }

    .mobile-nav .nav-link:hover::before {
      transform: scaleY(1);
    }

    .mobile-nav .nav-link .nav-icon {
      font-size: 1rem;
      width: 20px;
      text-align: center;
      color: #0dcaf0;
      opacity: 0.7;
      transition: opacity 0.25s;
    }

    .mobile-nav .nav-link:hover .nav-icon {
      opacity: 1;
    }

    .mobile-nav-footer {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 1.2rem 1.5rem;
      border-top: 1px solid rgba(255, 255, 255, 0.06);
      display: flex;
      gap: 16px;
      justify-content: center;
    }

    .mobile-nav-footer a {
      color: rgba(255, 255, 255, 0.4);
      font-size: 1.1rem;
      transition: color 0.2s, transform 0.2s;
    }

    .mobile-nav-footer a:hover {
      color: #0dcaf0;
      transform: translateY(-2px);
    }

    /* ===== OVERLAY ===== */
    .menu-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.65);
      backdrop-filter: blur(3px);
      z-index: 1098;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.35s ease, visibility 0.35s ease;
    }

    .menu-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
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

    /* ===== CERTIFICATION ===== */
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

    /* ===== DOWNLOAD BTN ===== */
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

    /* ===== PHP PROJECTS SECTION ===== */
    #php-projects {
      background: linear-gradient(180deg, #07080f 0%, #0a0d16 100%);
      position: relative;
      overflow: hidden;
    }

    #php-projects::before {
      content: '';
      position: absolute;
      top: -150px;
      right: -150px;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, rgba(13, 202, 240, 0.05) 0%, transparent 65%);
      pointer-events: none;
    }

    #php-projects::after {
      content: '';
      position: absolute;
      bottom: -100px;
      left: -100px;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(102, 126, 234, 0.05) 0%, transparent 65%);
      pointer-events: none;
    }

    /* Section badge */
    .php-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(13, 202, 240, 0.08);
      border: 1px solid rgba(13, 202, 240, 0.25);
      border-radius: 50px;
      padding: 5px 14px;
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: #0dcaf0;
      margin-bottom: 1rem;
    }

    .php-badge i {
      font-size: 0.8rem;
    }

    /* PHP project card */
    .php-project-card {
      background: rgba(13, 18, 30, 0.8);
      border: 1px solid rgba(13, 202, 240, 0.1);
      border-radius: 20px;
      overflow: hidden;
      transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
      height: 100%;
      position: relative;
    }

    .php-project-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 30px rgba(13, 202, 240, 0.1);
      border-color: rgba(13, 202, 240, 0.3);
    }

    /* Card top glow line on hover */
    .php-project-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 10%;
      right: 10%;
      height: 1px;
      background: linear-gradient(90deg, transparent, #0dcaf0, transparent);
      opacity: 0;
      transition: opacity 0.35s ease;
    }

    .php-project-card:hover::before {
      opacity: 1;
    }

    /* Screenshot / preview area */
    .php-card-preview {
      position: relative;
      height: 200px;
      background: linear-gradient(135deg, #0d1117 0%, #0a141e 100%);
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .php-card-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .php-project-card:hover .php-card-preview img {
      transform: scale(1.05);
    }

    /* Preview placeholder (when no screenshot) */
    .php-preview-placeholder {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 12px;
      width: 100%;
      height: 100%;
    }

    .php-preview-placeholder .preview-icon {
      width: 64px;
      height: 64px;
      background: rgba(13, 202, 240, 0.08);
      border: 1px solid rgba(13, 202, 240, 0.2);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.6rem;
      color: #0dcaf0;
    }

    .php-preview-placeholder span {
      font-size: 0.75rem;
      color: rgba(255, 255, 255, 0.2);
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    /* Preview overlay on hover */
    .php-card-overlay {
      position: absolute;
      inset: 0;
      background: rgba(7, 8, 15, 0.75);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .php-project-card:hover .php-card-overlay {
      opacity: 1;
    }

    .php-overlay-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 9px 20px;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .php-overlay-btn:hover {
      transform: scale(1.05);
    }

    .php-overlay-btn.primary {
      background: linear-gradient(135deg, #0dcaf0, #0891b2);
      color: #07080f;
      box-shadow: 0 4px 16px rgba(13, 202, 240, 0.4);
    }

    /* Card body */
    .php-card-body {
      padding: 1.5rem;
    }

    .php-project-number {
      font-size: 0.68rem;
      font-weight: 700;
      letter-spacing: 2px;
      color: rgba(13, 202, 240, 0.5);
      text-transform: uppercase;
      margin-bottom: 0.4rem;
    }

    .php-project-title {
      font-size: 1.15rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 0.7rem;
      letter-spacing: 0.3px;
    }

    .php-project-desc {
      font-size: 0.87rem;
      color: rgba(255, 255, 255, 0.5);
      line-height: 1.6;
      margin-bottom: 1.2rem;
    }

    /* Tech stack tags */
    .php-tech-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin-bottom: 1.4rem;
    }

    .php-tech-tag {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 6px;
      padding: 4px 10px;
      font-size: 0.72rem;
      font-weight: 600;
      color: rgba(255, 255, 255, 0.55);
      letter-spacing: 0.5px;
      transition: all 0.2s;
    }

    .php-tech-tag:hover {
      border-color: rgba(13, 202, 240, 0.4);
      color: #0dcaf0;
      background: rgba(13, 202, 240, 0.06);
    }

    .php-tech-tag i {
      font-size: 0.7rem;
      color: #0dcaf0;
      opacity: 0.8;
    }

    /* Card footer button */
    .php-card-footer {
      border-top: 1px solid rgba(255, 255, 255, 0.05);
      padding: 1rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .php-view-btn {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: transparent;
      border: 1px solid rgba(13, 202, 240, 0.35);
      color: #0dcaf0;
      padding: 8px 20px;
      border-radius: 50px;
      font-size: 0.82rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-decoration: none;
      transition: all 0.25s ease;
    }

    .php-view-btn:hover {
      background: rgba(13, 202, 240, 0.1);
      border-color: #0dcaf0;
      color: #0dcaf0;
      box-shadow: 0 0 18px rgba(13, 202, 240, 0.2);
      transform: translateX(3px);
    }

    .php-view-btn i {
      font-size: 0.75rem;
      transition: transform 0.25s;
    }

    .php-view-btn:hover i {
      transform: translateX(3px);
    }

    .php-status-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .php-status-badge .dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      animation: blink 1.5s ease-in-out infinite;
    }

    .php-status-badge.live {
      color: #22c55e;
    }

    .php-status-badge.live .dot {
      background: #22c55e;
    }

    .php-status-badge.wip {
      color: #f59e0b;
    }

    .php-status-badge.wip .dot {
      background: #f59e0b;
      animation: none;
    }

    @keyframes blink {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: 0.3;
      }
    }

    @media (max-width: 768px) {
      .php-card-preview {
        height: 160px;
      }
    }

    /* ===== FOOTER / CONTACT ===== */
    .footer-section {
      min-height: auto !important;
      padding: 0 !important;
      background: none !important;
    }

    .footer-contact {
      background: linear-gradient(180deg, #0a0a14 0%, #07080f 100%);
      border-top: 1px solid rgba(13, 202, 240, 0.12);
      padding: 5rem 2rem 0;
      position: relative;
      overflow: hidden;
    }

    .footer-contact::before {
      content: '';
      position: absolute;
      top: -100px;
      left: -100px;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(13, 202, 240, 0.05) 0%, transparent 70%);
      pointer-events: none;
    }

    .footer-contact::after {
      content: '';
      position: absolute;
      bottom: -80px;
      right: -80px;
      width: 350px;
      height: 350px;
      background: radial-gradient(circle, rgba(102, 126, 234, 0.05) 0%, transparent 70%);
      pointer-events: none;
    }

    .footer-heading {
      font-size: 2.2rem;
      font-weight: 800;
      letter-spacing: 2px;
      color: #fff;
      margin-bottom: 0.4rem;
    }

    .footer-heading span {
      background: linear-gradient(135deg, #0dcaf0, #5eead4);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .footer-underline {
      height: 4px;
      width: 120px;
      background: linear-gradient(to right, #0dcaf0, transparent);
      border-radius: 4px;
      margin-bottom: 1.5rem;
    }

    .footer-tagline {
      color: rgba(255, 255, 255, 0.45);
      font-size: 0.95rem;
      letter-spacing: 0.5px;
      margin-bottom: 2.5rem;
    }

    .footer-info-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 2.5rem;
    }

    .footer-info-card {
      flex: 1;
      min-width: 160px;
      background: rgba(13, 202, 240, 0.04);
      border: 1px solid rgba(13, 202, 240, 0.12);
      border-radius: 14px;
      padding: 1rem 1.2rem;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: border-color 0.3s, background 0.3s;
    }

    .footer-info-card:hover {
      border-color: rgba(13, 202, 240, 0.3);
      background: rgba(13, 202, 240, 0.07);
    }

    .footer-info-icon {
      width: 36px;
      height: 36px;
      background: rgba(13, 202, 240, 0.1);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #0dcaf0;
      font-size: 0.95rem;
      flex-shrink: 0;
    }

    .footer-info-label {
      font-size: 0.68rem;
      color: rgba(255, 255, 255, 0.35);
      letter-spacing: 1.5px;
      text-transform: uppercase;
      margin-bottom: 2px;
    }

    .footer-info-value {
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.8);
      font-weight: 600;
      word-break: break-all;
    }

    .footer-form-wrap {
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(255, 255, 255, 0.06);
      border-radius: 20px;
      padding: 2rem;
    }

    .footer-form-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #fff;
      letter-spacing: 1px;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .footer-form-title::before {
      content: '';
      display: inline-block;
      width: 4px;
      height: 18px;
      background: linear-gradient(180deg, #0dcaf0, #667eea);
      border-radius: 4px;
    }

    .footer-form-wrap .form-control {
      background: rgba(255, 255, 255, 0.04) !important;
      border: 1px solid rgba(255, 255, 255, 0.1) !important;
      border-radius: 10px !important;
      color: #fff !important;
      padding: 12px 16px !important;
      transition: border-color 0.3s, box-shadow 0.3s;
      font-size: 0.9rem;
    }

    .footer-form-wrap .form-control:focus {
      border-color: rgba(13, 202, 240, 0.5) !important;
      box-shadow: 0 0 0 3px rgba(13, 202, 240, 0.08) !important;
      background: rgba(255, 255, 255, 0.06) !important;
      outline: none;
    }

    .footer-form-wrap .form-control::placeholder {
      color: rgba(255, 255, 255, 0.25) !important;
    }

    .footer-send-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, #0dcaf0 0%, #0891b2 100%);
      color: #07080f;
      font-weight: 700;
      font-size: 0.9rem;
      letter-spacing: 1px;
      padding: 12px 30px;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      box-shadow: 0 4px 18px rgba(13, 202, 240, 0.3);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .footer-send-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 28px rgba(13, 202, 240, 0.5);
    }

    .footer-send-btn:active {
      transform: scale(0.97);
    }

    .footer-social-title {
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.3);
      margin-bottom: 1rem;
    }

    .footer-social-icons {
      display: flex;
      gap: 12px;
      margin-bottom: 2.5rem;
    }

    .footer-social-icons a {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.08);
      display: flex;
      align-items: center;
      justify-content: center;
      color: rgba(255, 255, 255, 0.5);
      font-size: 1rem;
      text-decoration: none;
      transition: all 0.25s ease;
    }

    .footer-social-icons a:hover {
      color: #0dcaf0;
      border-color: rgba(13, 202, 240, 0.4);
      background: rgba(13, 202, 240, 0.08);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(13, 202, 240, 0.2);
    }

    .footer-bottom {
      border-top: 1px solid rgba(255, 255, 255, 0.06);
      padding: 1.4rem 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .footer-bottom-copy {
      font-size: 0.78rem;
      color: rgba(255, 255, 255, 0.25);
      letter-spacing: 1px;
    }

    .footer-bottom-copy span {
      color: #0dcaf0;
      opacity: 0.7;
    }

    .footer-bottom-links {
      display: flex;
      gap: 1.5rem;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-bottom-links a {
      font-size: 0.75rem;
      color: rgba(255, 255, 255, 0.25);
      text-decoration: none;
      letter-spacing: 1px;
      transition: color 0.2s;
    }

    .footer-bottom-links a:hover {
      color: #0dcaf0;
    }

    @media (max-width: 768px) {
      .footer-contact {
        padding: 3rem 1rem 0;
      }

      .footer-info-card {
        min-width: 100%;
      }

      .footer-bottom {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .footer-social-icons {
        flex-wrap: wrap;
      }
    }
  </style>
</head>

<body>

  <!-- SIDEBAR (Desktop) -->
  <aside class="sidebar d-none d-md-block">
    <div class="text-center mt-4">
      <img src="assets/my.jpg" class="profile-img rounded-circle" alt="Tanmay Srivastava" />
      <h4 class="text-white mt-3">Tanmay Srivastava</h4>
      <div class="d-flex gap-3 justify-content-center mt-3">
        <a href="https://www.instagram.com/tsrivastava411/" aria-label="Instagram"><i
            class="text-white fa-brands fa-instagram fs-5"></i></a>
        <a href="https://www.facebook.com/share/1D9yjX9q49/" aria-label="Facebook"><i
            class="text-white fa-brands fa-facebook fs-5"></i></a>
        <a href="https://www.linkedin.com/in/tanmay-srivastava-42503934a" aria-label="LinkedIn"><i
            class="text-white fa-brands fa-linkedin fs-5"></i></a>
        <a href="https://github.com/tanmay411" aria-label="GitHub"><i
            class="text-white fa-brands fa-github fs-5"></i></a>
      </div>
    </div>
    <ul class="sidebar-nav">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#resume">Resume</a></li>
      <li><a href="#certification">Certification</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#php-projects">PHP Projects</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </aside>

  <!-- HAMBURGER BUTTON -->
  <div class="hamburger-menu">
    <button class="hamburger-btn" id="hamburgerBtn" onclick="toggleMenu()" aria-label="Toggle navigation">
      <div class="hamburger-icon"><span></span><span></span><span></span></div>
    </button>
  </div>

  <!-- OVERLAY -->
  <div class="menu-overlay" id="menuOverlay" onclick="closeMenu()"></div>

  <!-- MOBILE NAV -->
  <div class="mobile-nav" id="mobileNav">
    <div class="mobile-nav-header">
      <img src="assets/my.jpg" class="mobile-nav-avatar" alt="Tanmay" />
      <div>
        <div class="mobile-nav-name">Tanmay Srivastava</div>
        <div class="mobile-nav-role">Web Developer</div>
      </div>
    </div>
    <ul>
      <li><a href="#home" class="nav-link" onclick="closeMenu()"><i class="fa-solid fa-house nav-icon"></i> Home</a>
      </li>
      <li><a href="#about" class="nav-link" onclick="closeMenu()"><i class="fa-solid fa-user nav-icon"></i> About</a>
      </li>
      <li><a href="#skills" class="nav-link" onclick="closeMenu()"><i class="fa-solid fa-code nav-icon"></i> Skills</a>
      </li>
      <li><a href="#resume" class="nav-link" onclick="closeMenu()"><i class="fa-solid fa-file-lines nav-icon"></i>
          Resume</a></li>
      <li><a href="#certification" class="nav-link" onclick="closeMenu()"><i
            class="fa-solid fa-certificate nav-icon"></i> Certification</a></li>
      <li><a href="#projects" class="nav-link" onclick="closeMenu()"><i
            class="fa-solid fa-diagram-project nav-icon"></i> Projects</a></li>
      <li><a href="#php-projects" class="nav-link" onclick="closeMenu()"><i class="fa-brands fa-php nav-icon"></i> PHP
          Projects</a></li>
      <li><a href="#contact" class="nav-link" onclick="closeMenu()"><i class="fa-solid fa-envelope nav-icon"></i>
          Contact</a></li>
    </ul>
    <div class="mobile-nav-footer">
      <a href="https://www.instagram.com/tsrivastava411/" aria-label="Instagram"><i
          class="fa-brands fa-instagram"></i></a>
      <a href="https://www.facebook.com/share/1D9yjX9q49/" aria-label="Facebook"><i
          class="fa-brands fa-facebook"></i></a>
      <a href="https://www.linkedin.com/in/tanmay-srivastava-42503934a" aria-label="LinkedIn"><i
          class="fa-brands fa-linkedin"></i></a>
      <a href="https://github.com/tanmay411" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
    </div>
  </div>

  <main class="main-content">

    <!-- HERO -->
    <section id="home" class="hero-section">
      <img src="assets/me1.jpg" class="hero-image" alt="Tanmay Srivastava" />
      <div class="hero-text" data-aos="fade-right" data-aos-duration="800">
        <h1 id="typewriter"></h1>
        <span class="cursor">_</span>
      </div>
    </section>

    <!-- ABOUT -->
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
            <h3 class="mb-4">UI/UX Designer &amp; Web Developer</h3>
            <div class="row">
              <div class="col-lg-6">
                <ul class="info-list">
                  <li><i class="bi bi-caret-right-square fs-5"></i><strong>Birthday:</strong>&nbsp;2 January 2008</li>
                  <li><i
                      class="bi bi-caret-right-square fs-5"></i><strong>Website:</strong>&nbsp;tanmay-srivastava.kryotek.in
                  </li>
                  <li><i class="bi bi-caret-right-square fs-5"></i><strong>Phone:</strong>&nbsp;7376913272</li>
                  <li><i class="bi bi-caret-right-square fs-5"></i><strong>City:</strong>&nbsp;Lucknow</li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="info-list">
                  <li><i class="bi bi-caret-right-square fs-5"></i><strong>Age:</strong>&nbsp;19</li>
                  <li><i class="bi bi-caret-right-square fs-5"></i><strong>Email:</strong>&nbsp;tsrivastava413@gmail.com
                  </li>
                  <li><i class="bi bi-caret-right-square fs-5"></i><strong>Freelance:</strong>&nbsp;Available</li>
                  <li><i class="bi bi-caret-right-square fs-5"></i><strong>Languages:</strong>&nbsp;English, Hindi</li>
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

    <!-- SKILLS -->
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
                <div class="progress-bar bg-info" role="progressbar" style="width:0%" aria-valuenow="95"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>
            <div class="skill-item">
              <h4>WordPress</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width:0%" aria-valuenow="90"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>
            <div class="skill-item">
              <h4>MySQL</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width:0%" aria-valuenow="90"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>
          </div>
          <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
            <div class="skill-item">
              <h4>Bootstrap</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width:0%" aria-valuenow="85"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>
            <div class="skill-item">
              <h4>PHP</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width:0%" aria-valuenow="85"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>
            <div class="skill-item">
              <h4>Laravel</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width:0%" aria-valuenow="85"
                  aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
            </div>
          </div>
        </div>
        <p class="fs-5 mt-5 text-center" data-aos="fade-up" data-aos-delay="250">
          Continuously expanding my skill set through hands-on projects and staying updated with the latest industry
          trends.
        </p>
      </div>
    </section>

    <!-- RESUME -->
    <section id="resume">
      <div class="container">
        <h2 class="section-title text-center" data-aos="fade-up">Resume</h2>
        <div class="section-underline mx-auto" data-aos="fade-up" data-aos-delay="50"></div>
        <p class="fs-5" data-aos="fade-up" data-aos-delay="100">
          Motivated and detail-oriented professional with a proven ability to deliver high-quality results in fast-paced
          environments.
        </p>
        <div class="text-center mt-4 mb-4" data-aos="zoom-in" data-aos-delay="150">
          <a href="https://drive.google.com/file/d/1-2KIwWLwA0OD55AA2sAr_yDF6pa1bFul/view?usp=drive_link"
            class="download-btn" target="_blank">
            <i class="fas fa-download"></i> Download Resume
          </a>
        </div>
        <div class="row mt-5">
          <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
            <h3>Summary</h3>
            <hr style="height:3px;background-color:#0dcaf0;" class="w-50" />
            <h4 class="mt-4">Tanmay Srivastava</h4>
            <p>Web Developer with expertise in HTML, CSS, JavaScript, PHP, and WordPress.</p>
            <ul>
              <li>Lucknow, Uttar Pradesh, India</li>
              <li>+91 7376913272</li>
              <li>tsrivastava413@gmail.com</li>
            </ul>
            <h3 class="mt-5">Education</h3>
            <hr style="height:3px;background-color:#0dcaf0;" class="w-50" />
            <h4 class="mt-4">High School</h4>
            <strong>The Millennium School, Lucknow</strong>
            <p class="text-muted">2022 - 2023</p>
            <p>Completed secondary education with focus on computer science and mathematics.</p>
            <h4 class="mt-4">Diploma in Information Technology</h4>
            <strong>Hewett Polytechnic Lucknow</strong>
            <p class="text-muted">2023 - 2026</p>
            <p>Diploma in Information Technology with focus on web development and programming.</p>
          </div>
          <div class="col-md-6" data-aos="fade-left" data-aos-delay="250">
            <h3>Professional Experience</h3>
            <hr style="height:3px;background-color:#0dcaf0;" class="w-50" />
            <h4 class="mt-4">Freelance Web Developer</h4>
            <p class="text-muted">2026 - Present</p>
            <p>Developing custom websites and web applications for clients using HTML, CSS, JavaScript, PHP, and
              Laravel.</p>
            <ul>
              <li>Built responsive websites for various clients</li>
              <li>Implemented custom PHP/Laravel solutions</li>
              <li>Maintained and updated existing web applications</li>
            </ul>
            <h4 class="mt-4">Kryotek Softwares</h4>
            <p class="text-muted">Feb 2025 - Nov 2025</p>
            <p>Developing custom websites using HTML, CSS, JavaScript, PHP, WordPress and Laravel.</p>
            <ul>
              <li>Built responsive websites for various clients</li>
              <li>Implemented custom PHP/Laravel solutions</li>
            </ul>
            <h4 class="mt-4">Techtro Football Academy</h4>
            <p class="text-muted">NOV 2025 - JAN 2026</p>
            <p>Developed website for football academy using HTML, CSS, JavaScript and WordPress.</p>
            <ul>
              <li>Built responsive website for football academy</li>
              <li>Implemented custom WordPress themes and plugins</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- CERTIFICATION -->
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
            <div class="carousel-item active"><img src="assets/certificate5.jpg" class="d-block w-100"
                alt="Certificate 1"></div>
            <div class="carousel-item"><img src="assets/certificate2.jpg" class="d-block w-100" alt="Certificate 2">
            </div>
            <div class="carousel-item"><img src="assets/certificate3.jpg" class="d-block w-100" alt="Certificate 3">
            </div>
            <div class="carousel-item"><img src="assets/certificate4.jpg" class="d-block w-100" alt="Certificate 4">
            </div>
            <div class="carousel-item"><img src="assets/certificate1.jpg" class="d-block w-100" alt="Certificate 5">
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
          Each certification represents dedicated learning and mastery of essential web development skills.
        </p>
      </div>
    </section>

    <!-- PROJECTS (Mini Projects) -->
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
                <h5 class="card-title">Pokemon Encyclopedia</h5>
                <p class="card-text">Interactive encyclopedia for Pokemon information.</p>
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
            </div>
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

    <!-- PHP PROJECTS — NEW SECTION -->
    <section id="php-projects">
      <div class="container position-relative" style="z-index:1;">

        <!-- Heading -->
        <div data-aos="fade-up">
          <div class="php-badge">
            <i class="fa-brands fa-php"></i> PHP Development
          </div>
          <h2 class="section-title text-light">PHP Projects</h2>
          <div class="section-underline"></div>
          <p class="fs-5 mb-5" style="color:rgba(255,255,255,0.6); max-width:600px;">
            Full-stack PHP applications built with real-world functionality, database integration, and clean backend
            architecture.
          </p>
        </div>

        <div class="row g-4">

          <!-- PROJECT 1: Portfolio Management System -->
          <div class="col-lg-6 col-xl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="php-project-card">
              <!-- Preview area -->
              <div class="php-card-preview">
                <!-- Replace src with your actual screenshot: assets/portfolio-management.png -->
                <img src="assets/portfolio-management.png" alt="Portfolio Management System"
                  onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                <div class="php-preview-placeholder" style="display:none;">
                  <div class="preview-icon"><i class="fa-solid fa-briefcase"></i></div>
                  <span>Portfolio Management System</span>
                </div>
                <!-- Hover overlay -->
                <div class="php-card-overlay">
                  <a href="https://tanmaysri411.unaux.com/" target="_blank" class="php-overlay-btn primary">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live
                  </a>
                </div>
              </div>

              <!-- Card content -->
              <div class="php-card-body">
                <div class="php-project-number">Project 01</div>
                <h3 class="php-project-title">Portfolio Management System</h3>
                <p class="php-project-desc">
                  A full-stack portfolio management system where users can register, log in, and manage their personal
                  portfolio — including projects, skills, experience, and profile details — through a clean admin
                  dashboard.
                </p>
                <div class="php-tech-tags">
                  <span class="php-tech-tag"><i class="fa-brands fa-php"></i> PHP</span>
                  <span class="php-tech-tag"><i class="fa-solid fa-database"></i> MySQL</span>
                  <span class="php-tech-tag"><i class="fa-brands fa-bootstrap"></i> Bootstrap</span>
                  <span class="php-tech-tag"><i class="fa-brands fa-js"></i> JavaScript</span>
                  <span class="php-tech-tag"><i class="fa-solid fa-lock"></i> Auth</span>
                  <span class="php-tech-tag"><i class="fa-solid fa-table-columns"></i> CRUD</span>
                </div>
              </div>

              <div class="php-card-footer">
                <a href="https://tanmaysri411.unaux.com/" target="_blank" class="php-view-btn">
                  View Project <i class="fa-solid fa-arrow-right"></i>
                </a>
                <span class="php-status-badge live">
                  <span class="dot"></span> Live
                </span>
              </div>
            </div>
          </div>

          <!-- ADD MORE PHP PROJECTS HERE — copy the col block above -->
          <!-- Example placeholder card -->
          <div class="col-lg-6 col-xl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="php-project-card"
              style="border-style: dashed; border-color: rgba(13,202,240,0.15); display:flex; flex-direction:column; align-items:center; justify-content:center; min-height:360px; text-align:center; padding:2rem;">
              <div
                style="width:56px;height:56px;background:rgba(13,202,240,0.06);border:1px dashed rgba(13,202,240,0.25);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                <i class="fa-solid fa-plus" style="color:rgba(13,202,240,0.4);font-size:1.2rem;"></i>
              </div>
              <p
                style="color:rgba(255,255,255,0.2);font-size:0.85rem;letter-spacing:1px;text-transform:uppercase;margin:0;">
                More projects coming soon</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- CONTACT / FOOTER -->
    <section id="contact" class="footer-section">
      <div class="footer-contact">
        <div class="container position-relative" style="z-index:1;">
          <div data-aos="fade-up">
            <h2 class="footer-heading">Get In <span>Touch</span></h2>
            <div class="footer-underline"></div>
            <p class="footer-tagline">Have a project in mind or want to collaborate? Feel free to reach out.</p>
          </div>
          <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
              <div class="footer-info-cards">
                <div class="footer-info-card">
                  <div class="footer-info-icon"><i class="fa-solid fa-envelope"></i></div>
                  <div>
                    <div class="footer-info-label">Email</div>
                    <div class="footer-info-value">tsrivastava413@gmail.com</div>
                  </div>
                </div>
                <div class="footer-info-card">
                  <div class="footer-info-icon"><i class="fa-solid fa-phone"></i></div>
                  <div>
                    <div class="footer-info-label">Phone</div>
                    <div class="footer-info-value">+91 7376913272</div>
                  </div>
                </div>
                <div class="footer-info-card">
                  <div class="footer-info-icon"><i class="fa-solid fa-location-dot"></i></div>
                  <div>
                    <div class="footer-info-label">Location</div>
                    <div class="footer-info-value">Lucknow, India</div>
                  </div>
                </div>
                <div class="footer-info-card">
                  <div class="footer-info-icon"><i class="fa-solid fa-globe"></i></div>
                  <div>
                    <div class="footer-info-label">Website</div>
                    <div class="footer-info-value">tanmay-srivastava.kryotek.in</div>
                  </div>
                </div>
              </div>
              <p class="footer-social-title">Follow Me</p>
              <div class="footer-social-icons">
                <a href="https://www.instagram.com/tsrivastava411/" aria-label="Instagram"><i
                    class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/share/1D9yjX9q49/" aria-label="Facebook"><i
                    class="fa-brands fa-facebook"></i></a>
                <a href="https://www.linkedin.com/in/tanmay-srivastava-42503934a" aria-label="LinkedIn"><i
                    class="fa-brands fa-linkedin"></i></a>
                <a href="https://github.com/tanmay411" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
              </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="150">
              <div class="footer-form-wrap">
                <div class="footer-form-title">Send a Message</div>
                <form action="registration.php" method="post">
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="name" placeholder="Your Name" required />
                    </div>
                    <div class="col-sm-6">
                      <input type="email" class="form-control" name="email" placeholder="Your Email" required />
                    </div>
                    <div class="col-12">
                      <textarea class="form-control" name="message" rows="5" placeholder="Your Message..."
                        required></textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="footer-send-btn">
                        <i class="fa-solid fa-paper-plane"></i> Send Message
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="footer-bottom mt-5">
            <p class="footer-bottom-copy">&copy; 2024 <span>Tanmay Srivastava</span>. All rights reserved.</p>
            <ul class="footer-bottom-links">
              <li><a href="#home">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#php-projects">PHP Projects</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div>
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
    AOS.init({ duration: 600, once: true, offset: 100 });

    gsap.registerPlugin(TextPlugin);
    var typewriterTimeline = gsap.timeline({ repeat: -1 });
    typewriterTimeline
      .to("#typewriter", { duration: 2, text: "I am a WEB DEVELOPER!", ease: "none" })
      .to({}, { duration: 1.5 })
      .to("#typewriter", { duration: 2, text: "I am a Freelancer!", ease: "none" })
      .to({}, { duration: 1.5 });

    gsap.to(".cursor", { opacity: 0, ease: "steps(1)", repeat: -1, duration: 0.5 });

    gsap.registerPlugin(ScrollTrigger);
    document.querySelectorAll('.progress-bar').forEach(function (bar) {
      var targetVal = bar.getAttribute('aria-valuenow');
      gsap.to(bar, {
        scrollTrigger: { trigger: bar, start: "top 80%", toggleActions: "play none none none" },
        width: targetVal + "%",
        duration: 1.5,
        ease: "power2.out",
        onUpdate: function () {
          bar.innerText = Math.round(parseFloat(bar.style.width)) + "%";
        }
      });
    });

    var hamburgerBtn = document.getElementById('hamburgerBtn');

    function toggleMenu() {
      var nav = document.getElementById('mobileNav');
      var overlay = document.getElementById('menuOverlay');
      if (nav.classList.contains('active')) {
        closeMenu();
      } else {
        nav.classList.add('active');
        overlay.classList.add('active');
        hamburgerBtn.classList.add('open');
      }
    }

    function closeMenu() {
      document.getElementById('mobileNav').classList.remove('active');
      document.getElementById('menuOverlay').classList.remove('active');
      hamburgerBtn.classList.remove('open');
    }
  </script>

</body>

</html>