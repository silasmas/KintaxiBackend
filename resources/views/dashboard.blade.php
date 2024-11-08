@extends('layouts.app', ['page_title' => __('miscellaneous.menu.dashboard') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">@lang('miscellaneous.admin.overview')</h2>
                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-plus"></i>@lang('miscellaneous.add')
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c1">
                                        <a href="{{ route('customer.entity.home', ['entity' => 'ride-in-progress']) }}">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon" style="margin-top: -25px;">
                                                        <i class="bi bi-clock"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h2>10 368</h2>
                                                        <span>@lang('miscellaneous.menu.customers.ride-in-progress')</span>
                                                    </div>
                                                </div>
                                                <div class="overview-chart">
                                                    <canvas id="widgetChart1"></canvas>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c2">
                                        <a href="{{ route('customer.entity.home', ['entity' => 'ride-finished']) }}">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon" style="margin-top: -25px;">
                                                        <i class="bi bi-calendar-check"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h2>388 688</h2>
                                                        <span>@lang('miscellaneous.menu.customers.ride-finished')</span>
                                                    </div>
                                                </div>
                                                <div class="overview-chart">
                                                    <canvas id="widgetChart2"></canvas>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c3">
                                        <a href="{{ route('customer.entity.home', ['entity' => 'rented-vehicles']) }}">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <div class="icon" style="margin-top: -25px;">
                                                        <i class="bi bi-car-front"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h2>1 086</h2>
                                                        <span>@lang('miscellaneous.menu.customers.rented-vehicles')</span>
                                                    </div>
                                                </div>
                                                <div class="overview-chart">
                                                    <canvas id="widgetChart3"></canvas>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-0">

                            <div class="row">
                                <div class="col-12">
                                    <h2 class="title-1 m-b-25">@lang('miscellaneous.admin.recent_vehicles')</h2>
                                    <div class="table-responsive table--no-card mb-3">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.admin.vehicle.mark')</th>
                                                    <th>@lang('miscellaneous.admin.vehicle.model')</th>
                                                    <th>@lang('miscellaneous.admin.vehicle.registration_number')</th>
                                                    <th>@lang('miscellaneous.admin.status')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">Mercedes Benz</td>
                                                    <td class="align-middle">ML 500</td>
                                                    <td class="align-middle">KM250L</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.0.color') }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.0.icon') me-1"></i> @lang('miscellaneous.admin.group.status.icon_color.0.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
    @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <form action="{{ route('vehicle.entity.home', ['entity' => 'update_status']) }}" method="POST">
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
                                                        <a href="{{ route('vehicle.show', ['id' => 1]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">Daihatsu</td>
                                                    <td class="align-middle">Mira ES</td>
                                                    <td class="align-middle">DD117P</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.1.color') }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.1.icon') me-1"></i> @lang('miscellaneous.admin.group.status.icon_color.1.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
    @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <form action="{{ route('vehicle.entity.home', ['entity' => 'update_status']) }}" method="POST">
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
                                                        <a href="{{ route('vehicle.show', ['id' => 2]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">Toyota</td>
                                                    <td class="align-middle">Land Cruiser Prado</td>
                                                    <td class="align-middle">KJ218Q</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.2.color') }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.2.icon') me-1"></i> @lang('miscellaneous.admin.group.status.icon_color.2.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
    @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <form action="{{ route('vehicle.entity.home', ['entity' => 'update_status']) }}" method="POST">
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
                                                        <a href="{{ route('vehicle.show', ['id' => 3]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">Mitsubishi</td>
                                                    <td class="align-middle">Canter</td>
                                                    <td class="align-middle">SB300V</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.3.color') }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.3.icon') me-1"></i> @lang('miscellaneous.admin.group.status.icon_color.3.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
    @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <form action="{{ route('vehicle.entity.home', ['entity' => 'update_status']) }}" method="POST">
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
                                                        <a href="{{ route('vehicle.show', ['id' => 4]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">Nissan</td>
                                                    <td class="align-middle">Caravan Van</td>
                                                    <td class="align-middle">FH994W</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.4.color') }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.4.icon') me-1"></i> @lang('miscellaneous.admin.group.status.icon_color.4.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
    @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <form action="{{ route('vehicle.entity.home', ['entity' => 'update_status']) }}" method="POST">
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
                                                        <a href="{{ route('vehicle.show', ['id' => 5]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6 class="h6 px-3 text-end">
                                        <a href="{{ route('vehicle.home') }}" class="text-decoration-underline text-danger">
                                            @lang('miscellaneous.see_all_data') <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </h6>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12">
                                    <h2 class="title-1 m-b-25">@lang('miscellaneous.admin.recent_users')</h2>
                                    <div class="table-responsive table--no-card mb-3">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.names')</th>
                                                    <th>@lang('miscellaneous.email')</th>
                                                    <th>@lang('miscellaneous.phone')</th>
                                                    <th>@lang('miscellaneous.menu.role.title')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">Amandla Stenberg</td>
                                                    <td class="align-middle">amandlastenberg@mail.us</td>
                                                    <td class="align-middle">+155354300</td>
                                                    <td>
                                                        <select class="form-select form-select-sm" aria-label="@lang('miscellaneous.choose_role')">
                                                            <option class="small" disabled>@lang('miscellaneous.choose_role')</option>
    @foreach ($roles as $role)
                                                            <option value="{{ $role['id'] }}"{{ $current_user['role']['id'] == $role['id'] ? ' selected' : '' }}>{{ $role['role_name'] }}</option>
    @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('role.entity.show', ['entity' => 'users', 'id' => 1]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6 class="h6 px-3 text-end">
                                        <a href="{{ route('role.entity.home', ['entity' => 'users']) }}" class="text-decoration-underline text-danger">
                                            @lang('miscellaneous.see_all_data') <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </h6>
                                </div>
                            </div>

@endsection