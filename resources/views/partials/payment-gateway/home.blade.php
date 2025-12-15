
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.menu.payment-gateway')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.payment-gateway')</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2" data-bs-toggle="modal" data-bs-target="#gatewayModal">
                                            <i class="zmdi zmdi-plus"></i>@lang('miscellaneous.admin.payment-gateway.add')
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-md-12">
                                    <div class="table-responsive table--no-card mb-3">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.admin.payment-gateway.data.gateway_name')</th>
                                                    <th>@lang('miscellaneous.admin.payment-gateway.data.status.label')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($payment_gateways as $gateway)
                                                <tr>
                                                    <td class="align-middle">{{ $gateway['gateway_name'] }}</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.' . $gateway['status']['id'] . '.color') }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.' . $gateway['status']['id'] . '.icon') me-1"></i> @lang('miscellaneous.admin.group.status.icon_color.' . $gateway['status']['id'] . '.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
        @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item{{ $status['id'] === $gateway['status']['id'] ? ' active' : '' }}">
                                                                        <form action="{{ route('payment_gateway.show', ['id' => $gateway['id']]) }}" method="POST">
                                                                            <input type="hidden" name="status_id" value="{{ $status['id'] }}">
                                                                            <button type="submit">@lang('miscellaneous.admin.group.status.icon_color.' . $status['id'] . '.name')</button>
                                                                        </form>
                                                                    </span>
                                                                </li>
        @endforeach
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('payment_gateway.show', ['id' => $gateway['id']]) }}" class="d-inline-block me-3">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                        <a role="button" class="text-danger" onclick="event.preventDefault(); deleteEntity('payment-gateway', {{ $gateway['id'] }})">
                                                            @lang('miscellaneous.delete')
                                                        </a>
                                                    </td>
                                                </tr>
    @empty
                                                <tr>
                                                    <td colspan="5" class="text-center fst-italic">@lang('miscellaneous.empty_list')</td>
                                                </tr>
    @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

