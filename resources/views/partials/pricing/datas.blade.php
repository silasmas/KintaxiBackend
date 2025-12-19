
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap mb">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.admin.pricing.details')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('payment_gateway.home') }}">@lang('miscellaneous.menu.pricing')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">@lang('miscellaneous.admin.pricing.data.rule_type.' . $current_pricing['rule_type'])</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="{{ route('pricing.home') }}" class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-arrow-left me-2"></i>@lang('miscellaneous.back_list')
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.payment-gateway.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('pricing.show', ['id' => $current_pricing['id']]) }}" method="POST">
@csrf
                                                <!-- Rule type -->
                                                <div class="form-floating">
                                                    <select name="rule_type" id="rule_type" class="form-select" aria-label="@lang('miscellaneous.admin.pricing.data.rule_type.title')">
                                                        <option value="base_fare"{{ $current_pricing['rule_type'] == 'base_fare' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.rule_type.base_fare')</option>
                                                        <option value="distance"{{ $current_pricing['rule_type'] == 'distance' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.rule_type.distance')</option>
                                                        <option value="time"{{ $current_pricing['rule_type'] == 'time' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.rule_type.time')</option>
                                                        <option value="waiting_time"{{ $current_pricing['rule_type'] == 'waiting_time' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.rule_type.waiting_time')</option>
                                                        <option value="traffic"{{ $current_pricing['rule_type'] == 'traffic' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.rule_type.traffic')</option>
                                                    </select>
                                                    <label class="form-label" for="rule_type">@lang('miscellaneous.admin.pricing.data.rule_type.title')</label>
                                                </div>

                                                <!-- Minimum value -->
                                                <div class="form-floating mt-3">
                                                    <input type="number" name="min_value" id="min_value" step="0.01" class="form-control" placeholder="@lang('miscellaneous.admin.pricing.data.min_value')" value="{{ $current_pricing['min_value'] }}">
                                                    <label for="min_value">@lang('miscellaneous.admin.pricing.data.min_value')</label>
                                                </div>

                                                <!-- Maximum value -->
                                                <div class="form-floating mt-3">
                                                    <input type="number" name="max_value" id="max_value" step="0.01" class="form-control" placeholder="@lang('miscellaneous.admin.pricing.data.max_value')" value="{{ $current_pricing['max_value'] }}">
                                                    <label for="max_value">@lang('miscellaneous.admin.pricing.data.max_value')</label>
                                                </div>

                                                <!-- Cost -->
                                                <div class="form-floating mt-3">
                                                    <input type="number" name="cost" id="cost" step="0.01" class="form-control" placeholder="@lang('miscellaneous.admin.pricing.data.cost')" value="{{ $current_pricing['cost'] }}">
                                                    <label for="cost">@lang('miscellaneous.admin.pricing.data.cost')</label>
                                                </div>

                                                <!-- vehicle_category -->
                                                <div class="form-floating mt-3">
                                                    <select name="vehicle_category" id="vehicle_category" class="form-select" aria-label="@lang('miscellaneous.admin.pricing.vehicle_category')">
@forelse ($vehicle_categories as $category)
                                                        <option value="{{ $category['id'] }}"{{ $current_pricing['vehicle_category']['id'] == $category['id'] ? ' selected' : '' }}>{{ ucfirst($category['category_name']) }}</option>
@empty
@endforelse
                                                    </select>
                                                    <label class="form-label" for="vehicle_category">@lang('miscellaneous.admin.pricing.vehicle_category')</label>
                                                </div>

                                                <!-- Surge multiplier -->
                                                <div class="form-floating mt-3">
                                                    <input type="number" name="surge_multiplier" id="surge_multiplier" step="0.01" class="form-control" placeholder="@lang('miscellaneous.admin.pricing.data.surge_multiplier')" value="{{ $current_pricing['surge_multiplier'] }}">
                                                    <label for="surge_multiplier">@lang('miscellaneous.admin.pricing.data.surge_multiplier')</label>
                                                </div>

                                                <!-- unit -->
                                                {{-- <div class="form-floating mt-3">
                                                    <select name="unit" id="unit" class="form-select" aria-label="@lang('miscellaneous.admin.pricing.data.unit.title')">
                                                        <option value="km"{{ $current_pricing['unit'] == 'km' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.unit.km')</option>
                                                        <option value="min"{{ $current_pricing['unit'] == 'min' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.unit.min')</option>
                                                        <option value="fixed"{{ $current_pricing['unit'] == 'fixed' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.unit.fixed')</option>
                                                        <option value="percentage"{{ $current_pricing['unit'] == 'percentage' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.unit.percentage')</option>
                                                    </select>
                                                    <label class="form-label" for="unit">@lang('miscellaneous.admin.pricing.data.unit.title')</label>
                                                </div> --}}

                                                <!-- Valid from -->
                                                <div class="form-floating mt-3">
                                                    <input type="datetime" name="valid_from" id="valid_from" class="form-control" placeholder="@lang('miscellaneous.admin.pricing.data.valid_from')" value="{{ !empty($current_pricing['valid_from']) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $current_pricing['valid_from'])->format('d/m/Y H:i') : null }}">
                                                    <label for="valid_from">@lang('miscellaneous.admin.pricing.data.valid_from')</label>
                                                </div>

                                                <!-- Valid to -->
                                                <div class="form-floating mt-3">
                                                    <input type="datetime" name="valid_to" id="valid_to" class="form-control" placeholder="@lang('miscellaneous.admin.pricing.data.valid_to')" value="{{ !empty($current_pricing['valid_to']) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $current_pricing['valid_to'])->format('d/m/Y H:i') : null }}">
                                                    <label for="valid_to">@lang('miscellaneous.admin.pricing.data.valid_to')</label>
                                                </div>

                                                <!-- Is default -->
                                                {{-- <div class="form-floating my-3">
                                                    <select name="is_default" id="is_default" class="form-select" aria-label="@lang('miscellaneous.admin.pricing.data.is_default')">
                                                        <option value="0"{{ $current_pricing['is_default'] == 0 ? ' selected' : '' }}>@lang('miscellaneous.no')</option>
                                                        <option value="1"{{ $current_pricing['is_default'] == 1 ? ' selected' : '' }}>@lang('miscellaneous.yes')</option>
                                                    </select>
                                                    <label class="form-label" for="is_default">@lang('miscellaneous.admin.pricing.data.is_default')</label>
                                                </div> --}}

                                                <button type="submit" class="btn btn-primary mt-3 rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body p-4">
                                        <h3 class="h3">{{ $current_pricing['rule_type_STRING'] }}</h3>
                                        <p class="mb-2">@lang('miscellaneous.admin.pricing.data.min_value')@lang('miscellaneous.colon_after_word') <strong>{{ !empty($current_pricing['min_value']) ? formatDecimalNumber($current_pricing['min_value']) : null }}</strong></p>
                                        <p class="mb-2">@lang('miscellaneous.admin.pricing.data.max_value')@lang('miscellaneous.colon_after_word') <strong>{{ !empty($current_pricing['max_value']) ? formatDecimalNumber($current_pricing['max_value']) : null }}</strong></p>
                                        <p class="mb-2">@lang('miscellaneous.admin.pricing.data.cost')@lang('miscellaneous.colon_after_word') <strong>{{ !empty($current_pricing['cost']) ? formatDecimalNumber($current_pricing['cost']) : null }}</strong></p>
                                        <p class="mb-2">@lang('miscellaneous.admin.pricing.data.vehicle_category')@lang('miscellaneous.colon_after_word') <strong>{{ !empty($current_pricing['vehicle_category']) ? $current_pricing['vehicle_category']['category_name'] : null }}</strong></p>
                                        <p class="mb-2">@lang('miscellaneous.admin.pricing.data.surge_multiplier')@lang('miscellaneous.colon_after_word') <strong>{{ !empty($current_pricing['surge_multiplier']) ? formatDecimalNumber($current_pricing['surge_multiplier']) : null }}</strong></p>
                                        <p class="mb-2">@lang('miscellaneous.admin.pricing.data.unit.title')@lang('miscellaneous.colon_after_word') <strong>{{ !empty($current_pricing['unit_STRING']) ? $current_pricing['unit_STRING'] : null }}</strong></p>
                                        <p class="mb-2">@lang('miscellaneous.admin.pricing.data.valid_from')@lang('miscellaneous.colon_after_word') <strong>{{ !empty($current_pricing['valid_from']) ? explicitDateTime($current_pricing['valid_from']) : null }}</strong></p>
                                        <p class="mb-2">@lang('miscellaneous.admin.pricing.data.valid_to')@lang('miscellaneous.colon_after_word') <strong>{{ !empty($current_pricing['valid_to']) ? explicitDateTime($current_pricing['valid_to']) : null }}</strong></p>
                                        <p class="m-0">
                                            @lang('miscellaneous.admin.pricing.data.is_default')@lang('miscellaneous.colon_after_word')
                                            <span class="badge badge-{{ $current_pricing['is_default'] == 1 ? 'success' : 'danger' }} text-{{ $current_pricing['is_default'] == 1 ? 'success' : 'danger' }}">
                                                <i class="bi bi-{{ $current_pricing['is_default'] == 1 ? 'check-lg' : 'x-lg' }} me-1 fs-6"></i> <span class="fs-6">{{ $current_pricing['is_default_STRING'] }}</span>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>

