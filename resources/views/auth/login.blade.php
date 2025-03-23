@extends('Website.layouts.master')
@section('content')

    @component('Website.layouts.includes.bradcamp')

    @slot('title' )
    Login in
    @endslot
    @endcomponent

    <div class="account-login section m-4 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
         
            <form  class="card login-form" method="POST" action="{{ route('login') }}">
                    @csrf
              <div class="card-body">
                <div class="title">
                  <h3>Login Now</h3>
                  <p>
                    You can login using your LinkedIn Email.
                  </p>
                </div>
                <div class="social-login">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                      <a class="btn facebook-btn" href="javascript:void(0)"
                        ><i class="lni lni-facebook-filled"></i> Linkedin </a
                      >
                    </div>
                  </div>
                </div>
                <div class="alt-option">
                  <span>Or</span>
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
                <div class="form-group input-group">
                  <label for="reg-fn">Password</label>
                  <input
                    class="form-control"
                    type="password"
                    id="reg-pass"
                    name="password"
                    required
                  />
                <x-input-error style="color: red" :messages="$errors->get('password')" class="mt-2" />

                </div>
                <div
                  class="d-flex flex-wrap justify-content-between bottom-content"
                >
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input width-auto"
                      id="remember"
                      name="remember"
                    />
                    <label class="form-check-label" for="remember">Remember me</label>
                  </div>
                  @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 hover:text-gray-900 lost-pass rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                      {{ __('Forgot your password?') }}
                  </a>
                @endif
                </div>
                <div class="button">
                  <button class="btn submit" type="submit"  >Login</button>
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
   
@endsection





{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}