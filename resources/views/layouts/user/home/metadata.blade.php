<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

<meta name="description" content="@yield('meta:description', 'Ứng viên Tài năng 2017 - CÂU LẠC BỘ NGUỒN NHÂN LỰC (HRC FTU)')" />
<meta name="keywords" content="HRC, FTU, UVTN" />
<!-- <meta name="author" content="Tri Ha (https://github.com/trihtm)" /> -->

<meta property="og:url" content="{{ Request::fullUrl() }}" />
<meta property="og:title" content="@yield('og:title', 'Ứng viên Tài năng 2017 - CÂU LẠC BỘ NGUỒN NHÂN LỰC (HRC FTU)')" />
<meta property="og:description" content="@yield('og:description', 'Ứng viên Tài năng 2017 - CÂU LẠC BỘ NGUỒN NHÂN LỰC (HRC FTU)')" />
<meta property="og:image" content="@yield('og:image', asset('static/user/facebook-thumbnail.png'))" />
<meta property="og:locale" content="vi_vn" />
<meta name="redirect_url" content="{{ route('hrc.index') }}" />
<meta name="redirect_after_auth" content="{{ route('hrc.index') }}" />

@stack('metadata')