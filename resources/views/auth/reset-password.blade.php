{{-- @extends('Website.layouts.master')

@section('content')
@component('Website.layouts.includes.bradcamp')

@slot('title' )
Reset Password
@endslot
@endcomponent --}}
{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('Website.layouts.master')
@section('title' ,' Reset Password')
@section('content')

    @component('Website.layouts.includes.bradcamp')

    @slot('title' )
    Reset Password
    @endslot
    @endcomponent

    <div class="account-login section m-4 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
         
            <form  class="card login-form" method="POST" action="{{ route('password.forget.link.submit') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

              <div class="card-body">
                <div class="title">
                  <h3>Reset Password</h3>
                  <p>
                    Please enter your new password.
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
                <div class="form-group input-group">
                  <label for="reg-fn">Confirm Password</label>
                  <input
                    class="form-control"
                    type="password"
                    id="reg-pass"
                    name="password_confirmation"
                    required
                  />
                <x-input-error style="color: red" :messages="$errors->get('password_confirmation')" class="mt-2" />

                </div>
                <div class="button">
                  <button class="btn submit" type="submit"  >Reset Password</button>
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


