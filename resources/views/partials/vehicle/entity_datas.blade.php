
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap mb">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.admin.vehicle.' . $entity . '.details')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('role.entity.home', ['entity' => $entity]) }}">@lang('miscellaneous.menu.role.' . $entity)</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">{{ $entity == 'manage-roles' ? ucfirst($current_role['role_name']) : $user['firstname'] . ' ' . $user['lastname'] }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="{{ route('role.entity.home', ['entity' => $entity]) }}" class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-arrow-left me-2"></i>@lang('miscellaneous.back_list')
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
@if ($entity == 'manage-roles')
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.role.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('role.entity.show', ['entity' => 'manage-roles', 'id' => $current_role['id']]) }}" method="POST">
    @csrf
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="role_name" id="role_name" class="form-control" placeholder="@lang('miscellaneous.admin.role.data.role_name')" value="{{ $current_role['role_name'] }}" autofocus>
                                                    <label for="role_name">@lang('miscellaneous.admin.role.data.role_name')</label>
                                                </div>
                                                <div class="form-floating mb-4">
                                                    <textarea name="role_description" id="role_description" class="form-control" placeholder="@lang('miscellaneous.description')">{{ $current_role['role_description'] }}</textarea>
                                                    <label for="role_description">@lang('miscellaneous.description')</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body text-center">
                                        <h3 class="h3">{{ ucfirst($current_role['role_name']) }}</h3>
                                        <p class="card-text small text-capitalize m-0">{{ $current_role['role_description'] }}</p>
                                    </div>
                                </div>
@endif

@if ($entity == 'users')
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.users.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('role.entity.show', ['entity' => 'users', 'id' => $user['id']]) }}" method="POST">
    @csrf
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="@lang('miscellaneous.firstname')" value="{{ $user['firstname'] }}" autofocus>
                                                    <label for="firstname">@lang('miscellaneous.firstname')</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="@lang('miscellaneous.lastname')" value="{{ $user['lastname'] }}">
                                                    <label for="lastname">@lang('miscellaneous.lastname')</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body text-center">
                                        <img src="{{ asset($user['avatar_url']) }}" alt="{{ $user['firstname'] . ' ' . $user['lastname'] }}" width="100" class="rounded-circle">
                                        <h3 class="h3">{{ $user['firstname'] . ' ' . $user['lastname'] }}</h3>
                                    </div>
                                </div>
@endif
                            </div>

