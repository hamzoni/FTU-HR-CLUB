@php($bodyClasses = 'hrcPageHome')
@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])
@push('modal')
<div class="modal hrc-dashboard-modal fade" id="updatePersonalSuccess" tabindex="-1" role="dialog" aria-labelledby="updatePersonalSuccessLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close">x</button>

                <div class="modal-body-wrapper text-center">
                    <p>Chúc mừng bạn đã ứng tuyển thành công!</p>
                    <p>Hãy check email để nhận ngay link làm Test tuyển dụng.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush
@section('title',config('site.name_page_joins'))

@section('content')
    @if ($authUser)
    <div class="partner-header-text">
        <h1 class="text-center color-white mgr-0">
            Tham gia
        </h1>
    </div>
    <div id="hrc-join" class="hrc-section">
        <div class="hrc-join-container">
            <div class="container">
                <div class="policy">
                    <h3>Yêu cầu về CV dự thi</h3>
                    <ul>
                        <li><label>Định dạng file CV: </label> .doc, .docx, .pdf</li>
                        <li><label>Cách đặt tên CV: </label> yymmdd_TenUngVien
                            <ul>
                                <li>yymmdd: ngày nộp CV (yy - 2 chữ số cuối của năm, mm - 2 chữ số của tháng, dd - 2 chữ số của ngày)
                                </li>
                                <li>TenUngVien: họ và tên viết liền không dấu của ứng viên</li>
                            </ul>
                        </li>
                    </ul>
                    <h3>Lưu ý</h3>
                    <ul>
                        <li> Hạn chót Ban Tổ chức nhận CV của ứng viên là <b>23h59’ ngày 17/11/2017</b></li>
                        <li> Ứng viên chỉ đăng kí tối đa 2 bộ phận ứng tuyển trong 4 bộ phận sau: Marketing & Sales; Finance; Human Resources và Supply Chain.</li>
                        <li> Ban Tổ chức chỉ chấp nhận CV đầu tiên được gửi về. Ứng viên không có quyền chỉnh sửa hoặc thay đổi bất cứ nội dung nào sau khi đã nộp CV</li>
                        <li> Mọi thông tin của ứng viên trong CV phải bảo đảm tính xác thực. Ban Tổ chức không chịu trách nhiệm với mọi thông tin sai sót hoặc không đúng sự thật</li>
                        <li> Hệ thống sẽ gửi mail xác nhận đăng ký thành công về địa chỉ hòm thư điện tử của ứng viên</li>

                    </ul>
                    <h3>Recruitment Test (27/10/2017 - 19/11/2017)</h3>
                    <p>Tất cả ứng viên sẽ được tham gia bài Test tuyển dụng sau khi nộp CV. Bài thi online gồm 32 câu hỏi bằng Tiếng Anh để đánh giá năng lực tư duy (Numerical, Logical, Verbal) và mức độ phù hợp tính cách (SJT).</p>
                    <h3>Lưu ý</h3>
                    <ul>
                        <li> Hạn chót để ứng viên hoàn thành bài thi tuyển dụng là <b>23h59’ ngày 19/11/2017</b></li>
                        <li> Đường dẫn tới bài thi sẽ được gửi tới hòm thư điện tử của mỗi ứng viên sau khi nộp CV</li>
                        <li> Mỗi ứng viên sẽ có quyền hoàn thành bài thi một lần duy nhất </li>
                    </ul>
                    <h3>Quy định chung</h3>
                    <ul>
                        <li>  Ban Tổ chức có quyền hủy bỏ tư cách dự thi của các ứng viên nếu nhận thấy hành vi không tuân thủ quy định của Ban Tổ chức (ứng viên sẽ được thông báo trước tối thiểu 24 giờ)</li>
                        <li>  Mọi khiếu nại, thắc mắc về quyết định của Ban Tổ chức xin gửi về địa chỉ email: uvtn@hrc.com.vn</li>
                    </ul>
                    <div class="wrap-btns-joins" style="">
                        <a href="#cv-form" class="btn btn-default btn-join">Nộp CV để tham gia</a>
                        <div class="brk-line">
                            <a target="blank" href="/job-selection-test" class="btn btn-default btn-join no-shadow">Khám phá bản thân với test chọn nghề</a>
                            <a target="blank" href="/articles/detail/mo-ta-4-bo-phan">Hoặc xem mô tả 4 bộ phận</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="hrc-join-container-form" id="cv-form">

            <div class="form-upload-cv col-md-7 col-sm-12 col-xs-12">
                <form id="personalForm">
                    <h2 class="text-center">Thông tin cá nhân</h2>
                    <div class="form-group append-error">
                        @if (isset($authUser->information->cv_id) && !empty($authUser->information->cv_id))
                            {!! Form::text('fullname', ($authUser->information) ? $authUser->information->fullname : null, [
                                           'class' => 'form-control',
                                           'id' => 'fullname',
                                           'placeholder' => 'Họ và tên',
                                           'readonly' => 'true'
                                       ]) !!}
                        @else
                            {!! Form::text('fullname', ($authUser->information) ? $authUser->information->fullname : null, [
                                            'class' => 'form-control',
                                            'id' => 'fullname',
                                            'placeholder' => 'Họ và tên',
                                        ]) !!}
                        @endif

                    </div>
                    <div class="form-group append-error">
                        @if (isset($authUser->information->cv_id) && !empty($authUser->information->cv_id))
                            {!! Form::text('phone_number', ($authUser->information) ? $authUser->information->phone_number : null, [
                                            'class' => 'form-control',
                                            'id' => 'phone_number',
                                            'placeholder' => 'Số điện thoại',
                                            'readonly' => 'true',
                                        ])!!}
                        @else
                            {!! Form::text('phone_number', ($authUser->information) ? $authUser->information->phone_number : null, [
                                            'class' => 'form-control',
                                            'id' => 'phone_number',
                                            'placeholder' => 'Số điện thoại',
                                        ])!!}
                        @endif

                    </div>
                    <div class="form-group append-error">
                        @if (isset($authUser->information->cv_id) && !empty($authUser->information->cv_id))
                            {!! Form::select('university', config('hrc.universities'), $authUser->information ? $authUser->information->university : null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Chọn trường đại học',
                                            'disabled' => 'true'
                                        ]) !!}
                        @else
                            {!! Form::select('university', config('hrc.universities'), $authUser->information ? $authUser->information->university : null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Chọn trường đại học',
                                        ]) !!}
                        @endif
                    </div>
                    <div class="form-group append-error">
                        @if (isset($authUser->information->cv_id) && !empty($authUser->information->cv_id))
                            {!! Form::text('university_name', ($authUser->information) ? $authUser->information->university_name : null, [
                                           'class' => 'form-control',
                                           'id' => 'university_name',
                                           'placeholder' => 'Nếu không tìm thấy tên trường, xin ghi rõ tại đây',
                                           'readonly' => 'true'
                                       ]) !!}
                        @else
                            {!! Form::text('university_name', ($authUser->information) ? $authUser->information->university_name : null, [
                                            'class' => 'form-control',
                                            'id' => 'university_name',
                                            'placeholder' => 'Nếu không tìm thấy tên trường, xin ghi rõ tại đây',
                                        ]) !!}
                        @endif

                    </div>
                    <div class="form-group append-error">
                        @if (isset($authUser->information->cv_id) && !empty($authUser->information->cv_id))
                            {!! Form::select('graduated_year', config('hrc.graduated_years'), ($authUser->information) ? $authUser->information->graduated_year : null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Chọn năm tốt nghiệp',
                                            'disabled' => 'true'
                                        ]) !!}
                        @else
                            {!! Form::select('graduated_year', config('hrc.graduated_years'), ($authUser->information) ? $authUser->information->graduated_year : null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Chọn năm tốt nghiệp'
                                        ]) !!}
                        @endif

                    </div>
                    <div class="form-group append-error">
                        @if (isset($authUser->information->cv_id) && !empty($authUser->information->cv_id))
                        {!! Form::select('major', config('hrc.majorsName'), ($authUser->information) ? $authUser->information->major : null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Chọn bộ phận dự thi 1',
                                            'disabled' => 'true',
                                        ]) !!}
                            @else
                            {!! Form::select('major', config('hrc.majorsName'), ($authUser->information) ? $authUser->information->major : null, [
                                           'class' => 'form-control',
                                           'placeholder' => 'Chọn bộ phận dự thi 1',
                                       ]) !!}
                        @endif
                    </div>
                    <div class="form-group append-error">
                        @if (isset($authUser->information->cv_id) && !empty($authUser->information->cv_id))
                            {!! Form::select('major2', config('hrc.majorsName'), ($authUser->information) ? $authUser->information->major2 : null, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Chọn bộ phận dự thi 2',
                                                'disabled' => 'true',
                                            ]) !!}
                        @else
                            {!! Form::select('major2', config('hrc.majorsName'), ($authUser->information) ? $authUser->information->major2 : null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Chọn bộ phận dự thi 2',
                                        ]) !!}
                        @endif
                    </div>
                    @if (isset($authUser->information->cv_id) && !empty($authUser->information->cv_id))
                        <label class="control-label col-md-12">
                            CV: (*)
                            <a href="{{ $authUser->information->cv_id }}">Tải về CV hiện tại</a>
                        </label>
                    @else
                        <div class="form-group append-error">
                            <label>Upload CV</label>
                            <input type="file" id="uploadFile">
                        </div>
                    @endif

                    <div class="text-center">
                        <div class="form-loading clearfix hide">
                            <div class="ajax-loading"></div>
                        </div>
                    </div>
                    @if (!isset($authUser->information->cv_id) || empty($authUser->information->cv_id))
                        <div class="text-center"><button type="submit" class="btn btn-default btn-join btn-save form-buttons">Gửi CV</button></div>
                    @endif
                </form>
            </div>
        </div>


    </div>
    @else
        <div class="hrc-join-not-login">
            <video poster="{{asset("bg_video/bg_video.png")}}" id="bgvid" playsinline autoplay muted loop>
            <source src="{{asset("bg_video/Option_1.mp4")}}" type="video/mp4">
            </video>
            <div class="container text-center color-white">
                <h1 class="color-white">Hãy tìm kiếm những bước ngoặt thay đổi cuộc đời bạn</h1>
                <a class="btn btn-join btn-default text-uppercase hrc-navbar-tab-sign-in">ĐĂNG NHẬP ĐỂ LÀM TEST</a>
                <!-- <div class="test">
                    <h3>Chưa lựa chọn được ngành nghề? Làm test để khám phá bản thân</h3>
                    <a href="/job-selection-test" class="btn btn-join btn-default text-uppercase btn-transparent">LÀM TEST</a>
                </div> -->
            </div>
        </div>
    @endif
