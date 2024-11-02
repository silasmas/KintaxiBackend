@extends('layouts.guest')

@section('guest-content')
                            <div class="login-form">
                                <div class="card card-body rounded-4 shadow-0 text-center p-4 p-sm-5">
                                    <h1 class="display-1 fw-bold text-danger">401</h1>
                                    <h2 class="h2 mb-4">{{ __('notifications.401_title') }}</h2>
                                    <p class="mb-4 fw-light" style="line-height: 1rem;">{{ __('notifications.401_description') }}</p>
                                    <a href="{{ route('home') }}" class="btn btn-warning rounded-pill py-3 shadow-0">{{ __('miscellaneous.back_home') }}</a>
                                </div>
                            </div>
@endsection
