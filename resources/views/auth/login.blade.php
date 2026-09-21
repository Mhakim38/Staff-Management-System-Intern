<x-guest-layout>

    <div class="auth-login">

        {{-- Left --}}
        <div class="auth-login-left">

            <a href="{{ url('/') }}" class="auth-brand">
                <div class="auth-brand-icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>

                <div>
                    <strong>InternshipHub</strong>
                    <span>Internship Management System</span>
                </div>
            </a>


            <div class="auth-welcome">

                <div class="auth-badge">
                    <i class="fa-solid fa-star"></i>
                    Welcome Back
                </div>

                <h1>
                    Continue Your
                    <span>Internship Journey.</span>
                </h1>

                <p>
                    Log in to manage your internship and
                    keep track of your progress.
                </p>

                <div class="auth-motto">
                    <span>Learn</span>
                    <i class="fa-solid fa-circle"></i>
                    <span>Experience</span>
                    <i class="fa-solid fa-circle"></i>
                    <span>Grow</span>
                </div>

            </div>


            {{-- Decorative circles --}}
            <div class="auth-circle auth-circle-one"></div>
            <div class="auth-circle auth-circle-two"></div>

        </div>


        {{-- Right --}}
        <div class="auth-login-right">

            <div class="auth-form-header">

                <div class="auth-user-icon">
                    <i class="fa-regular fa-user"></i>
                </div>

                <h2>Welcome Back!</h2>

                <p>Please enter your details to log in.</p>

            </div>


            {{-- Session Status --}}
            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />


            <form method="POST" action="{{ route('login') }}">
                @csrf


                {{-- Email --}}
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
                            autofocus
                            autocomplete="username"
                        >

                    </div>

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>


                {{-- Password --}}
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
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                        >

                    </div>

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>


                {{-- Options --}}
                <div class="auth-options">

                    <label class="auth-remember">

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>Remember me</span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="auth-forgot"
                        >
                            Forgot password?
                        </a>

                    @endif

                </div>


                {{-- Login Button --}}
                <button type="submit" class="auth-login-button">

                    Log In

                    <i class="fa-solid fa-arrow-right"></i>

                </button>


                {{-- Register --}}
                @if (Route::has('register'))

                    <p class="auth-register">

                        Don't have an account?

                        <a href="{{ route('register') }}">
                            Create Account
                        </a>

                    </p>

                @endif

            </form>


            <a href="{{ url('/') }}" class="auth-home">

                <i class="fa-solid fa-arrow-left"></i>

                Back to Homepage

            </a>

        </div>

    </div>

</x-guest-layout>