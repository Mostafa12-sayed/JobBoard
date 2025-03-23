@extends('Website.layouts.master')
    @section('content')
    <style>
        .max-w-md{
            max-width: 45rem !important
        }
    </style>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @component('Website.layouts.includes.bradcamp')

    @slot('title' )
    @if(Auth::user()->id === $user->id)
    My Profile
    @else
    {{ $user->name }}'s Profile
    @endif
    @endslot
    @endcomponent



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - {{ $user->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <label for="background_image" class="image-upload-label">
                <img src="{{ optional($profileData)->background_image ? Storage::url($profileData->background_image) : asset('profileimg/background.jpg') }}" alt="Background Image" class="header-bg" id="background-preview">
                @if(Auth::user()->id === $user->id)
                <input type="file" id="background_image" name="background_image" accept="image/*" class="hidden-input" onchange="uploadImage('background_image')">
                @endif
                <!-- <button>
                    <i class="fas fa-camera"></i> Change Background
                </button> -->
            </label>
            <div class="profile-pic">
                <label for="profile_picture" class="image-upload-label">
                    <img src="{{  optional($profileData)->profile_picture ? Storage::url($profileData->profile_picture) : asset('profileimg/profile.jpg') }}" alt="Profile Picture" class="profile-img" id="profile-preview">
                    @if(Auth::user()->id === $user->id)

                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="hidden-input" onchange="uploadImage('profile_picture')">
                    @endif 
                    {{-- <button>
                        <i class="fas fa-camera"></i> Change Picture
                    </button>  --}}
                </label>
            </div>
        </div>

        <div class="main-content">
            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="left-section">
                <div class="header-info">
                    <h1>{{ $user->name }}</h1>
                    <h3>{{ $user->role === 'employer' ? ($profileData->position ?? 'Employer') : 'Candidate' }}</h3>
                </div>

                @if($user->role === 'employer')
                    <p>
                        I am an employer at {{ $profileData->company_name ?? 'N/A' }}.<br><br>
                        Contact me at <strong>{{ $profileData->phone_number ?? 'N/A' }}</strong> or visit us at <strong>{{ $profileData->address ?? 'N/A' }}</strong>.
                    </p>
                @else
                    <p>
                        {{ $profileData->cover_letter ?? 'I am a candidate looking for opportunities. Here is a bit about me...' }}
                    </p>
                @endif

                @if($user->role === 'candidate' && $profileData->skills)
                @php
                    $skillsArray = json_decode($profileData->skills, true);
                    // If json_decode failed or didn't return an array with 'value' keys
                    if (!is_array($skillsArray) || !isset($skillsArray[0]['value'])) {
                        // Try treating it as a comma-separated string
                        $skillsArray = array_map(function($skill) {
                            return ['value' => trim($skill)];
                        }, explode(',', $profileData->skills));
                    }
                @endphp
                @if(is_array($skillsArray) && count($skillsArray) > 0)
                    <div class="section-card">
                        <h2>Skills:</h2>
                        <div class="skills">
                            @foreach($skillsArray as $skill)
                            @php
                                $percentage = rand(60, 100);
                            @endphp
                            <div class="skill">
                                <span>{{ $skill['value'] }}</span>
                                <div class="progress-bar">
                                    <div class="progress" style="width: {{ $percentage }}%;">{{ $percentage }}%</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endif


                @if($user->role === 'candidate' && $profileData->experience)
                <div class="section-card">
                    <h2>Experience:</h2>
                    <div class="experience">
                        <div class="exp-item">
                            <div class="exp-details">
                                <h4>Experience <span>{{ $profileData->experience }}</span></h4>
                                <!-- <p>No detailed experience breakdown provided yet.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="right-section">
                <h2>Personal Detail:</h2>
                <ul class="personal-details">
                    <li><strong>Email:</strong> {{ $user->email }}</li>

                    <!-- Employer-specific details -->
                    @if($user->role === 'employer')
                        <li><strong>Company:</strong> {{ $profileData->company_name ?? 'N/A' }}</li>
                        <li><strong>Position:</strong> {{ $profileData->position ?? 'N/A' }}</li>
                        <li><strong>Phone:</strong> {{ $profileData->phone_number ?? 'N/A' }}</li>
                        <li><strong>Address:</strong> {{ $profileData->address ?? 'N/A' }}</li>
                        @if($profileData->company_logo)
                            <li><strong>Logo:</strong> <img src="{{ Storage::url($profileData->company_logo) }}" alt="Company Logo" style="max-width: 100px;"></li>
                        @endif
                    @endif

                    <!-- Candidate-specific details (including GitHub and LinkedIn) -->
                    @if($user->role === 'candidate')
                        <li><strong>LinkedIn:</strong><br> <a href="{{ $profileData->linkedin_profile ? (str_starts_with($profileData->linkedin_profile, 'http') ? $profileData->linkedin_profile : 'https://' . $profileData->linkedin_profile) : '#' }}">{{ $profileData->linkedin_profile ?? 'N/A' }}</a></li>
                        <li><strong>GitHub:</strong><br> <a href="{{ $profileData->github_profile ? (str_starts_with($profileData->github_profile, 'http') ? $profileData->github_profile : 'https://' . $profileData->github_profile) : '#' }}">{{ $profileData->github_profile ?? 'N/A' }}</a></li>
                        <li><strong>Portfolio:</strong><br> <a href="{{ $profileData->portfolio_website ? (str_starts_with($profileData->portfolio_website, 'http') ? $profileData->portfolio_website : 'https://' . $profileData->portfolio_website) : '#' }}">{{ $profileData->portfolio_website ?? 'N/A' }}</a></li>
                        <li><strong>Education:</strong> {{ $profileData->education ?? 'N/A' }}</li>
                        <li><strong>Languages:</strong> {{ $profileData->languages ?? 'N/A' }}</li>
                        <li><strong>Interests:</strong> {{ $profileData->interests ?? 'N/A' }}</li>
                    @endif

                    <!-- Social icons (only for candidates) -->
                    @if($user->role === 'candidate')
                        <li><strong>Social:</strong>
                            <div class="social-icons">
                                <a href="{{ $profileData->linkedin_profile ? (str_starts_with($profileData->linkedin_profile, 'http') ? $profileData->linkedin_profile : 'https://' . $profileData->linkedin_profile) : '#' }}"><i class="fab fa-linkedin-in"></i></a>
                                <a href="{{ $profileData->github_profile ? (str_starts_with($profileData->github_profile, 'http') ? $profileData->github_profile : 'https://' . $profileData->github_profile) : '#' }}"><i class="fab fa-github"></i></a>
                            </div>
                        </li>
                    @endif

                    <!-- Resume download (only for candidates) -->
                    @if($user->role === 'candidate' && $profileData->resume)
                        <a href="{{ Storage::url($profileData->resume) }}" class="btn btn-green download-cv" target="_blank">
                            <i class="fas fa-file-pdf"></i> Download Resume
                        </a>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- JavaScript for image upload -->
    <script>
        function uploadImage(inputId) {
            const input = document.getElementById(inputId);
            const formData = new FormData();
            formData.append(inputId, input.files[0]);

            fetch('/profile/update-images', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the image preview immediately
                    const previewId = inputId === 'background_image' ? 'background-preview' : 'profile-preview';

                    // Append a timestamp to avoid caching issues
                    const newImageUrl = '/storage/' + data.path + '?t=' + new Date().getTime();
                    document.getElementById(previewId).src = newImageUrl;

                    // If you want no pop-up, just remove or comment out the alerts:
                    // alert('Image uploaded successfully!');
                } else {
                    // You can replace this with a toast or no message at all
                    console.error('Image upload failed: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

    <!-- <script>
        function uploadImage(inputId) {
            const input = document.getElementById(inputId);
            const formData = new FormData();
            formData.append(inputId, input.files[0]);

            fetch('/profile/update-images', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the image preview
                    const previewId = inputId === 'background_image' ? 'background-preview' : 'profile-preview';
                    document.getElementById(previewId).src = '/storage/' + data.path;
                    alert('Image uploaded successfully!');
                } else {
                    alert('Image upload failed: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while uploading the image.');
            });
        }
    </script> -->
</body>
</html>

@endsection
