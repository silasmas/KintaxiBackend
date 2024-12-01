
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
                                <div class="col-md-12">
                                    <div class="table-responsive table--no-card mb-3">
@if ($entity == 'manage-roles')
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
                                                            @lang('miscellaneous.delete')
                                                        </a>
                                                    </td>
                                                </tr>
    @empty
    @endforelse
                                            </tbody>
                                        </table>
@endif

@if ($entity == 'users')
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.names')</th>
                                                    <th>@lang('miscellaneous.email')</th>
                                                    <th>@lang('miscellaneous.phone')</th>
                                                    <th>@lang('miscellaneous.menu.role.title')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($users as $user)
                                                <tr>
                                                    <td class="align-middle">{{ $user['firstname'] . ' ' . $user['lastname'] }}</td>
                                                    <td class="align-middle">{{ $user['email'] }}</td>
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
                                                            @lang('miscellaneous.change') <i class="fa fa-angle-double-right"></i>
                                                        </a><br>
                                                        <a role="button" class="text-danger">
                                                            @lang('miscellaneous.delete')
                                                        </a>
                                                    </td>
                                                </tr>
    @empty
    @endforelse
                                            </tbody>
                                        </table>
@endif
                                    </div>
                                </div>
                            </div>

