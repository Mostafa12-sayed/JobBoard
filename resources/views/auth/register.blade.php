<x-guest-layout>
    <!-- Ensure Alpine.js is included -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md" x-data="{ userType: 'employer' }">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Register</h2>

            <!-- Buttons to choose the user type -->
            <div class="flex justify-center space-x-4 mb-6">
                <button type="button"
                        @click="userType = 'employer'"
                        :class="userType === 'employer' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'"
                        class="px-4 py-2 rounded transition duration-300">
                    employer
                </button>
                <button type="button"
                        @click="userType = 'candidate'"
                        :class="userType === 'candidate' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'"
                        class="px-4 py-2 rounded transition duration-300">
                    Candidate
                </button>
            </div>

            <!-- Registration form -->
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="role" x-model="userType">

                <!-- Common Fields: Name and Email -->
                <div class="flex space-x-2">
                    <div class="w-1/2">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="w-1/2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Common Fields: Password and Confirm Password -->
                <div class="flex space-x-2 mt-4">
                    <div class="w-1/2">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="w-1/2">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <!-- employer Fields (only rendered when userType is 'employer') -->
                <template x-if="userType === 'employer'">
                    <div class="mt-4 space-y-4">
                        <div>
                            <x-input-label for="company_name" :value="__('Company Name')" />
                            <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="company_logo" :value="__('Company Logo')" />
                            <div x-data="{ logoName: '' }" class="mt-1">
                                <label for="company_logo" class="flex flex-col items-center justify-center px-4 py-6 border-2 border-dashed border-gray-300 rounded-md cursor-pointer hover:border-indigo-500">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                    </svg>
                                    <span class="mt-2 text-sm text-gray-600" x-text="logoName ? logoName : 'Click to upload company logo'"></span>
                                </label>
                                <input id="company_logo" name="company_logo" type="file" class="hidden" x-on:change="logoName = $event.target.files.length > 0 ? $event.target.files[0].name : ''">
                            </div>
                            <x-input-error :messages="$errors->get('company_logo')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="position" :value="__('Position')" />
                            <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('position')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                    </div>
                </template>

                <!-- Candidate Fields (only rendered when userType is 'candidate') -->
                <template x-if="userType === 'candidate'">
                    <div class="mt-4 space-y-4">
                        <div>
                            <x-input-label for="resume" :value="__('Resume')" />
                            <div x-data="{ resumeName: '' }" class="mt-1">
                                <label for="resume" class="flex flex-col items-center justify-center px-4 py-6 border-2 border-dashed border-gray-300 rounded-md cursor-pointer hover:border-indigo-500">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                    </svg>
                                    <span class="mt-2 text-sm text-gray-600" x-text="resumeName ? resumeName : 'Click to upload your resume'"></span>
                                </label>
                                <input id="resume" name="resume" type="file" class="hidden" x-on:change="resumeName = $event.target.files.length > 0 ? $event.target.files[0].name : ''">
                            </div>
                            <x-input-error :messages="$errors->get('resume')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="linkedin_profile" :value="__('LinkedIn Profile')" />
                            <x-text-input id="linkedin_profile" class="block mt-1 w-full" type="url" name="linkedin_profile" :value="old('linkedin_profile')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('linkedin_profile')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="github_profile" :value="__('GitHub Profile')" />
                            <x-text-input id="github_profile" class="block mt-1 w-full" type="url" name="github_profile" :value="old('github_profile')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('github_profile')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="portfolio_website" :value="__('Portfolio Website')" />
                            <x-text-input id="portfolio_website" class="block mt-1 w-full" type="url" name="portfolio_website" :value="old('portfolio_website')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('portfolio_website')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="skills" :value="__('Skills')" />
                            <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="old('skills')" autocomplete="off" placeholder="e.g. PHP, Laravel, JavaScript" />
                            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="education" :value="__('Education')" />
                            <x-text-input id="education" class="block mt-1 w-full" type="text" name="education" :value="old('education')" autocomplete="off" />
                            <x-input-error :messages="$errors->get('education')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="experience" :value="__('Experience')" />
                            <x-text-input id="experience" class="block mt-1 w-full" type="text" name="experience" :value="old('experience')" autocomplete="off" placeholder="e.g. Years of experience" />
                            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="languages" :value="__('Languages')" />
                            <x-text-input id="languages" class="block mt-1 w-full" type="text" name="languages" :value="old('languages')" autocomplete="off" placeholder="e.g. English, Arabic" />
                            <x-input-error :messages="$errors->get('languages')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="interests" :value="__('Interests')" />
                            <x-text-input id="interests" class="block mt-1 w-full" type="text" name="interests" :value="old('interests')" autocomplete="off" placeholder="e.g. Sports, Music" />
                            <x-input-error :messages="$errors->get('interests')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="cover_letter" :value="__('Cover Letter')" />
                            <textarea id="cover_letter" name="cover_letter" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" placeholder="Write your cover letter here...">{{ old('cover_letter') }}</textarea>
                            <x-input-error :messages="$errors->get('cover_letter')" class="mt-2" />
                        </div>
                    </div>
                </template>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
