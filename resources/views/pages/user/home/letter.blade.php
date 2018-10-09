@extends('layouts.user.home.application')

@section('metadata')
@stop
@section('title')
    4 năm đại học của tôi
@stop
@section('og:title') 4 năm đại học của tôi @endsection

@if($letter)
@section('og:description'){{ str_limit($letter->content, 250) }}@endsection
@section('meta:description'){{ str_limit($letter->content, 250) }}@endsection
@endif
@section('og:image'){{ asset('bg_video/thumb_plane.png') }}@endsection
@section('og:url'){{ url()->current() }}@endsection

@push('styles')
<style>
    body {
        overflow-x: hidden;
        background: transparent;
    }

    #plate.front {
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -o-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        transform: rotateY(0deg);
    }

    .wing {
        background: url('wing1.png') center center no-repeat;

        -webkit-background-size: contain;
        -moz-background-size: contain;
        background-size: contain;
        position: absolute;

        -webkit-transform-origin: 0 0 0;
        -moz-transform-origin: 0 0 0;
        -o-transform-origin: 0 0 0;
        -ms-transform-origin: 0 0 0;
        transform-origin: 0 0 0;
        -webkit-perspective: 1;
        -moz-perspective: 1;
        -ms-perspective: 1;
        -o-perspective: 1;
        perspective: 1;
        -webkit-perspective-origin: 50% 50%;
        -moz-perspective-origin: 50% 50%;
        -ms-perspective-origin: 50% 50%;
        -o-perspective-origin: 50% 50%;
        perspective-origin: 50% 50%;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        backface-visibility: hidden;

        -webkit-transition: all 1.3s linear;
        -moz-transition: all 1.3s linear;
        -o-transition: all 1.3s linear;
        -ms-transition: all 1.3s linear;
        transition: all 1.3s linear;

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        background: none;
        border: none;
        border-top: 240px solid hsla(0, 0%, 0%, 0);
        border-bottom: 0px solid hsla(0, 0%, 0%, 0);
        border-right: 100px solid hsl(0, 0%, 88%);
        width: 0;
        height: 0;
        bottom: 0;
    }

    #container {
        -webkit-perspective: 600;
        -moz-perspective: 600;
        -ms-perspective: 600;
        -o-perspective: 600;
        perspective: 600;
        -webkit-perspective-origin: 200px 131px;
        -moz-perspective-origin: 200px 131px;
        -ms-perspective-origin: 200px 131px;
        -o-perspective-origin: 200px 131px;
        perspective-origin: 200px 131px;

        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transform-style: preserve-3d;

        -webkit-transition: all 0.8s ease-in-out;
        -moz-transition: all 0.8s ease-in-out;
        -o-transition: all 0.8s ease-in-out;
        -ms-transition: all 0.8s ease-in-out;
        transition: all 0.8s ease-in-out;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        backface-visibility: hidden;
        position: relative;
        width: 400px;
        height: 260px;
        top: 200px;
        text-align: center;
        display: block;
        margin: auto;
    }

    .letter-detail-container {
        width: 100%;
        height: 100vh;
    }

    .letter-detail {
        background: linear-gradient(to right, #93e1c8, #91edbe);
        border: solid 1px #fff;
        height: 400px;
        width: 300px;
        padding: 15px;
        margin: auto;
        position: relative;
        margin-top: 100px;
    }

    .letter-content {
        color: #fff;
    }

    #plate {
        z-index: 3;
        background: linear-gradient(to right, #93e1c8, #91edbe);
        border: solid 1px #fff;
        -webkit-transform: rotateY(-180deg);
        -moz-transform: rotateY(-180deg);
        -o-transform: rotateY(-180deg);
        -ms-transform: rotateY(-180deg);
        transform: rotateY(-180deg);
        position: relative;

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        padding: 20px;
        text-align: center;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        backface-visibility: hidden;
        width: 400px;
        height: 260px;
        top: 150px;

        -webkit-transition: all 0.8s ease-in-out;
        -moz-transition: all 0.8s ease-in-out;
        -o-transition: all 0.8s ease-in-out;
        -ms-transition: all 0.8s ease-in-out;
        transition: all 0.8s ease-in-out;
        margin: auto;
    }

    #left-wing, #right-wing {
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transform-style: preserve-3d;
        width: 200px;
        height: 260px;
        display: block;
        position: absolute;
        top: 0px;

        -webkit-transition: all 1s ease-in-out;
        -moz-transition: all 1s ease-in-out;
        -o-transition: all 1s ease-in-out;
        -ms-transition: all 1s ease-in-out;
        transition: all 1s ease-in-out;
    }

    #left-wing {
        -webkit-transform: rotateZ(0deg);
        -moz-transform: rotateZ(0deg);
        -o-transform: rotateZ(0deg);
        -ms-transform: rotateZ(0deg);
        transform: rotateZ(0deg);

        -webkit-transform-origin: 100% 50% 0;
        -moz-transform-origin: 100% 50% 0;
        -o-transform-origin: 100% 50% 0;
        -ms-transform-origin: 100% 50% 0;
        transform-origin: 100% 50% 0;
        left: 0;
    }

    #right-wing {
        -webkit-transform: rotateZ(0deg);
        -moz-transform: rotateZ(0deg);
        -o-transform: rotateZ(0deg);
        -ms-transform: rotateZ(0deg);
        transform: rotateZ(0deg);

        -webkit-transform-origin: 0% 50%;
        -moz-transform-origin: 0% 50%;
        -o-transform-origin: 0% 50%;
        -ms-transform-origin: 0% 50%;
        transform-origin: 0% 50%;
        left: 199px;
    }

    .wing1 {
        -webkit-transform-origin: 100% 100%;
        -moz-transform-origin: 100% 100%;
        -o-transform-origin: 100% 100%;
        -ms-transform-origin: 100% 100%;
        transform-origin: 100% 100%;

        -webkit-transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) skewY(-22.62deg);
        -moz-transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) skewY(-22.62deg);
        -o-transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) skewY(-22.62deg);
        -ms-transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) skewY(-22.62deg);
        transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) skewY(-22.62deg);
    }

    .wing2 {
        -webkit-transform: rotateZ(22.62deg);
        -moz-transform: rotateZ(22.62deg);
        -o-transform: rotateZ(22.62deg);
        -ms-transform: rotateZ(22.62deg);
        transform: rotateZ(22.62deg);

        -webkit-transform-origin: 100% 100%;
        -moz-transform-origin: 100% 100%;
        -o-transform-origin: 100% 100%;
        -ms-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
        border-left: 100px solid hsl(0, 0%, 88%);
        border-right: none;
        left: 100px;
    }

    .wing3 {
        -webkit-transform: rotateZ(-22.62deg);
        -moz-transform: rotateZ(-22.62deg);
        -o-transform: rotateZ(-22.62deg);
        -ms-transform: rotateZ(-22.62deg);
        transform: rotateZ(-22.62deg);

        -webkit-transform-origin: 0% 100%;
        -moz-transform-origin: 0% 100%;
        -o-transform-origin: 0% 100%;
        -ms-transform-origin: 0% 100%;
        transform-origin: 0% 100%;
        border-right: 100px solid hsl(0, 0%, 88%);
    }

    .wing4 {
        -webkit-transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) skewY(22.62deg);
        -moz-transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) skewY(22.62deg);
        -o-transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) skewY(22.62deg);
        -ms-transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) skewY(22.62deg);
        transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) skewY(22.62deg);

        -webkit-transform-origin: 0% 100%;
        -moz-transform-origin: 0% 100%;
        -o-transform-origin: 0% 100%;
        -ms-transform-origin: 0% 100%;
        transform-origin: 0% 100%;
        border-right: none;
        border-left: 100px solid hsl(0, 0%, 88%);
        left: 100px;
    }

    #container.hover #left-wing {
        -webkit-transform: rotateY(60deg);
        -moz-transform: rotateY(60deg);
        -o-transform: rotateY(60deg);
        -ms-transform: rotateY(60deg);
        transform: rotateY(60deg);
    }

    #container.hover #right-wing {
        -webkit-transform: rotateY(-60deg);
        -moz-transform: rotateY(-60deg);
        -o-transform: rotateY(-60deg);
        -ms-transform: rotateY(-60deg);
        transform: rotateY(-60deg);
    }

    #container.hover.fly_away_first {
        -webkit-transform: translatex(-100px) translateZ(200px) rotateX(42deg) rotateY(-11deg) rotateZ(27deg);
        -moz-transform: translatex(-100px) translateZ(200px) rotateX(42deg) rotateY(-11deg) rotateZ(27deg);
        -o-transform: translatex(-100px) translateZ(200px) rotateX(42deg) rotateY(-11deg) rotateZ(27deg);
        -ms-transform: translatex(-100px) translateZ(200px) rotateX(42deg) rotateY(-11deg) rotateZ(27deg);
        transform: translatex(-100px) translateZ(200px) rotateX(42deg) rotateY(-11deg) rotateZ(27deg);

        -webkit-transition-delay: 0;
        -moz-transition-delay: 0;
        -o-transition-delay: 0;
        -ms-transition-delay: 0;
        transition-delay: 0;

        -webkit-transition-duration: 0.4s;
        -moz-transition-duration: 0.4s;
        -o-transition-duration: 0.4s;
        -ms-transition-duration: 0.4s;
        transition-duration: 0.4s;

        -webkit-transition-timing-function: ease-out;
        -moz-transition-timing-function: ease-out;
        -o-transition-timing-function: ease-out;
        -ms-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }

    #container.hover.fly_away_first.fly_away {
        -webkit-transform: translateX(600px) translateY(-1900px) translateZ(-5000px) rotateX(66deg) rotateY(-12deg) rotateZ(36deg);
        -moz-transform: translateX(600px) translateY(-1900px) translateZ(-5000px) rotateX(66deg) rotateY(-12deg) rotateZ(36deg);
        -o-transform: translateX(600px) translateY(-1900px) translateZ(-5000px) rotateX(66deg) rotateY(-12deg) rotateZ(36deg);
        -ms-transform: translateX(600px) translateY(-1900px) translateZ(-5000px) rotateX(66deg) rotateY(-12deg) rotateZ(36deg);
        transform: translateX(600px) translateY(-1900px) translateZ(-5000px) rotateX(66deg) rotateY(-12deg) rotateZ(36deg);

        -webkit-transition: -webkit-transform 2s ease-out, opacity 1.5s 0.5s linear;
        -moz-transition: -moz-transform 2s ease-out, opacity 1.5s 0.5s linear;
        -o-transition: -o-transform 2s ease-out, opacity 1.5s 0.5s linear;
        -ms-transition: -ms-transform 2s ease-out, opacity 1.5s 0.5s linear;
        transition: transform 2s ease-out, opacity 1.5s 0.5s linear;
        opacity: 0;
    }

    /*#footer {*/
    /*background: #fff;*/
    /*}*/

    /*html {*/
    /*height: 100%;*/
    /*width: 100%;*/
    /*background-color: #001;*/

    /*background-image: -webkit-radial-gradient(white 2%, transparent 3%), -webkit-radial-gradient(white 1%, transparent 2%), -webkit-radial-gradient(white 2%, transparent 3%);*/
    /*background-image: -moz-radial-gradient(white 2%, transparent 3%), -moz-radial-gradient(white 1%, transparent 2%), -moz-radial-gradient(white 2%, transparent 3%);*/
    /*background-image: -o-radial-gradient(white 2%, transparent 3%), -o-radial-gradient(white 1%, transparent 2%), -o-radial-gradient(white 2%, transparent 3%);*/
    /*background-image: -ms-radial-gradient(white 2%, transparent 3%), -ms-radial-gradient(white 1%, transparent 2%), -ms-radial-gradient(white 2%, transparent 3%);*/
    /*background-image: radial-gradient(white 2%, transparent 3%), radial-gradient(white 1%, transparent 2%), radial-gradient(white 2%, transparent 3%);*/

    /*-webkit-background-size: 100px 100px;*/
    /*-moz-background-size: 100px 100px;*/
    /*background-size: 100px 100px;*/
    /*background-position: 0 0, 20px 50px, 60px 10px;*/
    /*}*/

    body {
        -webkit-perspective: 800;
        -webkit-perspective-origin: 50% 50%;

        /*background-image: -webkit-linear-gradient(hsla(0, 0%, 13%, 1) 0%,hsla(0, 0%, 16%, 0.71) 50%,hsl(0, 0%, 34%) 50%, hsl(0, 0%, 15%) 100%);*/
        /*background-image: -moz-linear-gradient(hsla(0, 0%, 13%, 1) 0%,hsla(0, 0%, 16%, 0.71) 50%,hsl(0, 0%, 34%) 50%, hsl(0, 0%, 15%) 100%);*/
        /*background-image: -o-linear-gradient(hsla(0, 0%, 13%, 1) 0%,hsla(0, 0%, 16%, 0.71) 50%,hsl(0, 0%, 34%) 50%, hsl(0, 0%, 15%) 100%);*/
        /*background-image: -ms-linear-gradient(hsla(0, 0%, 13%, 1) 0%,hsla(0, 0%, 16%, 0.71) 50%,hsl(0, 0%, 34%) 50%, hsl(0, 0%, 15%) 100%);*/
        /*background-image: linear-gradient(hsla(0, 0%, 13%, 1) 0%,hsla(0, 0%, 16%, 0.71) 50%,hsl(0, 0%, 34%) 50%, hsl(0, 0%, 15%) 100%);*/
        /*height: 100%;*/
    }

    #container.hover .wing1 {
        -webkit-transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) rotateY(-60deg) skewY(-22.62deg);
        -moz-transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) rotateY(-60deg) skewY(-22.62deg);
        -o-transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) rotateY(-60deg) skewY(-22.62deg);
        -ms-transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) rotateY(-60deg) skewY(-22.62deg);
        transform: translateY(-38px) translateX(8px) rotateZ(22.62deg) rotateY(-60deg) skewY(-22.62deg);
        border-right: 100px solid hsl(0, 0%, 95%);
    }

    #container.hover .wing2 {
        border-left: 100px solid hsl(0, 0%, 85%);
    }

    #container.hover .wing3 {
        border-right: 100px solid hsl(0, 0%, 71%);
    }

    #container.hover .wing4 {
        -webkit-transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) rotateY(60deg) skewY(20deg);
        -moz-transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) rotateY(60deg) skewY(20deg);
        -o-transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) rotateY(60deg) skewY(20deg);
        -ms-transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) rotateY(60deg) skewY(20deg);
        transform: translateY(-38px) translateX(-8px) rotateZ(-22.62deg) rotateY(60deg) skewY(20deg);
        border-left: 100px solid hsl(0, 0%, 95%);
    }

    #container.hover {
        -webkit-transform: rotateX(54deg) rotateY(-10deg) rotateZ(25deg);
        -moz-transform: rotateX(54deg) rotateY(-10deg) rotateZ(25deg);
        -o-transform: rotateX(54deg) rotateY(-10deg) rotateZ(25deg);
        -ms-transform: rotateX(54deg) rotateY(-10deg) rotateZ(25deg);
        transform: rotateX(54deg) rotateY(-10deg) rotateZ(25deg);

        -webkit-transition-delay: 0.5s;
        -moz-transition-delay: 0.5s;
        -o-transition-delay: 0.5s;
        -ms-transition-delay: 0.5s;
        transition-delay: 0.5s;
    }

    #container.beginning {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }

    .message {
        width: 100%;
        padding: 10px;

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        height: 140px;
        -webkit-font-smoothing: subpixel-antialiased;
        -moz-font-smoothing: subpixel-antialiased;
        -ms-font-smoothing: subpixel-antialiased;
        -o-font-smoothing: subpixel-antialiased;
        font-smoothing: subpixel-antialiased;
        font-size: 14px;
        font-family: Helvetica, Arial, Verdana;
        line-height: 20px;
    }

    /*.send {*/
    /*-webkit-appearance: none;*/
    /*-moz-appearance: none;*/
    /*-ms-appearance: none;*/
    /*-o-appearance: none;*/
    /*appearance: none;*/

    /*-webkit-transition: all 0.3s ease-in-out;*/
    /*-moz-transition: all 0.3s ease-in-out;*/
    /*-o-transition: all 0.3s ease-in-out;*/
    /*-ms-transition: all 0.3s ease-in-out;*/
    /*transition: all 0.3s ease-in-out;*/
    /*border: 2px solid hsl(194, 100%, 72%);*/
    /*margin: 15px 0;*/
    /*padding: 10px;*/
    /*font-size: 20px;*/
    /*background-color: hsl(0, 0%, 94%);*/
    /*}*/

    /*.send:active {*/
    /*-webkit-transform: scale(0.85);*/
    /*-moz-transform: scale(0.85);*/
    /*-o-transform: scale(0.85);*/
    /*-ms-transform: scale(0.85);*/
    /*transform: scale(0.85);*/

    /*-webkit-transition: all 10ms ease-in-out;*/
    /*-moz-transition: all 10ms ease-in-out;*/
    /*-o-transition: all 10ms ease-in-out;*/
    /*-ms-transition: all 10ms ease-in-out;*/
    /*transition: all 10ms ease-in-out;*/
    /*background-color: hsl(0, 0%, 85%);*/
    /*border: 2px solid hsl(194, 30%, 55%);*/
    /*}*/

    .curvable.top_left {
        -webkit-transform-origin: 100px 112px;
        -moz-transform-origin: 100px 112px;
        -o-transform-origin: 100px 112px;
        -ms-transform-origin: 100px 112px;
        transform-origin: 100px 112px;

        -webkit-transition-delay: 1300ms;
        -moz-transition-delay: 1300ms;
        -o-transition-delay: 1300ms;
        -ms-transition-delay: 1300ms;
        transition-delay: 1300ms;
        width: 0;
        height: 0;
        top: 0;
        border-right: 202px solid hsla(0, 0%, 0%, 0);
        border-bottom: 202px solid hsla(0, 0%, 0%, 0);
        border-top: 223px solid hsl(0, 0%, 88%);
    }

    .curvable {
        -webkit-transition: -webkit-transform 800ms ease-out;
        -moz-transition: -moz-transform 800ms ease-out;
        -o-transition: -o-transform 800ms ease-out;
        -ms-transition: -ms-transform 800ms ease-out;
        transition: transform 800ms ease-out;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        backface-visibility: hidden;
        position: absolute;
        background-color: transparent;
        z-index: 0;
        width: 0;
    }

    .top_right.curvable {
        right: 0;
        border-left: 202px solid hsla(0, 0%, 0%, 0);
        border-bottom: 202px solid hsla(0, 0%, 0%, 0);
        border-top: 224px solid hsl(0, 0%, 88%);

        -webkit-transform-origin: 96px 112px;
        -moz-transform-origin: 96px 112px;
        -o-transform-origin: 96px 112px;
        -ms-transform-origin: 96px 112px;
        transform-origin: 96px 112px;

        -webkit-transition-delay: 1650ms;
        -moz-transition-delay: 1650ms;
        -o-transition-delay: 1650ms;
        -ms-transition-delay: 1650ms;
        transition-delay: 1650ms;
    }

    .bottom_left.curvable {
        -webkit-transform-origin: 109px 0;
        -moz-transform-origin: 109px 0;
        -o-transform-origin: 109px 0;
        -ms-transform-origin: 109px 0;
        transform-origin: 109px 0;

        -webkit-transition-delay: 2100ms;
        -moz-transition-delay: 2100ms;
        -o-transition-delay: 2100ms;
        -ms-transition-delay: 2100ms;
        transition-delay: 2100ms;
        width: 109px;
        height: 38px;
        background: hsl(0, 0%, 88%);
        bottom: 0;
        left: 0;
    }

    .bottom_left.curvable:after {
        position: absolute;
        content: "";
        border-right: 92px solid hsla(0, 0%, 0%, 0);
        border-bottom: 39px solid hsl(0, 0%, 88%);
        border-top: 37px solid hsla(0, 0%, 0%, 0);
        left: 109px;
        bottom: 0;
    }

    .bottom_right.curvable {
        -webkit-transform-origin: 0px 0;
        -moz-transform-origin: 0px 0;
        -o-transform-origin: 0px 0;
        -ms-transform-origin: 0px 0;
        transform-origin: 0px 0;

        -webkit-transition-delay: 2450ms;
        -moz-transition-delay: 2450ms;
        -o-transition-delay: 2450ms;
        -ms-transition-delay: 2450ms;
        transition-delay: 2450ms;
        width: 109px;
        height: 38px;
        background: hsl(0, 0%, 88%);
        bottom: 0;
        right: 0;

    }

    .bottom_right.curvable:after {
        position: absolute;
        content: "";
        border-left: 92px solid hsla(0, 0%, 0%, 0);
        border-bottom: 39px solid hsl(0, 0%, 88%);
        border-top: 37px solid hsla(0, 0%, 0%, 0);
        left: -92px;
        bottom: 0;
    }

    .top_left.curvable.curved {
        -webkit-transform: rotate3d(1, -1.11, 0, 180deg);
        -moz-transform: rotate3d(1, -1.11, 0, 180deg);
        -o-transform: rotate3d(1, -1.11, 0, 180deg);
        -ms-transform: rotate3d(1, -1.11, 0, 180deg);
        transform: rotate3d(1, -1.11, 0, 180deg);
    }

    .bottom_left.curvable.curved {
        -webkit-transform: rotate3d(2.4867, 1, 0, -180deg);
        -moz-transform: rotate3d(2.4867, 1, 0, -180deg);
        -o-transform: rotate3d(2.4867, 1, 0, -180deg);
        -ms-transform: rotate3d(2.4867, 1, 0, -180deg);
        transform: rotate3d(2.4867, 1, 0, -180deg);
    }

    .bottom_right.curvable.curved {
        -webkit-transform: rotate3d(-2.4867, 1, 0, 180deg);
        -moz-transform: rotate3d(-2.4867, 1, 0, 180deg);
        -o-transform: rotate3d(-2.4867, 1, 0, 180deg);
        -ms-transform: rotate3d(-2.4867, 1, 0, 180deg);
        transform: rotate3d(-2.4867, 1, 0, 180deg);
    }

    .top_right.curvable.curved {
        -webkit-transform: rotate3d(1, 1.11, 0, 180deg);
        -moz-transform: rotate3d(1, 1.11, 0, 180deg);
        -o-transform: rotate3d(1, 1.11, 0, 180deg);
        -ms-transform: rotate3d(1, 1.11, 0, 180deg);
        transform: rotate3d(1, 1.11, 0, 180deg);
    }

    #container.hover .wing {
        -webkit-backface-visibility: visible;
        -moz-backface-visibility: visible;
        -ms-backface-visibility: visible;
        -o-backface-visibility: visible;
        backface-visibility: visible;
    }

    #container.hover .curved {
        display: none;
    }

    #codepen_link {
        text-decoration: none;
        font-size: 22px;
        vertical-align: bottom;
    }

    #bottom {
        position: absolute;
        right: 7px;
        bottom: 0;
        width: 30px;
        height: 30px;
    }

    video {
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        /*width: 115%;*/
        /*height: 100vh;*/
        z-index: -100;
        transform: translateX(-50%) translateY(-50%);
        background: url(http://uvtn.hrc.com.vn/bg_video/anh_may_bay.jpg) no-repeat;
        background-size: cover;
        transition: 1s opacity;
    }

    .intro h2, .intro h5, .intro p, .message-success {
        text-align: center;
        color: #fff;
        text-shadow: 0px 1px 1px #00000082;
    }

    .intro h5 {
        font-weight: bold;
        font-size: 18px;
    }

    .intro h2 {
        font-weight: bold;
    }

    .intro-container {

        display: table;
        height: 100vh;
        width: 100%;
    }

    .intro {
        display: table-cell;
        vertical-align: middle;
    }

    #footer {
        background: #fff;
    }

    .show-my-letter-container {
        position: absolute;
        bottom: 30px;
        right: 0;
        text-align: center;
    }

    a#show-my-letter {
        padding: 6px 10px;
        background: #20a286;
        color: #fff;
        border-radius: 100%;
        font-size: 20px;
        box-shadow: 1px 1px 1px #3333336b;
        cursor: pointer;
    }

    .close-detail {
        position: absolute;
        right: -10px;
        top: -10px;
        color: #20a286;
        width: 20px;
        height: 20px;
        text-align: center;
        background: #fff;
        font-size: 18px;
        line-height: 1;
        font-weight: bold;
        border-radius: 100%;
        box-shadow: 1px 1px 1px #33333340;
        cursor: pointer;
    }
    .mCSB_inside>.mCSB_container {
        margin-right: 15px!important;
        text-align: justify;
    }
