
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.menu.vehicle.all')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.vehicle.all')</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2" data-bs-toggle="modal" data-bs-target="#vehicleModal">
                                            <i class="zmdi zmdi-plus"></i>{{ __('miscellaneous.admin.vehicle.add') }}
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
                                </div>
                            </div>
