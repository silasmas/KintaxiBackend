@extends('layouts.app', ['page_title' => __('miscellaneous.menu.dashboard') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">@lang('miscellaneous.admin.overview')</h2>
                                        <button class="au-btn au-btn-icon au-btn--blue">
                                            <i class="zmdi zmdi-plus"></i>@lang('miscellaneous.add')
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c1">
                                        <a href="{{ route('customer.entity', ['entity' => 'ride-in-progress']) }}">
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
                                        <a href="{{ route('customer.entity', ['entity' => 'ride-finished']) }}">
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
                                        <a href="{{ route('customer.entity', ['entity' => 'rented-vehicles']) }}">
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
                                    <div class="table-responsive table--no-card m-b-40 overflow-visible">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.admin.created_at')</th>
                                                    <th>@lang('miscellaneous.admin.vehicle.mark')</th>
                                                    <th>@lang('miscellaneous.admin.vehicle.model')</th>
                                                    <th>@lang('miscellaneous.admin.status')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">{{ explicitDate('2018-09-29 05:57') }}</td>
                                                    <td class="align-middle">Mercedes Benz</td>
                                                    <td class="align-middle">ML 500</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-{{ __('miscellaneous.admin.vehicle.status.0.color') }} pb-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.vehicle.status.0.icon')"></i> @lang('miscellaneous.admin.vehicle.status.0.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
    @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <form action="{{ route('vehicle.entity', ['entity' => 'update_status']) }}" method="POST">
                                                                            <input type="hidden" name="status_id" value="{{ $status['id'] }}">
                                                                            <button type="submit">@lang('miscellaneous.admin.vehicle.status.' . $status['id'] . '.name')</button>
                                                                        </form>
                                                                    </span>
                                                                </li>
    @endforeach
                                                            </ul>
                                                        </div>                                                          
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('vehicle.datas', ['id' => 1]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">{{ explicitDate('2018-07-04 15:30') }}</td>
                                                    <td class="align-middle">Daihatsu</td>
                                                    <td class="align-middle">Mira ES</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-{{ __('miscellaneous.admin.vehicle.status.1.color') }} pb-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.vehicle.status.1.icon')"></i> @lang('miscellaneous.admin.vehicle.status.1.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
    @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <form action="{{ route('vehicle.entity', ['entity' => 'update_status']) }}" method="POST">
                                                                            <input type="hidden" name="status_id" value="{{ $status['id'] }}">
                                                                            <button type="submit">@lang('miscellaneous.admin.vehicle.status.' . $status['id'] . '.name')</button>
                                                                        </form>
                                                                    </span>
                                                                </li>
    @endforeach
                                                            </ul>
                                                        </div>                                                          
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('vehicle.datas', ['id' => 2]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">{{ explicitDate('2018-07-01 20:34') }}</td>
                                                    <td class="align-middle">Toyota</td>
                                                    <td class="align-middle">Land Cruiser Prado</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-{{ __('miscellaneous.admin.vehicle.status.2.color') }} pb-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.vehicle.status.2.icon')"></i> @lang('miscellaneous.admin.vehicle.status.2.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
    @foreach ($statuses as $status)
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <form action="{{ route('vehicle.entity', ['entity' => 'update_status']) }}" method="POST">
                                                                            <input type="hidden" name="status_id" value="{{ $status['id'] }}">
                                                                            <button type="submit">@lang('miscellaneous.admin.vehicle.status.' . $status['id'] . '.name')</button>
                                                                        </form>
                                                                    </span>
                                                                </li>
    @endforeach
                                                            </ul>
                                                        </div>                                                          
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('vehicle.datas', ['id' => 3]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright <i class="fa-regular fa-copyright"></i> {{ date('Y') }} <strong>KinTaxi</strong>. @lang('miscellaneous.all_right_reserved'). Designed by <a href="https://silasmas.com" target="_blank" class="text-decoration-underline">SDEV</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


@endsection