</style>
<link rel="stylesheet" href="/bower_components/custom-scroll/jquery.mCustomScrollbar.min.css"/>
@endpush
@push('scripts')
<script type="text/javascript" src="/bower_components/custom-scroll/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
    //Of course I can code this more programatically, but this seems good to me.
    var submittedId;
    $().ready(function () {
        $('.send').click(function () {
            $.ajax({
                type: 'POST',
                url: '{!! action('User\Hrc\LetterController@submitLetter') !!}',
                data: {content: $('#letter-content').val()},
                success: function (response) {
                    setTimeout(function () {
                        $('#plate').removeClass('front').fadeOut();
                        $('#container').removeClass('beginning');
                        $('.curvable').addClass('curved');
                        setTimeout(function () {
                            $('#container').addClass('hover');
                            setTimeout(function () {
                                $('#container').addClass('fly_away_first');
                                setTimeout(function () {
                                    $('#container').addClass('fly_away');
                                    setTimeout(function () {
                                        //$('#plate').addClass('front');
                                        $('#container').removeClass('fly_away fly_away_first hover').addClass('beginning');
                                        $('.curvable').removeClass('curved');
                                        $('.message-success').show();
                                        $('.show-my-letter-container').show();
                                        submittedId = response.result.id;
                                    }, 3000);
                                }, 600);
                            }, 2000);
                        }, 2800);
                    }, 200);
                }
            });
        });
    });
    $('#show-my-letter').click(function () {
        showContent($('#letter-content').val());
        $('.message-success').hide();
        $('.letter-container').hide();
        currentId = submittedId;
    });

    $('.close-detail').click(function (e) {
        hideContent();
        e.stopPropagation();
    });

    function showContent(content) {
        $('.letter-content').html(content);
        $('.letter-detail-container').show();
        $('.intro-container').hide();
        $('.letter-container').hide();
    }

    function hideContent() {
        $('.letter-detail-container').hide();
        $('.letter-container').hide();
        $('.intro-container').show();
    }

    var currentId;

    $('.container-fluid').eq(0).click(function () {
        if($('#plate').is(':visible')) return false;
        $.ajax({
            type: 'GET',
            url: '{!! action('User\Hrc\LetterController@getRandomLetter') !!}',
            success: function (response) {
                if (response.result) {
                    showContent(response.result.content);
                    currentId = response.result.id;
                }
            }
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

    function showForm() {
        $('.intro-container').hide();
        $('.letter-container').show();
        $('.show-my-letter-container').hide();
        $('#letter-content').val('');
        $('#plate').addClass('front').show();
        $('.message-success').hide();
    }

    function share(e) {
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + window.location.href.split('?')[0] + '?story=' + currentId);
        e.stopPropagation();
    }

    @if ($letter)
        showContent(`{{ trim($letter->content) }}`);
        currentId = '{{ $letter->id }}';
    @endif

    $('.letter-content-container').mCustomScrollbar({
        setHeight: 300,
        autoHideScrollbar: true,
        theme: "dark",
        scrollInertia: 400,
        advanced: {
            updateOnContentResize: true
        }
    });


</script>
@endpush

@section('title')
@stop

@section('scripts')
    @parent
@stop

@section('content')
    <div style="position: relative;">
        <video poster="http://uvtn.hrc.com.vn/bg_video/anh_may_bay.jpg" id="bgvid" playsinline autoplay muted loop>
            <source src="http://uvtn.hrc.com.vn/bg_video/plane_bg.mp4" type="video/mp4">
        </video>
        <div class="intro-container">
            <div class="intro">
                <h2>Người ta nói, bốn năm đại học, nhất định phải một lần lấy được học bổng,
                    <br/>
                    rớt một môn, yêu một người, chia tay một lần thì mới hoàn chỉnh.</h2>
                <br/><br/>
                <h5>Có những câu chuyện, những ước mơ tuổi trẻ đang được chia sẻ.<br/>

                    Câu chuyện của bạn, cũng đang chờ được lắng nghe.</h5>
                <br/>
                <p><a href="javascript:void(0);" onclick="showForm();event.stopPropagation();" class="btn btn-default btn-join">Chia sẻ</a></p>
                <br/><br/><br/><br/><br/><br/>
                <p>Muốn đọc câu chuyện của mọi người? Bấm vào màn hình để chọn một chiếc máy bay</p>
            </div>
        </div>
        <div class="container letter-container" style="height: 600px;display:none;position:relative;">
            <div class="show-my-letter-container" onClick="event.stopPropagation();" style="display:none;">
                <a class="javascript:void(0);" id="show-my-letter"><span class="fa fa-send"></span></a><br/><br/>
                <p style="color:#fff;text-shadow: 0px 1px 1px #00000082;">Xem lại chia sẻ của bạn</p>
            </div>
            <h3 class="message-success" style="display:none;margin-top: 230px;">Bạn có muốn lắng nghe câu chuyện của
                người
                khác?
                <br/>
                Bấm vào màn hình để chọn một chiếc máy bay</h3>
            <div id="plate" class="front" onclick="event.stopPropagation();">
                <span class="close-detail">&times;</span>
                <h4 style="margin-top:0;color:#fff;"><b>Viết chia sẻ của bạn tại đây</b></h4>
            <textarea id="letter-content" style="width: 100%;height: 140px;">Dear John Doe,
I don't know who you are but you're somehow very famous. I just want to meet you. Just let me know if you're reading my message.
Best Regards
Cihad
            </textarea><br/>
                <a href="javascript:void(0);" style="margin-top: 5px;" class="btn btn-default btn-join send">Chia sẻ</a>
            </div>

            <div id="container" class="beginning">
                <div id="left-wing">
                    <div class="top_left curvable"></div>
                    <div class="bottom_left curvable"></div>
                    <div class="wing wing1"></div>
                    <div class="wing wing2"></div>
                </div>

                <div id="right-wing">
                    <div class="top_right curvable"></div>
                    <div class="bottom_right curvable"></div>
                    <div class="wing wing3"></div>
                    <div class="wing wing4"></div>
                </div>

            </div>
        </div>
        <div class="letter-detail-container" style="display: none;">
            <div class="letter-detail" onclick="event.stopPropagation();">
                <span class="close-detail">&times;</span>
                <div class="letter-content-container">
                    <p class="letter-content"></p>
                </div>
                <br/>
                <div class="text-center">
                    <a href="https://www.facebook.com/hrc.fanpage/" onClick="share();" target="blank"
                       class="btn btn-default share-result"
                       style="color: #5151a3;"><i class="fa fa-facebook-square"></i> CHIA SẺ</a>
                </div>
            </div>
        </div>
    </div>
@stop
