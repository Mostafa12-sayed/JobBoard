
@extends('Website.layouts.master')

@section('title', 'Edit Profile')

@section('css')
<style>
    .max-w-md{
        max-width: 45rem !important
    }
    .profile{
        margin-top: 100px !important
    }
    .header-area{
        background-color: rgba(0, 29, 56, 0.8) !important;
    }
</style>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

@endsection
@section('content')
<div class="py-12 profile">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Update Profile Information (Name, Email) -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Role-Specific Edit Form -->
        @if (Auth::user()->role === 'employer')
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-employer-information-form')
                </div>
            </div>
        @elseif (Auth::user()->role === 'candidate')
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-candidate-information-form')
                </div>
            </div>
        @endif

        <!-- Update Password -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete User -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script>
     var input = document.querySelector('input[name=skills]');
        var tagifySkills = new Tagify(input);        
        var existingSkilles = @json(json_decode($user->skills, true));
        if (existingSkilles) {
            tagifySkills.addTags(existingSkilles);
        }
        var inputLanguage = document.querySelector('input[name=languages]');
        var tagifyLanguage = new Tagify(inputLanguage);        
        var existingLanguages = @json(json_decode($user->languages, true));
        if (existingLanguages) {
            tagifyLanguage.addTags(existingLanguages);
        }


        var inputInrested = document.querySelector('input[name=interests]');
        var tagifyInrested = new Tagify(inputInrested);        
        var existingInterested = @json(json_decode($user->interests, true));
        if (existingInterested) {
            tagifyInrested.addTags(existingInterested);
        }
</script>

@endsection
