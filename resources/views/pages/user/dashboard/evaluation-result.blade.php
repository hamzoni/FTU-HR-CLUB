@extends('layouts.user.dashboard.frame', ['hiddenNavbar' => true])

@section('dashboardNavbar')
    @include('pages.user.dashboard.evaluation-navbar')
@stop

@section('rightContent')
    <div class="panel panel-dashboard">
        <div class="panel-heading clearfix">
            Đánh giá cá nhân
        </div>

        <div class="panel-body">
            <div class="fb-share-button" data-href="{{ route('hrc.facebookShare', $personalityResult) }}" data-layout="button_count"
                 data-size="large" data-mobile-iframe="true" style="margin-bottom: 20px;">
                <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('hrc.facebookShare', $personalityResult) }}&amp;src=sdkpreparse">Share</a>
            </div>

            @include($personalityView)

            <div class="fb-share-button" data-href="{{ route('hrc.facebookShare', $personalityResult) }}" data-layout="button_count"
                 data-size="large" data-mobile-iframe="true" style="margin-top: 20px;">
                <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('hrc.facebookShare', $personalityResult) }}&amp;src=sdkpreparse">Share</a>
            </div>

            <hr />

            <div class="text-center">
                <h3>
                    <b>Bạn đã sẵn sàng trở thành Ứng viên Tài năng 2017?</b>
                </h3>

                <a href="{{ route('dashboard.personal') }}" class="btn btn-evalutation-next">ĐĂNG KÝ NGAY</a>
            </div>
        </div>
    </div>
@stop