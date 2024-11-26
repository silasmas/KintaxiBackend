
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap mb">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.admin.group.status.details')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('status.home') }}">@lang('miscellaneous.menu.status')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">{{ ucfirst($current_status['status_name']) }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="{{ route('status.home') }}" class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-arrow-left me-2"></i>@lang('miscellaneous.back_list')
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.group.status.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('status.show', ['id' => $current_status['id']]) }}" method="POST">
@csrf
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="status_name" id="status_name" class="form-control" placeholder="@lang('miscellaneous.admin.group.status.data.status_name')" value="{{ $current_status['status_name'] }}" autofocus>
                                                    <label for="status_name">@lang('miscellaneous.admin.group.status.data.status_name')</label>
                                                </div>
                                                <div class="form-floating mb-4">
                                                    <textarea name="status_description" id="status_description" class="form-control" placeholder="@lang('miscellaneous.description')">{{ $current_status['status_description'] }}</textarea>
                                                    <label for="status_description">@lang('miscellaneous.description')</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="icon" id="icon" class="form-control" placeholder="@lang('miscellaneous.admin.icon_name')" value="{{ $current_status['icon'] }}">
                                                    <label for="icon">@lang('miscellaneous.admin.icon_name')</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="icon" id="icon" class="form-control" placeholder="@lang('miscellaneous.admin.color_name')" value="{{ $current_status['color'] }}">
                                                    <label for="icon">@lang('miscellaneous.admin.color_name')</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body text-center">
                                        <i class="{{ __('miscellaneous.admin.group.status.icon_color.' . $current_status['id'] . '.icon') }} mt-2 fs-1 mb-3" data-bs-toggle="tooltip" title="@lang('miscellaneous.admin.group.status.icon_color.' . $current_status['id'] . '.icon')"></i>
                                        <h4 class="h4">{{ ucfirst($current_status['status_name']) }}</h4>
                                        <p class="card-text text-capitalize mb-3">{{ $current_status['status_description'] }}</p>
                                        <span class="badge badge-{{ __('miscellaneous.admin.group.status.icon_color.' . $current_status['id'] . '.color') }} text-{{ __('miscellaneous.admin.group.status.icon_color.' . $current_status['id'] . '.color') }} fs-6 mb-2 pt-2 rounded-pill mx-auto" style="width: 160px; padding-bottom: 0.7rem;">
                                            {{ ucfirst(__('miscellaneous.admin.group.status.icon_color.' . $current_status['id'] . '.color')) }}
                                        </span>
                                    </div>
                                </div>
                            </div>

