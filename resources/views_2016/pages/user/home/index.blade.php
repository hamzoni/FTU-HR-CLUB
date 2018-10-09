@php($bodyClasses = 'hrcPageHome')

@if ($authUser)
    @php($bodyClasses .= ' isLogged')
@else
    @php($bodyClasses .= ' enable-youtube-frame')
@endif

@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])

@section('content')
    <div id="hrc-contact-overlay"></div>

    <div id="hrc-page-index">
        <div class="hidden-lg text-right">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                <i class="fa fa-fw fa-bars"></i>
            </a>
        </div>

        <div class="hrc-controls hide-mobile">
            <ul>
                <li class="active">
                    <a href="#" data-src="#hrc-uvtn">
                        Ứng viên Tài năng
                    </a>
                </li>

                <li>
                    <a href="#" data-src="#hrc-personality-test">
                        Personality Test
                    </a>
                </li>

                <li>
                    <a href="#" data-src="#hrc-attend">
                        Test Online
                    </a>
                </li>

                <li>
                    <a href="#" data-src="#hrc-comment-cv">
                        Comment CV
                    </a>
                </li>

                <li>
                    <a href="#" data-src="#hrc-partner">
                        Đối tác
                    </a>
                </li>

                <li>
                    <a href="#" data-src="#hrc-contact">
                        Liên hệ
                    </a>
                </li>
            </ul>
        </div>

        <div class="hrc-navbar">
            <a href="{{ route('hrc.index') }}" class="hrc-navbar-logo" title="Logo Ứng Viên Tài Năng"></a>

            @if ($authUser)
                <div class="hrc-navbar-tab clearfix">
                    <div class="btn-group">
                        <a href="#" class="hrc-navbar-tab-username dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $authUser->email }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('dashboard.index') }}">
                                    Trang cá nhân
                                </a>
                            </li>

                            <li role="separator" class="divider"></li>

                            <li>
                                <a href="{{ route('auth.signOut') }}">Thoát</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="hrc-navbar-tab clearfix">
                    <a href="#" class="hrc-navbar-tab-sign-in">ĐĂNG NHẬP</a>
                    <a href="#" class="hrc-navbar-tab-sign-up">ĐĂNG KÝ</a>
                </div>
            @endif
        </div>

        @include('pages.user.home.partials.uvtn')
        @include('pages.user.home.partials.personalityTest')
        @include('pages.user.home.partials.partner')
        @include('pages.user.home.partials.comment-cv')
    </div>

    @include('pages.user.home.partials.contact')
@stop

