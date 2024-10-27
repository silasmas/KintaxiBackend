/**
 * Biliap cores plugins
 * 
 * Copyright (c) 2023 Xsam Technologies and/or its affiliates. All rights reserved.
 * 
 */
// CSS files to toggle app theme
const MDB_LIGHT = currentHost + '/assets/addons/mdb/css/mdb.min.css';
const MDB_DARK = currentHost + '/assets/addons/mdb/css/mdb.dark.min.css';
const CUST_LIGHT = currentHost + '/assets/css/style.custom.css';

// ==================================== NATIVE FUNCTIONS ====================================
/**
 * Set theme to light
 */ 
function themeLight(element) {
    $(function () {
        $(element).attr('blp-theme', 'Light'); 
        $('* .theme-toggler').addClass('btn-dark').removeClass('btn-light');
        $('#mainMenu, #sideBar').addClass('navbar-light').removeClass('navbar-dark');
        $('#sideBar').addClass('blp-bg-light').removeClass('blp-bg-dark');
        $('#mainMenu .show-sidebar').addClass('text-dark').removeClass('text-light');
        $('.list-group-item, .list-group-item a').addClass('text-dark').removeClass('text-white');
        $('#mdb-style').attr('href', MDB_LIGHT);
        $('#custom-style').attr('href', CUST_LIGHT);
    });
}

/**
 * Set theme to dark
 */ 
function themeDark(element) {
    $(function () {
        $(element).attr('blp-theme', 'Dark'); 
        $('* .theme-toggler').addClass('btn-light').removeClass('btn-dark');
        $('#mainMenu, #sideBar').addClass('navbar-dark').removeClass('navbar-light');
        $('#sideBar').addClass('blp-bg-dark').removeClass('blp-bg-light');
        $('#mainMenu .show-sidebar').addClass('text-light').removeClass('text-dark');
        $('.list-group-item, .list-group-item a').addClass('text-white').removeClass('text-dark');
        $('#mdb-style').attr('href', MDB_DARK);
        $('#custom-style').attr('href', CUST_LIGHT);
    });
}

/**
 * Get cookie by name
 */ 
function getCookie(cname) {
    var name = cname + '=';
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }    
        
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }    
    }    
    
    return '';
}    

