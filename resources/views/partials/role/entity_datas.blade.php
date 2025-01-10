
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap mb">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">{{ $entity == 'manage-roles' ? __('miscellaneous.admin.role.details') : __('miscellaneous.admin.users.details') }}</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('role.entity.home', ['entity' => $entity]) }}">@lang('miscellaneous.menu.role.' . $entity)</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">{{ $entity == 'manage-roles' ? ucfirst($current_role['role_name']) : $user['firstname'] . ' ' . $user['lastname'] }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="{{ route('role.entity.home', ['entity' => $entity]) }}" class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-arrow-left me-2"></i>@lang('miscellaneous.back_list')
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
@if ($entity == 'manage-roles')
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.role.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('role.entity.show', ['entity' => 'manage-roles', 'id' => $current_role['id']]) }}" method="POST">
    @csrf
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="role_name" id="role_name" class="form-control" placeholder="@lang('miscellaneous.admin.role.data.role_name')" value="{{ $current_role['role_name'] }}" autofocus>
                                                    <label for="role_name">@lang('miscellaneous.admin.role.data.role_name')</label>
                                                </div>
                                                <div class="form-floating mb-4">
                                                    <textarea name="role_description" id="role_description" class="form-control" placeholder="@lang('miscellaneous.description')">{{ $current_role['role_description'] }}</textarea>
                                                    <label for="role_description">@lang('miscellaneous.description')</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body text-center">
                                        <h3 class="h3">{{ ucfirst($current_role['role_name']) }}</h3>
                                        <p class="card-text small text-capitalize m-0">{{ $current_role['role_description'] }}</p>
                                    </div>
                                </div>
@endif

