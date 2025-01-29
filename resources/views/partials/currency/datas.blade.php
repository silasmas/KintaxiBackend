
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap mb">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.admin.currency.details')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('currency.home') }}">@lang('miscellaneous.menu.currency')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">{{ $current_currency['currency_name'] }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="{{ route('currency.home') }}" class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-arrow-left me-2"></i>@lang('miscellaneous.back_list')
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.currency.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('currency.show', ['id' => $current_currency['id']]) }}" method="POST" enctype="multipart/form-data">
@csrf
                                                <!-- Name -->
                                                <div class="form-floating">
                                                    <input type="text" name="currency_name" id="currency_name" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.currency_name')" value="{{ $current_currency['currency_name'] }}" autofocus>
                                                    <label for="currency_name">@lang('miscellaneous.admin.currency.data.currency_name')</label>
                                                </div>

                                                <!-- Acronym -->
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="currency_acronym" id="currency_acronym" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.currency_acronym')" value="{{ $current_currency['currency_acronym'] }}">
                                                    <label for="currency_acronym">@lang('miscellaneous.admin.currency.data.currency_acronym')</label>
                                                </div>

                                                <!-- Rating -->
                                                <div class="form-floating mt-3">
                                                    <input type="number" name="rating" id="rating" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.rating')" value="{{ round($current_currency['rating']) }}">
                                                    <label for="rating">@lang('miscellaneous.admin.currency.data.rating')</label>
                                                </div>

                                                <!-- Icon -->
                                                <div class="mt-2">
                                                    <label for="icon" class="small">@lang('miscellaneous.admin.currency.data.icon')</label>
                                                    <input type="file" name="icon" id="icon" class="form-control" placeholder="@lang('miscellaneous.admin.currency.data.icon')" value="{{ $current_currency['icon'] }}">
                                                </div>

                                                <button type="submit" class="btn btn-primary w-100 mt-3 rounded-pill">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body text-center">
                                        <div class="bg-image mb-2">
                                            <img src="{{ $current_currency['icon'] }}" alt="{{ $current_currency['currency_name'] }}" width="100">
                                            <div class="mask"></div>
                                        </div>
                                        <h2 class="h2">{{ $current_currency['currency_name'] }}</h2>
                                        <h4 class="h4"><div class="badge badge-primary text-primary">{{ $current_currency['currency_acronym'] }}</div></h4>
                                        <p class="card-text mb-0">
                                            <u>@lang('miscellaneous.admin.currency.data.rating')</u><br>
                                            <strong>{{ formatIntegerNumber(round($current_currency['rating'])) }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>

