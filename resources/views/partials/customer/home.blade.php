
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.menu.customers.title')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.customers.title')</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div>
                                            <select id="rideStatus" class="form-select form-control">
                                                <option value="rides_in_progress">@lang('miscellaneous.menu.customers.ride-in-progress')</option>
                                                <option value="rides_completed">@lang('miscellaneous.menu.customers.ride-finished')</option>
                                                <option value="rides_requested">@lang('miscellaneous.menu.customers.rented-vehicle')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body position-relative">
                                            <div id="gmap" style="width: 100%; height: 400px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

