<x-app-layout>

    <x-slot name="header">

        <div class="dashboard-header">

            <div>
                <p class="dashboard-eyebrow">STAFFHUB</p>

                <h2>My Profile</h2>

                <p class="dashboard-header-text">
                    Manage your personal information and account settings.
                </p>
            </div>

            <a href="{{ route('dashboard') }}" class="profile-back-btn">
                <i class="fa-solid fa-arrow-left"></i>
                Back to Dashboard
            </a>

        </div>

    </x-slot>


    <div class="dashboard-page">

        <div class="dashboard-container">

            @if (session('status') === 'profile-updated')
                <div class="success-message">
                    <i class="fa-solid fa-circle-check"></i>

                    Profile updated successfully.
                </div>
            @endif


            <div class="profile-layout">

                {{-- LEFT PROFILE CARD --}}
                <aside class="profile-sidebar-card">

                    <div class="profile-photo-area">

                        <div class="profile-avatar-large">

                            @if($user->profile_photo)

                                <img
                                    id="profilePreview"
                                    src="{{ asset('storage/' . $user->profile_photo) }}"
                                    alt="{{ $user->name }}"
                                >

                            @else

                                <div
                                    id="profileInitials"
                                    class="profile-avatar-placeholder"
                                >
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <img
                                    id="profilePreview"
                                    src=""
                                    alt="Profile preview"
                                    style="display:none;"
                                >

                            @endif

                            <label
                                for="profile_photo"
                                class="profile-camera-button"
                                title="Change profile photo"
                            >
                                <i class="fa-solid fa-camera"></i>
                            </label>

                        </div>

                    </div>


                    <h2 class="profile-sidebar-name">
                        {{ $user->name }}
                    </h2>

                    <p class="profile-sidebar-role">
                        {{ $user->position ?: 'Staff Member' }}
                    </p>


                    @if($user->department)

                        <div class="profile-department-badge">
                            <i class="fa-solid fa-building"></i>
                            {{ $user->department }}
                        </div>

                    @endif


                    <div class="profile-sidebar-divider"></div>


                    <div class="profile-side-info">

                        <div class="profile-side-row">

                            <div class="profile-side-icon blue">
                                <i class="fa-regular fa-envelope"></i>
                            </div>

                            <div>
                                <span>Email Address</span>
                                <strong>{{ $user->email }}</strong>
                            </div>

                        </div>


                        <div class="profile-side-row">

                            <div class="profile-side-icon green">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div>
                                <span>Phone Number</span>
                                <strong>
                                    {{ $user->phone ?: 'Not provided' }}
                                </strong>
                            </div>

                        </div>


                        <div class="profile-side-row">

                            <div class="profile-side-icon purple">
                                <i class="fa-solid fa-id-card"></i>
                            </div>

                            <div>
                                <span>Staff ID</span>
                                <strong>
                                    {{ $user->staff_id ?: 'Not assigned' }}
                                </strong>
                            </div>

                        </div>

                    </div>


                    <div class="profile-account-status">

                        <span>Account Status</span>

                        <strong>
                            <i class="fa-solid fa-circle"></i>
                            Active
                        </strong>

                    </div>

                </aside>


                {{-- RIGHT --}}
                <main class="profile-main">

                    <div class="dashboard-panel profile-information-panel">

                        @include(
                            'profile.partials.update-profile-information-form'
                        )

                    </div>


                    <div class="dashboard-panel profile-security-panel">

                        @include(
                            'profile.partials.update-password-form'
                        )

                    </div>


                    <div class="dashboard-panel profile-danger-panel">

                        @include(
                            'profile.partials.delete-user-form'
                        )

                    </div>

                </main>

            </div>

        </div>

    </div>


    <script>

        const profileInput =
            document.getElementById('profile_photo');

        const preview =
            document.getElementById('profilePreview');

        const initials =
            document.getElementById('profileInitials');


        if (profileInput) {

            profileInput.addEventListener('change', function(event) {

                const file = event.target.files[0];

                if (!file) {
                    return;
                }

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!allowedTypes.includes(file.type)) {

                    alert(
                        'Please select a JPG, PNG or WEBP image.'
                    );

                    profileInput.value = '';

                    return;
                }


                if (file.size > 2 * 1024 * 1024) {

                    alert(
                        'Profile photo must be less than 2MB.'
                    );

                    profileInput.value = '';

                    return;
                }


                const reader = new FileReader();

                reader.onload = function(e) {

                    preview.src = e.target.result;

                    preview.style.display = 'block';

                    if (initials) {
                        initials.style.display = 'none';
                    }

                };

                reader.readAsDataURL(file);

            });

        }

    </script>

</x-app-layout>