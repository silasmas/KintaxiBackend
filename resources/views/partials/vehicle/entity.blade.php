
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.menu.vehicle.' . $entity)</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('home') }}">@lang('miscellaneous.menu.home')</a>
                                                    </li>
                                                    <li class="list-inline-item seprate">
                                                        <span><i class="fa fa-angle-right"></i></span>
                                                    </li>
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.vehicle.' . $entity)</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2" data-bs-toggle="modal" data-bs-target="{{ $entity == 'manage-roles' ? '#roleModal' : '#userModal' }}">
                                            <i class="zmdi zmdi-plus"></i>@lang('miscellaneous.admin.vehicle.' . $entity . '.add')
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-md-12">
                                    <div class="table-responsive table--no-card mb-3">
@if ($entity == 'shape')
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>@lang('miscellaneous.admin.vehicle.shape.title')</th>
                                                    <th>@lang('miscellaneous.admin.description')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($vehicle_shapes as $shape)
                                                <tr>
                                                    <td><img src="{{ asset('assets/img/blank-id-doc.png') }}" alt="{{ ucfirst($shape['shape_name']) }}" width="70"></td>
                                                    <td>
                                                        <p class="m-0" style="max-width: 300px; white-space: normal;">
                                                            {{ ucfirst($shape['shape_name']) }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0" style="max-width: 300px; white-space: normal;">
                                                            {{ ucfirst($shape['shape_description']) }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('vehicle.entity.show', ['entity' => 'shape', 'id' => $shape['id']]) }}">
                                                            @lang('miscellaneous.change') <i class="fa fa-angle-double-right"></i>
                                                        </a><br>
                                                        <a href="{{ route('vehicle.entity.destroy', ['entity' => 'shape', 'id' => $shape['id']]) }}" class="text-danger">
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
@endif
                                    </div>
                                </div>
                            </div>

