@php($bodyClasses = 'hrcPageHome')
@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])
@section('title',config('site.name_page_joins'))

@section('content')
    <div class="hrc-join-not-login">
        <div class="row">
            <div class="col-md-7 main-text col-xs-12" style="height: calc(100vh - 50px);">
                <div class="color-white">
                    <h1 class="color-white">Cùng chứng kiến bước ngoặt đổi thay<br/>của Top 6 Ứng viên Tài năng</h1>
                    <p class="text-description">Đêm Chung kết The Final Round: 17h30 ngày 16/12/2017<br/>Đia điểm: VPI Tower - 167 Trung Kính</p>
                    <p class="text-description">Hạn đăng kí tham dự: 23h59' thứ 5 ngày 14/12</p>
                </div>
            </div>
            <div class="col-md-5 col-xs-12 reg-form">

                @if (!session()->has('message'))
                    <div class="form-upload-cv" style="margin-top: 30px;">
                        <form id="personalForm" method="POST" action="{{ route('final_register')}}">
                            {{ csrf_field() }}
                            <h3 class="text-center"><b>Đăng ký tham dự Chung kết<br/>Ứng viên Tài năng 2017</b></h3>
                            <div class="form-group append-error">
                                {!! Form::text('fullname', null, [
                                                    'class' => 'form-control',
                                                    'id' => 'fullname',
                                                    'placeholder' => 'Họ và tên',
                                                    'required'
                                                ]) !!}
                            </div>
                            <div class="form-group append-error">
                                {!! Form::select('university', config('hrc.universities'), null, [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Chọn trường đại học',
                                                    'required'
                                                ]) !!}
                            </div>
                            <div class="form-group append-error">
                                {!! Form::text('university_name', null, [
                                                    'class' => 'form-control',
                                                    'id' => 'university_name',
                                                    'placeholder' => 'Nếu không tìm thấy tên trường, xin ghi rõ tại đây',
                                                ]) !!}
                            </div>
                            <div class="form-group append-error">
                                {!! Form::select('graduated_year', config('hrc.graduated_years'), null, [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Chọn năm tốt nghiệp',
                                                ]) !!}
                            </div>
                            <div class="form-group append-error">
                                {!! Form::text('email', null, [
                                                    'class' => 'form-control',
                                                    'id' => 'email',
                                                    'placeholder' => 'Email',
                                                    'required'
                                                ])!!}
                            </div>
                            <div class="form-group append-error">
                                {!! Form::text('phone_number', null, [
                                                    'class' => 'form-control',
                                                    'id' => 'phone_number',
                                                    'placeholder' => 'Số điện thoại',
                                                    'required'
                                                ])!!}
                            </div>
                            <div class="form-group append-error">
                                {!! Form::textarea('reason', null, [
                                                    'class' => 'form-control',
                                                    'id' => 'reason',
                                                    'placeholder' => 'Tại sao bạn lại muốn tham dự đêm Chung kết',
                                                    'required',
                                                    'rows' => 3
                                                ])!!}
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-default btn-join btn-lg">ĐĂNG KÝ</button>
                            </div>
                        </form>
                        @else
                            <div class="form-upload-cv" style="margin-top: 30vh;">
                                <div class="message">
                                    <p>Ban tổ chức đã nhận được đăng ký của bạn. Ban tổ chức
                                        sẽ chọn lọc các đăng ký phù hợp và đúng thời hạn để
                                        tham dự đêm Chung kết. Thông tin cụ thể sẽ được gửi tới
                                        bạn qua email đăng ký.</p>
                                    <p>Cảm ơn sự quan tâm và ủng hộ của bạn dành cho Ứng viên Tài năng!</p>
                                </div>
                            </div>
                        @endif

                    </div>
            </div>
            <hr class="visible-xs">
        </div>
        @stop
        @push('styles')
        <style type="text/css">
            .hrc-join-container-form {
                background-image: url('../static/user/images/join/bg/join_bg.png');
                background-repeat: no-repeat;
                background-size: cover;
                padding: 100px 0px;
            }

            .form-upload-cv {
                margin: auto;
                float: none !important;
                background-color: white;
                padding: 20px;
                margin-top: 15px;
            }

            .form-upload-cv .form-control {
                box-shadow: inset 0 -1px 0px rgba(0, 0, 0, .075);
                border: none;
                transition: none;
                border-radius: 0px;
            }

            .wrap-btns-joins {
                display: block;
                text-align: center;
                margin: 30px auto;
            }

            .wrap-btns-joins .brk-line {
                margin-top: 15px;
            }

            .hrc-join-not-login .container.text-center.color-white {
                height: 500px;
            }

            .hrc-join-not-login {
                height: calc(100vh - 50px);
            }

            .hrc-join-not-login h1 {
                margin-top: 50vh;
                margin-bottom: 30px;
                font-weight: bold;
            }

            .col-md-7.main-text {
                padding-left: 100px;
            }

            .hrc-join-not-login .test {
                margin-top: 100px;
            }

            .hrc-join-not-login .test h3 {
                margin-bottom: 30px;
                font-size: 15px;
            }

            .hrc-join-not-login .btn-transparent {
                background-color: transparent;
                box-shadow: none;
                color: white;
                background-size: cover;
            }

            #footer {
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

            .policy ul {
                padding-left: 30px;
            }

            .policy ul li {
                list-style-type: disc;
            }

            .policy ul li ul {
                padding-left: 15px;
            }

            .policy ul li ul li {
                list-style-type: circle;
            }

            .policy h3 {
                font-size: 25px;
                font-weight: bold;
            }

            .policy {
                line-height: 23px;
            }

            .hrc-join-not-login {
                background-image: url('./final/register.jpg');
                background-size: cover;
                overflow: hidden;
            }

            .col-md-5.reg-form {
                padding-right: 50px;
            }

            .form-upload-cv .message {
                padding: 20px;
                text-align: justify;
            }

            @media screen and (max-width:767px){
              .hrc-join-not-login {
    height: auto!important;
}

.hrc-join-not-login .col-md-7 {
height: auto!important;
	    padding: 0 30px!important;
}

.hrc-join-not-login .col-md-5.reg-form {
	padding-right: 0!important;
}
.hrc-join-not-login h1 {
margin-top: 50px;
}
            }

        </style>
    @endpush
