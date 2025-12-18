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
                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input type="text" name="status_name" id="status_name" class="form-control" placeholder="@lang('miscellaneous.admin.group.status.data.status_name')" required>
                                <label for="status_name">@lang('miscellaneous.admin.group.status.data.status_name')</label>
                            </div>

                            <!-- Description -->
                            <div class="form-floating mb-4">
                                <textarea name="status_description" id="status_description" class="form-control" placeholder="@lang('miscellaneous.description')"></textarea>
                                <label for="status_description">@lang('miscellaneous.description')</label>
                            </div>

                            <!-- Icon -->
                            <div class="form-floating mb-3">
                                <input type="text" name="icon" id="icon" class="form-control" placeholder="@lang('miscellaneous.admin.icon_name')">
                                <label for="icon">@lang('miscellaneous.admin.icon_name')</label>
                            </div>

                            <!-- Color -->
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
                        <div class="modal-body pb-0">
    @if ($entity == 'manage-roles')
                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input type="text" name="role_name" id="role_name" class="form-control" placeholder="@lang('miscellaneous.admin.role.data.role_name')" required>
                                <label for="role_name">@lang('miscellaneous.admin.role.data.role_name')</label>
                            </div>

                            <!-- Description -->
                            <div class="form-floating">
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
                                <select name="country_code" id="country" class="form-select" aria-label="@lang('miscellaneous.choose_country')">
        @foreach ($countries as $country)
                                    <option value="{{ $country['code'] }}">{{ $country['name_' . app()->getLocale()] }}</option>
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
                                    <option value="{{ $vehicle['id'] }}">{{ $vehicle['mark'] . ' - ' . $vehicle['model'] . ' (' . $vehicle['registration_number'] . ')' }}</option>
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

                            <!-- Add image -->
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

                            <!-- ID card -->
                            <div class="mt-3">
                                <label for="id_card" class="form-label small mb-0">@lang('miscellaneous.account.identity_document.choose_type.identity_card')</label>
                                <input type="file" name="id_card" id="id_card" class="form-control" placeholder="@lang('miscellaneous.account.identity_document.choose_type.identity_card')" />
                            </div>

                            <!-- Driving licence -->
                            <div class="mt-3">
                                <label for="driving_license" class="form-label small mb-0">@lang('miscellaneous.account.identity_document.choose_type.driving_license')</label>
                                <input type="file" name="driving_license" id="driving_license" class="form-control" placeholder="@lang('miscellaneous.account.identity_document.choose_type.driving_license')" />
                            </div>

                            <!-- Vehicle registration -->
                            <div class="mt-3">
                                <label for="vehicle_registration" class="form-label small mb-0">@lang('miscellaneous.account.identity_document.choose_type.vehicle_registration')</label>
                                <input type="file" name="vehicle_registration" id="vehicle_registration" class="form-control" placeholder="@lang('miscellaneous.account.identity_document.choose_type.vehicle_registration')" />
                            </div>

                            <!-- Vehicle insurance -->
                            <div class="mt-3">
                                <label for="vehicle_insurance" class="form-label small mb-0">@lang('miscellaneous.account.identity_document.choose_type.vehicle_insurance')</label>
                                <input type="file" name="vehicle_insurance" id="vehicle_insurance" class="form-control" placeholder="@lang('miscellaneous.account.identity_document.choose_type.vehicle_insurance')" />
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

