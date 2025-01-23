
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap mb">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.admin.vehicle.details')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('vehicle.home') }}">@lang('miscellaneous.menu.vehicle.all')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">{{ $vehicle['mark'] . ' ' . $vehicle['model'] . ' (' . $vehicle['registration_number'] . ')' }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="{{ route('vehicle.home') }}" class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-arrow-left me-2"></i>@lang('miscellaneous.back_list')
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.vehicle.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('vehicle.show', ['id' => $vehicle['id']]) }}" method="POST">
    @csrf
                                                <!-- Owner -->
                                                <div class="form-floating mt-3">
                                                    <select name="user_id" id="user_id" class="form-select" aria-label="@lang('miscellaneous.admin.vehicle.owner')">
                                                        <option class="small" disabled{{ $vehicle['user']->resource == null ? ' selected' : '' }}>@lang('miscellaneous.admin.vehicle.choose_person')</option>
    @forelse ($drivers as $driver)
                                                        <option value="{{ $driver['id'] }}"{{ $vehicle['user']->resource != null ? ($vehicle['user']->id == $driver['id'] ? ' selected' : '') : '' }}>
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
                                                    <input type="text" name="mark" id="mark" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.mark')" value="{{ $vehicle['mark'] }}" />
                                                    <label class="form-label" for="mark">@lang('miscellaneous.admin.vehicle.mark')</label>
                                                </div>

                                                <!-- Model -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="model" id="model" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.model')" value="{{ $vehicle['model'] }}" />
                                                    <label class="form-label" for="model">@lang('miscellaneous.admin.vehicle.model')</label>
                                                </div>

                                                <!-- Color -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="color" id="color" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.color')" value="{{ $vehicle['color'] }}" />
                                                    <label class="form-label" for="color">@lang('miscellaneous.admin.vehicle.color')</label>
                                                </div>

                                                <!-- Registration number -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="registration_number" id="registration_number" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.registration_number')" value="{{ $vehicle['registration_number'] }}" />
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
                                                    <input type="text" name="vin_number" id="vin_number" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.vin_number')" value="{{ $vehicle['vin_number'] }}" />
                                                    <label class="form-label" for="vin_number">@lang('miscellaneous.admin.vehicle.vin_number')</label>
                                                </div>

                                                <!-- Manufacture year -->
                                                <div class="form-floating mt-3">
                                                    <input type="number" name="manufacture_year" id="manufacture_year" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.manufacture_year')" value="{{ $vehicle['manufacture_year'] }}" />
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
                                                    <input type="number" name="cylinder_capacity" id="cylinder_capacity" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.cylinder_capacity')" value="{{ $vehicle['cylinder_capacity'] }}" />
                                                    <label class="form-label" for="cylinder_capacity">@lang('miscellaneous.admin.vehicle.cylinder_capacity')</label>
                                                </div>

                                                <!-- Engine power -->
                                                <div class="form-floating mt-3">
                                                    <input type="number" name="engine_power" id="engine_power" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.engine_power')" value="{{ $vehicle['engine_power'] }}" />
                                                    <label class="form-label" for="engine_power">@lang('miscellaneous.admin.vehicle.engine_power')</label>
                                                </div>

                                                <!-- Number of places -->
                                                <div class="form-floating mt-3">
                                                    <input type="number" name="nb_places" id="nb_places" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.nb_places')" value="{{ $vehicle['nb_places'] }}" />
                                                    <label class="form-label" for="nb_places">@lang('miscellaneous.admin.vehicle.nb_places')</label>
                                                </div>

                                                <!-- Shape -->
                                                <div class="form-floating mt-3">
                                                    <select name="shape_id" id="shape_id" class="form-select" aria-label="@lang('miscellaneous.admin.vehicle.shape.title')">
                                                        <option class="small" disabled{{ $vehicle['shape']->resource == null ? ' selected' : '' }}>@lang('miscellaneous.admin.vehicle.shape.choose')</option>
    @forelse ($vehicle_shapes as $shape)
                                                        <option value="{{ $shape['id'] }}"{{ $vehicle['shape']->resource != null ? ($vehicle['shape']->id == $shape['id'] ? ' selected' : '') : '' }}>{{ $shape['shape_name'] }}</option>
    @empty
                                                        <option disabled><i>@lang('miscellaneous.empty_list')</i></option>
    @endforelse
                                                    </select>
                                                    <label class="form-label" for="shape_id">@lang('miscellaneous.admin.vehicle.shape.title')</label>
                                                </div>

                                                <!-- Category -->
                                                <div class="form-floating mt-3">
                                                    <select name="category_id" id="category_id" class="form-select" aria-label="@lang('miscellaneous.admin.vehicle.category.title')">
                                                        <option class="small" disabled{{ $vehicle['category']->resource == null ? ' selected' : '' }}>@lang('miscellaneous.admin.vehicle.category.choose')</option>
    @forelse ($vehicle_categories as $category)
                                                        <option value="{{ $category['id'] }}"{{ $vehicle['category']->resource != null ? ($vehicle['category']->id == $category['id'] ? ' selected' : '') : '' }}>{{ $category['category_name'] }}</option>
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
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->is_clean == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->is_clean == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has helmet -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_helmet')</div>
                                                        <div class="col-4">
                                                            <select name="has_helmet" id="has_helmet" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_helmet == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_helmet == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has airbags -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_airbags')</div>
                                                        <div class="col-4">
                                                            <select name="has_airbags" id="has_airbags" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_airbags == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_airbags == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has seat belt -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_seat_belt')</div>
                                                        <div class="col-4">
                                                            <select name="has_seat_belt" id="has_seat_belt" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_seat_belt == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_seat_belt == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has ergonomic seat -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_ergonomic_seat')</div>
                                                        <div class="col-4">
                                                            <select name="has_ergonomic_seat" id="has_ergonomic_seat" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_ergonomic_seat == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_ergonomic_seat == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has air conditioning -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_air_conditioning')</div>
                                                        <div class="col-4">
                                                            <select name="has_air_conditioning" id="has_air_conditioning" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_air_conditioning == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_air_conditioning == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has suspensions -->
                                                    {{-- <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_suspensions')</div>
                                                        <div class="col-4">
                                                            <select name="has_suspensions" id="has_suspensions" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_suspensions == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_suspensions == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div> --}}

                                                    <!-- Has soundproofing -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_soundproofing')</div>
                                                        <div class="col-4">
                                                            <select name="has_soundproofing" id="has_soundproofing" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_soundproofing == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_soundproofing == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has sufficient space -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_sufficient_space')</div>
                                                        <div class="col-4">
                                                            <select name="has_sufficient_space" id="has_sufficient_space" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_sufficient_space == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_sufficient_space == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has quality equipment -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_quality_equipment')</div>
                                                        <div class="col-4">
                                                            <select name="has_quality_equipment" id="has_quality_equipment" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_quality_equipment == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_quality_equipment == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has on_board technologies -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_on_board_technologies')</div>
                                                        <div class="col-4">
                                                            <select name="has_on_board_technologies" id="has_on_board_technologies" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_on_board_technologies == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_on_board_technologies == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has interior lighting -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_interior_lighting')</div>
                                                        <div class="col-4">
                                                            <select name="has_interior_lighting" id="has_interior_lighting" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_interior_lighting == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_interior_lighting == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has practical accessories -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_practical_accessories')</div>
                                                        <div class="col-4">
                                                            <select name="has_practical_accessories" id="has_practical_accessories" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_practical_accessories == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_practical_accessories == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Has driving assist system -->
                                                    <div class="row g-2 mt-3">
                                                        <div class="col-8 text-dark">@lang('miscellaneous.admin.vehicle.features.has_driving_assist_system')</div>
                                                        <div class="col-4">
                                                            <select name="has_driving_assist_system" id="has_driving_assist_system" class="form-select">
                                                                <option value="0"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_driving_assist_system == 0 ? ' selected' : '') : '' }}>@lang('miscellaneous.no')</option>
                                                                <option value="1"{{ $vehicle['vehicle_features']->resource != null ? ($vehicle['vehicle_features']->has_driving_assist_system == 1 ? ' selected' : '') : '' }}>@lang('miscellaneous.yes')</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body text-center">

                                    </div>
                                </div>
                            </div>
