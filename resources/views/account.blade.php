@extends('layouts.app', ['page_title' => !empty($entity) ? $entity_title : $current_user['firstname'] . ' ' . $current_user['lastname'] ])

@section('app-content')

                <!-- UPDATE ADMIN-->
                <section class="pt-4 pb-5">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4 col-sm-5 mx-auto">
                                    <div class="card rounded-4">
                                        <div class="card-body text-center">
                                            <div class="bg-image mb-2">
                                                <img src="{{ $current_user['avatar_url'] != null ? $current_user['avatar_url'] : asset('assets/img/user.png') }}" alt="{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}" class="user-image img-fluid img-thumbnail rounded-4">
    @if (Route::is('account.entity') && $entity == 'account_settings')
                                                <div class="mask">
                                                    <form method="POST">
                                                        <input type="hidden" name="user_id" id="user_id" value="{{ $current_user['id'] }}">
                                                        <label for="avatar" class="btn btn-light position-absolute pt-2 rounded-circle shadow" style="bottom: 1rem; right: 1rem; text-transform: inherit!important;" title="@lang('miscellaneous.change_image')" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                            <span class="bi bi-pencil-fill"></span>
                                                            <input type="file" name="avatar" id="avatar" class="d-none">
                                                        </label>
                                                    </form>
                                                </div>
    @else
                                                <div class="mask"></div>
    @endif
                                            </div>

                                            <h4 class="h4 m-0 fw-bold">{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}</h4>
    @if (!empty($current_user['username']))
                                            <p class="card-text m-0 text-muted">{{ $current_user['username'] }}</p>
    @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-sm-7 col-12">
                                    <div class="card rounded-4">
                                        <div class="card-body text-center">
                                            <ul id="account" class="nav nav-tabs nav-justified mb-3" role="tablist">
                                                <!-- TAB 1 : Personal infos -->
                                                <li class="nav-item" role="presentation">
                                                    <a id="account-tab-1" class="nav-link px-lg-1{{ Route::is('account') ? ' active' : '' }}" href="{{ route('account') }}" role="tab" aria-controls="account-tabs-1" aria-selected="{{ Route::is('account') ? 'true' : 'false' }}">
                                                        <i class="bi bi-list-ul me-lg-2 align-middle fs-4"></i><span class="d-lg-inline d-none">@lang('miscellaneous.account.personal_infos.title')</span>
                                                    </a>
                                                </li>

                                                <!-- TAB 2 : Account settings -->
                                                <li class="nav-item" role="presentation">
                                                    <a id="account-tab-2" class="nav-link px-lg-1{{ Route::is('account.entity') ? ($entity == 'account_settings' ? ' active' : '') : '' }}" href="{{ route('account.entity', ['entity' => 'account_settings']) }}" role="tab" aria-controls="account-tabs-2" aria-selected="{{ Route::is('account.entity') ? ($entity == 'account_settings' ? 'true' : 'false') : 'false' }}">
                                                        <i class="bi bi-gear me-lg-2 align-middle fs-4"></i><span class="d-lg-inline d-none">@lang('miscellaneous.update')</span>
                                                    </a>
                                                </li>

                                                <!-- TAB 3 : Update password -->
                                                <li class="nav-item" role="presentation">
                                                    <a id="account-tab-3" class="nav-link px-lg-1{{ Route::is('account.entity') ? ($entity == 'password_update' ? ' active' : '') : '' }}" href="{{ route('account.entity', ['entity' => 'password_update']) }}" role="tab" aria-controls="account-tabs-3" aria-selected="{{ Route::is('account.entity') ? ($entity == 'password_update' ? 'true' : 'false') : 'false' }}">
                                                        <i class="bi bi-shield-lock me-lg-2 align-middle fs-4"></i><span class="d-lg-inline d-none">@lang('miscellaneous.account.update_password.title')</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div id="account-content" class="tab-content p-3">

    @if (Route::is('account'))
        @include('partials.account.home')
    @endif
    @if (Route::is('account.entity'))
        @include('partials.account.entity')
    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END UPDATE ADMIN-->

@endsection

