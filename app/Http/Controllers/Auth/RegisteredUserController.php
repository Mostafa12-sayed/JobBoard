<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EmployeeUser;
use App\Models\CandidateUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): \Illuminate\View\View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Base validation rules for all users
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:employer,candidate',
        ];

        // Dynamically add validation rules based on the selected role
        if ($request->role === 'employer') {
            $validationRules = array_merge($validationRules, [
                'company_name' => 'required|string|max:255',
                'company_logo' => 'nullable|image|max:2048',
                'position' => 'required|nullable|string|max:255',
                'phone_number' => 'nullable|string|max:15',
                'address' => 'required|nullable|string|max:255',
            ]);
        } elseif ($request->role === 'candidate') {
            $validationRules = array_merge($validationRules, [
                'resume' => 'required|file|max:2048',
                'linkedin_profile' => 'required|nullable|url',
                'github_profile' => 'required|nullable|url',
                'portfolio_website' => 'nullable|url',
                'skills' => 'required|nullable|string|max:255',
                'education' => 'required|nullable|string|max:255',
                'experience' => 'nullable|string|max:255',
                'languages' => 'required|nullable|string|max:255',
                'interests' => 'required|nullable|string|max:255',
                'cover_letter' => 'nullable|string|max:65535', // Updated to handle larger text
            ]);
        }

        // Validate the request with dynamic rules
        $request->validate($validationRules);

        // Create the user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Process file uploads
        $companyLogoPath = null;
        $resumePath = null;

        if ($request->role === 'employer' && $request->hasFile('company_logo')) {
            $companyLogoPath = $request->file('company_logo')->store('company_logos', 'public');
        }
        if ($request->role === 'candidate' && $request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // Create a related record based on the role
        if ($user->role === 'employer') {
            EmployeeUser::create([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'company_logo' => $companyLogoPath,
                'position' => $request->position,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
            ]);
        } elseif ($user->role === 'candidate') {
            CandidateUser::create([
                'user_id' => $user->id,
                'resume' => $resumePath,
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
        }

        // Fire the Registered event
        event(new Registered($user));

        // Log in the user
        Auth::login($user);

        // Redirect to the profile page
        return Redirect::to('/')
        ->with('success', 'Registration successful!');


    }
}
