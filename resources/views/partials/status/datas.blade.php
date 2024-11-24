
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
                                            <i class="zmdi zmdi-plus me-2"></i>@lang('miscellaneous.back_list')
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-lg-6 col-sm-8 mx-auto">
                                    <div class="card card-body"></div>
                                </div>
                            </div>

