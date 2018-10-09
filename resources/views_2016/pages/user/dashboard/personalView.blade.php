@extends('layouts.user.dashboard.frame')

@section('rightContent')
    <div class="panel panel-dashboard">
        <div class="panel-heading clearfix">
            <div class="pull-left">
                Thông tin cá nhân
            </div>

            <div class="pull-right">
                <a href="{{ route('dashboard.editPersonal') }}">
                    <i class="fa fa-fw fa-edit"></i>
                </a>
            </div>
        </div>

        <div class="panel-body">
            <form id="personalForm">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('fullname', 'Họ và tên:', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                <p class="form-control-static">{{ $authUser->information->fullname }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('fullname', 'Số điện thoại:', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                <p class="form-control-static">{{ $authUser->information->phone_number }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('fullname', 'Trường đại học:', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                <p class="form-control-static">{{ config('hrc.universities')[$authUser->information->university] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group clearfix">
                            {!! Form::label('fullname', 'Năm tốt nghiệp:', ['class' => 'col-lg-4 col-md-6 col-sm-12 control-label']) !!}

                            <div class="col-sm-6 append-error">
                                <p class="form-control-static">{{ config('hrc.graduated_years')[$authUser->information->graduated_year] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group clearfix">
                            <label class="control-label col-lg-4 col-md-6 col-sm-12">Ngành nghề dự thi 1:</label>

                            <div class="col-sm-6">
                                <p class="form-control-static">{{ config('hrc.majorsName')[$authUser->information->major] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group clearfix">
                            <label class="control-label col-lg-4 col-md-6 col-sm-12">Ngành nghề dự thi 2:</label>

                            <div class="col-sm-6">
                                @if ($authUser->information->major2)
                                    <p class="form-control-static">{{ config('hrc.majorsName')[$authUser->information->major2] }}</p>
                                @else
                                    <p class="form-control-static">N/A</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group clearfix">
                            <label class="control-label col-md-12">CV:</label>

                            @if ($authUser->information && $authUser->information->cv)
                                <div class="col-md-12 userInformationCv">
                                    <p>CV hiện tại: <a href="{{ $authUser->information->cv->url }}">Download CV</a></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop