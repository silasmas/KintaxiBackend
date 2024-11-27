@if (Route::is('status.home'))
        <!-- Start status -->
        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('status.home') }}" method="post">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="statusModalLabel">@lang('miscellaneous.admin.group.status.add')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <div class="form-floating mb-3">
                                <input type="text" name="status_name" id="status_name" class="form-control" placeholder="@lang('miscellaneous.admin.group.status.data.status_name')" required>
                                <label for="status_name">@lang('miscellaneous.admin.group.status.data.status_name')</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea name="status_description" id="status_description" class="form-control" placeholder="@lang('miscellaneous.description')"></textarea>
                                <label for="status_description">@lang('miscellaneous.description')</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="icon" id="icon" class="form-control" placeholder="@lang('miscellaneous.admin.icon_name')">
                                <label for="icon">@lang('miscellaneous.admin.icon_name')</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="color" id="color" class="form-control" placeholder="@lang('miscellaneous.admin.color_name')">
                                <label for="color">@lang('miscellaneous.admin.color_name')</label>
                            </div>
                        </div>
                        <div class="modal-footer d-block border-0">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill">@lang('miscellaneous.register')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End status -->
@endif

@if (Route::is('role.entity.home'))
        <!-- Start role -->
        <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('role.entity.home', ['entity' => 'manage-roles']) }}" method="post">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="roleModalLabel">@lang('miscellaneous.admin.role.add')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <div class="form-floating mb-3">
                                <input type="text" name="role_name" id="role_name" class="form-control" placeholder="@lang('miscellaneous.admin.role.data.role_name')" required>
                                <label for="role_name">@lang('miscellaneous.admin.role.data.role_name')</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea name="role_description" id="role_description" class="form-control" placeholder="@lang('miscellaneous.description')"></textarea>
                                <label for="role_description">@lang('miscellaneous.description')</label>
                            </div>
                        </div>
                        <div class="modal-footer d-block border-0">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill">@lang('miscellaneous.register')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End role -->
@endif
