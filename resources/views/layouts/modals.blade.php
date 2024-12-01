@if (Route::is('status.home'))
        <!-- Start status -->
        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('status.home') }}" method="post">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="statusModalLabel">@lang('miscellaneous.admin.group.status.add')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <div class="form-floating mb-3">
                                <input type="text" name="status_name" id="status_name" class="form-control" placeholder="@lang('miscellaneous.admin.group.status.data.status_name')" required>
                                <label for="status_name">@lang('miscellaneous.admin.group.status.data.status_name')</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea name="status_description" id="status_description" class="form-control" placeholder="@lang('miscellaneous.description')"></textarea>
                                <label for="status_description">@lang('miscellaneous.description')</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="icon" id="icon" class="form-control" placeholder="@lang('miscellaneous.admin.icon_name')">
                                <label for="icon">@lang('miscellaneous.admin.icon_name')</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="color" id="color" class="form-control" placeholder="@lang('miscellaneous.admin.color_name')">
                                <label for="color">@lang('miscellaneous.admin.color_name')</label>
                            </div>
                        </div>
                        <div class="modal-footer d-block border-0">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill">@lang('miscellaneous.register')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End status -->
@endif

@if (Route::is('role.entity.home'))
        <!-- Start role -->
        <div class="modal fade" id="{{ $entity == 'manage-roles' ? 'roleModal' : 'userModal' }}" tabindex="-1" aria-labelledby="{{ $entity == 'manage-roles' ? 'roleModalLabel' : 'userModalLabel' }}" aria-hidden="true">
            <div class="modal-dialog">
    @if ($entity == 'manage-roles')
                <form action="{{ route('role.entity.home', ['entity' => $entity]) }}" method="post">
    @else
                <form>
    @endif
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="{{ $entity == 'manage-roles' ? 'roleModalLabel' : 'userModalLabel' }}">{{ $entity == 'manage-roles' ? __('miscellaneous.admin.role.add') : __('miscellaneous.admin.users.add') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body py-0">
    @if ($entity == 'manage-roles')
                            <div class="form-floating mb-3">
                                <input type="text" name="role_name" id="role_name" class="form-control" placeholder="@lang('miscellaneous.admin.role.data.role_name')" required>
                                <label for="role_name">@lang('miscellaneous.admin.role.data.role_name')</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea name="role_description" id="role_description" class="form-control" placeholder="@lang('miscellaneous.description')"></textarea>
                                <label for="role_description">@lang('miscellaneous.description')</label>
                            </div>
    @endif

    @if ($entity == 'users')
                            <!-- First name -->
                            <div class="form-floating mt-3">
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="@lang('miscellaneous.firstname')" required />
                                <label class="form-label" for="firstname">@lang('miscellaneous.firstname')</label>
                            </div>

                            <!-- Last name -->
                            <div class="form-floating mt-3">
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="@lang('miscellaneous.lastname')" />
                                <label class="form-label" for="lastname">@lang('miscellaneous.lastname')</label>
                            </div>

                            <!-- Surname -->
                            <div class="form-floating mt-3">
                                <input type="text" name="surname" id="surname" class="form-control" placeholder="@lang('miscellaneous.surname')" />
                                <label class="form-label" for="surname">@lang('miscellaneous.surname')</label>
                            </div>

                            <!-- Birth city/date -->
                            <div class="form-floating mt-3">
                                <input type="text" name="birthdate" id="birthdate" class="form-control" placeholder="@lang('miscellaneous.birth_date.label')" />
                                <label class="form-label" for="birthdate">@lang('miscellaneous.birth_date.label')</label>
                            </div>

                            <!-- Gender -->
                            <div class="mt-3 text-center">
                                <p class="mb-lg-1 mb-0">@lang('miscellaneous.gender_title')</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                                    <label class="form-check-label" for="male">@lang('miscellaneous.gender1')</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                                    <label class="form-check-label" for="female">@lang('miscellaneous.gender2')</label>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="form-floating mt-3">
                                <input type="text" name="username" id="username" class="form-control" placeholder="@lang('miscellaneous.username')" />
                                <label class="form-label" for="username">@lang('miscellaneous.username')</label>
                            </div>

                            <!-- Phone -->
                            <div class="form-floating mt-3">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="@lang('miscellaneous.phone')" />
                                <label class="form-label" for="phone">@lang('miscellaneous.phone')</label>
                            </div>

                            <!-- E-mail -->
                            <div class="form-floating mt-3">
                                <input type="text" name="email" id="email" class="form-control" placeholder="@lang('miscellaneous.email')" />
                                <label class="form-label" for="email">@lang('miscellaneous.email')</label>
                            </div>

                            <!-- Country -->
                            <div class="form-floating mt-3">
                                <select name="country_id" id="country" class="form-select" aria-label="@lang('miscellaneous.choose_country')">
        @foreach ($countries as $country)
                                    <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
        @endforeach
                                </select>
                                <label class="form-label" for="country">@lang('miscellaneous.choose_country')</label>
                            </div>

                            <!-- City -->
                            <div class="form-floating mt-3">
                                <input type="text" name="city" id="city" class="form-control" placeholder="@lang('miscellaneous.address.city')" />
                                <label class="form-label" for="city">@lang('miscellaneous.address.city')</label>
                            </div>

                            <!-- Address line 1 -->
                            <div class="form-floating mt-3">
                                <textarea name="address_1" id="address_1" class="form-control" placeholder="@lang('miscellaneous.address.line1')"></textarea>
                                <label class="form-label" for="address_1">@lang('miscellaneous.address.line1')</label>
                            </div>

                            <!-- Address line 2 -->
                            <div class="form-floating mt-3">
                                <textarea name="address_2" id="address_2" class="form-control" placeholder="@lang('miscellaneous.address.line2')"></textarea>
                                <label class="form-label" for="address_2">@lang('miscellaneous.address.line2')</label>
                            </div>

                            <!-- P.O Box -->
                            <div class="form-floating mt-3">
                                <input type="text" name="p_o_box" id="p_o_box" class="form-control" placeholder="@lang('miscellaneous.p_o_box')" />
                                <label class="form-label" for="p_o_box">@lang('miscellaneous.p_o_box')</label>
                            </div>

                            <!-- Country -->
                            <div class="form-floating mt-3">
                                <select name="role_id" id="role" class="form-select" aria-label="@lang('miscellaneous.choose_role')">
        @foreach ($roles as $role)
                                    <option value="{{ $role['id'] }}">{{ $role['role_name'] }}</option>
        @endforeach
                                </select>
                                <label class="form-label" for="role">@lang('miscellaneous.choose_role')</label>
                            </div>

                            <!-- Is driver of -->
                            <div id="belongs_to_wrapper" class="form-floating mt-3 d-none">
                                <select name="belongs_to" id="belongs_to" class="form-select" aria-label="@lang('miscellaneous.is_driver_of.label')">
                                    <option class="small" disabled selected>@lang('miscellaneous.is_driver_of.placeholder')</option>
        @forelse ($vehicles as $vehicle)
                                    <option value="{{ $vehicle['id'] }}">{{ $user['mark'] . ' - ' . $user['model'] . ' (' . $user['registration_number'] . ')' }}</option>
        @empty
                                    <option class="fst-italic" disabled>@lang('miscellaneous.empty_list')</option>
        @endforelse
                                </select>
                                <label class="form-label" for="belongs_to">@lang('miscellaneous.is_driver_of.label')</label>
                            </div>

                            <!-- Password -->
                            <div class="form-floating mt-3">
                                <input type="password" name="password" id="password" class="form-control" placeholder="@lang('miscellaneous.password.label')" required />
                                <label class="form-label" for="password">@lang('miscellaneous.password.label')</label>
                            </div>

                            <!-- Confirm password -->
                            <div class="form-floating mt-3">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="@lang('miscellaneous.confirm_password.label')" required />
                                <label class="form-label" for="confirm_password">@lang('miscellaneous.confirm_password.label')</label>
                            </div>

                            <div id="otherUserImageWrapper" class="row mt-3">
                                <div class="col-sm-7 col-9 mx-auto">
                                    <p class="small mb-1 text-center">@lang('miscellaneous.account.personal_infos.click_to_change_picture')</p>

                                    <div class="bg-image hover-overlay">
                                        <img src="{{ asset('assets/img/user.png') }}" alt="" class="other-user-image img-fluid rounded-4">
                                        <div class="mask rounded-4" style="background-color: rgba(5, 5, 5, 0.5);">
                                            <label role="button" for="image_other_user" class="d-flex h-100 justify-content-center align-items-center">
                                                <i class="bi bi-pencil-fill text-white fs-2"></i>
                                                <input type="file" name="image_other_user" id="image_other_user" class="d-none">
                                            </label>
                                            <input type="hidden" name="data_other_user" id="data_other_user">
                                        </div>
                                    </div>

                                    <p class="d-none mt-2 mb-0 small text-center text-success fst-italic">@lang('miscellaneous.waiting_register')</p>
                                </div>
                            </div>
    @endif
                        </div>
                        <div class="modal-footer d-block border-0">
                            <button class="btn btn-primary w-100 rounded-pill position-relative">
                                <span class="text-uppercase">@lang('miscellaneous.register')</span>
                                <div class="spinner-border text-white position-absolute opacity-0" role="status" style="top: 0.2rem; right: 0.2rem;"><span class="visually-hidden">@lang('miscellaneous.loading')</span></div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End role -->
@endif

@if (Route::is('role.entity.home') || Route::is('role.entity.show'))
        <!-- Start crop other user image -->
        <div class="modal fade" id="cropModalOtherUser" tabindex="-1" aria-labelledby="cropModalOtherUserLabel" aria-hidden="true" data-bs-backdrop="{{ Route::is('branch.home') ? 'static' : 'true' }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cropModalOtherUserLabel">{{ __('miscellaneous.crop_before_save') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-sm-0 mb-4">
                                    <div class="bg-image">
                                        <img src="" id="retrieved_image_other_user" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">@lang('miscellaneous.cancel')</button>
                        <button type="button" id="crop_other_user" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">{{ __('miscellaneous.register') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start crop other user image -->
@endif

@if (Route::is('account'))
        <!-- Start crop avatar image -->
        <div class="modal fade" id="cropModalUser" tabindex="-1" aria-labelledby="cropModalUserLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cropModalUserLabel">{{ __('miscellaneous.crop_before_save') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-sm-0 mb-4">
                                    <div class="bg-image">
                                        <img src="" id="retrieved_image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">@lang('miscellaneous.cancel')</button>
                        <button type="button" id="crop_avatar" class="btn btn-primary rounded-pill"data-bs-dismiss="modal">{{ __('miscellaneous.register') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start crop avatar image -->
@endif