@push('scripts')
    <script type="text/javascript">
        function attendEvent() {
            var isLogged = false;

            @if ($authUser)
                isLogged = true;
            @endif

            if (isLogged) {
                window.location.href = laroute.route('dashboard.testOnline');
            } else {
                $("meta[name='redirect_url']").attr('content', laroute.route('dashboard.testOnline'));
                $("meta[name='redirect_after_auth']").attr('content', laroute.route('dashboard.testOnline'));

                $("#signInModal2").modal();
            }
        }

        $(document).ready(function () {
            window.setTimeout(function () {
                var windowHash = window.location.hash;

                var menu = $(".hrc-controls li a[data-src='"+ windowHash+"']");

                if (menu) {
                    menu.trigger('click');
                }
            }, 500);

            $(".hrc-controls li a").on('click', function (e) {
                e.preventDefault();

                var src = $(this).data('src');

                if (src == '#hrc-attend') {
                    attendEvent();
                } else if (src == '#hrc-contact') {
                    $("body").addClass('open-contact-overlay');

                    $("#hrc-contact").animateCss('slideInRight');
                } else {
                    $("body").removeClass('open-contact-overlay');

                    $(".hrc-controls li.active").removeClass('active');
                    $(this).parent().addClass('active');

                    $(".hrc-section").addClass('hide');
                    $(src).removeClass('hide').animateCss('fadeIn');
                }

                $(".hrc-controls").addClass('hide-mobile');

                window.location.hash = src;
            });

            $(".hrc-contact-close, #hrc-contact-overlay").on('click', function () {
                $(".hrc-controls li.active").find('a').trigger('click');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".hrc-navbar-tab-sign-in").on('click', function (e) {
                e.preventDefault();

                $("meta[name='redirect_url']").attr('content', laroute.route('hrc.index'));
                $("meta[name='redirect_after_auth']").attr('content', laroute.route('hrc.index'));

                $("#signInModal").modal();
            });

            $(".hrc-navbar-tab-sign-up").on('click', function (e) {
                e.preventDefault();

                $("meta[name='redirect_url']").attr('content', laroute.route('hrc.index'));
                $("meta[name='redirect_after_auth']").attr('content', laroute.route('hrc.index'));

                $("#signUpModal").modal();
            });

            $(".btn-sign-in-google").on('click', function (e) {
                 e.preventDefault();

                window.location.href = laroute.route('auth.signIn.google', {
                    'redirect_after_auth': $("meta[name='redirect_after_auth']").attr('content')
                });
            });

            $("#menu-toggle").on('click', function (e) {
                e.preventDefault();

                $(".hrc-controls").toggleClass('hide-mobile');
                $(".hrc-controls").animateCss('slideInDown');
            });
        });
    </script>
@endpush

@push('modal')
<div class="modal hrc-modal" id="signInModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="signInLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body-wrapper">
                    <p class="hrc-modal-authorize-heading-1">Đăng nhập hoặc Đăng kí nhanh bằng tài khoản</p>

                    <a href="#" class="btn btn-sign-in-google"></a>

                    <p class="hrc-modal-authorize-heading-2">Đăng nhập bằng tài khoản Ứng viên</p>

                    <form id="signInForm" class="form-signInForm">
                        <div class="form-group">
                            <label for="signInEmail">Email</label>
                            <input type="email" name="email" id="signInEmail" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="signInPassword">Mật khẩu</label>
                            <input type="password" name="password" id="signInPassword" class="form-control" />
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember_me" /> Nhớ đăng nhập
                            </label>
                        </div>

                        <button type="submit" class="btn btn-block btn-default btn-sign-in btn-authorize">Đăng nhập</button>
                    </form>

                    <div class="hrc-sign-in-now-container">
                        Bạn chưa có tài khoản? <a data-dismiss="modal" data-toggle="modal" href="#signUpModal" class="color-1 hrc-sign-in-now">Đăng kí ngay!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hrc-modal" id="signInModal2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="signInModal2Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body-wrapper">
                    <p class="text-center color-1" style="font-size: 18pt;"><b>Đăng nhập để tham gia Test Online<br /> Ứng viên Tài năng 2017</b></p>

                    <a href="#" class="btn btn-sign-in-google"></a>

                    <p class="hrc-modal-authorize-heading-2">Hoặc đăng nhập bằng tài khoản</p>

                    <form id="signInForm" class="form-signInForm2">
                        <div class="form-group">
                            <label for="signInEmail">Email</label>
                            <input type="email" name="email" id="signInEmail" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="signInPassword">Mật khẩu</label>
                            <input type="password" name="password" id="signInPassword" class="form-control" />
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember_me" /> Nhớ đăng nhập
                            </label>
                        </div>

                        <button type="submit" class="btn btn-block btn-default btn-sign-in btn-authorize">Đăng nhập</button>
                    </form>

                    <div class="hrc-sign-in-now-container">
                        Bạn chưa có tài khoản? <a data-dismiss="modal" data-toggle="modal" href="#signUpModal" class="color-1 hrc-sign-in-now">Đăng kí ngay!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hrc-modal" id="signUpModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="signUpLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body-wrapper">
                    <p class="hrc-modal-authorize-heading-1">
                        Đăng nhập hoặc Đăng kí nhanh bằng tài khoản

                        <br />
                        <i>(Recommended)</i>
                    </p>

                    <a href="#" class="btn btn-sign-in-google"></a>

                    <p class="hrc-modal-authorize-heading-2">Đăng kí bằng tài khoản ứng viên</p>

                    <form id="signUpForm" class="form-signUpForm">
                        <div class="form-group">
                            <label for="signUpEmail">Email (*)</label>
                            <input type="email" name="email" id="signUpEmail" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="signUpEmailConfirmation">Nhập lại email (*)</label>
                            <input type="email" name="email_confirmation" id="signUpEmailConfirmation" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="signUpPassword">Mật khẩu (*)</label>
                            <input type="password" name="password" id="signUpPassword" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="signUpPasswordConfirmation">Nhập lại mật khẩu (*)</label>
                            <input type="password" name="password_confirmation" id="signUpPasswordConfirmation" class="form-control" />
                        </div>

                        <button type="submit" class="btn btn-block btn-default btn-authorize">Đăng kí</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hrc-modal" id="userIdleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="userIdleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body-wrapper">
                    <p class="hrc-modal-authorize-heading-1">
                        Bạn đã sẵn sàng tạo ra bước ngoặt cho riêng mình?
                    </p>

                    <button type="submit" class="btn btn-block btn-default btn-hrc-1 btn-user-idle-ready">Tôi sẵn sàng</button>

                    <br />

                    <button type="submit" class="btn btn-block btn-default btn-user-idle-no-ready">Tôi chưa sẵn sàng</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var formSignInData = {
                rules: {
                    email: {
                        required: {
                            depends: function() {
                                var $this = $(this);

                                return $this.val().length;
                            }
                        },
                        validateEmail: ''
                    },

                    password: {
                        required: true,
                        minlength: 6
                    }
                },

                messages: {
                    email: {
                        required: 'Vui lòng nhập email',
                        validateEmail: 'Email không đúng định dạng.'
                    },

                    password: {
                        required: 'Vui lòng nhập mật khẩu.',
                        minlength: 'Mật khẩu tối thiểu 6 kí tự.'
                    }
                },

                errorElement: "p",
                errorClass: "help-block",

                errorPlacement: function(error, element) {
                    element.closest('div').append(error);
                },

                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },

                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },

                submitHandler: function(form, event) {
                    event.preventDefault();

                    var btnSubmit = $(form).find('[type=submit]').attr('disabled', 'disabled');
                    btnSubmit.before('<div class="ajax-loading"></div>');

                    var request = $.ajax({
                        url: laroute.route("auth.signInSubmit"),
                        method: "POST",
                        data: JSON.stringify(convertFormDataToObject($(form))),
                        contentType: "application/json",
                        dataType: "json"
                    });

                    request.done(function(data) {
                        window.location.href = $("meta[name='redirect_url']").attr('content');
                    }).fail(function(e, data) {
                        if (e.status == 422) {
                            var html = [];

                            _.each(e.responseJSON, function (messages) {
                                _.each(messages, function (message) {
                                    html.push('<p>'+ message +'</p>');
                                });
                            });

                            html = html.join('');

                            bootbox.dialog({
                                message: html,
                                title: "Có lỗi xảy ra"
                            });
                        } else {
                            $.notify({
                                // options
                                message: 'Có lỗi xảy ra. Vui lòng liên hệ Admin.'
                            },{
                                // settings
                                type: 'danger',
                                z_index: 1140
                            });
                        }

                        btnSubmit.removeAttr('disabled');
                        $(form).find('.ajax-loading').remove();
                    });
                }
            };

            $(".form-signInForm").validate(formSignInData);
            $(".form-signInForm2").validate(formSignInData);

            $(".form-signUpForm").validate({
                rules: {
                    email: {
                        required: {
                            depends: function() {
                                var $this = $(this);

                                return $this.val().length;
                            }
                        },
                        validateEmail: ''
                    },

                    email_confirmation: {
                        required: {
                            depends: function() {
                                var $this = $(this);

                                return $this.val().length;
                            }
                        },
                        validateEmail: '',
                        equalTo: "#signUpEmail"
                    },

                    password: {
                        required: true,
                        minlength: 6
                    },

                    password_confirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: "#signUpPassword"
                    }
                },

                messages: {
                    email: {
                        required: 'Vui lòng nhập email.',
                        validateEmail: 'Email không đúng định dạng.'
                    },

                    email_confirmation: {
                        required: 'Vui lòng nhập lại email.',
                        validateEmail: 'Email không đúng định dạng.',
                        equalTo: 'Email nhập lại không khớp.'
                    },

                    password: {
                        required: 'Vui lòng nhập mật khẩu.',
                        minlength: 'Mật khẩu tối thiểu 6 kí tự.'
                    },

                    password_confirmation: {
                        required: 'Vui lòng nhập lại mật khẩu.',
                        minlength: 'Mật khẩu tối thiểu 6 kí tự.',
                        equalTo: 'Mật khẩu nhập lại không khớp.'
                    }
                },

                errorElement: "p",
                errorClass: "help-block",

                errorPlacement: function(error, element) {
                    element.closest('div').append(error);
                },

                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },

                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },

                submitHandler: function(form, event) {
                    event.preventDefault();

                    var btnSubmit = $(form).find('[type=submit]').attr('disabled', 'disabled');
                    btnSubmit.before('<div class="ajax-loading"></div>');

                    var request = $.ajax({
                        url: laroute.route("auth.signUpSubmit"),
                        method: "POST",
                        data: JSON.stringify(convertFormDataToObject($(form))),
                        contentType: "application/json",
                        dataType: "json"
                    });

                    request.done(function(data) {
                        window.location.href = $("meta[name='redirect_url']").attr('content');
                    }).fail(function(e, data) {
                        if (e.status == 422) {
                            var html = [];

                            _.each(e.responseJSON, function (messages) {
                                _.each(messages, function (message) {
                                    html.push('<p>'+ message +'</p>');
                                });
                            });

                            html = html.join('');

                            bootbox.dialog({
                                message: html,
                                title: "Có lỗi xảy ra"
                            });
                        } else {
                            $.notify({
                                // options
                                message: 'Có lỗi xảy ra. Vui lòng liên hệ Admin.'
                            },{
                                // settings
                                type: 'danger',
                                z_index: 1140
                            });
                        }

                        btnSubmit.removeAttr('disabled');
                        $(form).find('.ajax-loading').remove();
                    });
                }
            });
        });
    </script>
