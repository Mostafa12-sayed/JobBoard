@extends('Website.layouts.master')
@section('content')
    <style>
        .button{
            margin-top: 0 !important;
        }
        .logout button{
            background-color: transparent !important;
            border: none !important;
            color: #007bff !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            padding: 0 !important;
            text-transform: capitalize !important;
            margin-top: 10px !important;
            text-decoration: underline !important;
        }
        .logout button:hover{
            background-color: transparent !important;
            border: none !important;
            color: #0056b3 !important;
        }
    </style>
    @component('Website.layouts.includes.bradcamp')

    @slot('title' )
    Verify Email
    @endslot
    @endcomponent


    <div class="account-login section m-4 bg-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
           
              {{-- <form  class="card login-form" method="POST" action="{{ route('login') }}">
                      @csrf --}}
                      <div class="card login-form">
                <div class="card-body">
                  <div class="title">
                    <h3>Verify Email</h3>
                    <p>
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.                     </p>
                  </div>

                  <div
                    class="d-flex flex-wrap justify-content-between bottom-content align-items-center"
                  >
                    <div class="">
                
                        <form method="POST" action="{{ route('resend.verification.email') }}">
                            @csrf
                            <input type="email" name="email" value="{{ Auth::user()->email }}" hidden>
                            <div class="button">
                                <button class="btn submit" type="submit"  >Resend Verification Email</button>
                              </div>
                        </form>                    </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                
                            <div class="button logout">
                                <button class="btn submit" type="submit"  >Log Out</button>
                              </div>
                        </form>
                 
                  </div>
          
                
                </div>
            </div>
              {{-- </form> --}}
            </div>
          </div>
        </div>
      </div>

{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
@endsection