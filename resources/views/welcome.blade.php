<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>InternshipHub | Internship Management System</title>

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
                <i class="fa-solid fa-graduation-cap"></i>
            </div>

            <div>
                <div class="landing-brand-name">
                    InternshipHub
                </div>

                <span class="landing-brand-subtitle">
                    Internship Management System
                </span>
            </div>

        </a>


        {{-- Navigation --}}
        <nav class="landing-nav-links">

            <a href="#home" class="active">
                Home
            </a>

            <a href="#features">
                About
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


        {{-- =====================
             LEFT CONTENT
        ====================== --}}
        <div class="landing-hero-content">

            <div class="landing-badge">

                <i class="fa-solid fa-star"></i>

                <span>
                    Your Future Starts Here
                </span>

            </div>


            <h1>
                Turn Your

                <span>
                    Internship Dreams
                </span>

                into Reality
            </h1>


            <p class="landing-hero-description">

                A simple and efficient platform to manage your
                internship journey from application to completion.

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

                            <i class="fa-solid fa-arrow-right"></i>
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

                <span>Learn</span>

                <i class="fa-solid fa-circle"></i>

                <span>Experience</span>

                <i class="fa-solid fa-circle"></i>

                <span>Grow</span>

            </div>

        </div>


        {{-- =====================
             RIGHT IMAGE
        ====================== --}}
        <div class="landing-hero-visual">

            <div class="landing-visual-blob"></div>


            {{-- Doodle --}}
            <div class="landing-doodle landing-doodle-left">

                <i class="fa-regular fa-heart"></i>

                <span>
                    Good Skills<br>
                    Brighter Tomorrow
                </span>

            </div>


            <div class="landing-rays">
                <span></span>
                <span></span>
                <span></span>
            </div>


            {{-- Student Image --}}
            {{-- Student Image --}}
<img
    src="{{ asset('images/download (1).png') }}"
    alt="Students preparing for internship"
    class="landing-student-image"
>


            {{-- Small motivational text --}}
            <div class="landing-doodle landing-doodle-right">

                <span>
                    Your Journey.<br>
                    Brighter Future.
                </span>

                <i class="fa-regular fa-face-smile"></i>

            </div>


            {{-- Yellow curved decoration --}}
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


            {{-- Apply --}}
            <div class="landing-feature-card feature-blue">

                <div class="landing-feature-icon blue">

                    <i class="fa-regular fa-file-lines"></i>

                </div>

                <h3>
                    Apply Easily
                </h3>

                <p>
                    Submit your application
                    and documents online.
                </p>

            </div>


            {{-- Track --}}
            <div class="landing-feature-card feature-green">

                <div class="landing-feature-icon green">

                    <i class="fa-solid fa-magnifying-glass"></i>

                </div>

                <h3>
                    Track Progress
                </h3>

                <p>
                    Check your application
                    and placement status.
                </p>

            </div>


            {{-- Logbook --}}
            <div class="landing-feature-card feature-purple">

                <div class="landing-feature-icon purple">

                    <i class="fa-solid fa-book-open"></i>

                </div>

                <h3>
                    Manage Logbook
                </h3>

                <p>
                    Record your daily activities
                    and submit reports.
                </p>

            </div>


            {{-- Evaluation --}}
            <div class="landing-feature-card feature-orange">

                <div class="landing-feature-icon orange">

                    <i class="fa-regular fa-star"></i>

                </div>

                <h3>
                    Get Evaluated
                </h3>

                <p>
                    Receive feedback from
                    your supervisors.
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

            <i class="fa-solid fa-graduation-cap"></i>

            <strong>
                InternshipHub
            </strong>

        </a>


        <p>
            © {{ date('Y') }} InternshipHub.
            All rights reserved.
        </p>

    </div>

</footer>

</body>

</html>