@stop
@push('scripts')
<script type="text/javascript">
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

            //$("meta[name='redirect_url']").attr('content', laroute.route('hrc.index'));
            //$("meta[name='redirect_after_auth']").attr('content', laroute.route('hrc.index'));

            $("#signInModal").modal();
        });

        $(".hrc-navbar-tab-sign-up").on('click', function (e) {
            e.preventDefault();

           /* $("meta[name='redirect_url']").attr('content', laroute.route('hrc.index'));
            $("meta[name='redirect_after_auth']").attr('content', laroute.route('hrc.index'));*/

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
    var vid = document.getElementById("bgvid");
    var pauseButton = document.querySelector("#polina button");

    if (window.matchMedia('(prefers-reduced-motion)').matches) {
        vid.removeAttribute("autoplay");
        vid.pause();
        pauseButton.innerHTML = "Paused";
    }

    function vidFade() {
        vid.classList.add("stopfade");
    }

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
                    //window.location.href = $("meta[name='redirect_url']").attr('content');
                    $.notify({
                        // options
                        message: 'Đăng nhập thành công'
                    },{
                        // settings
                        type: 'success',
                        z_index: 1140
                    });
                    location.reload();
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
                    //window.location.href = $("meta[name='redirect_url']").attr('content');
                    $.notify({
                        // options
                        message: 'Đăng ký thành công.'
                    },{
                        // settings
                        type: 'success',
                        z_index: 1140
                    });
                    location.reload();
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
                    }else if(e.status == 200){
                        $.notify({
                            // options
                            message: 'Đăng ký thành công.'
                        },{
                            // settings
                            type: 'success',
                            z_index: 1140
                        });
                        //location.reload();
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
    $(document).ready(function () {
        if (document.getElementById("uploadFile")) {
            document.getElementById("uploadFile").onchange = function () {
                $.each($('#uploadFile')[0].files, function (index, file) {
                    var parent = $(".fileUpload").parent();

                    parent.find('span').html(file.name);
                });
            };
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-cancel").on('click', function (e) {
            e.preventDefault();

            window.location.href = laroute.route('dashboard.personal');
        });

        $(".btn-more-details").on('click', function (e) {
            e.preventDefault();

            $("#discoverYourself").modal();
        })
    });
</script>

<script type="text/javascript">
    var rules = {
        fullname: {
            required: true,
            minlength: 4
        },

        phone_number: {
            required: true,
            minlength: 6
        },

        university: {
            required: true
        },

        graduated_year: {
            required: true
        },

        major: {
            required: true
        }
    };

    if ($(".userInformationCv").length == 0) {
        rules.file = {
            required: true
        }
    }

    $("#personalForm").validate({
        rules: rules,

        messages: {
            fullname: {
                required: 'Vui lòng nhập họ tên.',
                minlength: 'Độ dài tối thiểu 4 kí tự.'
            },

            phone_number: {
                required: 'Vui lòng nhập số điện thoại.',
                minlength: 'Độ dài tối thiểu 6 kí tự.'
            },

            university: {
                required: 'Vui lòng chọn trường đại học.'
            },

            graduated_year: {
                required: 'Vui lòng chọn năm tốt nghiệp.'
            },

            major: {
                required: 'Vui lòng chọn bộ phận dự thi.'
            }
        },

        errorElement: "p",
        errorClass: "help-block",

        errorPlacement: function(error, element) {
            element.closest('div.append-error').append(error);
        },

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },

        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },

        submitHandler: function(form, event) {
            event.preventDefault();

            if (document.getElementById("uploadFile")) {
                var dialog = bootbox.confirm({
                    title: "Chú ý",
                    message: "Bạn chỉ có thể upload CV một lần. Hãy kiểm tra kĩ trước khi nộp.",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Kiểm tra lại'
                        },
                        confirm: {
                            className: 'color-1',
                            label: '<i class="fa fa-check"></i> Upload CV'
                        }
                    },
                    callback: function (result) {
                        dialog.modal('hide');

                        if (result) {
                            submitForm(form);
                        }
                    }
                });
            } else {
                submitForm(form);
            }
        }
    });

    function submitForm(form)
    {
        $(".form-buttons").addClass('hide');
        $(".form-loading").removeClass('hide');

        var formData = new FormData();

        if (document.getElementById("uploadFile")) {
            $.each($('#uploadFile')[0].files, function (i, file) {
                if (file.size < 5000000) {
                    formData.append('file', file);
                } else {
                    alert('File too big. Please upload file less than 5MB');

                    throw new FatalError("File too big. Please upload file less than 5MB");
                }
            });
        }

        _.each($(form).serializeArray(), function (a) {
            formData.append(a.name, a.value);
        });

        var request = $.ajax({
            url: laroute.route("api.updatePersonalInformation"),
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST'
        });

        request.done(function(data) {
            $("#updatePersonalSuccess").modal();
            $("#updatePersonalSuccess").on('hidden.bs.modal', function () {
                window.location.reload();
            });
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
                    message: 'Có lỗi xảy ra trong quá trình cập nhật thông tin cá nhân. Vui lòng liên hệ Admin.'
                },{
                    // settings
                    type: 'danger',
                    z_index: 1140
                });
            }

            $(".form-buttons").removeClass('hide');
            $(".form-loading").addClass('hide');
        });
    }
