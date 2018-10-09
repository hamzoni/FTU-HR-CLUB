@php($bodyClasses = 'hrcPageHome')
@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var heightColFirst = $(".col-md-first").height();
        var secondCol = (heightColFirst/2) - 1;
        $(".col-md-second-horizontal .thumb.bg").css({
            'height':secondCol
        });
        $(".col-md-second-vertical .thumb.bg").css({
            'height':heightColFirst - 1
        });
    });
</script>
@endpush
@section('title', config('site.name_page_articles'))
@section('content')
    <div class="partner-header-text">
        <h1 class="text-center color-white mgr-0">
            Tin tức
        </h1>
    </div>
    <div class="articles-section articles-index">
        <div class="articles">
            <div class="row">
                <div class="col-md-6 col-md-first">
                    @if(!empty($headerArticles[0]))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="article">
                                <div class="thumb bg" style="background-image: url('{{asset($headerArticles[0]->images_url)}}'); height:300px;"></div>
                                <div class="col-xs-12">
                                    <h4><a href="{{route('newsDetail', [$headerArticles[0]->slug])}}" class="article-title">{{ $headerArticles[0]->title }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        @if(!empty($headerArticles[1]))
                        <div class="col-md-6">
                            <div class="article">
                                <div class="thumb">
                                    <div class="thumb bg" style="background-image: url('{{asset($headerArticles[1]->images_url)}}'); height:300px;"></div>
                                </div>
                                <div class="col-xs-12">
                                    <h4><a href="{{route('newsDetail', [$headerArticles[1]->slug])}}" class="article-title">{{ $headerArticles[1]->title }}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endif
                            @if(!empty($headerArticles[2]))
                        <div class="col-md-6">
                            <div class="article">
                                <div class="thumb bg" style="background-image: url('{{asset($headerArticles[2]->images_url)}}'); height:300px;"></div>
                                <div class="col-xs-12">
                                    <h4><a href="{{route('newsDetail', [$headerArticles[2]->slug])}}" class="article-title">{{ $headerArticles[2]->title }}</a></h4>
                                </div>
                            </div>
                        </div>
                            @endif
                    </div>

                </div>
                <div class="col-md-6 col-md-second">
                    @if(!empty($headerArticles[3]))
                    <div class="col-md-6 col-md-second-vertical">
                        <div class="article">
                            <div class="thumb bg" style="background-image: url('{{asset($headerArticles[3]->images_url)}}')"></div>
                            <div class="col-xs-12">
                                <h4><a href="{{route('newsDetail', [$headerArticles[3]->slug])}}" class="article-title">{{ $headerArticles[3]->title }}</a></h4>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-6 col-md-second-horizontal">
                        @if(!empty($headerArticles[4]))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="article">
                                    <div class="thumb bg" style="background-image: url('{{asset($headerArticles[4]->images_url)}}')"></div>
                                    <div class="col-xs-12">
                                        <h4><a href="{{route('newsDetail', [$headerArticles[4]->slug])}}" class="article-title">{{ $headerArticles[4]->title }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                            @if(!empty($headerArticles[5]))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="article">
                                    <div class="thumb bg" style="background-image: url('{{asset($headerArticles[5]->images_url)}}')"></div>
                                    <div class="col-xs-12">
                                        <h4><a href="{{route('newsDetail', [$headerArticles[5]->slug])}}" class="article-title">{{ $headerArticles[5]->title }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endif
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="wrap-list-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        @foreach( $bodyArticles as $article)
                            <div class="item-article">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="date-create col-md-1">
                                            <span class="dd">{{ $article->created_at->format('d')}}</span>
                                            <span class="mm">t{{ $article->created_at->format('m')}}</span>
                                            <span class="yyyy">{{ $article->created_at->format('Y')}}</span>
                                        </div>
                                        <div class="thumail col-md-11">
                                            <img src="{{asset($article->images_url)}}" alt="{{$article->title}}">
                                        </div>
                                    </div>
                                    <div class="article-caption col-xs-6">
                                        <h4><a href="{{route('newsDetail',$article->slug)}}" class="article-title">{{$article->title}}</a></h4>
                                        <div class="list-tags">
                                            <a>#AssessmentCamp</a>  <a>#HumansofUVTN</a>
                                        </div>
                                        <p>{{$article->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <br/>
                        {{ $bodyArticles->links() }}
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
@stop


