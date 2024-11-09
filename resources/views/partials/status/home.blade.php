
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap mb">
                                        <h2 class="title-1">@lang('miscellaneous.menu.status')</h2>
                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-plus"></i>@lang('miscellaneous.admin.group.status.add')
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
                                                    <th>@lang('miscellaneous.admin.group.status.data.status_name')</th>
                                                    <th>@lang('miscellaneous.admin.description')</th>
                                                    <th>@lang('miscellaneous.color')</th>
                                                    <th>@lang('miscellaneous.icon_font')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($statuses as $status)
                                                <tr>
                                                    <td>
                                                        <p class="m-0" style="max-width: 300px; white-space: normal;">
                                                            {{ ucfirst($status['status_name']) }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0" style="max-width: 300px; white-space: normal;">
                                                            {{ ucfirst($status['status_description']) }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <span class="btn btn-{{ __('miscellaneous.admin.group.status.icon_color.' . $status['id'] . '.color') }} rounded-pill" style="min-width: 120px;">
                                                            {{ ucfirst(__('miscellaneous.admin.group.status.icon_color.' . $status['id'] . '.color')) }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <i class="{{ __('miscellaneous.admin.group.status.icon_color.' . $status['id'] . '.icon') }} mt-2 fs-3" data-bs-toggle="tooltip" data-bs-placement="right" title="@lang('miscellaneous.admin.group.status.icon_color.' . $status['id'] . '.icon')"></i>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('status.show', $status['id']) }}">
                                                            @lang('miscellaneous.change') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
    @empty
    @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

