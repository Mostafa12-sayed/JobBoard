@php
    $profileData = Auth::user()->candidate;
@endphp

<form method="POST" action="{{ route('profile.update.candidate') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <!-- Resume -->
    <div style="width: 100%;">
        <x-input-label for="resume" :value="__('Resume')" />
        <input id="resume" name="resume" type="file" class="mt-1 block w-full" />
        @if ($profileData->resume)
            <p class="mt-2" >Current resume: <a href="{{ Storage::url($profileData->resume) }}"
            target="_blank" style="color: blue;">Click to Download it</a></p>
        @endif
        <x-input-error class="mt-2" :messages="$errors->get('resume')" />
    </div>

    <!-- LinkedIn Profile -->
    <div class="mt-4">
        <x-input-label for="linkedin_profile" :value="__('LinkedIn Profile')" />
        <x-text-input id="linkedin_profile" name="linkedin_profile" type="url" class="mt-1 block w-full" :value="old('linkedin_profile', $profileData->linkedin_profile)" />
        <x-input-error class="mt-2" :messages="$errors->get('linkedin_profile')" />
    </div>

    <!-- GitHub Profile -->
    <div class="mt-4">
        <x-input-label for="github_profile" :value="__('GitHub Profile')" />
        <x-text-input id="github_profile" name="github_profile" type="url" class="mt-1 block w-full" :value="old('github_profile', $profileData->github_profile)" />
        <x-input-error class="mt-2" :messages="$errors->get('github_profile')" />
    </div>

    <!-- Portfolio Website -->
    <div class="mt-4">
        <x-input-label for="portfolio_website" :value="__('Portfolio Website')" />
        <x-text-input id="portfolio_website" name="portfolio_website" type="url" class="mt-1 block w-full" :value="old('portfolio_website', $profileData->portfolio_website)" />
        <x-input-error class="mt-2" :messages="$errors->get('portfolio_website')" />
    </div>

    <!-- Skills -->
    <!-- <div class="mt-4">
        <x-input-label for="skills" :value="__('Skills')" />
        <x-text-input id="skills" name="skills" type="text" class="mt-1 block w-full" :value="old('skills', $profileData->skills)" />
        <x-input-error class="mt-2" :messages="$errors->get('skills')" />
    </div> -->
    @php
    $skillsAsString = '';
    if ($profileData->skills) {
        $decoded = json_decode($profileData->skills, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            // Extract each 'value' and join them with commas.
            $skillsAsString = collect($decoded)->pluck('value')->implode(', ');
        } else {
            $skillsAsString = $profileData->skills;
        }
    }
    @endphp

    <div class="mt-4">
        <x-input-label for="skills" :value="__('Skills')" />
        <x-text-input
            id="skills"
            name="skills"
            type="text"
            class="mt-1 block w-full"
            :value="old('skills', $skillsAsString)"
        />
        <x-input-error class="mt-2" :messages="$errors->get('skills')" />
    </div>



    <!-- Education -->
    <div class="mt-4">
        <x-input-label for="education" :value="__('Education')" />
        <x-text-input id="education" name="education" type="text" class="mt-1 block w-full" :value="old('education', $profileData->education)" />
        <x-input-error class="mt-2" :messages="$errors->get('education')" />
    </div>

    <!-- Experience -->
    <div class="mt-4">
        <x-input-label for="experience" :value="__('Experience')" />
        <x-text-input id="experience" name="experience" type="text" class="mt-1 block w-full" :value="old('experience', $profileData->experience)" />
        <x-input-error class="mt-2" :messages="$errors->get('experience')" />
    </div>

    <!-- Languages -->
    <div class="mt-4">
        <x-input-label for="languages" :value="__('Languages')" />
        <x-text-input id="languages" name="languages" type="text" class="mt-1 block w-full" :value="old('languages', $profileData->languages)" />
        <x-input-error class="mt-2" :messages="$errors->get('languages')" />
    </div>

    <!-- Interests -->
    <div class="mt-4">
        <x-input-label for="interests" :value="__('Interests')" />
        <x-text-input id="interests" name="interests" type="text" class="mt-1 block w-full" :value="old('interests', $profileData->interests)" />
        <x-input-error class="mt-2" :messages="$errors->get('interests')" />
    </div>

    <!-- Cover Letter -->
    <div class="mt-4">
        <x-input-label for="cover_letter" :value="__('Cover Letter')" />
        <textarea id="cover_letter" name="cover_letter" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('cover_letter', $profileData->cover_letter) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('cover_letter')" />
    </div>

    <!-- Submit Button -->
    <div class="flex items-center gap-4 mt-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