</script>
@endpush
@push('styles')
<style type="text/css">
    .hrc-join-container-form{
        background-image: url('../static/user/images/join/bg/join_bg.png');
        background-repeat: no-repeat;
        background-size: cover;
        padding: 100px 0px;
    }
    .form-upload-cv{
        margin: auto;
        float: none!important;
        background-color: white;
        padding: 50px;
        margin-top: 15px;
    }
    .form-upload-cv .form-control{
        box-shadow: inset 0 -1px 0px rgba(0,0,0,.075);
        border: none;
        transition: none;
        border-radius:0px;
    }

    .wrap-btns-joins {
        display: block;
        text-align: center;
        margin: 30px auto;
    }
    .wrap-btns-joins .brk-line{
        margin-top: 15px;
    }

    .hrc-join-not-login .container.text-center.color-white{
        height: 500px;
    }
    .hrc-join-not-login {
        height: calc(100vh - 50px);
    }
    .hrc-join-not-login h1{
        margin-top: 200px;
        margin-bottom: 30px;
    }
    .hrc-join-not-login .test{
        margin-top: 100px;
    }
    .hrc-join-not-login .test h3{
        margin-bottom: 30px;
        font-size:15px;
    }
    .hrc-join-not-login .btn-transparent{
        background-color: transparent;
        box-shadow: none;
        color:white;
    }

    #footer{
        background-color: #fff;
    }
    video {
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -100;
        transform: translateX(-50%) translateY(-50%);
        background: url('{{asset("bg_video/bg_video.png")}}') no-repeat;
        background-size: cover;
        transition: 1s opacity;
    }
    .policy ul{
        padding-left:30px;
    }
    .policy ul li{
        list-style-type: disc;
    }
    .policy ul li ul{
        padding-left: 15px;
    }
    .policy ul li ul li{
        list-style-type: circle;
    }
    .policy h3{
        font-size:25px;
        font-weight: bold;
    }
    .policy{
        line-height:23px;
    }

</style>
@endpush


