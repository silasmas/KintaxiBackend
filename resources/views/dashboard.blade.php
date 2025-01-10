@extends('layouts.app', ['page_title' => __('miscellaneous.menu.dashboard') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.admin.overview')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.dashboard')</li>
                                                </ul>
                                            </div>
                                        </div>

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
    @forelse ($vehicles as $vehicle)
                                                <tr>
                                                    <td class="align-middle">{{ $vehicle['mark'] }}</td>
                                                    <td class="align-middle">{{ $vehicle['model'] }}</td>
                                                    <td class="align-middle">{{ $vehicle['registration_number'] }}</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.color') }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.icon') me-1"></i> @lang('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
        @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item{{ $status['id'] === $vehicle['status']['id'] ? ' active' : '' }}">
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
    @empty
                                                <tr>
                                                    <td colspan="5" class="text-center fst-italic">@lang('miscellaneous.empty_list')</td>
                                                </tr>
    @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6 class="h6 px-3 text-end">
                                        <a href="{{ route('vehicle.home') }}" class="text-decoration-underline text-success">
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
                                                    <th>@lang('miscellaneous.photo')</th>
                                                    <th>@lang('miscellaneous.names')</th>
                                                    <th>@lang('miscellaneous.phone')</th>
                                                    <th>@lang('miscellaneous.menu.role.title')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($users as $user)
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="{{ asset($user['avatar_url']) }}" alt="{{ $user['firstname'] . ' ' . $user['lastname'] }}" width="50" class="rounded-circle">
                                                    </td>
                                                    <td class="align-middle">{{ $user['firstname'] . ' ' . $user['lastname'] }}</td>
                                                    <td class="align-middle">{{ $user['phone'] }}</td>
                                                    <td>
                                                        <select class="form-select form-select-sm" aria-label="@lang('miscellaneous.choose_role')">
                                                            <option class="small" disabled>@lang('miscellaneous.choose_role')</option>
        @foreach ($roles as $role)
                                                            <option value="{{ $role['id'] }}"{{ $user['role']['id'] == $role['id'] ? ' selected' : '' }}>{{ $role['role_name'] }}</option>
        @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('role.entity.show', ['entity' => 'users', 'id' => $user['id']]) }}">
                                                            @lang('miscellaneous.change') <i class="fa fa-angle-double-right"></i>
                                                        </a><br>
                                                        <a role="button" class="text-danger">
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
                                    <h6 class="h6 px-3 text-end">
                                        <a href="{{ route('role.entity.home', ['entity' => 'users']) }}" class="text-decoration-underline text-success">
                                            @lang('miscellaneous.see_all_data') <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </h6>
                                </div>
                            </div>

@endsection