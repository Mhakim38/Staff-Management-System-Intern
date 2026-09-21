<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>StaffHub | Staff Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="landing-page">

{{-- =====================================================
     NAVBAR
===================================================== --}}
<header class="landing-navbar">

    <div class="landing-nav-container">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="landing-brand">

            <div class="landing-brand-icon">
                <i class="fa-solid fa-users-gear"></i>
            </div>

            <div>
                <div class="landing-brand-name">
                    StaffHub
                </div>

                <span class="landing-brand-subtitle">
                    Staff Management System
                </span>
            </div>

        </a>


        {{-- Navigation --}}
        <nav class="landing-nav-links">

            <a href="#home" class="active">
                Home
            </a>

            <a href="#features">
                Features
            </a>

            <a href="#contact">
                Contact
            </a>

        </nav>


        {{-- Login / Register --}}
        <div class="landing-nav-actions">

            @if (Route::has('login'))

                @auth

                    <a href="{{ url('/dashboard') }}"
                       class="landing-btn landing-btn-primary">

                        <i class="fa-solid fa-table-columns"></i>
                        Dashboard

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="landing-btn landing-btn-outline">

                        Login

                    </a>


                    @if (Route::has('register'))

                        <a href="{{ route('register') }}"
                           class="landing-btn landing-btn-primary">

                            Register

                        </a>

                    @endif

                @endauth

            @endif

        </div>

    </div>

</header>


{{-- =====================================================
     HERO
===================================================== --}}
<main>

<section class="landing-hero" id="home">

    {{-- Decorative background --}}
    <div class="landing-shape landing-shape-left"></div>
    <div class="landing-shape landing-shape-purple"></div>
    <div class="landing-shape landing-shape-yellow"></div>


    <div class="landing-container landing-hero-grid">

        {{-- LEFT CONTENT --}}
        <div class="landing-hero-content">

            <div class="landing-badge">

                <i class="fa-solid fa-star"></i>

                <span>
                    Simple • Smart • Organized
                </span>

            </div>


            <h1>
                Manage Your

                <span>
                    Workplace
                </span>

                All in One Place
            </h1>


            <p class="landing-hero-description">

                A simple and efficient platform for managing
                staff information, leave requests, announcements
                and daily workplace needs.

            </p>


            {{-- Buttons --}}
            <div class="landing-hero-buttons">

                @if (Route::has('login'))

                    @auth

                        <a href="{{ url('/dashboard') }}"
                           class="landing-btn landing-btn-primary landing-btn-large">

                            <i class="fa-solid fa-arrow-right"></i>
                            Go to Dashboard

                        </a>

                    @else

                        <a href="{{ route('login') }}"
                           class="landing-btn landing-btn-primary landing-btn-large">

                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Get Started

                        </a>

                    @endauth

                @endif


                <a href="#features"
                   class="landing-btn landing-btn-outline landing-btn-large">

                    Learn More

                </a>

            </div>


            {{-- Motto --}}
            <div class="landing-motto">

                <span>Connect</span>

                <i class="fa-solid fa-circle"></i>

                <span>Manage</span>

                <i class="fa-solid fa-circle"></i>

                <span>Grow</span>

            </div>

        </div>


        {{-- RIGHT VISUAL --}}
        <div class="landing-hero-visual">

            <div class="landing-visual-blob"></div>


            {{-- Doodle --}}
            <div class="landing-doodle landing-doodle-left">

                <i class="fa-regular fa-heart"></i>

                <span>
                    Better Team<br>
                    Better Workplace
                </span>

            </div>


            <div class="landing-rays">
                <span></span>
                <span></span>
                <span></span>
            </div>


            {{-- Staff Image --}}
            <img
                src="{{ asset('images/download (1).png') }}"
                alt="Staff management team"
                class="landing-student-image"
            >


            {{-- Motivational text --}}
            <div class="landing-doodle landing-doodle-right">

                <span>
                    Work Smarter.<br>
                    Grow Together.
                </span>

                <i class="fa-regular fa-face-smile"></i>

            </div>


            <div class="landing-yellow-line"></div>

        </div>

    </div>

</section>


{{-- =====================================================
     FEATURES
===================================================== --}}
<section class="landing-features" id="features">

    <div class="landing-container">

        <div class="landing-feature-grid">


            {{-- Profile --}}
            <div class="landing-feature-card feature-blue">

                <div class="landing-feature-icon blue">
                    <i class="fa-regular fa-user"></i>
                </div>

                <h3>
                    Staff Profile
                </h3>

                <p>
                    View and manage personal
                    and employment information.
                </p>

            </div>


            {{-- Leave --}}
            <div class="landing-feature-card feature-green">

                <div class="landing-feature-icon green">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>

                <h3>
                    Leave Management
                </h3>

                <p>
                    Apply for leave and easily
                    track request status.
                </p>

            </div>


            {{-- Announcement --}}
            <div class="landing-feature-card feature-purple">

                <div class="landing-feature-icon purple">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>

                <h3>
                    Announcements
                </h3>

                <p>
                    Stay updated with important
                    workplace news and notices.
                </p>

            </div>


            {{-- Management --}}
            <div class="landing-feature-card feature-orange">

                <div class="landing-feature-icon orange">
                    <i class="fa-solid fa-users-gear"></i>
                </div>

                <h3>
                    Easy Management
                </h3>

                <p>
                    Manage staff records efficiently
                    through one organized system.
                </p>

            </div>

        </div>

    </div>

</section>

</main>


{{-- =====================================================
     FOOTER
===================================================== --}}
<footer class="landing-footer" id="contact">

    <div class="landing-footer-container">

        <a href="{{ url('/') }}"
           class="landing-footer-brand">

            <i class="fa-solid fa-users-gear"></i>

            <strong>
                StaffHub
            </strong>

        </a>


        <p>
            © {{ date('Y') }} StaffHub.
            All rights reserved.
        </p>

    </div>

</footer>

</body>

</html>