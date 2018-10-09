<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', \Config::get('site.name', ''))</title>

        @include('layouts.user.home.metadata')

        @include('layouts.user.home.styles')

        @stack('styles')

        <meta name="csrf-token" content="{!! csrf_token() !!}" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="{!! isset($bodyClasses) ? $bodyClasses : '' !!}">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        @if( isset($noFrame) && $noFrame == true )
            @yield('content')
        @else
            @include('layouts.user.home.frame')
        @endif

        @stack('modal')

        @include('layouts.user.home.scripts')

        @stack('scripts')

        @include('layouts.user.home.scripts-social')
    </body>
</html>
