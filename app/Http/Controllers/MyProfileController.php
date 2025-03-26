<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class MyProfileController extends Controller
{
    public function index()
    {
        // return view('hady-profile');
        $user = Auth::user();
        // Fetch related profile data based on role
        $profileData = $user->role === 'employer' ? $user->employee : $user->candidate;

        return view('my-profile', compact('user', 'profileData'));
    }
    public function updateImages(Request $request)
    {
        $user = Auth::user();
        $profileData = $user->role === 'employer' ? $user->employee : $user->candidate;

        $request->validate([
            'profile_picture' => 'nullable|image|max:2048',
            'background_image' => 'nullable|image|max:2048',
        ]);

        $response = ['success' => false, 'message' => 'No valid image uploaded'];

        if ($request->hasFile('profile_picture')) {
            if ($profileData->profile_picture) {
                Storage::delete($profileData->profile_picture);
            }
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $profileData->profile_picture = $profilePicturePath;
            $profileData->save();
            $response = ['success' => true, 'path' => $profilePicturePath];
        }

        if ($request->hasFile('background_image')) {
            if ($profileData->background_image) {
                Storage::delete($profileData->background_image);
            }
            $backgroundImagePath = $request->file('background_image')->store('background_images', 'public');
            $profileData->background_image = $backgroundImagePath;
            $profileData->save();
            $response = ['success' => true, 'path' => $backgroundImagePath];
        }

        return Response::json($response);
    }
    public function canditateProfile(Request $request)
    {
        $keyword = $request->query('user');
        $user = User::where('id', $keyword)->first();
        if (!$user || !$user->candidate || $user->role !== 'candidate') {
            // abort(404);
            return redirect()->route('error');
        }
        $profileData = $user->role === 'employer' ? $user->employee : $user->candidate;

        return view('my-profile', compact('user', 'profileData'));
    }
}
