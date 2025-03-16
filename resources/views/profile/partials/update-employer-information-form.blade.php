@php
    $profileData = Auth::user()->employee;
@endphp

<form method="POST" action="{{ route('profile.update.employer') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <!-- Company Name -->
    <div>
        <x-input-label for="company_name" :value="__('Company Name')" />
        <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', $profileData->company_name)" />
        <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
    </div>

    <!-- Company Logo -->
    <div class="mt-4">
        <x-input-label for="company_logo" :value="__('Company Logo')" />
        <input id="company_logo" name="company_logo" type="file" class="mt-1 block w-full" />
        @if ($profileData->company_logo)
            <p class="mt-2">Current logo: <img src="{{ Storage::url($profileData->company_logo) }}" alt="Company Logo" style="max-width: 100px;"></p>
        @endif
        <x-input-error class="mt-2" :messages="$errors->get('company_logo')" />
    </div>

    <!-- Position -->
    <div class="mt-4">
        <x-input-label for="position" :value="__('Position')" />
        <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" :value="old('position', $profileData->position)" />
        <x-input-error class="mt-2" :messages="$errors->get('position')" />
    </div>

    <!-- Phone Number -->
    <div class="mt-4">
        <x-input-label for="phone_number" :value="__('Phone Number')" />
        <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $profileData->phone_number)" />
        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
    </div>

    <!-- Address -->
    <div class="mt-4">
        <x-input-label for="address" :value="__('Address')" />
        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $profileData->address)" />
        <x-input-error class="mt-2" :messages="$errors->get('address')" />
    </div>

    <!-- Submit Button -->
    <div class="flex items-center gap-4 mt-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
