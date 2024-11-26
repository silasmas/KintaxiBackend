@if (Route::is('status.home'))
        <!-- Start status -->
        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('status.home') }}" method="post">
    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('miscellaneous.admin.group.status.add')</h1>
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
