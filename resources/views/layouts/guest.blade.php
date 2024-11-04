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

        <title>
@if (!empty($page_title))
            {{ $page_title }}
@else
    @if (!empty($exception))
            {{ $exception->getStatusCode() . ' - ' . __('notifications.' . $exception->getStatusCode() . '_title') }}
    @else
            {{ config('app.name') }}
    @endif
@endif
        </title>
    </head>

    <body class="animsition" style="background-color: #e5e5e5;">
        <span class="menu-sidebar2__content d-none"></span>
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
{{-- Custom error --}}
@if (Session::has('success_message'))
                    <div id="successMessageWrapper" class="position-fixed w-100 top-0 start-0 z-index-99">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                                <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                                    <i class="bi bi-info-circle me-3 fs-5"></i>
                                    <div class="custom-message">{{ Session::get('success_message') }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if (Session::has('error_message'))
                    <div id="errorMessageWrapper" class="position-fixed w-100 top-0 start-0 z-index-99">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                                <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                                    <i class="bi bi-exclamation-triangle me-3 fs-5"></i>
                                    <div class="custom-message">{{ Session::get('error_message') }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
{{-- Laravel validation errors --}}
@if ($errors->any())
    @if ($errors->has('email'))
                    <div id="errorMessageWrapper" class="position-fixed w-100 top-0 start-0 z-index-99">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                                <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                                    <i class="bi bi-exclamation-triangle me-3 fs-5"></i>
                                    <div class="custom-message">{{ $errors->first('email') }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
    @endif
    @if ($errors->has('phone'))
                    <div id="errorMessageWrapper" class="position-fixed w-100 top-0 start-0 z-index-99">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                                <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                                    <i class="bi bi-exclamation-triangle me-3 fs-5"></i>
                                    <div class="custom-message">{{ $errors->first('phone') }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
    @endif
@endif

                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/img/logo-text.png') }}" alt="KinTaxi" width="200">
                                </a>
                            </div>
@yield('guest-content')
                        </div>
                    </div>

                    <div class="row g-0 mb-5">
                        <div class="col-lg-4 col-sm-8 mx-auto">
                            <div class="d-sm-flex justify-content-between text-center">
                                <p class="small mt-3 mb-sm-0 mb-1"><i class="fa-regular fa-copyright"></i> {{ date('Y') }} <strong>KinTaxi</strong> @lang('miscellaneous.all_right_reserved')</p>
                                <p class="small mt-sm-3 mb-0">Designed by <a class="text-decoration-underline" href="https://silasmas.com" target="_blank">SDEV</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
