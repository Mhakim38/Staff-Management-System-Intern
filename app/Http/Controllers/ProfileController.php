<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'date_of_birth' => [
                'nullable',
                'date',
            ],

            'gender' => [
                'nullable',
                'in:Male,Female,Other',
            ],

            'staff_id' => [
                'nullable',
                'string',
                'max:100',
            ],

            'department' => [
                'nullable',
                'string',
                'max:255',
            ],

            'position' => [
                'nullable',
                'string',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'bio' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);


        // Upload new profile photo
        if ($request->hasFile('profile_photo')) {

            // Delete old profile photo
            if ($user->profile_photo) {
                Storage::disk('public')
                    ->delete($user->profile_photo);
            }

            // Store new profile photo
            $validated['profile_photo'] =
                $request->file('profile_photo')
                ->store('profile-photos', 'public');
        }


        // Update user information
        $user->fill($validated);


        // Reset email verification if email changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }


        $user->save();


        return Redirect::route('profile.edit')
            ->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();


        // Delete profile photo before deleting user
        if ($user->profile_photo) {
            Storage::disk('public')
                ->delete($user->profile_photo);
        }


        Auth::logout();

        $user->delete();


        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return Redirect::to('/');
    }
}
