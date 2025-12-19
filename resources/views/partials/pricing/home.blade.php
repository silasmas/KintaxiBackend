
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.menu.pricing')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.pricing')</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2" data-bs-toggle="modal" data-bs-target="#pricingModal">
                                            <i class="zmdi zmdi-plus"></i>@lang('miscellaneous.admin.pricing.add')
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-md-12">
                                    <div id="itemsList" class="table-responsive table--no-card mb-3 overflow-auto">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.admin.pricing.data.rule_type.title')</th>
                                                    <th>@lang('miscellaneous.admin.pricing.data.min_value')</th>
                                                    <th>@lang('miscellaneous.admin.pricing.data.max_value')</th>
                                                    <th>@lang('miscellaneous.admin.pricing.data.cost')</th>
                                                    <th>@lang('miscellaneous.admin.pricing.data.vehicle_category')</th>
                                                    <th>@lang('miscellaneous.admin.pricing.data.surge_multiplier')</th>
                                                    <th style="min-width: 14rem;">@lang('miscellaneous.admin.pricing.data.unit.title')</th>
                                                    <th>@lang('miscellaneous.admin.pricing.data.valid_from')</th>
                                                    <th>@lang('miscellaneous.admin.pricing.data.valid_to')</th>
                                                    <th>@lang('miscellaneous.admin.pricing.data.is_default')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($pricing_rules as $pricing)
                                                <tr>
                                                    <td class="align-middle">{{ $pricing['rule_type_STRING'] }}</td>
                                                    <td class="align-middle">{{ !empty($pricing['min_value']) ? formatDecimalNumber($pricing['min_value']) : '- - - - -' }}</td>
                                                    <td class="align-middle">{{ !empty($pricing['max_value']) ? formatDecimalNumber($pricing['max_value']) : '- - - - -' }}</td>
                                                    <td class="align-middle">{{ !empty($pricing['cost']) ? formatDecimalNumber($pricing['cost']) : '- - - - -' }}</td>
                                                    <td class="align-middle">{{ !empty($pricing['vehicle_category']) ? $pricing['vehicle_category']['category_name'] : '- - - - -' }}</td>
                                                    <td class="align-middle">{{ !empty($pricing['surge_multiplier']) ? formatDecimalNumber($pricing['surge_multiplier']) : '- - - - -' }}</td>
                                                    <td>
                                                        <select id="pricingUnit-{{ $pricing['id'] }}" class="form-select form-select-sm" aria-label="@lang('miscellaneous.admin.pricing.data.unit.title')" data-pricing-id="{{ $pricing['id'] }}" onchange="changeUnit(this);">
                                                            <option value="km"{{ $pricing['unit'] == 'km' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.unit.km')</option>
                                                            <option value="min"{{ $pricing['unit'] == 'min' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.unit.min')</option>
                                                            <option value="fixed"{{ $pricing['unit'] == 'fixed' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.unit.fixed')</option>
                                                            <option value="percentage"{{ $pricing['unit'] == 'percentage' ? ' selected' : '' }}>@lang('miscellaneous.admin.pricing.data.unit.percentage')</option>
                                                        </select>
                                                    </td>
                                                    <td class="align-middle">{{ !empty($pricing['valid_from']) ? explicitDateTime($pricing['valid_from']) : '- - - - -' }}</td>
                                                    <td class="align-middle">{{ !empty($pricing['valid_to']) ? explicitDateTime($pricing['valid_to']) : '- - - - -' }}</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ $pricing['is_default'] == 1 ? 'success' : 'danger' }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bi bi-{{ $pricing['is_default'] == 1 ? 'check-lg' : 'x-lg' }} me-1"></i> {{ $pricing['is_default_STRING'] }}
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a id="pricingIsDefault-{{ $pricing['id'] }}-0" class="dropdown-item{{ $pricing['is_default'] == 0 ? ' active' : '' }}" data-object-id="{{ $pricing['id'] }}" data-status-id="0" onclick="event.preventDefault(); changeStatus('pricing', this)">
                                                                        @lang('miscellaneous.no')
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a id="pricingIsDefault-{{ $pricing['id'] }}-1" class="dropdown-item{{ $pricing['is_default'] == 1 ? ' active' : '' }}" data-object-id="{{ $pricing['id'] }}" data-status-id="1" onclick="event.preventDefault(); changeStatus('pricing', this)">
                                                                        @lang('miscellaneous.yes')
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('pricing.show', ['id' => $pricing['id']]) }}" class="d-inline-block me-3">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                        <a role="button" class="text-danger" onclick="event.preventDefault(); deleteEntity('pricing', {{ $pricing['id'] }})">
                                                            @lang('miscellaneous.delete')
                                                        </a>
                                                    </td>
                                                </tr>
    @empty
                                                <tr>
                                                    <td colspan="11" class="text-center fst-italic">@lang('miscellaneous.empty_list')</td>
                                                </tr>
    @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $pricing_rules_req->links() }}
                                </div>
                            </div>

