<section>

    <div class="profile-section-header">

        <div class="profile-section-heading">

            <div class="profile-section-icon">
                <i class="fa-regular fa-user"></i>
            </div>

            <div>
                <h2>Personal Information</h2>

                <p>
                    Update your personal and workplace details.
                </p>
            </div>

        </div>

    </div>


    <form
        id="send-verification"
        method="post"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>


    <form
        method="post"
        action="{{ route('profile.update') }}"
        enctype="multipart/form-data"
        class="profile-form"
    >

        @csrf
        @method('patch')


        {{-- File input controlled from sidebar --}}
        <input
            id="profile_photo"
            name="profile_photo"
            type="file"
            accept=".jpg,.jpeg,.png,.webp"
            hidden
        >


        <div class="profile-photo-mobile-action">

            <label
                for="profile_photo"
                class="profile-upload-button"
            >
                <i class="fa-solid fa-camera"></i>
                Change Profile Photo
            </label>

            <span>JPG, PNG or WEBP. Maximum 2MB.</span>

        </div>


        <div class="profile-form-grid">

            <div class="profile-field">

                <label for="name">
                    Full Name
                    <span>*</span>
                </label>

                <div class="profile-input">

                    <i class="fa-regular fa-user"></i>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $user->name) }}"
                        placeholder="Enter full name"
                        required
                    >

                </div>

                <x-input-error
                    :messages="$errors->get('name')"
                    class="profile-error"
                />

            </div>


            <div class="profile-field">

                <label for="email">
                    Email Address
                    <span>*</span>
                </label>

                <div class="profile-input">

                    <i class="fa-regular fa-envelope"></i>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email', $user->email) }}"
                        placeholder="name@example.com"
                        required
                    >

                </div>

                <x-input-error
                    :messages="$errors->get('email')"
                    class="profile-error"
                />

            </div>


            <div class="profile-field">

                <label for="phone">
                    Phone Number
                </label>

                <div class="profile-input">

                    <i class="fa-solid fa-phone"></i>

                    <input
                        id="phone"
                        name="phone"
                        type="tel"
                        value="{{ old('phone', $user->phone) }}"
                        placeholder="+60 12-345 6789"
                    >

                </div>

            </div>


            <div class="profile-field">

                <label for="date_of_birth">
                    Date of Birth
                </label>

                <div class="profile-input">

                    <i class="fa-regular fa-calendar"></i>

                    <input
                        id="date_of_birth"
                        name="date_of_birth"
                        type="date"
                        value="{{ old(
                            'date_of_birth',
                            optional($user->date_of_birth)->format('Y-m-d')
                        ) }}"
                    >

                </div>

            </div>


            <div class="profile-field">

                <label for="gender">
                    Gender
                </label>

                <div class="profile-input">

                    <i class="fa-solid fa-venus-mars"></i>

                    <select
                        id="gender"
                        name="gender"
                    >

                        <option value="">
                            Select gender
                        </option>

                        <option
                            value="Female"
                            @selected(
                                old('gender', $user->gender) === 'Female'
                            )
                        >
                            Female
                        </option>

                        <option
                            value="Male"
                            @selected(
                                old('gender', $user->gender) === 'Male'
                            )
                        >
                            Male
                        </option>

                        <option
                            value="Other"
                            @selected(
                                old('gender', $user->gender) === 'Other'
                            )
                        >
                            Other
                        </option>

                    </select>

                </div>

            </div>


            <div class="profile-field">

                <label for="staff_id">
                    Staff ID
                </label>

                <div class="profile-input">

                    <i class="fa-regular fa-id-badge"></i>

                    <input
                        id="staff_id"
                        name="staff_id"
                        type="text"
                        value="{{ old('staff_id', $user->staff_id) }}"
                        placeholder="e.g. STF-2026-001"
                    >

                </div>

            </div>


            <div class="profile-field">

                <label for="department">
                    Department
                </label>

                <div class="profile-input">

                    <i class="fa-regular fa-building"></i>

                    <input
                        id="department"
                        name="department"
                        type="text"
                        value="{{ old(
                            'department',
                            $user->department
                        ) }}"
                        placeholder="e.g. Information Technology"
                    >

                </div>

            </div>


            <div class="profile-field">

                <label for="position">
                    Position
                </label>

                <div class="profile-input">

                    <i class="fa-solid fa-briefcase"></i>

                    <input
                        id="position"
                        name="position"
                        type="text"
                        value="{{ old('position', $user->position) }}"
                        placeholder="e.g. System Analyst"
                    >

                </div>

            </div>

        </div>


        <div class="profile-field profile-field-full">

            <label for="address">
                Address
            </label>

            <textarea
                id="address"
                name="address"
                rows="3"
                placeholder="Enter your current address"
            >{{ old('address', $user->address) }}</textarea>

        </div>


        <div class="profile-field profile-field-full">

            <label for="bio">
                About Me
            </label>

            <textarea
                id="bio"
                name="bio"
                rows="4"
                maxlength="500"
                placeholder="Write a short introduction about yourself..."
            >{{ old('bio', $user->bio) }}</textarea>

            <small>
                Maximum 500 characters.
            </small>

        </div>


        @if (
            $user instanceof
            \Illuminate\Contracts\Auth\MustVerifyEmail
            && ! $user->hasVerifiedEmail()
        )

            <div class="profile-verification">

                <i class="fa-solid fa-triangle-exclamation"></i>

                <div>

                    <strong>Email address is not verified.</strong>

                    <button
                        form="send-verification"
                        type="submit"
                    >
                        Resend verification email
                    </button>

                </div>

            </div>

        @endif


        <div class="profile-form-footer">

            @if (session('status') === 'profile-updated')

                <span class="profile-saved">

                    <i class="fa-solid fa-circle-check"></i>

                    Changes saved

                </span>

            @endif


            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="fa-solid fa-floppy-disk"></i>

                Save Changes
            </button>

        </div>

    </form>

</section>