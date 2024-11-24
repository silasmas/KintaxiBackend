<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="kntx-url" content="{{ getWebURL() }}"> --}}
        <meta name="kntx-visitor" content="{{ !empty($current_user) ? $current_user['id'] : null }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="kntx-ref" content="{{ !empty($current_user) ? $current_user['api_token'] : null }}">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

        <!-- Font Icons Files -->
        <link rel="stylesheet" href="{{ asset('assets/css/font-face.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/mdi-font/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/7.2.3/css/flag-icons.min.css">

        <!-- Addons CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/mdb/css/mdb.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/jquery/jquery-ui/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/cooladmin/animsition/animsition.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/cooladmin/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/cooladmin/wow/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/cooladmin/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/cooladmin/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/cooladmin/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/dataTables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/cropper/css/cropper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/sweetalert2/dist/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/bootstrap/bootstrap-multiselect/css/bootstrap-multiselect.min.css') }}">

        <!-- CoolAdmin CSS File -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

        <!-- CoolAdmin CSS File -->
        <style>
            .title-1 { text-transform: inherit!important; }
        </style>

        <title>
@if (!empty($page_title))
            {{ $page_title }}
@else
            {{ config('app.name') }}
@endif
        </title>
    </head>

    <body class="animsition">
        <div class="page-wrapper">
@include('layouts.navigation')

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
@include('layouts.search')
                                <div class="header-button">
                                    <div class="noti-wrap">
                                        <!-- Language -->
                                        <div class="dropdown show">
                                            <button class="btn btn-transparent me-4 px-2 py-0 border-0 shadow-0 fs-4" id="languageToggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="zmdi zmdi-translate"></i>
                                            </button>

                                            <div class="dropdown-menu py-0 overflow-hidden" aria-labelledby="languageToggle">
@foreach ($available_locales as $locale_name => $locale)
    @if ($locale != $current_locale)
                                                <a class="dropdown-item" href="{{ route('change_language', ['locale' => $locale]) }}">{{ $locale_name }}<i class="fi fi-{{ $locale == 'en' ? 'us' : $locale }} mt-1 float-end"></i></a>
    @else
                                                <span class="dropdown-item disabled">{{ $locale_name }}<i class="fi fi-{{ $locale == 'en' ? 'us' : $locale }} mt-1 float-end"></i></span>
    @endif
@endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Current user -->
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="{{ $current_user['avatar_url'] }}" alt="{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}" class="rounded-circle" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="{{ route('account') }}">{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}</a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="{{ route('account') }}">
                                                            <img src="{{ $current_user['avatar_url'] }}" alt="{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="{{ route('account') }}">{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}</a>
                                                        </h5>
                                                        <span class="email">{{ !empty($current_user['email']) ? $current_user['email'] : $current_user['username'] }}</span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="{{ route('account') }}">
                                                            <i class="zmdi zmdi-account"></i>@lang('miscellaneous.menu.account.title')</a>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <form action="{{ route('logout') }}" method="POST">
@csrf
                                                        <button class="btn btn-sm btn-transparent p-4 border-0 shadow-0" style="text-transform: inherit!important;">
                                                            <i class="zmdi zmdi-power me-4"></i>@lang('miscellaneous.logout')
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
@yield('app-content')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright <i class="fa-regular fa-copyright"></i> {{ date('Y') }} <strong>KinTaxi</strong>. @lang('miscellaneous.all_right_reserved'). Designed by <a href="https://silasmas.com" target="_blank" class="text-decoration-underline">SDEV</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
            </div>
            <!-- END PAGE CONTAINER-->
        </div>


        <!-- Button back to top -->
        <button id="btnBackTop" class="btn btn-lg btn-floating btn-warning position-fixed d-none rounded-circle shadow" title="@lang('miscellaneous.back_top')" style="z-index: 9999; bottom: 2rem; right: 2rem; padding: 0.4rem 0.5rem;" onclick="backToTop()" data-bs-toggle="tooltip"><i class="bi bi-chevron-double-up"></i></button> 

        <!-- JavaScript Libraries -->
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/mdb/js/mdb.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/slick/slick.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/animsition/animsition.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/counter-up/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cooladmin/select2/select2.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/autosize/js/autosize.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/dataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/cropper/js/cropper.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/sweetalert2/dist/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/jquery/scroll4ever/js/jquery.scroll4ever.js') }}"></script>

        <!-- CoolAdmin Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- Custom Javascript -->
        <script src="{{ asset('assets/js/script.custom.js') }}"></script>
        <script type="text/javascript">
            /*
             * When the user clicks on the button, scroll to the top of the document
             */
            function backToTop() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }
        </script>
    </body>
</html>