// ==================================== JQUERY CUSTOM PLUGIN ====================================
(function ($) {
    /**
     * OPEN MODAL WITH ASYNCHRONOUS CONTENT
     * 
     * @param _modal
     * @param _content
     * @param _runButtonId
     */ 
     $.fn.openModalLoadAsyncContent = function (_modal, _content, _runButtonId) {
        this.each(function () {
            $(this).on('click', function (e) {
                var modal = new bootstrap.Modal(document.querySelector(_modal), {
                    keyboard: false
                });    

                modal.show();
                $(_modal).attr('blp-href', $(this).attr('blp-href'));
                $(this).unbind('click');
                e.stopPropagation();
                e.stopImmediatePropagation();

                return false;
            });
        });

        $(_modal).on('shown.bs.modal', function () {
            $(this).find('.modal-body .col-12').load($(this).attr('blp-href') + ' ' + _content, function () {
                loadJS();
            });    
            $(this).find('.modal-footer .btn-primary').attr('id', _runButtonId);

        }).on('hidden.bs.modal', function () {
            $(this).find('.modal-body .col-12').html('<div class="p-4 text-center"><div id="ajaxLoading" class="spinner-border blp-pink-text" role="status"><span class="visually-hidden">...</span></div></div>');
            $(this).find('.modal-footer .btn-primary').attr('id', '');
        });    

        return this;
    };    

    /**
     * AFTER CLICK ON MODAL BUTTON, SEND FORM
     * 
     * @param _ajaxLoading
     * @param _httpMethod
     * @param _formURL
     * @param _formData
     * @param _resultURL
     * @param _resultData
     * @param _wrapper
     * @param _reloadWrapperURL
     */ 
     $.fn.onClickCloseModalSendForm = function (_ajaxLoading, _modalId, _httpMethod, _formURL, _formData) {
        this.each(function () {
            var modal = new bootstrap.Modal(document.getElementById(_modalId), {
                keyboard: false
            });

            $(this).on('click', function (event) {
                $(_ajaxLoading).removeClass('opacity-0');

                $.ajax({
                    headers: headers,
                    type: _httpMethod,
                    contentType: 'application/json',
                    url: _formURL,
                    dataType: 'json',
                    data: JSON.stringify(_formData),
                    success: function () {
                        modal.hide();
                        window.location.reload();
                    },
                    error: function (xhr, error, status_description) {
                        console.log(xhr.responseJSON);
                        console.log(xhr.status);
                        console.log(error);
                        console.log(status_description);
                    }    
                });    
            });    
        });    

        return this;
    };    

    /**
     * ON SWITCH CHANGE, UPDATE DATA
     * 
     * @param _ajaxLoading
     * @param _switchURL
     * @param _switchData
     * @param _resultURL
     * @param _resultData
     * @param _wrapper
     * @param _reloadWrapperURL
     */
     $.fn.onSwitchChange = function (_ajaxLoading, _switchURL, _switchData, _resultURL, _resultData, _wrapper, _reloadWrapperURL) {
        this.each(function () {
            $(this).on('change', function () {
                $(_ajaxLoading).removeClass('opacity-0');

                $.ajax({
                    headers: headers,
                    type: 'PUT',
                    contentType: 'application/json',
                    url: _switchURL,
                    dataType: 'json',
                    data: JSON.stringify(_switchData),
                    success: function () {
                        $.ajax({
                            headers: headers,
                            type: 'GET',
                            contentType: 'application/json',
                            url: _resultURL,
                            dataType: 'json',
                            data: JSON.stringify(_resultData),
                            success: function () {
                                $(_wrapper).load(_reloadWrapperURL, function () {
                                    loadJS();
                                });    
                                $(_ajaxLoading).addClass('opacity-0');
                            },    
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);
                            }    
                        });    
                    },    
                    error: function (xhr, error, status_description) {
                        console.log(xhr.responseJSON);
                        console.log(xhr.status);
                        console.log(error);
                        console.log(status_description);
                    }    
                });    
            });    
        });    

        return this;
    };    

    /**
     * UPLOAD CROPPED IMAGE
     * 
     * @param _modal
     * @param _inputFile
     * @param _api_token
     * @param _apiUrl
     * @param _entity_id
     */
    $.fn.uploadImage = function (_modal, _inputFile, _apiUrl, _entity_id) {
        this.each(function () {
            var modal = $(_modal);
            var retrievedImage = document.getElementById('retrieved_image');
            var cropper;

            $(_inputFile).on('change', function (e) {
                var files = e.target.files;
                var done = function (url) {
                    retrievedImage.src = url;
                    var modal = new bootstrap.Modal(document.querySelector(_modal), {
                        keyboard: false
                    });

                    modal.show();
                };

                if (files && files.length > 0) {
                    var reader = new FileReader();

                    reader.onload = function () {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            $(modal).on('shown.bs.modal', function () {
                cropper = new Cropper(retrievedImage, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: _modal + ' .preview'
                });

            }).on('hidden.bs.modal', function () {
                cropper.destroy();

                cropper = null;
            });

            $(_modal + ' #crop').click(function () {
                // Ajax loading image to tell user to wait
                $(this).attr('src', currentHost + '/assets/img/ajax-loading.gif');

                var canvas = cropper.getCroppedCanvas({
                    width: 700,
                    height: 700
                });

                canvas.toBlob(function (blob) {
                    URL.createObjectURL(blob);
                    var reader = new FileReader();

                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        var base64_data = reader.result;
                        var entity_id = document.getElementById(_entity_id).value;
                        var apiUrl = _apiUrl;
                        var datas = JSON.stringify({ 'entity_id' : entity_id, 'base64image' : base64_data });

                        // After crop image is registered, close modal before upload
                        var modal = new bootstrap.Modal(document.querySelector(_modal), {
                            keyboard: false
                        });

                        modal.hide();

                        $.ajax({
                            headers: headers,
                            type: 'PUT',
                            contentType: 'application/json',
                            url: apiUrl,
                            dataType: 'json',
                            data: datas,
                            success: function (res) {
                                $(this).attr('src', res.data.file_content);
                                window.location.reload();
                            },
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);
                            }
                        });
                    };
                });
            });        
        });

        return this;
    };

    /**
     * SWITCH THEME
     */
    $.fn.switchTheme = function () {
        this.each(function () {
            var _this = this;

            // If user is connected, check user theme
            if (_this.hasAttribute('blp-user-id')) {
                var userId = parseInt($(_this).attr('blp-user-id'));

                $.ajax({
                    headers: headers,
                    type: 'GET',
                    contentType: 'application/json',
                    url: 'https://biliap-admin.dev:1443/api/user/' + userId,
                    success: function (result) {
                        // If user preference exists
                        if (result.data.preference !== null) {
                            // If user has a prefered theme, set theme according to user preference
                            if (result.data.preference.prefered_theme !== null) {
                                if (result.data.preference.prefered_theme === 'Dark') {
                                    themeDark(_this);

                                } else {
                                    themeLight(_this);
                                }

                            } else {
                                themeLight(_this);
                            }

                        // If user hasn't set theme
                        } else {
                            // Set theme according to browser theme
                            if ('matchMedia' in window) {
                                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                                    themeDark(_this);

                                } else {
                                    themeLight(_this);
                                }

                            // Otherwise, check the "blp-theme" attribute
                            } else {
                                if ($(_this).attr('blp-theme') === 'Light') {
                                    themeLight(_this);

                                } else {
                                    themeDark(_this);
                                }
                            }
                        }
                    },    
                    error: function (xhr, error, status_description) {
                        console.log(xhr.responseJSON);
                        console.log(xhr.status);
                        console.log(error);
                        console.log(status_description);
                    }    
                });

            // If user is not connected
            } else {
                // Set theme according to browser theme
                if ('matchMedia' in window) {
                    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                        themeDark(_this);

                    } else {
                        themeLight(_this);
                    }

                // Otherwise, check the "blp-theme" attribute
                } else {
                    if ($(_this).attr('blp-theme') === 'Light') {
                        themeLight(_this);

                    } else {
                        themeDark(_this);
                    }
                }
            }

            // When user change the theme by click, change the browser theme according to his preference
            $('* .theme-toggler').on('click', function (e) {
                // If user is connected, check user theme
                if (_this.hasAttribute('blp-user-id')) {
                    var userId = parseInt($(_this).attr('blp-user-id'));

                    $.ajax({
                        headers: headers,
                        type: 'GET',
                        contentType: 'application/json',
                        url: currentHost + '/api/preference/select_by_entity/user/' + userId,
                        success: function (result) {
                            // If user preference exists
                            if (result !== null) {
                                // If user has a prefered theme, set theme according to user preference
                                if (result.data.prefered_theme !== null) {
                                    if (result.data.prefered_theme === 'Dark') {
                                        themeLight(_this);

                                        $.ajax({
                                            headers: headers,
                                            type: "PUT",
                                            contentType: 'application/json',
                                            url: currentHost + '/api/preference/switch_theme/' + result.data.id + '/Light',
                                            dataType: 'json',
                                            data: JSON.stringify({'id' : result.data.id, 'data' : 'Light'}),
                                            success: function () {
                                                $(this).unbind('click');
                                                e.stopPropagation();
                                                e.stopImmediatePropagation();
                                            },    
                                            error: function (xhr, error, status_description) {
                                                console.log(xhr.responseJSON);
                                                console.log(xhr.status);
                                                console.log(error);
                                                console.log(status_description);
                                            }
                                        });

                                    } else {
                                        themeDark(_this);

                                        $.ajax({
                                            headers: headers,
                                            type: "PUT",
                                            contentType: 'application/json',
                                            url: currentHost + '/api/preference/switch_theme/' + result.data.id + '/Dark',
                                            dataType: 'json',
                                            data: JSON.stringify({'id' : result.data.id, 'data' : 'Dark'}),
                                            success: function () {
                                                $(this).unbind('click');
                                                e.stopPropagation();
                                                e.stopImmediatePropagation();
                                            },    
                                            error: function (xhr, error, status_description) {
                                                console.log(xhr.responseJSON);
                                                console.log(xhr.status);
                                                console.log(error);
                                                console.log(status_description);
                                            }
                                        });
                                    }

                                // If user hasn't a prefered theme, change theme and create user preference adding that theme
                                } else {
                                    if ($(_this).attr('blp-theme') === 'Light') {
                                        themeDark(_this);

                                        $.ajax({
                                            headers: headers,
                                            type: 'POST',
                                            contentType: 'application/json',
                                            url: currentHost + '/api/preference',
                                            dataType: 'json',
                                            data: JSON.stringify({'prefered_theme' : 'Dark', 'user_id' : userId}),
                                            success: function () {
                                                $(this).unbind('click');
                                                e.stopPropagation();
                                                e.stopImmediatePropagation();
                                            },    
                                            error: function (xhr, error, status_description) {
                                                console.log(xhr.responseJSON);
                                                console.log(xhr.status);
                                                console.log(error);
                                                console.log(status_description);
                                            }    
                                        });
                                    }

                                    if ($(_this).attr('blp-theme') === 'Dark') {
                                        themeLight(_this);

                                        $.ajax({
                                            headers: headers,
                                            type: 'POST',
                                            contentType: 'application/json',
                                            url: currentHost + '/api/preference',
                                            dataType: 'json',
                                            data: JSON.stringify({'prefered_theme' : 'Light', 'user_id' : userId}),
                                            success: function () {
                                                $(this).unbind('click');
                                                e.stopPropagation();
                                                e.stopImmediatePropagation();
                                            },    
                                            error: function (xhr, error, status_description) {
                                                console.log(xhr.responseJSON);
                                                console.log(xhr.status);
                                                console.log(error);
                                                console.log(status_description);
                                            }    
                                        });
                                    }
                                }

                            // If user preference doesn't exist
                            } else {
                                if ($(_this).attr('blp-theme') === 'Light') {
                                    themeDark(_this);

                                    $.ajax({
                                        headers: headers,
                                        type: 'POST',
                                        contentType: 'application/json',
                                        url: currentHost + '/api/preference',
                                        dataType: 'json',
                                        data: JSON.stringify({'prefered_theme' : 'Dark', 'user_id' : userId}),
                                        success: function () {
                                            $(this).unbind('click');
                                            e.stopPropagation();
                                            e.stopImmediatePropagation();
                                        },    
                                        error: function (xhr, error, status_description) {
                                            console.log(xhr.responseJSON);
                                            console.log(xhr.status);
                                            console.log(error);
                                            console.log(status_description);
                                        }    
                                    });
                                }

                                if ($(_this).attr('blp-theme') === 'Dark') {
                                    themeLight(_this);

                                    $.ajax({
                                        headers: headers,
                                        type: 'POST',
                                        contentType: 'application/json',
                                        url: currentHost + '/api/preference',
                                        dataType: 'json',
                                        data: JSON.stringify({'prefered_theme' : 'Light', 'user_id' : userId}),
                                        success: function () {
                                            $(this).unbind('click');
                                            e.stopPropagation();
                                            e.stopImmediatePropagation();
                                        },    
                                        error: function (xhr, error, status_description) {
                                            console.log(xhr.responseJSON);
                                            console.log(xhr.status);
                                            console.log(error);
                                            console.log(status_description);
                                        }    
                                    });
                                }
                            }
                        },    
                        error: function (xhr, error, status_description) {
                            console.log(xhr.responseJSON);
                            console.log(xhr.status);
                            console.log(error);
                            console.log(status_description);
                        }
                    });

                // If user is not connected
                } else {
                    if ($(_this).attr('blp-theme') === 'Light') {
                        themeDark(_this);
                    }

                    if ($(_this).attr('blp-theme') === 'Dark') {
                        themeLight(_this);
                    }
                }

                return false;
            })
        });

        return this;
    };

    /**
     * MULTILINE TRUNCATION
     * 
     * @param _paragraph
     * @param _numberOfLines
     * @param _rollButton
     */
    $.fn.multilineTruncation = function (_paragraph, _numberOfLines, _rollButton) {
        this.each(function () {
            $(this).find(_paragraph).ellipsis({
                lines: _numberOfLines,             // force ellipsis after a certain number of lines. Default is 'auto'
                ellipClass: 'ellip',  // class used for ellipsis wrapper and to namespace ellip line
                responsive: true      // set to true if you want ellipsis to update on window resize. Default is false
            });

            var _this = $(this).find(_paragraph).get(0);

            $(this).find(_rollButton).on('click', function () {
                $(_this).ellipsis({ellipClass: '_'});

                return false;
            });
        });

        return this;
    };

    /**
     * ANIMATE COUNTER
     * 
     * @param _duration
     * 
     * Duration is in milliseconds (E.g. : 4000)
     */
    $.fn.animateCounter = function (_duration) {
        this.each(function () {
            $(this).prop('Counter', 0).animate({Counter: $(this).text()}, {
                duration: _duration,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }    
            });    
        });

        return this;
    };

    /**
     * FORMAT NUMBERS THAT HAVE MORE THAN 3 DIGITS
     */
    $.fn.numberFormatter = function () {
        this.each(function () {
            if (this !== null) {
                var num = parseInt($(this).html());
                var si = [{ value: 1, symbol: '' },
                { value: 1E3, symbol: 'k' },
                { value: 1E6, symbol: 'M' },
                { value: 1E9, symbol: 'G' },
                { value: 1E12, symbol: 'T' },
                { value: 1E15, symbol: 'P' },
                { value: 1E18, symbol: 'E' }];
                var rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
                var i;

                for (i = si.length - 1; i > 0; i--) {
                    if (num >= si[i].value) {
                        break;
                    }
                }

                $(this).html((num / si[i].value).toFixed(1).replace(rx, '$1') + si[i].symbol);
            }
        });

        return this;
    };
})(jQuery);