@if (Route::is('vehicle.home'))
        <!-- Start role -->
        <div class="modal fade" id="vehicleModal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('vehicle.home') }}" method="post">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="vehicleModalLabel">@lang('miscellaneous.admin.vehicle.add')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <!-- Owner -->
                            <div class="form-floating mt-3">
                                <select name="user_id" id="user_id" class="form-select" aria-label="@lang('miscellaneous.admin.vehicle.owner')">
                                    <option class="small" disabled selected>@lang('miscellaneous.admin.vehicle.choose_person')</option>
    @forelse ($drivers as $driver)
                                    <option value="{{ $driver['id'] }}">
                                        {{ $driver['firstname'] . ' ' . $driver['lastname'] }}</small>
                                    </option>
    @empty
                                    <option disabled><i>@lang('miscellaneous.empty_list')</i></option>
    @endforelse
                                </select>
                                <label class="form-label" for="user_id">@lang('miscellaneous.admin.vehicle.owner')</label>
                            </div>

                            <!-- Mark -->
                            <div class="form-floating mt-3">
                                <input type="text" name="mark" id="mark" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.mark')" required />
                                <label class="form-label" for="mark">@lang('miscellaneous.admin.vehicle.mark')</label>
                            </div>

                            <!-- Model -->
                            <div class="form-floating mt-3">
                                <input type="text" name="model" id="model" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.model')" required />
                                <label class="form-label" for="model">@lang('miscellaneous.admin.vehicle.model')</label>
                            </div>

                            <!-- Color -->
                            <div class="form-floating mt-3">
                                <input type="text" name="color" id="color" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.color')" required />
                                <label class="form-label" for="color">@lang('miscellaneous.admin.vehicle.color')</label>
                            </div>

                            <!-- Registration number -->
                            <div class="form-floating mt-3">
                                <input type="text" name="registration_number" id="registration_number" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.registration_number')" required />
                                <label class="form-label" for="registration_number">@lang('miscellaneous.admin.vehicle.registration_number')</label>
                            </div>

                            <!-- Registration number expiration -->
                            {{-- <input type="hidden" name="regis_number_expiration" id="regis_number_expiration" value="{{ date('Y-m-d H:i') }}">
                            <div class="form-floating mt-3">
                                <input type="text" name="regis_num_exp" id="regis_num_exp" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.regis_number_expiration')" value="{{ explicitDateTime(date('Y-m-d H:i:s')) }}">
                                <label class="form-label" for="regis_num_exp">@lang('miscellaneous.admin.vehicle.regis_number_expiration')</label>
                            </div> --}}

                            <!-- VIN number -->
                            <div class="form-floating mt-3">
                                <input type="text" name="vin_number" id="vin_number" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.vin_number')" />
                                <label class="form-label" for="vin_number">@lang('miscellaneous.admin.vehicle.vin_number')</label>
                            </div>

                            <!-- Manufacture year -->
                            <div class="form-floating mt-3">
                                <input type="number" name="manufacture_year" id="manufacture_year" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.manufacture_year')" />
                                <label class="form-label" for="manufacture_year">@lang('miscellaneous.admin.vehicle.manufacture_year')</label>
                            </div>

                            <!-- Fuel type -->
                            <div class="form-floating mt-3">
                                <select name="fuel_type" id="fuel_type" class="form-select" aria-label="@lang('miscellaneous.admin.vehicle.fuel_type.label')">
                                    <option class="small" disabled selected>@lang('miscellaneous.admin.vehicle.fuel_type.label')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.gasoline')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.diesel')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.electric')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.hybrid_electric')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.plugin_hybrid_electric')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.hydrogen_fuel_cell')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.compressed_natural_gas')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.liquefied_petroleum_gas')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.biofuel_powered')</option>
                                    <option>@lang('miscellaneous.admin.vehicle.fuel_type.rotary_engine')</option>
                                </select>
                                <label class="form-label" for="fuel_type">@lang('miscellaneous.admin.vehicle.fuel_type.label')</label>
                            </div>

                            <!-- Cylinder capacity -->
                            <div class="form-floating mt-3">
                                <input type="number" name="cylinder_capacity" id="cylinder_capacity" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.cylinder_capacity')" />
                                <label class="form-label" for="cylinder_capacity">@lang('miscellaneous.admin.vehicle.cylinder_capacity')</label>
                            </div>

                            <!-- Engine power -->
                            <div class="form-floating mt-3">
                                <input type="number" name="engine_power" id="engine_power" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.engine_power')" />
                                <label class="form-label" for="engine_power">@lang('miscellaneous.admin.vehicle.engine_power')</label>
                            </div>

                            <!-- Number of places -->
                            <div class="form-floating mt-3">
                                <input type="number" name="nb_places" id="nb_places" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.nb_places')" />
                                <label class="form-label" for="nb_places">@lang('miscellaneous.admin.vehicle.nb_places')</label>
                            </div>

                            <!-- Shape -->
                            <div class="form-floating mt-3">
                                <select name="shape_id" id="shape_id" class="form-select" aria-label="@lang('miscellaneous.admin.vehicle.shape.title')">
                                    <option class="small" disabled selected>@lang('miscellaneous.admin.vehicle.shape.choose')</option>
    @forelse ($vehicle_shapes as $shape)
                                    <option value="{{ $shape['id'] }}">{{ $shape['shape_name'] }}</option>
    @empty
                                    <option disabled><i>@lang('miscellaneous.empty_list')</i></option>
    @endforelse
                                </select>
                                <label class="form-label" for="shape_id">@lang('miscellaneous.admin.vehicle.shape.title')</label>
                            </div>

                            <!-- Category -->
                            <div class="form-floating mt-3">
                                <select name="category_id" id="category_id" class="form-select" aria-label="@lang('miscellaneous.admin.vehicle.category.title')">
                                    <option class="small" disabled selected>@lang('miscellaneous.admin.vehicle.category.choose')</option>
    @forelse ($vehicle_categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
    @empty
                                    <option disabled><i>@lang('miscellaneous.empty_list')</i></option>
    @endforelse
                                </select>
                                <label class="form-label" for="category_id">@lang('miscellaneous.admin.vehicle.category.title')</label>
                            </div>

                            <!-- Vehicle features -->
                            <div class="card card-body mt-3">
                                <h5 class="h5 mb-0 text-center">@lang('miscellaneous.admin.vehicle.features.title')</h5>
                                <hr>
                                <!-- Is clean -->
                                <div class="row g-2">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.is_clean')</div>
                                    <div class="col-4">
                                        <select name="is_clean" id="is_clean" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has helmet -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_helmet')</div>
                                    <div class="col-4">
                                        <select name="has_helmet" id="has_helmet" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has airbags -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_airbags')</div>
                                    <div class="col-4">
                                        <select name="has_airbags" id="has_airbags" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has seat belt -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_seat_belt')</div>
                                    <div class="col-4">
                                        <select name="has_seat_belt" id="has_seat_belt" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has ergonomic seat -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_ergonomic_seat')</div>
                                    <div class="col-4">
                                        <select name="has_ergonomic_seat" id="has_ergonomic_seat" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has air conditioning -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_air_conditioning')</div>
                                    <div class="col-4">
                                        <select name="has_air_conditioning" id="has_air_conditioning" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has suspensions -->
                                {{-- <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_suspensions')</div>
                                    <div class="col-4">
                                        <select name="has_suspensions" id="has_suspensions" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div> --}}

                                <!-- Has soundproofing -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_soundproofing')</div>
                                    <div class="col-4">
                                        <select name="has_soundproofing" id="has_soundproofing" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has sufficient space -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_sufficient_space')</div>
                                    <div class="col-4">
                                        <select name="has_sufficient_space" id="has_sufficient_space" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has quality equipment -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_quality_equipment')</div>
                                    <div class="col-4">
                                        <select name="has_quality_equipment" id="has_quality_equipment" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has on_board technologies -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_on_board_technologies')</div>
                                    <div class="col-4">
                                        <select name="has_on_board_technologies" id="has_on_board_technologies" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has interior lighting -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_interior_lighting')</div>
                                    <div class="col-4">
                                        <select name="has_interior_lighting" id="has_interior_lighting" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has practical accessories -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_practical_accessories')</div>
                                    <div class="col-4">
                                        <select name="has_practical_accessories" id="has_practical_accessories" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Has driving assist system -->
                                <div class="row g-2 mt-3">
                                    <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_driving_assist_system')</div>
                                    <div class="col-4">
                                        <select name="has_driving_assist_system" id="has_driving_assist_system" class="form-select">
                                            <option value="0">@lang('miscellaneous.no')</option>
                                            <option value="1">@lang('miscellaneous.yes')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-block border-0">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill position-relative">
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

@if (Route::is('vehicle.entity.home'))
        <!-- Start status -->
        <div class="modal fade" id="{{ $entity == 'shape' ? 'vehicleShapeModal' : 'vehicleCategoryModal' }}" tabindex="-1" aria-labelledby="{{ $entity == 'shape' ? 'vehicleShapeModalLabel' : 'vehicleCategoryModalLabel' }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('vehicle.entity.home', ['entity' => $entity]) }}" method="post">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="{{ $entity == 'shape' ? 'vehicleShapeModalLabel' : 'vehicleCategoryModalLabel' }}">@lang('miscellaneous.admin.vehicle.' . $entity . '.add')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body pb-0">
    @if ($entity == 'shape')
                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input type="text" name="shape_name" id="shape_name" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.shape.title')" required>
                                <label for="shape_name">@lang('miscellaneous.admin.vehicle.shape.title')</label>
                            </div>

                            <!-- Description -->
                            <div class="form-floating mb-4">
                                <textarea name="shape_description" id="shape_description" class="form-control" placeholder="@lang('miscellaneous.description')"></textarea>
                                <label for="shape_description">@lang('miscellaneous.description')</label>
                            </div>
    @endif

    @if ($entity == 'category')
                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.category.title')" required>
                                <label for="category_name">@lang('miscellaneous.admin.vehicle.category.title')</label>
                            </div>

                            <!-- Description -->
                            <div class="form-floating mb-4">
                                <textarea name="category_description" id="category_description" class="form-control" placeholder="@lang('miscellaneous.description')"></textarea>
                                <label for="category_description">@lang('miscellaneous.description')</label>
                            </div>
    @endif

    @if ($entity == 'shape' || $entity == 'category')
                            <!-- Add image -->
                            <div id="vehicleImageWrapper" class="row mt-3">
                                <div class="col-9 mx-auto">
                                    <p class="small mb-1 text-center">@lang('miscellaneous.account.personal_infos.click_to_change_picture')</p>

                                    <div class="bg-image hover-overlay">
                                        <img src="{{ asset('assets/img/blank-id-doc.png') }}" alt="" class="other-user-image img-fluid rounded-4">
                                        <div class="mask rounded-4" style="background-color: rgba(5, 5, 5, 0.5);">
                                            <label role="button" for="image_vehicle" class="d-flex h-100 justify-content-center align-items-center">
                                                <i class="bi bi-pencil-fill text-white fs-2"></i>
                                                <input type="file" name="image_vehicle" id="image_vehicle" class="d-none">
                                            </label>
                                            <input type="hidden" name="data_vehicle" id="data_vehicle">
                                        </div>
                                    </div>

                                    <p class="d-none mt-2 mb-0 small text-center text-success fst-italic">@lang('miscellaneous.waiting_register')</p>
                                </div>
                            </div>
    @endif
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

@if (Route::is('vehicle.entity.home') || Route::is('vehicle.entity.show'))
        <!-- Start crop other user image -->
        <div class="modal fade" id="cropModalVehicle" tabindex="-1" aria-labelledby="cropModalVehicleLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cropModalVehicleLabel">{{ __('miscellaneous.crop_before_save') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-sm-0 mb-4">
                                    <div class="bg-image">
                                        <img src="" id="retrieved_image_vehicle" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">@lang('miscellaneous.cancel')</button>
                        <button type="button" id="crop_vehicle" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">{{ __('miscellaneous.register') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start crop other user image -->
@endif

@if (Route::is('role.entity.home') || Route::is('role.entity.show'))
        <!-- Start crop other user image -->
        <div class="modal fade" id="cropModalOtherUser" tabindex="-1" aria-labelledby="cropModalOtherUserLabel" aria-hidden="true">
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

@if (Route::is('role.entity.show') || Route::is('vehicle.show'))
        <!-- Start crop avatar image -->
        <div class="modal fade" id="enlargeContent" tabindex="-1" aria-labelledby="enlargeContentLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="enlargeContentLabel">Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="bg-image">
                            <img src="" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start crop avatar image -->
@endif

@if (Route::is('payment_gateway.home'))
        <div class="modal fade" id="gatewayModal" tabindex="-1" aria-labelledby="gatewayModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('payment_gateway.home') }}" method="post">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="gatewayModalLabel">@lang('miscellaneous.admin.payment-gateway.add')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <!-- Name -->
                            <div class="form-floating mb-3">
                                <input type="text" name="gateway_name" id="gateway_name" class="form-control" placeholder="@lang('miscellaneous.admin.payment-gateway.data.gateway_name')" required>
                                <label for="gateway_name">@lang('miscellaneous.admin.payment-gateway.data.gateway_name')</label>
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

@if (Route::is('currency.home'))
        <div class="modal fade" id="currencyModal" tabindex="-1" aria-labelledby="currencyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('currency.home') }}" method="post" enctype="multipart/form-data">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="currencyModalLabel">@lang('miscellaneous.admin.currency.add')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <!-- Name -->
                            <div class="form-floating">
                                <input type="text" name="currency_name" id="currency_name" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.currency_name')" required>
                                <label for="currency_name">@lang('miscellaneous.admin.currency.data.currency_name')</label>
                            </div>

                            <!-- Acronym -->
                            <div class="form-floating mt-3">
                                <input type="text" name="currency_acronym" id="currency_acronym" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.currency_acronym')">
                                <label for="currency_acronym">@lang('miscellaneous.admin.currency.data.currency_acronym')</label>
                            </div>

                            <!-- Rating -->
                            <div class="form-floating mt-3">
                                <input type="number" name="rating" id="rating" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.rating')">
                                <label for="rating">@lang('miscellaneous.admin.currency.data.rating')</label>
                            </div>

                            <!-- Icon -->
                            <div class="mt-2">
                                <label for="icon" class="small">@lang('miscellaneous.admin.currency.data.icon')</label>
                                <input type="file" name="icon" id="icon" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.icon')">
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

@if (Route::is('pricing.home'))
        <div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('pricing.home') }}" method="post" enctype="multipart/form-data">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="pricingModalLabel">@lang('miscellaneous.admin.pricing.add')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <!-- Rating -->
                            <div class="form-floating mt-3">
                                <input type="number" name="rating" id="rating" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.rating')">
                                <label for="rating">@lang('miscellaneous.admin.currency.data.rating')</label>
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

@if (Route::is('account.entity'))
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
