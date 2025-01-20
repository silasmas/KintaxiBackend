@extends('layouts.app')

@section('app-content')

                <!-- UPDATE ADMIN-->
                <section class="pt-4 pb-5">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4 col-sm-5 mx-auto">
                                    <div class="card rounded-4">
                                        <div class="card-body text-center">
                                            <div class="bg-image mb-2">
                                                <img src="{{ $current_user['avatar_url'] != null ? $current_user['avatar_url'] : asset('assets/img/user.png') }}" alt="{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}" class="user-image img-fluid img-thumbnail rounded-4">
                                                <div class="mask">
                                                    <form method="POST">
                                                        <input type="hidden" name="user_id" id="user_id" value="{{ $current_user['id'] }}">
                                                        <label for="avatar" class="btn btn-light position-absolute pt-2 rounded-circle shadow" style="bottom: 1rem; right: 1rem; text-transform: inherit!important;" title="@lang('miscellaneous.change_image')" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                            <span class="bi bi-pencil-fill"></span>
                                                            <input type="file" name="avatar" id="avatar" class="d-none">
                                                        </label>
                                                    </form>
                                                </div>
                                            </div>

                                            <h4 class="h4 m-0 fw-bold">{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}</h4>
    @if (!empty($current_user['username']))
                                            <p class="card-text m-0 text-muted">{{ '@' . $current_user['username'] }}</p>
    @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-sm-7 col-12">
                                    <div class="card rounded-4">
                                        <div class="card-body text-center">
                                            <ul id="account" class="nav nav-tabs nav-justified mb-3" role="tablist">
                                                <!-- TAB 1 : Personal infos -->
                                                <li class="nav-item" role="presentation">
                                                    <a id="account-tab-1" class="nav-link px-lg-1{{ \Session::has('response_error') == false && \Session::has('response_pw_error') == false ? ' active' : '' }}" data-bs-toggle="tab" href="#account-tabs-1" role="tab" aria-controls="account-tabs-1" aria-selected="true">
                                                        <i class="bi bi-list-ul me-lg-2 cnpr-align-middle fs-4"></i><span class="d-lg-inline d-none">@lang('miscellaneous.pages_content.account.personal_infos.title')</span>
                                                    </a>
                                                </li>

                                                <!-- TAB 2 : Account settings -->
                                                <li class="nav-item" role="presentation">
                                                    <a id="account-tab-2" class="nav-link px-lg-1{{ \Session::has('response_error') && explode('_', \Session::get('response_error'))[0] == 'account-tabs-2' ? ' active' : '' }}" data-bs-toggle="tab" href="#account-tabs-2" role="tab" aria-controls="account-tabs-2" aria-selected="false" onclick="document.getElementById('register_firstname').focus();">
                                                        <i class="bi bi-gear me-lg-2 cnpr-align-middle fs-4"></i><span class="d-lg-inline d-none">@lang('miscellaneous.settings')</span>
                                                    </a>
                                                </li>

                                                <!-- TAB 3 : Update password -->
                                                <li class="nav-item" role="presentation">
                                                    <a id="account-tab-3" class="nav-link px-lg-1{{ \Session::has('response_pw_error') && explode('~', \Session::get('response_pw_error'))[0] == 'account-tabs-3' ? ' active' : '' }}" data-bs-toggle="tab" href="#account-tabs-3" role="tab" aria-controls="account-tabs-3" aria-selected="false" onclick="document.getElementById('register_former_password').focus();">
                                                        <i class="bi bi-shield-lock me-lg-2 cnpr-align-middle fs-4"></i><span class="d-lg-inline d-none">@lang('miscellaneous.pages_content.account.update_password.title')</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div id="account-content" class="tab-content p-3">
                                                <!-- TAB-CONTENT 1 : Personal infos -->
                                                <div class="tab-pane text-start fade{{ \Session::has('response_error') == false && \Session::has('response_pw_error') == false ? ' show active' : '' }}" id="account-tabs-1" role="tabpanel" aria-labelledby="account-tab-1">
                                                    <h1 class="h1 d-lg-none mb-4 text-center fw-bold">@lang('miscellaneous.pages_content.account.personal_infos.title')</h1>

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <!-- First name -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.firstname')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['firstname']) ? $current_user['firstname'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Last name -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.lastname')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td class="text-uppercase">{{ !empty($current_user['lastname']) ? $current_user['lastname'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Surname -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.surname')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td class="text-uppercase">{{ !empty($current_user['surname']) ? $current_user['surname'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Username -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.username.label')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['username']) ? '@' . $current_user['username'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Gender -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.gender_title')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['gender']) ? ($current_user['gender'] == 'F' ? __('miscellaneous.gender2') : __('miscellaneous.gender1')) : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Birth date -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.birth_date.label')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['birthdate']) ? ucfirst(__('miscellaneous.on_date')) . ' ' . explicitDate($current_user['birthdate']) : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- E-mail -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.email')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['email']) ? $current_user['email'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Phone -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.phone')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['phone']) ? $current_user['phone'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Addresses -->
    @if (!empty($current_user['address_1']) && !empty($current_user['address_2']))
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.addresses')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>
                                                                    <ul class="ps-0">
                                                                        <li class="cnpr-line-height-1_1 mb-2" style="list-style: none;">
                                                                            <i class="bi bi-geo-alt-fill me-1"></i>{{ $current_user['address_1'] }}
                                                                        </li>
                                                                        <li class="cnpr-line-height-1_1" style="list-style: none;">
                                                                            <i class="bi bi-geo-alt-fill me-1"></i>{{ $current_user['address_2'] }}
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
    @else
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.address.title')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['address_1']) ? $current_user['address_1'] : (!empty($current_user['address_2']) ? $current_user['address_2'] : '- - - - - -') }}</td>
                                                            </tr>
    @endif

                                                            <!-- P.O. box -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.p_o_box')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['p_o_box']) ? $current_user['p_o_box'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Role -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.menu.role.title')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ $current_user['role']->resource != null ? $current_user['role']->role_name : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- City -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.address.city')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['city']) ? $current_user['city'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Country -->
                                                            <tr>
                                                                <td class="border-bottom-0"><strong>@lang('miscellaneous.address.country')</strong></td>
                                                                <td class="border-bottom-0">@lang('miscellaneous.colon_after_word')</td>
                                                                <td class="border-bottom-0">{{ $current_user['country'] != null ? $current_user['country']['name_' . app()->getLocale()] : '- - - - - -' }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!-- TAB-CONTENT 2 : Account settings -->
                                                <div class="tab-pane fade{{ \Session::has('response_error') && explode('_', \Session::get('response_error'))[0] == 'account-tabs-2' ? ' show active' : '' }}" id="account-tabs-2" role="tabpanel" aria-labelledby="account-tab-2">
                                                    <h1 class="h1 d-lg-none mb-4 fw-bold">@lang('miscellaneous.settings')</h1>

                                                    <form method="POST" action="{{ route('account') }}">
    @csrf
                                                        <input type="hidden" name="user_id" value="{{ $current_user['id'] }}">

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- First name -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="register_firstname" id="register_firstname" class="form-control" placeholder="@lang('miscellaneous.firstname')" aria-describedby="firstname_error_message" value="{{ $current_user->firstname }}" />
                                                                    <label class="form-label" for="register_firstname">@lang('miscellaneous.firstname')</label>
                                                                </div>
    @if (\Session::has('response_error') && explode('~', \Session::get('response_error'))[12] == explode('~', \Session::get('response_error'))[1])
                                                                <p id="firstname_error_message" class="text-center text-danger small">{{ explode('~', \Session::get('response_error'))[13] }}</p>
    @endif
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- Last name -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="register_lastname" id="register_lastname" class="form-control" placeholder="@lang('miscellaneous.lastname')" value="{{ $current_user->lastname }}" />
                                                                    <label class="form-label" for="register_lastname">@lang('miscellaneous.lastname')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- Surname -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="register_surname" id="register_surname" class="form-control" placeholder="@lang('miscellaneous.surname')" value="{{ $current_user->surname }}" />
                                                                    <label class="form-label" for="register_surname">@lang('miscellaneous.surname')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- Birth city/date -->
                                                                <div class="row g-sm-2 g-2">
                                                                    <div class="col-12">
                                                                        <p class="mb-0">@lang('miscellaneous.birth_city_date')</p>
                                                                    </div>

                                                                    <div class="col-sm-7">
                                                                        <div class="form-floating">
                                                                            <input type="text" name="register_birth_city" id="register_birth_city" class="form-control" placeholder="@lang('miscellaneous.birth_city')" value="{{ $current_user->birth_city }}" />
                                                                            <label class="form-label" for="register_birth_city">@lang('miscellaneous.birth_city')</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-5">
                                                                        <div class="form-floating mt-sm-0 mt-2">
                                                                            <input type="text" name="register_birth_date" id="register_birthdate" class="form-control" placeholder="@lang('miscellaneous.birth_date.label')" value="{{ !empty($current_user->birth_date) ? str_starts_with(app()->getLocale(), 'fr') ? \Carbon\Carbon::createFromFormat('Y-m-d', $current_user->birth_date)->format('d/m/Y') : \Carbon\Carbon::createFromFormat('Y-m-d', $current_user->birth_date)->format('m/d/Y') : null }}" />
                                                                            <label class="form-label" for="register_birthdate">@lang('miscellaneous.birth_date.label')</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- Gender -->
                                                                <div class="text-center">
                                                                    <p class="mb-lg-1 mb-0">@lang('miscellaneous.gender_title')</p>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="register_gender" id="male" value="M"{{ $current_user->gender == 'M' ? ' checked' : '' }}>
                                                                        <label class="form-check-label" for="male">@lang('miscellaneous.gender1')</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="register_gender" id="female" value="F"{{ $current_user->gender == 'F' ? ' checked' : '' }}>
                                                                        <label class="form-check-label" for="female">@lang('miscellaneous.gender2')</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- Username -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="register_username" id="register_username" class="form-control" placeholder="@lang('miscellaneous.username.label')" aria-describedby="username_error_message" value="{{ $current_user->username }}" />
                                                                    <label class="form-label" for="register_username">@lang('miscellaneous.username.label')</label>
                                                                </div>
    @if (\Session::has('response_error') && !empty(explode('~', \Session::get('response_error'))[12]) && explode('~', \Session::get('response_error'))[12] == explode('~', \Session::get('response_error'))[11])
                                                                <p id="username_error_message" class="text-center text-danger small">{{ explode('~', \Session::get('response_error'))[13] }}</p>
    @else
                                                                <p id="username_error_message" class="text-end fst-italic text-muted small">@lang('miscellaneous.username.description')</p>
    @endif
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- Phone -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="register_phone" id="register_phone" class="form-control" placeholder="@lang('miscellaneous.phone')" aria-describedby="phone_error_message" value="{{ $current_user->phone }}" />
                                                                    <label class="form-label" for="register_phone">@lang('miscellaneous.phone')</label>
                                                                </div>
    @if (\Session::has('response_error') && explode('~', \Session::get('response_error'))[12] == explode('~', \Session::get('response_error'))[9])
                                                                <p id="phone_error_message" class="text-center text-danger small">{{ explode('~', \Session::get('response_error'))[13] }}</p>
    @endif
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- E-mail -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="register_email" id="register_email" class="form-control" placeholder="@lang('miscellaneous.email')" value="{{ $current_user->email }}" />
                                                                    <label class="form-label" for="register_email">@lang('miscellaneous.email')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- P.O Box -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="register_p_o_box" id="register_p_o_box" class="form-control" placeholder="@lang('miscellaneous.p_o_box')" value="{{ $current_user->p_o_box }}" />
                                                                    <label class="form-label" for="register_p_o_box">@lang('miscellaneous.p_o_box')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
    @if (inArrayR('Manager', $current_user->roles, 'role_name'))
                                                            <div class="col-lg-6">
                                                                <!-- Choose department -->
                                                                <div class="form-floating">
                                                                    <select name="department_id" id="department_id" class="form-select pt-2 rounded-0">
                                                                        <option class="small" selected disabled>@lang('miscellaneous.department')</option>
        @forelse ($departments as $department)
                                                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
        @empty
                                                                        <option>@lang('miscellaneous.empty_list')</option>
        @endforelse
                                                                    </select>
                                                                </div>
                                                            </div>
    @endif
                                                            <div class="col-lg-6 mx-auto">
                                                                <!-- Office -->
                                                                <div class="form-floating">
                                                                    <input type="text" name="register_office" id="register_office" class="form-control" placeholder="@lang('miscellaneous.office')" value="{{ $current_user->office }}" />
                                                                    <label class="form-label" for="register_surname">@lang('miscellaneous.office')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-6">
                                                                <!-- Address line 1 -->
                                                                <div class="form-floating">
                                                                    <textarea name="register_address_1" id="register_address_1" class="form-control" placeholder="@lang('miscellaneous.address.line1')" style="min-height: 5rem;">{{ $current_user->address_1 }}</textarea>
                                                                    <label class="form-label" for="register_address_1">@lang('miscellaneous.address.line1')</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <!-- Address line 2 -->
                                                                <div class="form-floating">
                                                                    <textarea name="register_address_2" id="register_address_2" class="form-control" placeholder="@lang('miscellaneous.address.line2')" style="min-height: 5rem;">{{ $current_user->address_2 }}</textarea>
                                                                    <label class="form-label" for="register_address_2">@lang('miscellaneous.address.line2')</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-8 mx-auto">
                                                                <button class="btn btn-primary btn-block mt-2 rounded-pill" type="submit">@lang('miscellaneous.pages_content.account.personal_infos.link')</button>
                                                            </div>
                                                        </div>

                                                        <hr class="my-4">

                                                        <a role="button" id="accountActivation" class="btn btn-block btn-outline-danger rounded-pill py-2 px-5" data-cnpr-status="{{ $current_user->status->status_name }}">
                                                            <i class="bi bi-x-circle-fill me-2 cnpr-align-middle fs-4"></i>@lang('miscellaneous.pages_content.account.deactivated.link')
                                                        </a>
                                                    </form>
                                                </div>

                                                <!-- TAB-CONTENT 3 : Update password -->
                                                <div class="tab-pane fade{{ \Session::has('response_pw_error') && explode('~', \Session::get('response_pw_error'))[0] == 'account-tabs-3' ? ' show active' : '' }}" id="account-tabs-3" role="tabpanel" aria-labelledby="account-tab-3">
                                                    <h1 class="h1 d-lg-none mb-4 fw-bold">@lang('miscellaneous.pages_content.account.update_password.title')</h1>

                                                    <div class="row py-4">
                                                        <div class="col-lg-7 col-sm-9 mx-auto">
                                                            <form method="POST" action="{{ route('account.update.password') }}">
    @csrf
                                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                                                <!-- Former password -->
                                                                <div class="form-floating">
                                                                    <input type="password" name="register_former_password" id="register_former_password" class="form-control" placeholder="@lang('miscellaneous.pages_content.account.update_password.former_password')" />
                                                                    <label class="form-label" for="register_former_password">@lang('miscellaneous.pages_content.account.update_password.former_password')</label>
                                                                </div>

                                                                <!-- New password -->
                                                                <div class="form-floating mt-3">
                                                                    <input type="password" name="register_new_password" id="register_new_password" class="form-control" placeholder="@lang('miscellaneous.pages_content.account.update_password.new_password')" />
                                                                    <label class="form-label" for="register_new_password">@lang('miscellaneous.pages_content.account.update_password.new_password')</label>
                                                                </div>

                                                                <!-- Confirm new password -->
                                                                <div class="form-floating mt-3">
                                                                    <input type="password" name="register_confirm_new_password" id="register_confirm_new_password" class="form-control" placeholder="@lang('miscellaneous.pages_content.account.update_password.confirm_new_password')" />
                                                                    <label class="form-label" for="register_confirm_new_password">@lang('miscellaneous.pages_content.account.update_password.confirm_new_password')</label>
                                                                </div>

                                                                <div class="row g-2 mt-3">
                                                                    <div class="col-lg-6 mx-auto">
                                                                        <button class="btn btn-primary btn-block rounded-pill" type="submit">@lang('miscellaneous.register')</button>
                                                                    </div>
                                                                    <div class="col-lg-6 mx-auto">
                                                                        <button class="btn btn-light btn-block border rounded-pill" type="reset">@lang('miscellaneous.reset')</button>
                                                                    </div>
                                                                </div>

    @if (\Session::has('response_pw_error'))
                                                                <div class="alert alert-danger mt-3 mb-0 py-2 small rounded-0 cnpr-line-height-1" role="alert">
                                                                    <i class="bi bi-exclamation-triangle me-2 fs-4" style="vertical-align: -3px;"></i> {{ explode('~', \Session::get('response_pw_error'))[5] }}
                                                                </div>
    @endif
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END UPDATE ADMIN-->

@endsection

