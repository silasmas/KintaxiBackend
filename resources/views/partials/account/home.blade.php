
                                                <!-- TAB-CONTENT 1 : Personal infos -->
                                                <div class="tab-pane text-start fade show active" id="account-tabs-1" role="tabpanel" aria-labelledby="account-tab-1">
                                                    <h1 class="h1 d-lg-none mb-4 text-center fw-bold">@lang('miscellaneous.pages_content.account.personal_infos.title')</h1>

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <!-- First name -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.firstname')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['firstname']) ? $current_user['firstname'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Last name -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.lastname')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td class="text-uppercase">{{ !empty($current_user['lastname']) ? $current_user['lastname'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Surname -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.surname')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td class="text-uppercase">{{ !empty($current_user['surname']) ? $current_user['surname'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Username -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.username')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['username']) ? $current_user['username'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Gender -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.gender_title')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['gender']) ? ($current_user['gender'] == 'F' ? __('miscellaneous.gender2') : __('miscellaneous.gender1')) : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Birth date -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.birth_date.label')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['birthdate']) ? ucfirst(__('miscellaneous.on_date')) . ' ' . explicitDate($current_user['birthdate']) : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- E-mail -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.email')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['email']) ? $current_user['email'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Phone -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.phone')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['phone']) ? $current_user['phone'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Addresses -->
    @if (!empty($current_user['address_1']) && !empty($current_user['address_2']))
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.addresses')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>
                                                                    <ul class="ps-0">
                                                                        <li class="cnpr-line-height-1_1 mb-2" style="list-style: none;">
                                                                            <i class="bi bi-geo-alt-fill me-1"></i>{{ $current_user['address_1'] }}
                                                                        </li>
                                                                        <li class="cnpr-line-height-1_1" style="list-style: none;">
                                                                            <i class="bi bi-geo-alt-fill me-1"></i>{{ $current_user['address_2'] }}
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
    @else
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.address.title')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['address_1']) ? $current_user['address_1'] : (!empty($current_user['address_2']) ? $current_user['address_2'] : '- - - - - -') }}</td>
                                                            </tr>
    @endif

                                                            <!-- P.O. box -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.p_o_box')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['p_o_box']) ? $current_user['p_o_box'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Role -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.menu.role.title')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ $current_user['role']->resource != null ? $current_user['role']->role_name : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- City -->
                                                            <tr>
                                                                <td><strong>@lang('miscellaneous.address.city')</strong></td>
                                                                <td>@lang('miscellaneous.colon_after_word')</td>
                                                                <td>{{ !empty($current_user['city']) ? $current_user['city'] : '- - - - - -' }}</td>
                                                            </tr>

                                                            <!-- Country -->
                                                            <tr>
                                                                <td class="border-bottom-0"><strong>@lang('miscellaneous.address.country')</strong></td>
                                                                <td class="border-bottom-0">@lang('miscellaneous.colon_after_word')</td>
                                                                <td class="border-bottom-0">{{ $current_user['country'] != null ? $current_user['country']['name_' . app()->getLocale()] : '- - - - - -' }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
