<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('hrc.index') }}">
                <img src="/static/user/images/white-logo.png" alt=""/>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
            <ul class="nav navbar-nav navbar-right" style="padding-right: 15px;">
                <li><a href="/">Tổng quan</a></li>
                <li><a href="{{route('partners')}}">Đối tác và bảo trợ</a></li>
                <li><a href="{{route('articles')}}">Tin tức</a></li>
                <li><a href="{{route('jobSelectionTest')}}">Test chọn nghề</a></li>
                <!-- <li><a href="{{route('home.letter')}}">4 năm đại học của tôi</a></li> -->
                <!-- <li><a href="{{route('joins')}}" class="active">Tham dự chung kết</a></li> -->
                @if (Auth::check())
                <li><a href="{{ route('auth.signOut') }}">Thoát</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->
