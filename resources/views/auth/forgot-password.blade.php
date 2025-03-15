@extends('Website.layouts.master')
@section('content')

    @component('Website.layouts.includes.bradcamp')

    @slot('title' )
    Forget Password
    @endslot
    @endcomponent

    <div class="account-login section m-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <x-auth-session-status class="mb-4" :status="session('status')" />

            <form  class="card login-form" method="POST" action="{{ route('password.email')}}">
                    @csrf
              <div class="card-body">
                <div class="title">
                  <h3>Forget Password</h3>
                  <p>
                    Enter your email address below and we will send you a link to reset your password.

                  </p>
                </div>
                
                <div class="form-group input-group">
                  <label for="reg-fn">Email</label>
                  <input
                    class="form-control"
                    type="email"
                    id="reg-email"
                    name="email"
                    value="{{old('email')}}"
                    required
                  />
                  <x-input-error style="color: red" :messages="$errors->get('email')" class="mt-2" />

                </div>
                <div class="button">
                  <button class="btn submit" type="submit"  >Email Password Reset Link</button>
                </div>
                <p class="outer-link">
                  Don't have an account?
                  <a href="{{route('register')}}">Register here </a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <style>
        .submit{
            background-color: rgb(1, 132, 255) !important;
            color: white !important;
            border: none !important;
            padding: 10px 20px !important;
            border-radius: 5px !important;
            transition: all 0.3s ease 0s !important;
        }
        .submit:hover{
            background-color:rgb(8, 106, 197) !important;
        }
    </style>
@endsection


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}