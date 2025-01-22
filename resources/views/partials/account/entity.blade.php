
@if ($entity == 'account_settings')

                                                <!-- TAB-CONTENT 2 : Account settings -->
                                                <div class="tab-pane fade show active" id="account-tabs-2" role="tabpanel" aria-labelledby="account-tab-2">
                                                    <h1 class="h1 d-lg-none mb-4 fw-bold">@lang('miscellaneous.settings')</h1>

                                                    <form method="POST" action="{{ route('account.entity', ['entity' => 'account_settings']) }}">
    @csrf
                                                        <input type="hidden" name="user_id" value="{{ $current_user['id'] }}">

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- First name -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="@lang('miscellaneous.firstname')" value="{{ $current_user['firstname'] }}" autofocus>
                                                                    <label for="firstname">@lang('miscellaneous.firstname')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- Last name -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="@lang('miscellaneous.lastname')" value="{{ $current_user['lastname'] }}">
                                                                    <label for="lastname">@lang('miscellaneous.lastname')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- Surname -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="surname" id="surname" class="form-control" placeholder="@lang('miscellaneous.surname')" value="{{ $current_user['surname'] }}">
                                                                    <label for="surname">@lang('miscellaneous.surname')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- User name -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="username" id="username" class="form-control" placeholder="@lang('miscellaneous.username')" value="{{ $current_user['username'] }}" />
                                                                    <label class="form-label" for="username">@lang('miscellaneous.username')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- Birth city/date -->
                                                                <div class="form-floating mt-3">
                                                                    <input type="text" name="birthdate" id="birthdate" class="form-control" placeholder="@lang('miscellaneous.birth_date.label')" value="{{ !empty($current_user['birthdate']) ? str_starts_with(app()->getLocale(), 'fr') ? \Carbon\Carbon::createFromFormat('Y-m-d', $current_user['birthdate'])->format('d/m/Y') : \Carbon\Carbon::createFromFormat('Y-m-d', $current_user['birthdate'])->format('m/d/Y') : null }}" />
                                                                    <label class="form-label" for="birthdate">@lang('miscellaneous.birth_date.label')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- Gender -->
                                                                <div class="text-center">
                                                                    <p class="mb-lg-1 mb-0">@lang('miscellaneous.gender_title')</p>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="M"{{ $current_user['gender'] == 'M' ? ' checked' : '' }}>
                                                                        <label class="form-check-label" for="male">@lang('miscellaneous.gender1')</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="F"{{ $current_user['gender'] == 'F' ? ' checked' : '' }}>
                                                                        <label class="form-check-label" for="female">@lang('miscellaneous.gender2')</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- Phone -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="@lang('miscellaneous.phone')" aria-describedby="phone_error_message" value="{{ $current_user['phone'] }}" />
                                                                    <label class="form-label" for="phone">@lang('miscellaneous.phone')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- E-mail -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="email" id="email" class="form-control" placeholder="@lang('miscellaneous.email')" value="{{ $current_user['email'] }}" />
                                                                    <label class="form-label" for="email">@lang('miscellaneous.email')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- P.O Box -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="p_o_box" id="p_o_box" class="form-control" placeholder="@lang('miscellaneous.p_o_box')" value="{{ $current_user['p_o_box'] }}" />
                                                                    <label class="form-label" for="p_o_box">@lang('miscellaneous.p_o_box')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- Address line 1 -->
                                                                <div class="form-floating">
                                                                    <textarea name="address_1" id="address_1" class="form-control" placeholder="@lang('miscellaneous.address.line1')">{{ $current_user['address_1'] }}</textarea>
                                                                    <label class="form-label" for="address_1">@lang('miscellaneous.address.line1')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- Address line 2 -->
                                                                <div class="form-floating">
                                                                    <textarea name="address_2" id="address_2" class="form-control" placeholder="@lang('miscellaneous.address.line2')">{{ $current_user['address_2'] }}</textarea>
                                                                    <label class="form-label" for="address_2">@lang('miscellaneous.address.line2')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- City -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="city" id="city" class="form-control" placeholder="@lang('miscellaneous.address.city')" value="{{ $current_user['city'] }}" />
                                                                    <label class="form-label" for="city">@lang('miscellaneous.address.city')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- Country -->
                                                                <div class="form-floating">
                                                                    <select name="country_code" id="country" class="form-select" aria-label="@lang('miscellaneous.choose_country')">
                                                                        <option class="small" disabled {{ $current_user['country'] == null ? ' selected' : '' }}>@lang('miscellaneous.choose_country')</option>
    @foreach ($countries as $country)
                                                                        <option value="{{ $country['code'] }}"{{ $current_user['country'] != null ? ($country['code'] == $current_user['country']['code'] ? ' selected' : '') : '' }}>{{ $country['name_' . app()->getLocale()] }}</option>
    @endforeach
                                                                    </select>
                                                                    <label class="form-label" for="country">@lang('miscellaneous.address.country')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-8 mx-auto">
                                                                <button class="btn btn-primary btn-block mt-2 rounded-pill" type="submit">@lang('miscellaneous.account.personal_infos.link')</button>
                                                            </div>
                                                        </div>
{{-- 
                                                        <hr class="my-4">

                                                        <a role="button" class="btn btn-block btn-outline-danger rounded-pill py-2 px-5" data-ktx-status="{{ $current_user['status']->id }}" onclick="event.preventDefault(); toggleStatus('user', this)">
                                                            <i class="bi bi-x-circle-fill me-2 align-middle fs-4"></i>@lang('miscellaneous.account.deactivated.link')
                                                        </a> --}}
                                                    </form>
                                                </div>

