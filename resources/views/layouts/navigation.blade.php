            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="{{ route('home') }}">
                                <img src="{{ asset('assets/img/logo-text.png') }}" alt="KinTaxi" width="200" />
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <!-- Home -->
                            <li class="{{ Route::is('home') || Route::is('search') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">
                                    <i class="fas fa-dashboard"></i>@lang('miscellaneous.menu.dashboard')
                                </a>
                            </li>
                            <!-- Customer -->
                            <li class="has-sub{{ Route::is('customer.entity.home') ? ' active' : '' }}">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user-friends"></i>@lang('miscellaneous.menu.customers.title')
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{ route('customer.entity.home', ['entity' => 'ride-in-progress']) }}" class="ps-3">@lang('miscellaneous.menu.customers.ride-in-progress')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.entity.home', ['entity' => 'ride-finished']) }}" class="ps-3">@lang('miscellaneous.menu.customers.ride-finished')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.entity.home', ['entity' => 'rented-vehicles']) }}" class="ps-3">@lang('miscellaneous.menu.customers.rented-vehicles')</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Currency -->
                            <li class="{{ Route::is('currency.home') || Route::is('currency.show') ? 'active' : '' }}">
                                <a href="{{ route('currency.home') }}">
                                    <i class="fas fa-file-invoice-dollar"></i>@lang('miscellaneous.menu.currency')
                                </a>
                            </li>
                            <!-- Payment gateway -->
                            <li class="{{ Route::is('payment_gateway.home') || Route::is('payment_gateway.show') ? 'active' : '' }}">
                                <a href="{{ route('payment_gateway.home') }}">
                                    <i class="fas fa-credit-card"></i>@lang('miscellaneous.menu.payment-gateway')
                                </a>
                            </li>
                            <!-- Vehicle -->
                            <li class="has-sub{{ Route::is('vehicle.home') || Route::is('vehicle.show') || Route::is('vehicle.entity.home') || Route::is('vehicle.entity.show') ? ' active' : '' }}">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-car"></i>@lang('miscellaneous.menu.vehicle.title')
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{ route('vehicle.home') }}" class="ps-3">@lang('miscellaneous.menu.vehicle.all')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('vehicle.entity.home', ['entity' => 'shape']) }}" class="ps-3">@lang('miscellaneous.menu.vehicle.shape')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('vehicle.entity.home', ['entity' => 'category']) }}" class="ps-3">@lang('miscellaneous.menu.vehicle.category')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('vehicle.entity.home', ['entity' => 'features']) }}" class="ps-3">@lang('miscellaneous.menu.vehicle.features')</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Role -->
                            <li class="has-sub{{ Route::is('role.entity.home') || Route::is('role.entity.show') ? ' active' : '' }}">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-graduation-cap"></i>@lang('miscellaneous.menu.role.title')
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{ route('role.entity.home', ['entity' => 'manage-roles']) }}" class="ps-3">@lang('miscellaneous.menu.role.manage-roles')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('role.entity.home', ['entity' => 'users']) }}" class="ps-3">@lang('miscellaneous.menu.role.users')</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Status -->
                            <li class="{{ Route::is('status.home') || Route::is('status.show') ? 'active' : '' }}">
                                <a href="{{ route('status.home') }}">
                                    <i class="fas fa-thermometer-1"></i>@lang('miscellaneous.menu.status')
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-lg-block d-none">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/logo-text.png') }}" alt="KinTaxi" width="200" />
                    </a>
                </div>
                {{-- <div class="menu-sidebar__content js-scrollbar1"> --}}
                <div class="menu-sidebar2__content js-scrollbar1">
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <!-- Home -->
                            <li class="{{ Route::is('home') || Route::is('search') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">
                                    <i class="fas fa-dashboard"></i>@lang('miscellaneous.menu.dashboard')
                                </a>
                            </li>
                            <!-- Customer -->
                            <li class="has-sub{{ Route::is('customer.entity.home') ? ' active' : '' }}">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user-friends"></i>@lang('miscellaneous.menu.customers.title')
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{ route('customer.entity.home', ['entity' => 'ride-in-progress']) }}" class="ps-3">@lang('miscellaneous.menu.customers.ride-in-progress')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.entity.home', ['entity' => 'ride-finished']) }}" class="ps-3">@lang('miscellaneous.menu.customers.ride-finished')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.entity.home', ['entity' => 'rented-vehicles']) }}" class="ps-3">@lang('miscellaneous.menu.customers.rented-vehicles')</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Currency -->
                            <li class="{{ Route::is('currency.home') || Route::is('currency.show') ? 'active' : '' }}">
                                <a href="{{ route('currency.home') }}">
                                    <i class="fas fa-file-invoice-dollar"></i>@lang('miscellaneous.menu.currency')
                                </a>
                            </li>
                            <!-- Payment gateway -->
                            <li class="{{ Route::is('payment_gateway.home') || Route::is('payment_gateway.show') ? 'active' : '' }}">
                                <a href="{{ route('payment_gateway.home') }}">
                                    <i class="fas fa-credit-card"></i>@lang('miscellaneous.menu.payment-gateway')
                                </a>
                            </li>
                            <!-- Vehicle -->
                            <li class="has-sub{{ Route::is('vehicle.home') || Route::is('vehicle.show') || Route::is('vehicle.entity.home') || Route::is('vehicle.entity.show') ? ' active' : '' }}">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-car"></i>@lang('miscellaneous.menu.vehicle.title')
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{ route('vehicle.home') }}" class="ps-3">@lang('miscellaneous.menu.vehicle.all')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('vehicle.entity.home', ['entity' => 'shape']) }}" class="ps-3">@lang('miscellaneous.menu.vehicle.shape')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('vehicle.entity.home', ['entity' => 'category']) }}" class="ps-3">@lang('miscellaneous.menu.vehicle.category')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('vehicle.entity.home', ['entity' => 'features']) }}" class="ps-3">@lang('miscellaneous.menu.vehicle.features')</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Role -->
                            <li class="has-sub{{ Route::is('role.entity.home') || Route::is('role.entity.show') ? ' active' : '' }}">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-graduation-cap"></i>@lang('miscellaneous.menu.role.title')
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{ route('role.entity.home', ['entity' => 'manage-roles']) }}" class="ps-3">@lang('miscellaneous.menu.role.manage-roles')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('role.entity.home', ['entity' => 'users']) }}" class="ps-3">@lang('miscellaneous.menu.role.users')</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Status -->
                            <li class="{{ Route::is('status.home') || Route::is('status.show') ? 'active' : '' }}">
                                <a href="{{ route('status.home') }}">
                                    <i class="fas fa-thermometer-1"></i>@lang('miscellaneous.menu.status')
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->
