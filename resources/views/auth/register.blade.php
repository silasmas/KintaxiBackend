@extends('layouts.guest', ['page_title' => __('miscellaneous.register_title1')])

@section('guest-content')
                            <div class="login-form">
                                <form action="{{ route('register') }}" method="post">
    @csrf
                                    <h3 class="h3 mb-5 text-center fw-bold text-uppercase">@lang('miscellaneous.main_title')</h3>

                                    <div class="row g-3 mb-3">
                                        <!-- First name -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_firstname" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.firstname')</label>
                                                <input type="text" name="register_firstname" id="register_firstname" class="au-input au-input--full" placeholder="@lang('miscellaneous.firstname')" autofocus>
                                            </div>
                                        </div>

                                        <!-- Last name -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_lastname" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.lastname')</label>
                                                <input type="text" name="register_lastname" id="register_lastname" class="au-input au-input--full" placeholder="@lang('miscellaneous.lastname')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-3">
                                        <!-- Surname -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_surname" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.surname')</label>
                                                <input type="text" name="register_surname" id="register_surname" class="au-input au-input--full" placeholder="@lang('miscellaneous.surname')">
                                            </div>
                                        </div>

                                        <!-- User name -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_username" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.username')</label>
                                                <input type="text" name="register_username" id="register_username" class="au-input au-input--full" placeholder="@lang('miscellaneous.username')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-3">
                                        <!-- Birth date -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="birthdate" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.birth_date.label')</label>
                                                <input type="text" name="register_birthdate" id="birthdate" class="au-input au-input--full" placeholder="@lang('miscellaneous.birth_date.label')">
                                            </div>
                                        </div>

                                        <!-- Gender -->
                                        <div class="col-sm-6 text-center">
                                            <p class="mb-lg-1 mb-0">@lang('miscellaneous.gender_title')</p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="register_gender" id="male" value="M">
                                                <label class="form-check-label" for="male">@lang('miscellaneous.gender1')</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="register_gender" id="female" value="F">
                                                <label class="form-check-label" for="female">@lang('miscellaneous.gender2')</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-3">
                                        <!-- Phone -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_phone" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.phone')</label>
                                                <input type="text" name="register_phone" id="register_phone" class="au-input au-input--full" placeholder="@lang('miscellaneous.phone')">
                                            </div>
                                        </div>

                                        <!-- E-mail -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_email" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.email')</label>
                                                <input type="text" name="register_email" id="register_email" class="au-input au-input--full" placeholder="@lang('miscellaneous.email')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-5">
                                        <!-- Password -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_password" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.password.label')</label>
                                                <input type="password" name="register_password" id="register_password" class="au-input au-input--full" placeholder="@lang('miscellaneous.password.label')">
                                            </div>
                                        </div>

                                        <!-- Confirm password -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="confirm_password" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.confirm_password.label')</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="au-input au-input--full" placeholder="@lang('miscellaneous.confirm_password.label')">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-success w-100 rounded-pill mb-3 py-2 shadow-0" type="submit">@lang('auth.register')</button>
                                </form>
                            </div>
@endsection