@if ($entity == 'users')
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.users.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('role.entity.show', ['entity' => 'users', 'id' => $user['id']]) }}" method="POST">
    @csrf

                                                <!-- Last name -->
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="@lang('miscellaneous.firstname')" value="{{ $user['firstname'] }}" autofocus>
                                                    <label for="firstname">@lang('miscellaneous.firstname')</label>
                                                </div>

                                                <!-- Surname -->
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="@lang('miscellaneous.lastname')" value="{{ $user['lastname'] }}">
                                                    <label for="lastname">@lang('miscellaneous.lastname')</label>
                                                </div>

                                                <!-- Birth city/date -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="birthdate" id="birthdate" class="form-control" placeholder="@lang('miscellaneous.birth_date.label')" value="{{ !empty($user['birthdate']) ? str_starts_with(app()->getLocale(), 'fr') ? \Carbon\Carbon::createFromFormat('Y-m-d', $user['birthdate'])->format('d/m/Y') : \Carbon\Carbon::createFromFormat('Y-m-d', $user['birthdate'])->format('m/d/Y') : null }}" />
                                                    <label class="form-label" for="birthdate">@lang('miscellaneous.birth_date.label')</label>
                                                </div>

                                                <!-- Gender -->
                                                <div class="mt-3 text-center">
                                                    <p class="mb-lg-1 mb-0">@lang('miscellaneous.gender_title')</p>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="M"{{ $user['gender'] == 'M' ? ' checked' : '' }}>
                                                        <label class="form-check-label" for="male">@lang('miscellaneous.gender1')</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="F"{{ $user['gender'] == 'F' ? ' checked' : '' }}>
                                                        <label class="form-check-label" for="female">@lang('miscellaneous.gender2')</label>
                                                    </div>
                                                </div>

                                                <!-- Username -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="username" id="username" class="form-control" placeholder="@lang('miscellaneous.username')" value="{{ $user['username'] }}" />
                                                    <label class="form-label" for="username">@lang('miscellaneous.username')</label>
                                                </div>

                                                <!-- Phone -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="@lang('miscellaneous.phone')" value="{{ $user['phone'] }}" />
                                                    <label class="form-label" for="phone">@lang('miscellaneous.phone')</label>
                                                </div>

                                                <!-- E-mail -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="email" id="email" class="form-control" placeholder="@lang('miscellaneous.email')" value="{{ $user['email'] }}" />
                                                    <label class="form-label" for="email">@lang('miscellaneous.email')</label>
                                                </div>

                                                <!-- Country -->
                                                <div class="form-floating mt-3">
                                                    <select name="country_id" id="country" class="form-select" aria-label="@lang('miscellaneous.choose_country')">
    @foreach ($countries as $country)
                                                        <option value="{{ $country['id'] }}"{{ $user['country']->resource != null ? ($country['id'] == $user['country']->id ? ' selected' : '') : '' }}>{{ $country['name_en'] }}</option>
    @endforeach
                                                    </select>
                                                    <label class="form-label" for="country">@lang('miscellaneous.choose_country')</label>
                                                </div>

                                                <!-- City -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="city" id="city" class="form-control" placeholder="@lang('miscellaneous.address.city')" value="{{ $user['city'] }}" />
                                                    <label class="form-label" for="city">@lang('miscellaneous.address.city')</label>
                                                </div>

                                                <!-- Address line 1 -->
                                                <div class="form-floating mt-3">
                                                    <textarea name="address_1" id="address_1" class="form-control" placeholder="@lang('miscellaneous.address.line1')">{{ $user['address_1'] }}</textarea>
                                                    <label class="form-label" for="address_1">@lang('miscellaneous.address.line1')</label>
                                                </div>

                                                <!-- Address line 2 -->
                                                <div class="form-floating mt-3">
                                                    <textarea name="address_2" id="address_2" class="form-control" placeholder="@lang('miscellaneous.address.line2')">{{ $user['address_2'] }}</textarea>
                                                    <label class="form-label" for="address_2">@lang('miscellaneous.address.line2')</label>
                                                </div>

                                                <!-- P.O Box -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="p_o_box" id="p_o_box" class="form-control" placeholder="@lang('miscellaneous.p_o_box')" value="{{ $user['p_o_box'] }}" />
                                                    <label class="form-label" for="p_o_box">@lang('miscellaneous.p_o_box')</label>
                                                </div>

                                                <!-- Country -->
                                                <div class="form-floating mt-3">
                                                    <select name="role_id" id="role" class="form-select" aria-label="@lang('miscellaneous.choose_role')">
    @foreach ($roles as $role)
                                                        <option value="{{ $role['id'] }}"{{ $user['role']->resource != null ? ($role['id'] == $user['role']->id ? ' selected' : '') : '' }}>{{ $role['role_name'] }}</option>
    @endforeach
                                                    </select>
                                                    <label class="form-label" for="role">@lang('miscellaneous.choose_role')</label>
                                                </div>

    @if ($user['role']->resource != null)
        @if ($user['role']->id == 4)
                                                <!-- Is driver of -->
                                                <div id="belongs_to_wrapper" class="form-floating mt-3 d-none">
                                                    <select name="belongs_to" id="belongs_to" class="form-select" aria-label="@lang('miscellaneous.is_driver_of.label')">
                                                        <option class="small" disabled selected>@lang('miscellaneous.is_driver_of.placeholder')</option>
            @forelse ($vehicles as $vehicle)
                                                        <option value="{{ $vehicle['id'] }}"{{ inArrayR('id', $user['user_vehicles'], $vehicle['id']) ? ' selected' : '' }}>
                                                            {{ $vehicle['mark'] . ' - ' . $vehicle['model'] . ' (' . $vehicle['registration_number'] . ')' }}
                                                        </option>
            @empty
                                                        <option class="fst-italic" disabled>@lang('miscellaneous.empty_list')</option>
            @endforelse
                                                    </select>
                                                    <label class="form-label" for="belongs_to">@lang('miscellaneous.is_driver_of.label')</label>
                                                </div>
        @endif
    @endif

                                                <!-- Password -->
                                                <div class="form-floating mt-3">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="@lang('miscellaneous.password.label')" />
                                                    <label class="form-label" for="password">@lang('miscellaneous.password.label')</label>
                                                </div>

                                                <!-- Confirm password -->
                                                <div class="form-floating mt-3">
                                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="@lang('miscellaneous.confirm_password.label')" />
                                                    <label class="form-label" for="confirm_password">@lang('miscellaneous.confirm_password.label')</label>
                                                </div>

                                                <div id="otherUserImageWrapper" class="row mt-3 mb-4">
                                                    <div class="col-sm-7 col-9 mx-auto">
                                                        <p class="small mb-1 text-center">@lang('miscellaneous.account.personal_infos.click_to_change_picture')</p>

                                                        <div class="bg-image hover-overlay">
                                                            <img src="{{ $user['avatar_url'] }}" alt="" class="other-user-image img-fluid rounded-4">
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

                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card position-relative">
                                        <div class="card-header py-3 d-flex align-items-center">
                                            <img src="{{ asset($user['avatar_url']) }}" alt="{{ $user['firstname'] . ' ' . $user['lastname'] }}" width="70" class="rounded-circle me-3">
                                            <div>
                                                <h3 class="h3 mb-0">{{ $user['firstname'] . ' ' . $user['lastname'] }}</h3>
                                                <p class="mb-sm-0 mb-1">{{ '@' . $user['username'] }}</p>
                                                <div id="updateUserStatus" class="form-check form-switch" title="@lang('miscellaneous.change_status')" data-bs-toggle="tooltip">
                                                    <input role="switch" type="checkbox" id="user-status" class="form-check-input"{{ $user['status']->id == 1 ? ' checked' : '' }}>
                                                    <label for="user-status" class="form-check-label position-relative" style="top: -2px;">{{ ucfirst(explode('/', $user['status']->status_name)[0]) }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 pb-1">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <!-- First name -->
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.firstname')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ !empty($user['firstname']) ? $user['firstname'] : '- - - - - -' }}</td>
                                                    </tr>

                                                    <!-- Gender -->
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.gender_title')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ !empty($user['gender']) ? ($user['gender'] == 'F' ? __('miscellaneous.gender2') : __('miscellaneous.gender1')) : '- - - - - -' }}</td>
                                                    </tr>

                                                    <!-- Birth city/date -->
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.birth_date.label')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ !empty($user['birthdate']) ? ucfirst(__('miscellaneous.on_date')) . ' ' . explicitDate($user['birthdate']) : '- - - - - -' }}</td>
                                                    </tr>

                                                    <!-- E-mail -->
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.email')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ !empty($user['email']) ? $user['email'] : '- - - - - -' }}</td>
                                                    </tr>

                                                    <!-- Phone -->
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.phone')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ !empty($user['phone']) ? $user['phone'] : '- - - - - -' }}</td>
                                                    </tr>

                                                    <!-- Addresses -->
    @if (!empty($user['address_1']) && !empty($user['address_2']))
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.addresses')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>
                                                            <ul class="ps-0">
                                                                <li class="cnpr-line-height-1_1 mb-2" style="list-style: none;">
                                                                    <i class="bi bi-geo-alt-fill me-1"></i>{{ $user['address_1'] }}
                                                                </li>
                                                                <li class="cnpr-line-height-1_1" style="list-style: none;">
                                                                    <i class="bi bi-geo-alt-fill me-1"></i>{{ $user['address_2'] }}
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
    @else
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.address.title')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ !empty($user['address_1']) ? $user['address_1'] : (!empty($user['address_2']) ? $user['address_2'] : '- - - - - -') }}</td>
                                                    </tr>
    @endif

                                                    <!-- P.O. box -->
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.p_o_box')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ !empty($user['p_o_box']) ? $user['p_o_box'] : '- - - - - -' }}</td>
                                                    </tr>

                                                    <!-- Role -->
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.menu.role.title')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ $user['role']->role_name }}</td>
                                                    </tr>

                                                    <!-- City -->
                                                    <tr>
                                                        <td><strong>@lang('miscellaneous.address.city')</strong></td>
                                                        <td>@lang('miscellaneous.colon_after_word')</td>
                                                        <td>{{ $user['city'] }}</td>
                                                    </tr>

                                                    <!-- Country -->
                                                    <tr>
                                                        <td class="border-bottom-0"><strong>@lang('miscellaneous.address.country')</strong></td>
                                                        <td class="border-bottom-0">@lang('miscellaneous.colon_after_word')</td>
                                                        <td class="border-bottom-0">{{ $user['country']->resource != null ? $user['country']->name_en . ' (' . $user['country']->a3 . ')' : '' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.user_vehicles', ['firstname' => $user['firstname']])</h3>
                                        </div>
                                        <div class="list-group list-group-flush">
    @forelse ($user['user_vehicles'] as $vehicle)
                                            <a href="{{ route('vehicle.show', ['id' => $vehicle['id']]) }}" class="list-group-item list-group-item-action">
                                                <h5 class="h5">{{ $vehicle['mark'] . ' (' . $vehicle['model'] . ')' }}</h5>
                                            </a>
    @empty
                                            <span class="list-group-item text-secondary fst-italic">@lang('miscellaneous.empty_list')</span>
    @endforelse
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.user_drivers', ['firstname' => $user['firstname']])</h3>
                                        </div>
                                        <div class="list-group list-group-flush">
<?php
$user_drivers_request = App\Models\User::where('belongs_to', $user['id'])->orderByDesc('created_at')->get();
$user_drivers_resource = App\Http\Resources\User::collection($user_drivers_request);
$user_drivers = $user_drivers_resource->toArray($request);
?>
    @forelse ($user_drivers as $driver)
                                            <a href="{{ route('role.entity.show', ['entity' => 'users', 'id' => $driver['id']]) }}" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset($driver['avatar_url']) }}" alt="{{ $driver['firstname'] . ' ' . $driver['lastname'] }}" width="40" class="rounded-circle me-3">
                                                    <div>
                                                        <h5 class="h5 mb-0">{{ $driver['firstname'] . ' ' . $driver['lastname'] }}</h5>
                                                        <p class="mb-sm-0 mb-1 small">{{ '@' . $driver['username'] }}</p>
                                                    </div>
                                                </div>
                                            </a>
    @empty
                                            <span class="list-group-item text-secondary fst-italic">@lang('miscellaneous.empty_list')</span>
    @endforelse
                                        </div>
                                    </div>
                                </div>
@endif
                            </div>

