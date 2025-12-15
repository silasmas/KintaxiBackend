
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.menu.role.' . $entity)</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.role.' . $entity)</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2" data-bs-toggle="modal" data-bs-target="{{ $entity == 'manage-roles' ? '#roleModal' : '#userModal' }}">
                                            <i class="zmdi zmdi-plus"></i>{{ $entity == 'manage-roles' ? __('miscellaneous.admin.role.add') : __('miscellaneous.admin.users.add') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
@if ($entity == 'manage-roles')
                                <div class="col-md-12">
                                    <div class="table-responsive table--no-card mb-3">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.admin.role.data.role_name')</th>
                                                    <th>@lang('miscellaneous.admin.description')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($roles as $role)
                                                <tr>
                                                    <td>
                                                        <p class="m-0" style="max-width: 300px; white-space: normal;">
                                                            {{ ucfirst($role['role_name']) }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0" style="max-width: 300px; white-space: normal;">
                                                            {{ ucfirst($role['role_description']) }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('role.entity.show', ['entity' => 'manage-roles', 'id' => $role['id']]) }}">
                                                            @lang('miscellaneous.change') <i class="fa fa-angle-double-right"></i>
                                                        </a><br>
                                                        <a href="{{ route('role.entity.destroy', ['entity' => 'manage-roles', 'id' => $role['id']]) }}" class="text-danger">
                                                        <a role="button" class="text-danger" onclick="event.preventDefault(); deleteEntity('role', {{ $role['id'] }})">
                                                            @lang('miscellaneous.delete')
                                                        </a>
                                                    </td>
                                                </tr>
    @empty
                                                <tr>
                                                    <td colspan="3" class="text-center fst-italic">@lang('miscellaneous.empty_list')</td>
                                                </tr>
    @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
@endif

@if ($entity == 'users')
                                <div class="col-md-12">
                                    <div class="table-responsive table--no-card mb-3">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.photo')</th>
                                                    <th>@lang('miscellaneous.names')</th>
                                                    <th>@lang('miscellaneous.phone')</th>
                                                    <th>@lang('miscellaneous.menu.role.title')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($users as $user)
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="{{ asset($user['avatar_url']) }}" alt="{{ $user['firstname'] . ' ' . $user['lastname'] }}" width="50" class="rounded-circle">
                                                    </td>
                                                    <td class="align-middle">{{ $user['firstname'] . ' ' . $user['lastname'] }}</td>
                                                    <td class="align-middle">{{ $user['phone'] }}</td>
                                                    <td>
                                                        <select class="form-select form-select-sm" aria-label="@lang('miscellaneous.choose_role')">
                                                            <option class="small" disabled>@lang('miscellaneous.choose_role')</option>
        @foreach ($roles as $role)
                                                            <option value="{{ $role['id'] }}"{{ $user['role']['id'] == $role['id'] ? ' selected' : '' }}>{{ $role['role_name'] }}</option>
        @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('role.entity.show', ['entity' => 'users', 'id' => $user['id']]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a><br>
                                                        <a role="button" class="text-danger" onclick="event.preventDefault(); deleteEntity('role', {{ $user['id'] }}, 'users')">
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
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $users_req->links() }}
                                </div>
@endif
                            </div>

