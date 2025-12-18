
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap mb">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.admin.payment-gateway.details')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('payment_gateway.home') }}">@lang('miscellaneous.menu.payment-gateway')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">{{ ucfirst($current_gateway['gateway_name']) }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="{{ route('payment_gateway.home') }}" class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
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
                                            <form action="{{ route('payment_gateway.show', ['id' => $current_gateway['id']]) }}" method="POST">
@csrf
                                                <!-- Status -->
                                                <div class="form-floating">
                                                    <select name="status_id" id="status" class="form-select" aria-label="@lang('miscellaneous.admin.work.data.choose_status')">
@foreach ($statuses as $status)
                                                        <option value="{{ $status['id'] }}"{{ $current_gateway['status']->resource != null ? ($status['id'] == $current_gateway['status']->id ? ' selected' : '') : '' }}>{{ ucfirst(explode('/', $status['status_name'])[0]) }}</option>
@endforeach
                                                    </select>
                                                    <label class="form-label" for="status">@lang('miscellaneous.admin.status')</label>
                                                </div>

                                                <div class="form-floating my-3">
                                                    <input type="text" name="gateway_name" id="gateway_name" class="form-control" placeholder="@lang('miscellaneous.admin.payment-gateway.data.gateway_name')" value="{{ $current_gateway['gateway_name'] }}" autofocus>
                                                    <label for="gateway_name">@lang('miscellaneous.admin.payment-gateway.data.gateway_name')</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body text-center">
                                        <h3 class="h3">{{ ucfirst($current_gateway['gateway_name']) }}</h3>
                                        <h3>
                                            <div class="badge badge-{{ $current_gateway['status']->color }} text-{{ $current_gateway['status']->color }}">
                                                {{ ucfirst(explode('/', $current_gateway['status']->status_name)[0]) }}
                                            </div>
                                        </h3>
                                    </div>
                                </div>
                            </div>

