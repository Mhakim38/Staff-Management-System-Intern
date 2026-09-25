<section>

    <div class="profile-section-header">

        <div class="profile-section-heading">

            <div class="profile-section-icon profile-security-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>

            <div>
                <h2>Security</h2>

                <p>
                    Keep your account secure by using a strong password.
                </p>
            </div>

        </div>

    </div>


    <form
        method="post"
        action="{{ route('password.update') }}"
        class="profile-form"
    >

        @csrf
        @method('put')


        <div class="profile-field profile-field-full">

            <label for="update_password_current_password">
                Current Password
            </label>

            <div class="profile-input">

                <i class="fa-solid fa-lock"></i>

                <input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    placeholder="Enter current password"
                    autocomplete="current-password"
                >

            </div>

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="profile-error"
            />

        </div>


        <div class="profile-form-grid">

            <div class="profile-field">

                <label for="update_password_password">
                    New Password
                </label>

                <div class="profile-input">

                    <i class="fa-solid fa-key"></i>

                    <input
                        id="update_password_password"
                        name="password"
                        type="password"
                        placeholder="Enter new password"
                        autocomplete="new-password"
                    >

                </div>

                <x-input-error
                    :messages="$errors->updatePassword->get('password')"
                    class="profile-error"
                />

            </div>


            <div class="profile-field">

                <label for="update_password_password_confirmation">
                    Confirm New Password
                </label>

                <div class="profile-input">

                    <i class="fa-solid fa-check"></i>

                    <input
                        id="update_password_password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repeat new password"
                        autocomplete="new-password"
                    >

                </div>

            </div>

        </div>


        <div class="profile-form-footer">

            @if (session('status') === 'password-updated')

                <span class="profile-saved">

                    <i class="fa-solid fa-circle-check"></i>

                    Password updated
                </span>

            @endif


            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="fa-solid fa-shield-halved"></i>
                Update Password
            </button>

        </div>

    </form>

</section>