                                <!-- Form search -->
                                <form class="form-header" action="{{ route('search') }}" method="POST">
                                    <input class="au-input au-input--xl" type="text" name="q" placeholder="@lang('miscellaneous.search_input')" />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
