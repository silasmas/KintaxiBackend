
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
                                                        <a href="{{ route('vehicle.home') }}">@lang('miscellaneous.menu.vehicle.title')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('vehicle.entity.home', ['entity' => $entity]) }}">@lang('miscellaneous.menu.vehicle.' . $entity)</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">{{ $entity == 'shape' ? $shape['shape_name'] : ($entity == 'category' ? $category['category_name'] : __('miscellaneous.admin.vehicle.features.details')) }}</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="{{ route('vehicle.entity.home', ['entity' => $entity]) }}" class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-arrow-left me-2"></i>@lang('miscellaneous.back_list')
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
@if ($entity == 'shape')
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.vehicle.shape.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('vehicle.entity.show', ['entity' => 'shape', 'id' => $shape['id']]) }}" method="POST">
    @csrf
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="shape_name" id="shape_name" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.shape.title')" value="{{ $shape['shape_name'] }}" autofocus>
                                                    <label for="shape_name">@lang('miscellaneous.admin.vehicle.shape.title')</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <textarea name="shape_description" id="shape_description" class="form-control" placeholder="@lang('miscellaneous.description')">{{ $shape['shape_description'] }}</textarea>
                                                    <label for="shape_description">@lang('miscellaneous.description')</label>
                                                </div>
                                                <div id="vehicleImageWrapper" class="row mb-4">
                                                    <div class="col-9 mx-auto">
                                                        <p class="small mb-1 text-center">@lang('miscellaneous.account.personal_infos.click_to_change_picture')</p>
                    
                                                        <div class="bg-image hover-overlay">
                                                            <img src="{{ $shape['photo'] }}" alt="" class="other-user-image img-fluid rounded-4">
                                                            <div class="mask rounded-4" style="background-color: rgba(5, 5, 5, 0.5);">
                                                                <label role="button" for="image_vehicle" class="d-flex h-100 justify-content-center align-items-center">
                                                                    <i class="bi bi-pencil-fill text-white fs-2"></i>
                                                                    <input type="file" name="image_vehicle" id="image_vehicle" class="d-none">
                                                                </label>
                                                                <input type="hidden" name="data_vehicle" id="data_vehicle">
                                                            </div>
                                                        </div>
                    
                                                        <p class="d-none mt-2 mb-0 small text-center text-success fst-italic">@lang('miscellaneous.waiting_register')</p>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body p-4 text-center">
                                        <img src="{{ $shape['photo'] }}" alt="{{ ucfirst($shape['shape_name']) }}" class="img-fluid mb-3">
                                        <h2 class="h2">{{ ucfirst($shape['shape_name']) }}</h2>
                                        <p class="card-text small text-capitalize m-0">{{ $shape['shape_description'] }}</p>
                                    </div>
                                </div>
@endif

@if ($entity == 'category')
                                <div class="col-sm-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title m-0 text-center">@lang('miscellaneous.admin.vehicle.category.edit')</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('vehicle.entity.show', ['entity' => 'category', 'id' => $category['id']]) }}" method="POST">
    @csrf
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="category_name" id="category_name" class="form-control" placeholder="@lang('miscellaneous.admin.vehicle.category.title')" value="{{ $category['category_name'] }}" autofocus>
                                                    <label for="shape_name">@lang('miscellaneous.admin.vehicle.category.title')</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <textarea name="category_description" id="category_description" class="form-control" placeholder="@lang('miscellaneous.description')">{{ $category['category_description'] }}</textarea>
                                                    <label for="category_description">@lang('miscellaneous.description')</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <select name="status_id" id="status" class="form-select" aria-label="@lang('miscellaneous.admin.work.data.choose_status')">
        @foreach ($statuses as $status)
                                                        <option value="{{ $status['id'] }}"{{ $category['status']['id'] == $status['id'] ? ' selected' : '' }}>{{ ucfirst(explode('/', $status['status_name'])[0]) }}</option>
        @endforeach
                                                    </select>
                                                    <label class="form-label" for="status">@lang('miscellaneous.admin.work.data.choose_status')</label>
                                                </div>

                                                <div id="vehicleImageWrapper" class="row mb-4">
                                                    <div class="col-9 mx-auto">
                                                        <p class="small mb-1 text-center">@lang('miscellaneous.account.personal_infos.click_to_change_picture')</p>
                    
                                                        <div class="bg-image hover-overlay">
                                                            <img src="{{ $category['image'] }}" alt="" class="other-user-image img-fluid rounded-4">
                                                            <div class="mask rounded-4" style="background-color: rgba(5, 5, 5, 0.5);">
                                                                <label role="button" for="image_vehicle" class="d-flex h-100 justify-content-center align-items-center">
                                                                    <i class="bi bi-pencil-fill text-white fs-2"></i>
                                                                    <input type="file" name="image_vehicle" id="image_vehicle" class="d-none">
                                                                </label>
                                                                <input type="hidden" name="data_vehicle" id="data_vehicle">
                                                            </div>
                                                        </div>
                    
                                                        <p class="d-none mt-2 mb-0 small text-center text-success fst-italic">@lang('miscellaneous.waiting_register')</p>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary rounded-pill w-100">@lang('miscellaneous.register')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mx-auto">
                                    <div class="card card-body p-4 text-center">
                                        <img src="{{ $category['image'] }}" alt="{{ ucfirst($category['category_name']) }}" class="img-fluid mb-3">
                                        <h2 class="h2">{{ ucfirst($category['category_name']) }}</h2>
                                        <p class="card-text small text-capitalize m-0">{{ $category['category_description'] }}</p>
                                    </div>
                                </div>
@endif

@if ($entity == 'features')
@endif
                            </div>

