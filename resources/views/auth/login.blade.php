@extends('layouts.guest')

@section('guest-content')
                            <div class="login-form">
                                <form action="{{ route('login') }}" method="post">
                                    <h3 class="h3 mb-4 text-center fw-bold">@lang('miscellaneous.login_title2')</h3>

                                    <!-- User name -->
                                    <div class="form-group mb-3">
                                        <label class="form-label d-lg-inline-block d-none">@lang('miscellaneous.login_username')</label>
                                        <input type="text" name="login_username" class="au-input au-input--full" placeholder="@lang('miscellaneous.login_username')" autofocus>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group mb-3">
                                        <label class="form-label d-lg-inline-block d-none">@lang('miscellaneous.password.label')</label>
                                        <input type="password" name="password" class="au-input au-input--full" placeholder="@lang('miscellaneous.password.label')">
                                    </div>

                                    <!-- Remember -->
                                    <div class="login-checkbox mb-4 text-center">
                                        <label>
                                            <input type="checkbox" name="remember">@lang('miscellaneous.remember_me')
                                        </label>
                                        <label>
                                            <a href="#" class="small text-decoration-underline">@lang('miscellaneous.forgotten_password')</a>
                                        </label>
                                    </div>

                                    <button class="btn btn-warning w-100 rounded-pill mb-4 py-2 shadow-0" type="submit">@lang('auth.login')</button>
                                </form>

                                <p class="text-center">
                                    <a href="{{ route('register') }}" class="text-decoration-underline">@lang('miscellaneous.go_register')</a>
                                </p>
                            </div>
@endsection