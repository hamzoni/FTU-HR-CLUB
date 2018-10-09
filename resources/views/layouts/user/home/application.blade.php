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
        <div class="container-fluid">
            <div class="row">
                @include('layouts.user.home.navbar')

                @yield('content')
            </div>
        </div>

        @include('layouts.user.home.footer')
        @stack('modal')

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '127251824645950');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=127251824645950&ev=PageView&noscript=1"
            /></noscript>
        <!-- End Facebook Pixel Code -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108870322-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-108870322-1');
        </script>
		
		<script src="//load.sumome.com/" data-sumo-site-id="424738ffd3effd627d7d7bde5d852c9057042788cd85d22742f32fa24b0797b2" async="async"></script>

        @include('layouts.user.home.scripts')
        @include('layouts.user.home.scripts-social')
        @stack('scripts')
    </body>
</html>
