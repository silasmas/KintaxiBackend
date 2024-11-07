@extends('layouts.guest', ['page_title' => __('miscellaneous.login_title2')])

@section('guest-content')
                            <div class="login-form">
                                <form action="{{ route('login') }}" method="post">
    @csrf
                                    <h3 class="h3 mb-5 text-center fw-bold text-uppercase">@lang('miscellaneous.main_title')</h3>

                                    <!-- User name -->
                                    <div class="form-group mb-3">
                                        <label role="button" for="login_username" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.login_username')</label>
                                        <input type="text" name="login_username" id="login_username" class="au-input au-input--full" placeholder="@lang('miscellaneous.login_username')" autofocus>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group mb-3">
                                        <label role="button" for="login_password" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.password.label')</label>
                                        <input type="password" name="login_password" id="login_password" class="au-input au-input--full" placeholder="@lang('miscellaneous.password.label')">
                                    </div>

                                    <!-- Remember -->
                                    <div class="login-checkbox mb-5 text-center">
                                        <label role="button" class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input" style="vertical-align: -2px;">@lang('miscellaneous.remember_me')
                                        </label>
                                        <label>
                                            <a href="{{ route('password.request') }}" class="small text-decoration-underline">@lang('miscellaneous.forgotten_password')</a>
                                        </label>
                                    </div>

                                    <button class="btn btn-warning w-100 rounded-pill mb-3 py-2 shadow-0" type="submit">@lang('auth.login')</button>
                                </form>

    @empty($admins)
                                <p class="text-center">
                                    <a href="{{ route('register') }}" class="text-decoration-underline">@lang('miscellaneous.go_register')</a>
                                </p>
    @endempty
                            </div>
@endsection