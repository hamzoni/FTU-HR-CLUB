@extends('layouts.user.home.application', ['bodyClasses' => 'hrcPageDashboard'])

@section('content')
    <div id="wrapper">
        @include('layouts.user.dashboard.sidebar')

        <div id="page-content-wrapper">
            <div class="visible-xs-block">
                <div class="clearfix">
                    <div class="pull-left">
                        <a href="{{ route('hrc.index') }}" class="btn btn-default">
                            <i class="fa fa-fw fa-home"></i>
                        </a>
                    </div>

                    <div class="pull-right">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </a>
                    </div>
                </div>

                <br />
            </div>

            @unless (isset($hiddenNavbar) && $hiddenNavbar)
                @include('layouts.user.dashboard.navbar')
            @endunless

            @yield('dashboardNavbar')

            <div id="page-content-container">
                @yield('rightContent')

                <div style="height: 100px;"></div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();

            if ($("#wrapper").hasClass('toggled')) {
                $("#wrapper").removeClass("toggled");
            } else {
                $("#wrapper").addClass("toggled");

                window.setTimeout(function () {
                    $("#page-content-wrapper").on('click', function (e) {
                        e.preventDefault();

                        $("#wrapper").removeClass('toggled');
                        $("#page-content-wrapper").off('click');
                    });
                }, 100);
            }
        });
    });
</script>
@endpush