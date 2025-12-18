<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="kntx-url" content="{{ getWebURL() }}">
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
        {{-- <link rel="stylesheet" href="{{ asset('assets/addons/custom/flatpickr/dist/flatpickr.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/dataTables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/dropzone/css/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/cropper/css/cropper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/sweetalert2/dist/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/bootstrap/bootstrap-multiselect/css/bootstrap-multiselect.min.css') }}">

        <!-- CoolAdmin CSS File -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

        <style>
            /* Google Maps */
            #map { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
            /* Image preview */
            #imagePreviewContainer { display: flex; flex-wrap: wrap; gap: 10px; }
            .imagePreview { position: relative; width: 100px; height: 100px; overflow: hidden; border: 1px solid #ccc; border-radius: 8px; }
            .imagePreview img { width: 100%; height: 100%; object-fit: cover; }
            .remove-btn { position: absolute; top: 5px; right: 5px; background-color: rgba(100, 0, 0, 0.5); color: white; width: 25px; height: 25px; padding: 0; border: none; border-radius: 50%; cursor: pointer; transition: .5s all ease }
            .remove-btn:hover { background-color: rgba(30, 0, 0, 0.5); }
            #vehicleImage { height: 150px; }
            #vehicleImage img { object-fit: cover; }
            /* Miscellaneous */
            .align-middle { vertical-align: -4px!important; }
            .title-1 { text-transform: inherit!important; }
            @media (min-width: 900px) {
                #userModal .modal-body { max-height: 430px; overflow: hidden; overflow-y: auto; }
                #vehicleModal .modal-body { max-height: 430px; overflow: hidden; overflow-y: auto; }
            }
            @media (min-width: 768px) {
                #itemsList { overflow: visible; }
                #updateUserStatus { position: absolute; top: 0.9rem; right: 0.9rem; cursor: pointer; }
            }
            @media (max-width: 899px) and (min-width: 768px) {
                #userModal .modal-body { max-height: 340px; overflow: hidden; overflow-y: auto; }
            }
        </style>

        <title>
@if (!empty($page_title))
            {{ 'KinTaxi / ' . $page_title }}
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
                                                <img src="{{ $current_user['avatar_url'] }}" alt="{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}" class="rounded-circle user-image" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="{{ route('account') }}">{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}</a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="{{ route('account') }}">
                                                            <img src="{{ $current_user['avatar_url'] }}" alt="{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}" class="user-image" />
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
                <div class="main-content position-relative">
                    <div id="successMessageWrapper" class="position-fixed w-100 top-0 start-0 d-flex justify-content-center d-none" style="z-index: 99999;">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            <div class="small d-inline-block custom-message"></div>
                            <button type="button" class="btn-close" aria-label="@lang('miscellaneous.close')" onclick="document.getElementById('successMessageWrapper').classList.add('d-none')"></button>
                        </div>
                    </div>

                    <div id="errorMessageWrapper" class="position-fixed w-100 top-0 start-0 d-flex justify-content-center d-none" style="z-index: 99999;">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <div class="small d-inline-block custom-message"></div>
                            <button type="button" class="btn-close" aria-label="@lang('miscellaneous.close')" onclick="document.getElementById('errorMessageWrapper').classList.add('d-none')"></button>
                        </div>
                    </div>

@if (Session::has('success_message'))
                    <div class="position-fixed w-100 top-0 start-0 d-flex justify-content-center" style="z-index: 99999;">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle me-2"></i>{!! Session::get('success_message') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                    </div>
@endif
@if (Session::has('error_message'))
                    <div class="position-fixed w-100 top-0 start-0 d-flex justify-content-center" style="z-index: 99999;">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>{!! Session::get('error_message') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                    </div>
@endif

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

        <!-- START MODALS -->
@include('layouts.modals')
        <!-- END MODALS -->

        <!-- JavaScript Libraries -->
        <script type="text/javascript" src="{{ asset('assets/addons/custom/jquery/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/jquery/js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/bootstrap/js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/mdb/js/mdb.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/slick/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/wow/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/animsition/animsition.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/counter-up/jquery.waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/counter-up/jquery.counterup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/circle-progress/circle-progress.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/chartjs/Chart.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/cooladmin/select2/select2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/autosize/js/autosize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/dataTables/datatables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/dropzone/js/dropzone-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/cropper/js/cropper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/sweetalert2/dist/sweetalert2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/addons/custom/jquery/scroll4ever/js/jquery.scroll4ever.js') }}"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCDLqp2YpT47nBISIE0S--ay2oJ6401IVk"></script>

        <!-- CoolAdmin Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- Custom Javascript -->
        <script src="{{ asset('assets/js/script.custom.js') }}"></script>
@if (Route::is('customer.home'))
        <script type="text/javascript">
            $(function () {
                /*
                 * Rides on Google Maps
                 */
                let map;
                let markers = [];

                const initMap = () => {
                    const rides = window.Laravel.data.rides_completed;
                    const latLng = (rides.length > 0)
                                    ? new google.maps.LatLng(rides[0].start_location.location.lat, rides[0].start_location.location.lng)
                                    : new google.maps.LatLng(-1.6586834, 29.1669084);

                    map = new google.maps.Map(document.getElementById('gmap'), {
                        zoom: 12,
                        center: latLng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    updateMap('rides_completed'); // The default status
                };

                const updateMap = (rideStatus) => {
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    var rides = window.Laravel.data[rideStatus];
                    console.log(rides);

                    if (rides.length > 0) {
                        var latLng = new google.maps.LatLng(rides[0].start_location.location.lat, rides[0].start_location.location.lng);

                        map.setCenter(latLng);
                    }

                    rides.forEach(function(ride) {
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(ride.start_location.location.lat, ride.start_location.location.lng),
                            map: map,
                            draggable: false,
                            animation: google.maps.Animation.DROP,
                        });

                        markers.push(marker);
                    });
                };

                $('#rideStatus').change(function() {
                    var status = $(this).val();

                    updateMap(status);
                });

                initMap();

                // $('#rideStatus').change(function (e) { 
                //     e.preventDefault();

                //     if ($('#rideStatus').val() === 'ride_in_progress') {
                        
                //     }
                // });
                // var latLng = new google.maps.LatLng(-1.6586834, 29.1669084);
                // var map = new google.maps.Map(document.getElementById('gmap'), {
                //     zoom: 12,
                //     center: latLng,
                //     mapTypeId: google.maps.MapTypeId.ROADMAP,
                // });

                // window.Laravel.data.rides_completed.forEach((item, index) => {
                //     console.log(JSON.stringify(item.start_location));
                //     var marker = new google.maps.Marker({
                //         position: new google.maps.LatLng(item.start_location.location.lat, item.start_location.location.lng),
                //         map: map,
                //         draggable: false,
                //         animation: google.maps.Animation.DROP,
                //     });

                //     marker.idEvent = item.id;
                // });
            });
        </script>
@endif
@if (Route::is('vehicle.show'))
        <script type="text/javascript">
            /*
             * Image preview from input:file multiple
             */
            let selectedFiles = []; // Table to maintain the list of selected files

            document.getElementById('imageInput').addEventListener('change', function(event) {
                const newFiles = event.target.files;
                const previewContainer = document.getElementById('imagePreviewContainer');

                // Add new files to the existing list (without deleting old ones)
                selectedFiles = [...selectedFiles, ...Array.from(newFiles)];

                // Show previews for all files (old and new)
                previewContainer.innerHTML = ''; // Clear existing previews to update the list

                previewContainer.classList.remove('d-none');

                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imagePreview = document.createElement('div');

                        imagePreview.classList.add('imagePreview');
            
                        const img = document.createElement('img');

                        img.src = e.target.result;

                        const removeBtn = document.createElement('button');

                        removeBtn.classList.add('remove-btn');

                        removeBtn.innerHTML = '<i class="bi bi-x-lg"></i>';

                        removeBtn.addEventListener('click', () => {
                            // Delete the file from the table and update the entry
                            selectedFiles.splice(index, 1); // Remove file from table
                            imagePreview.remove(); // Remove DOM preview
                            updateInput(); // Update the input with the new list of files

                            // If the file list is empty, reset the input
                            if (selectedFiles.length === 0 || !previewContainer.hasChildNodes()) {
                                document.getElementById('imageInput').value = ''; // Reset the input

                                previewContainer.classList.add('d-none');
                            }
                        });

                        imagePreview.appendChild(img);
                        imagePreview.appendChild(removeBtn);
                        previewContainer.appendChild(imagePreview);
                    };
                    reader.readAsDataURL(file);
                });

                updateInput(); // Update the entry to reflect the list of files
            });
        </script>
@endif
        <script type="text/javascript">
            /*
             * When the user clicks on the button, scroll to the top of the document
             */
            const backToTop = () => {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            };

            /**
             * Change user role
             */
            const changeRole = (element) => {
                const _this = document.getElementById(element.id);
                const element_value = parseInt(_this.value);
                const user_id = parseInt(_this.getAttribute('data-user-id'));

                Swal.fire({
                    title: '{{ __("miscellaneous.alert.attention.role") }}',
                    text: '{{ __("miscellaneous.alert.confirm.role") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("miscellaneous.alert.yes.role") }}',
                    cancelButtonText: '{{ __("miscellaneous.cancel") }}'

                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: headers,
                            type: 'POST',
                            contentType: 'application/json',
                            url: '/role/users/' + user_id,
                            dataType: 'json',
                            data: JSON.stringify({ _token : csrfToken, 'id' : user_id, 'role_id' : element_value }),
                            success: function (result) {
                                if (!result.success) {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.oups") }}',
                                        text: result.message,
                                        icon: 'error'
                                    });

                                } else {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.perfect") }}',
                                        text: result.message,
                                        icon: 'success'
                                    });
                                    location.reload();
                                }
                            },
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);

                                Swal.fire({
                                    title: '{{ __("notifications.500_title") }}',
                                    text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : (xhr.responseText && xhr.responseText.message ? xhr.responseText.message : status_description),
                                    icon: 'error'
                                });
                            }
                        });

                    } else {
                        Swal.fire({
                            title: '{{ __("miscellaneous.cancel") }}',
                            text: '{{ __("miscellaneous.alert.canceled.role") }}',
                            icon: 'error'
                        });
                    }
                });
            };

            /**
             * Change status of an entity
             */
            const changeStatus = (entity, element) => {
                const _this = document.getElementById(element.id);
                const status_id = parseInt(_this.dataset.statusId);
                const object_id = parseInt(_this.dataset.objectId);
                // Routes object
                const routes = {
                    vehicle: '/vehicle/{id}',
                    category: '/vehicle/category/{id}',
                    gateway: '/payment-gateway/{id}',
                };

                if (isNaN(status_id) || status_id === '' || typeof status_id !== 'number') {
                    Swal.fire({
                        title: '{{ __("miscellaneous.alert.oups") }}',
                        text: '{{ __("validation.numeric", ["attribute" => "status_id"]) }}',
                        icon: 'error'
                    });

                    return;
                }

                if (isNaN(object_id) || object_id === '' || typeof object_id !== 'number') {
                    Swal.fire({
                        title: '{{ __("miscellaneous.alert.oups") }}',
                        text: '{{ __("validation.numeric", ["attribute" => "object_id"]) }}',
                        icon: 'error'
                    });

                    return;
                }

                Swal.fire({
                    title: '{{ __("miscellaneous.alert.attention.status") }}',
                    text: '{{ __("miscellaneous.alert.confirm.status") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("miscellaneous.alert.yes.status") }}',
                    cancelButtonText: '{{ __("miscellaneous.cancel") }}'

                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: headers,
                            type: 'POST',
                            contentType: 'application/json',
                            url: currentHost + routes[entity].replace('{id}', object_id),
                            dataType: 'json',
                            data: JSON.stringify({ _token : csrfToken, 'id' : object_id, 'status_id' : (status_id == 0 ? -5 : status_id) }),
                            success: function (result) {
                                console.log(result);

                                if (!result.success) {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.oups") }}',
                                        text: result.message,
                                        icon: 'error'
                                    });

                                } else {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.perfect") }}',
                                        text: result.message,
                                        icon: 'success'
                                    });
                                    location.reload();
                                }
                            },
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);

                                Swal.fire({
                                    title: '{{ __("notifications.500_title") }}',
                                    text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : (xhr.responseText && xhr.responseText.message ? xhr.responseText.message : status_description),
                                    icon: 'error'
                                });
                            }
                        });

                    } else {
                        Swal.fire({
                            title: '{{ __("miscellaneous.cancel") }}',
                            text: '{{ __("miscellaneous.alert.canceled.status") }}',
                            icon: 'error'
                        });
                    }
                });
            };

            /**
             * Delete entity
             * 
             * @param string entity
             * @param int entityId
             * @param string|null additionalEntity
             * 
             * SOME EXAMPLES
             * ==================
             * To delete a customer with ID "123" : deleteEntity('customer', 123);
             * To delete a vehicle with ID "456" and entity "car" : deleteEntity('vehicle', 456, 'car');
             * To delete a role with ID "789" and the entity "admin" : deleteEntity('role', 789, 'admin');
             */
            const deleteEntity = (entity, entityId, additionalEntity = null) => {
                // Routes object
                const routes = {
                    customer: '/customer/delete/{id}',
                    currency: '/currency/delete/{id}',
                    'payment-gateway': '/payment-gateway/delete/{id}',
                    vehicle: '/vehicle/delete/{id}',
                    'vehicle-entity': '/vehicle/delete/{entity}/{id}',
                    role: '/role/delete/{id}',
                    'role-entity': '/role/delete/{entity}/{id}',
                    status: '/status/delete/{id}'
                };

                // Checking for the existence of the entity in the object
                if (!routes[entity] && !routes[`${entity}-entity`]) {
                    console.error('{{ __("validation.custom.owner.required") }}');
                    return;
                }

                // URL construction based on the entity
                let url;

                if (routes[`${entity}-entity`] && additionalEntity) {
                    url = routes[`${entity}-entity`].replace('{entity}', additionalEntity).replace('{id}', entityId);

                } else {
                    url = routes[entity].replace('{id}', entityId);
                }

                // Confirmation request with SweetAlert
                Swal.fire({
                    title: '{{ __("miscellaneous.alert.attention.delete") }}',
                    text: '{{ __("miscellaneous.alert.confirm.delete") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("miscellaneous.alert.yes.delete") }}',
                    cancelButtonText: '{{ __("miscellaneous.cancel") }}'
                }).then(function (result) {
                    if (result.isConfirmed) {
                        // Ajax request
                        $.ajax({
                            headers: headers, // Headers are set in the "assets/js/script.custom.js"
                            type: 'GET',
                            url: url,
                            contentType: 'application/json',
                            // contentType: false,
                            // processData: false,
                            data: JSON.stringify({ 'entity': entity, 'id': entityId }),
                            success: function (result) {
                                if (!result.success) {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.oups") }}',
                                        text: result.message,
                                        icon: 'error'
                                    });

                                } else {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.perfect") }}',
                                        text: result.message,
                                        icon: 'success'
                                    });
                                    location.reload();
                                }
                            },
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);

                                Swal.fire({
                                    title: '{{ __("notifications.500_title") }}',
                                    text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : (xhr.responseText && xhr.responseText.message ? xhr.responseText.message : status_description),
                                    icon: 'error'
                                });
                            }
                        });

                    } else {
                        Swal.fire({
                            title: '{{ __("miscellaneous.cancel") }}',
                            text: '{{ __("miscellaneous.alert.canceled.delete") }}',
                            icon: 'error'
                        });
                    }
                });
            };

            /**
             * Function to update the input with the list of selected files
             */
            const updateInput = () => {
                const dataTransfer = new DataTransfer();

                selectedFiles.forEach(file => {
                    dataTransfer.items.add(file);
                });

                document.getElementById('imageInput').files = dataTransfer.files;
            };

            /**
             * Function to show rides by status
             * 
             * @param string titleSelector
             * @param string textSelector
             * @param string status
             * @param string textSingular
             * @param string textPlural
             */
            const countRidesByStatus = (titleSelector, textSelector, status, textSingular, textPlural) => {
                const titleElement = document.querySelector(titleSelector);
                const textElement = document.querySelector(textSelector);

                $.ajax({
                    headers: headers,
                    type: 'GET',
                    url: `${currentHost}/api/ride/rides_by_status/${status}`,
                    dataType: 'json',
                    success: function (response) {
                        const text = response.count > 1 ? textPlural : textSingular;

                        $(titleElement).html(response.count);
                        $(textElement).html(text);
                    },
                    error: function (xhr, error, status_description) {
                        console.log(xhr.responseJSON);
                        console.log(xhr.status);
                        console.log(error);
                        console.log(status_description);
                    }
                });
            };

            $(function () {
                /*
                 * Rides count
                 */
                // Periodic reminder (every second) with setInterval for each status
                countRidesByStatus('#inProgressRides h2', '#inProgressRides span', 'in_progress', window.Laravel.lang.menu.customers.ride_in_progress, window.Laravel.lang.menu.customers.rides_in_progress);
                countRidesByStatus('#completedRides h2', '#completedRides span', 'completed', window.Laravel.lang.menu.customers.ride_finished, window.Laravel.lang.menu.customers.rides_finished);
                countRidesByStatus('#requestedRides h2', '#requestedRides span', 'requested', window.Laravel.lang.menu.customers.rented_vehicle, window.Laravel.lang.menu.customers.rented_vehicles);

                setInterval(function() {
                    countRidesByStatus('#inProgressRides h2', '#inProgressRides span', 'in_progress', window.Laravel.lang.menu.customers.ride_in_progress, window.Laravel.lang.menu.customers.rides_in_progress);
                }, 10000);
                setInterval(function() {
                    countRidesByStatus('#completedRides h2', '#completedRides span', 'completed', window.Laravel.lang.menu.customers.ride_finished, window.Laravel.lang.menu.customers.rides_finished);
                }, 10000);
                setInterval(function() {
                    countRidesByStatus('#requestedRides h2', '#requestedRides span', 'requested', window.Laravel.lang.menu.customers.rented_vehicle, window.Laravel.lang.menu.customers.rented_vehicles);
                }, 10000);

                /*
                 * File type validation (Image only)
                 */
                $('#id_card, #driving_license, #vehicle_registration, #vehicle_insurance').on('change', function (event) {
                    var files = event.target.files;
                    var validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
                    var validFiles = Array.from(files).filter(function (file) {
                        var extension = file.name.split('.').pop().toLowerCase(); // Retrieves the file extension

                        return validExtensions.includes(extension); // Check if the extension is valid
                    });

                    if (validFiles.length === 0) {
                        $('#errorMessageWrapper').removeClass('d-none');
                        $('#errorMessageWrapper .custom-message').html(window.Laravel.lang.upload.image_error);

                        // Clear the input field (remove the invalid file)
                        $(event.target).val('');

                        return;

                    } else {
                        if (!$('#errorMessageWrapper').hasClass('d-none')) {
                            $('#errorMessageWrapper').addClass('d-none');
                        }
                    }
                });

                /*
                 * Focus to specific input for each concerned modal
                 */
                $('#statusModal').on('shown.bs.modal', function () {
                    $('#status_name').focus();
                });
                $('#roleModal').on('shown.bs.modal', function () {
                    $('#role_name').focus();
                });
                $('#gatewayModal').on('shown.bs.modal', function () {
                    $('#gateway_name').focus();
                });
                $('#currencyModal').on('shown.bs.modal', function () {
                    $('#currency_name').focus();
                });
                $('#userModal').on('shown.bs.modal', function () {
                    $('#firstname').focus();

                    // Show / Hide "belongs_to" input according to selected role
                    $('#role').change(function (e) { 
                        e.preventDefault();

                        if ($(this).val() === '4') {
                            $('#belongs_to_wrapper').removeClass('d-none');

                        } else {
                            $('#belongs_to_wrapper').addClass('d-none');
                        }
                    });

                    // Send user data
                    $('#userModal form').submit(function (e) { 
                        e.preventDefault();

                        var formData = new FormData(this);

                        $.ajaxSetup({
                            headers: { 'X-CSRF-TOKEN': csrfToken }
                        });
                        $.ajax({
                            type: 'POST',
                            url: currentHost + '/role/users',
                            data: formData,
                            beforeSend: function () {
                                $('#userModal form button').addClass('disabled');
                                $('#userModal form button .spinner-border').removeClass('opacity-0');
                            },
                            complete: function () {
                                $('#userModal form button').removeClass('disabled');
                                $('#userModal form button .spinner-border').addClass('opacity-0');
                            },
                            success: function (res) {
                                if (!$('#errorMessageWrapper').hasClass('d-none')) {
                                    $('#errorMessageWrapper').addClass('d-none');
                                }

                                $('#successMessageWrapper').removeClass('d-none');
                                $('#successMessageWrapper .custom-message').html(res.message);

                                window.location.href = window.location.href;
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                            error: function (xhr, error, status_description) {
                                $('#userModal form button').removeClass('disabled');
                                $('#userModal form button .spinner-border').addClass('opacity-0');

                                if (!$('#successMessageWrapper').hasClass('d-none')) {
                                    $('#successMessageWrapper').addClass('d-none');
                                }

                                $('#errorMessageWrapper').removeClass('d-none');
                                $('#errorMessageWrapper .custom-message').html(xhr.responseJSON.message);

                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);
                            }
                        });
                    });
                });
                $('#vehicleModal').on('shown.bs.modal', function () {
                    $('#mark').focus();
                });
            });

            /*
             * Enlarge content (image) in the modal
             */
            document.querySelectorAll('.enlarge-content').forEach(function(image) {
                image.addEventListener('click', function() {
                    var dataTitle = image.getAttribute('data-title');
                    var dataSrc = image.getAttribute('data-src');

                    document.querySelector('#enlargeContent .modal-header .modal-title').innerHTML = dataTitle;
                    document.querySelector('#enlargeContent .modal-body img').setAttribute('src', dataSrc);
                    document.querySelector('#enlargeContent .modal-body img').setAttribute('alt', dataTitle);

                    var modal = new bootstrap.Modal(document.getElementById('enlargeContent'));

                    modal.show();
                });
            });

            /*
             * Injected data from Laravel
             */
            window.Laravel = {
                lang: {
                    menu: {
                        customers: {
                            title: "@lang('miscellaneous.menu.customers.title')",
                            ride_in_progress: "@lang('miscellaneous.menu.customers.ride-in-progress')",
                            rides_in_progress: "@lang('miscellaneous.menu.customers.rides-in-progress')",
                            ride_finished: "@lang('miscellaneous.menu.customers.ride-finished')",
                            rides_finished: "@lang('miscellaneous.menu.customers.rides-finished')",
                            rented_vehicle: "@lang('miscellaneous.menu.customers.rented-vehicle')",
                            rented_vehicles: "@lang('miscellaneous.menu.customers.rented-vehicles')",
                        },
                    },
                    upload: {
                        use_camera: "@lang('miscellaneous.upload.use_camera')",
                        upload_file: "@lang('miscellaneous.upload.upload_file')",
                        choose_existing_file: "@lang('miscellaneous.upload.choose_existing_file')",
                        image_error: "@lang('miscellaneous.upload.image_error')",
                        document_error: "@lang('miscellaneous.upload.document_error')",
                    },
                },
                data: {
                    rides_requested: @json($rides_requested),
                    rides_in_progress: @json($rides_in_progress),
                    rides_completed: @json($rides_completed),
                }
            }
        </script>
    </body>
</html>
