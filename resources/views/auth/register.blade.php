<x-guest-layout>

    <div class="auth-login auth-register-page">

        {{-- ==========================================
             LEFT SIDE
        =========================================== --}}
        <div class="auth-login-left">

            {{-- Brand --}}
            <a href="{{ url('/') }}" class="auth-brand">

                <div class="auth-brand-icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>

                <div>
                    <strong>InternshipHub</strong>
                    <span>Internship Management System</span>
                </div>

            </a>


            {{-- Welcome --}}
            <div class="auth-welcome">

                <div class="auth-badge">
                    <i class="fa-solid fa-sparkles"></i>
                    Get Started
                </div>

                <h1>
                    Start Your
                    <span>Internship Journey.</span>
                </h1>

                <p>
                    Create your account and get ready to manage
                    your internship journey in one place.
                </p>


                <div class="auth-motto">
                    <span>Learn</span>

                    <i class="fa-solid fa-circle"></i>

                    <span>Experience</span>

                    <i class="fa-solid fa-circle"></i>

                    <span>Grow</span>
                </div>

            </div>


            {{-- Decoration --}}
            <div class="auth-circle auth-circle-one"></div>
            <div class="auth-circle auth-circle-two"></div>

        </div>


        {{-- ==========================================
             RIGHT SIDE
        =========================================== --}}
        <div class="auth-login-right auth-register-right">

            <div class="auth-form-header">

                <div class="auth-user-icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>

                <h2>Create Account</h2>

                <p>
                    Fill in your details to get started.
                </p>

            </div>


            <form method="POST" action="{{ route('register') }}">
                @csrf


                {{-- NAME --}}
                <div class="auth-field">

                    <label for="name">
                        Full Name
                    </label>

                    <div class="auth-input">

                        <i class="fa-regular fa-user"></i>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter your full name"
                            required
                            autofocus
                            autocomplete="name"
                        >

                    </div>

                    <x-input-error
                        :messages="$errors->get('name')"
                        class="mt-2"
                    />

                </div>


                {{-- EMAIL --}}
                <div class="auth-field">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="auth-input">

                        <i class="fa-regular fa-envelope"></i>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                            autocomplete="username"
                        >

                    </div>

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>


                {{-- PASSWORD --}}
                <div class="auth-field">

                    <label for="password">
                        Password
                    </label>

                    <div class="auth-input">

                        <i class="fa-solid fa-lock"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Create a password"
                            required
                            autocomplete="new-password"
                        >

                    </div>

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>


                {{-- CONFIRM PASSWORD --}}
                <div class="auth-field">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <div class="auth-input">

                        <i class="fa-solid fa-shield-halved"></i>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm your password"
                            required
                            autocomplete="new-password"
                        >

                    </div>

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2"
                    />

                </div>


                {{-- REGISTER BUTTON --}}
                <button
                    type="submit"
                    class="auth-login-button"
                >

                    Create Account

                    <i class="fa-solid fa-arrow-right"></i>

                </button>


                {{-- LOGIN LINK --}}
                <p class="auth-register">

                    Already have an account?

                    <a href="{{ route('login') }}">
                        Log In
                    </a>

                </p>

            </form>


            {{-- HOME --}}
            <a href="{{ url('/') }}" class="auth-home">

                <i class="fa-solid fa-arrow-left"></i>

                Back to Homepage

            </a>

        </div>

    </div>

</x-guest-layout>