@endif

@if ($entity == 'password_update')

                                                <!-- TAB-CONTENT 3 : Update password -->
                                                <div class="tab-pane fade show active" id="account-tabs-3" role="tabpanel" aria-labelledby="account-tab-3">
                                                    <h1 class="h1 d-lg-none mb-4 fw-bold">@lang('miscellaneous.account.update_password.title')</h1>

                                                    <div class="row py-4">
                                                        <div class="col-lg-7 col-sm-9 mx-auto">
                                                            <form method="POST" action="{{ route('account.entity', ['entity' => 'password_update']) }}">
    @csrf
                                                                <input type="hidden" name="user_id" value="{{ $current_user['id'] }}">

                                                                <!-- Former password -->
                                                                <div class="form-floating">
                                                                    <input type="password" name="former_password" id="former_password" class="form-control" placeholder="@lang('miscellaneous.account.update_password.former_password')" required />
                                                                    <label class="form-label" for="former_password">@lang('miscellaneous.account.update_password.former_password')</label>
                                                                </div>

                                                                <!-- New password -->
                                                                <div class="form-floating mt-3">
                                                                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="@lang('miscellaneous.account.update_password.new_password')" required />
                                                                    <label class="form-label" for="new_password">@lang('miscellaneous.account.update_password.new_password')</label>
                                                                </div>

                                                                <!-- Confirm new password -->
                                                                <div class="form-floating mt-3">
                                                                    <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" placeholder="@lang('miscellaneous.account.update_password.confirm_new_password')" required />
                                                                    <label class="form-label" for="confirm_new_password">@lang('miscellaneous.account.update_password.confirm_new_password')</label>
                                                                </div>

                                                                <div class="row g-2 mt-3">
                                                                    <div class="col-lg-6 mx-auto">
                                                                        <button class="btn btn-primary btn-block rounded-pill" type="submit">@lang('miscellaneous.register')</button>
                                                                    </div>
                                                                    <div class="col-lg-6 mx-auto">
                                                                        <button class="btn btn-light btn-block border rounded-pill" type="reset">@lang('miscellaneous.reset')</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

@endif
