
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.menu.currency')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.currency')</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2" data-bs-toggle="modal" data-bs-target="#currencyModal">
                                            <i class="zmdi zmdi-plus"></i>@lang('miscellaneous.admin.currency.add')
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
                                                    <th>@lang('miscellaneous.admin.currency.data.icon')</th>
                                                    <th>@lang('miscellaneous.admin.currency.data.currency_name')</th>
                                                    <th>@lang('miscellaneous.admin.currency.data.rating')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
@forelse ($currencies as $currency)
                                                <tr>
                                                    <td><img src="{{ $currency['icon'] }}" alt="{{ $currency['currency_name'] }}" width="40"></td>
                                                    <td class="align-middle">{{ $currency['currency_name'] }}</td>
                                                    <td class="align-middle">{{ formatIntegerNumber(round($currency['rating'])) }}</td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('currency.show', ['id' => $currency['id']]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a><br>
                                                        <a href="{{ route('currency.destroy', ['id' => $currency['id']]) }}" class="text-danger">
                                                        <a role="button" class="text-danger" onclick="event.preventDefault(); deleteEntity('currency', {{ $currency['id'] }})">
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

