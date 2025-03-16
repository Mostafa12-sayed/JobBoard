<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function updateEmployer(Request $request)
    {
        $user = Auth::user();

        // Restrict access to employers only
        if ($user->role !== 'employer') {
            abort(403, 'Unauthorized action.');
        }

        $profileData = $user->employee;

        // Validation rules matching registration
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048',
            'position' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            if ($profileData->company_logo) {
                Storage::delete($profileData->company_logo);
            }
            $companyLogoPath = $request->file('company_logo')->store('company_logos', 'public');
            $profileData->company_logo = $companyLogoPath;
        }

        // Update employer data
        $profileData->update([
            'company_name' => $request->company_name,
            'position' => $request->position,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('my-profile')->with('success', 'Employer profile updated successfully');
    }

    public function updateCandidate(Request $request)
    {
        $user = Auth::user();

        // Restrict access to candidates only
        if ($user->role !== 'candidate') {
            abort(403, 'Unauthorized action.');
        }

        $profileData = $user->candidate;

        // Validation rules matching registration
        $request->validate([
            'resume' => 'nullable|file|max:2048',
            'linkedin_profile' => 'nullable|url',
            'github_profile' => 'nullable|url',
            'portfolio_website' => 'nullable|url',
            'skills' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'languages' => 'nullable|string|max:255',
            'interests' => 'nullable|string|max:255',
            'cover_letter' => 'nullable|string|max:65535',
        ]);

        // Handle resume upload
        if ($request->hasFile('resume')) {
            if ($profileData->resume) {
                Storage::delete($profileData->resume);
            }
            $resumePath = $request->file('resume')->store('resumes', 'public');
            $profileData->resume = $resumePath;
        }

        // Update candidate data
        $profileData->update([
            'linkedin_profile' => $request->linkedin_profile,
            'github_profile' => $request->github_profile,
            'portfolio_website' => $request->portfolio_website,
            'skills' => $request->skills,
            'education' => $request->education,
            'experience' => $request->experience,
            'languages' => $request->languages,
            'interests' => $request->interests,
            'cover_letter' => $request->cover_letter,
        ]);

        return redirect()->route('my-profile')->with('success', 'Candidate profile updated successfully');
    }
}
