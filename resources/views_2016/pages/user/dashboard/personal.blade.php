@extends('layouts.user.dashboard.frame')

@push('modal')
<div class="modal hrc-dashboard-modal fade" id="updatePersonalSuccess" tabindex="-1" role="dialog" aria-labelledby="updatePersonalSuccessLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body-wrapper text-center">
                    <p>Chúc mừng bạn đã ứng tuyển thành công!</p>
                    <p>Kết quả sẽ được cập nhật qua Email</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('modal')
@include('pages.user.dashboard.personalPartials.discoverMajor')
@endpush

@section('rightContent')
    <div class="panel panel-dashboard">
        <div class="panel-heading">
            Thông tin cá nhân
        </div>

        <div class="panel-body">
            <form id="personalForm">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('fullname', 'Họ và tên: (*)', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                {!! Form::text('fullname', ($authUser->information) ? $authUser->information->fullname : null, [
                                    'class' => 'form-control',
                                    'id' => 'fullname',
                                    'placeholder' => 'VD: Nguyễn Văn A'
                                ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('fullname', 'Số điện thoại: (*)', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                {!! Form::text('phone_number', ($authUser->information) ? $authUser->information->phone_number : null, [
                                    'class' => 'form-control',
                                    'id' => 'phone_number',
                                    'placeholder' => 'VD: 012 345 6789'
                                ])!!}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('fullname', 'Trường đại học: (*)', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                {!! Form::select('university', config('hrc.universities'), $authUser->information ? $authUser->information->university : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Chọn trường đại học'
                                ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('fullname', 'Năm tốt nghiệp: (*)', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                {!! Form::select('graduated_year', config('hrc.graduated_years'), ($authUser->information) ? $authUser->information->graduated_year : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Chọn năm tốt nghiệp'
                                ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('major', 'Ngành nghề dự thi 1: (*)', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label', 'style' => 'padding-right: 0;']) !!}

                            <div class="col-sm-6 append-error">
                                {!! Form::select('major', config('hrc.majorsName'), ($authUser->information) ? $authUser->information->major : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Chọn ngành nghề'
                                ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('major2', 'Ngành nghề dự thi 2:', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                {!! Form::select('major2', config('hrc.majorsName'), ($authUser->information) ? $authUser->information->major2 : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Chọn ngành nghề'
                                ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group clearfix">
                            @if ($authUser->information && $authUser->information->cv)
                                <label class="control-label col-md-12">
                                    CV: (*)

                                    <a href="{{ $authUser->information->cv->url }}">Tải về CV hiện tại</a>
                                </label>
                            @else
                                <label class="control-label col-md-12">CV: (*) <i style="font-weight: 400">Bạn chỉ có thể upload CV một lần duy nhất.</i></label>
                            @endif

                            @unless ($authUser->information && $authUser->information->cv)
                                <div class="col-md-12 fileUpload-container append-error">
                                    <div class="fileUpload">
                                        @if ($authUser->information && $authUser->information->cv)
                                            <span><i class="fa fa-fw fa-plus-circle"></i> Re-upload CV</span>
                                        @else
                                            <span><i class="fa fa-fw fa-plus-circle"></i> Upload CV</span>
                                        @endif

                                        <input type="file" name="file" id="uploadFile" class="upload" />
                                    </div>

                                    <p class="help-block">Chấp nhận file: <b>.pdf .doc .docx</b> | Dung lượng: <b>Tối đa: 5 MB</b></p>
                                    <p class="help-block"><b>(*)</b> bắt buộc.</p>
                                </div>
                            @endunless
                        </div>
                    </div>

                    <div class="col-md-10 text-right">
                        <div class="form-buttons">
                            <button type="button" class="btn btn-cancel">Hủy</button>

                            &nbsp;&nbsp;

                            <button type="submit" class="btn btn-save">Lưu</button>
                        </div>

                        <div class="form-loading clearfix hide">
                            <div class="ajax-loading pull-right"></div>
                        </div>
                    </div>

                    <div class="col-md-2"></div>
                </div>
            </form>
        </div>
    </div>
@stop

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
                    required: 'Vui lòng chọn ngành nghề dự thi.'
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