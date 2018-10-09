@php($bodyClasses = 'hrcPageHome')
@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])

@section('title', $model->title)
@section('content')
    <div class="articles-section-detail">
        <div class="articles-section-detail-images">
            <div class="container">
                <h1 class="text-center color-white mgr-0">
                    {{$model->title}}
                </h1>
            </div>
        </div>
        <div class="articles-detail">
            <div class="container">
                <div class="row">
                    <div class="date-create col-md-1">
                        <span class="dd">{{ $model->created_at->format('d')}}</span>
                        <span class="mm">t{{ $model->created_at->format('m')}}</span>
                        <span class="yyyy">{{ $model->created_at->format('Y')}}</span>
                    </div>
                    <div class="col-md-9">
                        <div class="desc">
                            {{$model->description}}
                        </div>
                        <div class="content">
                            {!!  $model->content !!}
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        <div class="articles-relate">

            @if($articlePrevious || $articleNext)
            <div class="container">
                <div class="row">
                    @if($articlePrevious)
                    <div class="col-md-4">
                       <div class="item-article">
                            <div class="row">
                            <div class="col-xs-6">
                                <div class="thumbnail">
                                    <img src="{{asset($articlePrevious->images_url?$articlePrevious->images_url:'')}}" alt="{{$articlePrevious->title}}">
                                </div>
                            </div>
                            <div class="article-caption col-xs-6">
                                <p>Tin trước đó</p>
                                <h4><a href="{{route('newsDetail',$articlePrevious->slug)}}" class="article-title">{{$articlePrevious->title}}</a></h4>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-4">
                        <div class="text-center">
                            <p>Quay trở lại</p>
                            <a href="{{route('articles')}}">Tin tức</a>
                        </div>
                    </div>
                        @if($articleNext)
                    <div class="col-md-4">
                        <div class="item-article">
                            <div class="row">
                                <div class="article-caption col-xs-6">
                                    <p>Tin tiếp theo</p>
                                    <h4><a href="{{route('newsDetail',$articleNext->slug)}}" class="article-title">{{$articleNext->title}}</a></h4>
                                </div>
                                <div class="col-xs-6">
                                    <div class="thumbnail">
                                        <img src="{{asset($articleNext->images_url?$articleNext->images_url:'')}}" alt="{{$articleNext->title}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                </div>
            </div>
            @endif
        </div>
    </div>

@stop
@push('styles')
<style type="text/css">
    .articles-section-detail-images{
        background-image: url("{{asset($model->images_url)}}");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height:450px;
        position: relative;
    }
    .articles-section-detail-images h1.text-center{
        position: absolute;
        bottom: 30px;
    }
    .articles-detail{
        padding-top: 50px;
    }
    .articles-detail .date-create{
        font-weight: bold;
        padding: 5px 0px;
        border-top: 1px solid #e5e5e5;
        border-bottom: 1px solid #e5e5e5;
        box-shadow: 0px 1px 2px -1px rgba(0,0,0,0.75);
        width: 50px;
        text-align: center;
    }
    .articles-detail .date-create span.dd{
        font-size: 25px;
    }
    .articles-detail .date-create span.mm{
        font-size: 25px;
        font-weight: lighter;
    }
    .articles-detail .col-md-9{
        padding-left: 30px;
    }

    .articles-detail .col-md-9 .desc{
        font-weight: bold;
        font-size: larger;
    }
    .articles-detail .col-md-9 .content{
        margin-top: 15px;
        line-height: 25px;
    }
    .articles-relate .container{
        padding-top: 15px;
        border-top:1px solid #e5e5e5;
    }
    .articles-relate p{
        color:#ccc;
    }
    .articles-relate a{
        font-weight: bold;
        color: #333;
    }
    .articles-relate .thumbnail{
        border:none;
    }
    
</style>
@endpush