@endpush

@push('scripts')
    <script type="text/javascript">
        function onYouTubePlayerAPIReady() {
            youtubeFrame.onYoutubePlayerAPIReady();
        }

        var youtubeFrame = {
            url: 'E4gEU4IFhA8',
            youtubePlayer: null,

            init: function () {
                if ($("body").hasClass('enable-youtube-frame')) {
                    this.embed();

                    $(window).on('resize', function () {
                        youtubeFrame.resizeEmbed();
                    });
                }
            },

            embed: function () {
                var html = [];

                html.push('<div id="youtubeFrame" style="position: fixed; z-index: 5000; top: 0;">');
                html.push('<button type="button" class="btn-close-youtube-frame" onClick="youtubeFrame.close();">BỎ QUA</button>');
                html.push('<div id="player"></div>');
                html.push('</div>');

                html = html.join('');

                $("body").append(html);

                window.setTimeout(function () {
                    $("body").removeClass('enable-youtube-frame');
                }, 500);
            },

            onYoutubePlayerAPIReady: function (event) {
                var documentWidth = $(document).width();
                var documentHeight = $(document).height();

                youtubeFrame.youtubePlayer = new YT.Player('player', {
                    height: documentHeight,
                    width: documentWidth,
                    videoId: youtubeFrame.url,
                    playerVars: {
                        'rel': 0,
                        'autoplay': 1
                    },
                    events: {
                        'onReady': youtubeFrame.onPlayerReady,
                        'onStateChange': youtubeFrame.onPlayerStateChange
                    }
                });
            },

            onPlayerReady: function (event) {
                event.target.playVideo();
                youtubeFrame.resizeEmbed();
            },

            onPlayerStateChange: function (event) {
                if (event.data === 0) {
                    window.setTimeout(function () {
                        youtubeFrame.close();
                    }, 2000);
                }
            },

            resizeEmbed: function () {
                var documentWidth = $(document).width();
                var documentHeight = $(document).height();

                $("#youtubeFrame, #youtubeFrame iframe").css({
                    width: documentWidth,
                    height: documentHeight
                });
            },

            close: function () {
                $("#youtubeFrame").remove();

                alertWhenIdle.init();
            }
        };

        var alertWhenIdle = {
            init: function () {
                this.start();
            },

            start: function () {
                window.setTimeout(function () {
                    alertWhenIdle.showModal();
                }, 30 * 1000);

                $(".btn-user-idle-ready").on('click', function (e) {
                    e.preventDefault();

                    $("#userIdleModal").modal('hide');
                    $(".hrc-controls li a[data-src='#hrc-attend']").trigger('click');
                });

                $(".btn-user-idle-no-ready").on('click', function (e) {
                    e.preventDefault();

                    $("#userIdleModal").modal('hide');
                    $(".hrc-controls li a[data-src='#hrc-personality-test']").trigger('click');
                });
            },

            showModal: function () {
                $("#userIdleModal").modal('hide');

                if (!$("body").hasClass('modal-open')) {
                    $("#userIdleModal").modal();
                }
            }
        };

        $(document).ready(function () {
            youtubeFrame.init();
        });
    </script>
@endpush