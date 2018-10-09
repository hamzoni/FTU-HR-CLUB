@php($bodyClasses = 'hrcPageHome')
@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])

@section('content')
    <div class="intro-section final-intro-section">
        <video poster="http://uvtn.dev/bg_video/bg_video.png" id="bgvid" playsinline="" autoplay="" muted="" loop="">
            <source src="final/top6.mp4" type="video/mp4">
        </video>
        <div class="col-sm-push-1 col-sm-7 logo-slogan">
            <div>
                <h1>Bước ngoặt<br/>Đến từ <span id="switch-text">yêu thương</span></h1>
                <p class="text-description">Chính thức lộ diện 6 gương mặt của Đêm Chung kết Ứng viên Tài năng 2017
                     Ai sẽ là người bản lĩnh dám thay đổi chính mình? Ai sẽ gương mặt tiếp theo truyền cảm hứng cho thế hệ sinh viên bước ra thế giới? Ai sẽ là quán quân của UVTN 2017</p>
                <br>
                <br>
                <a href="/joins" class="btn btn-default btn-join btn-white">Đăng kí tham dự Chung kết</a>
                <a href="/articles" class="btn btn-default btn-join btn-transparent">Top 6 Ứng viên Tài năng là ai?</a>
                <!-- <a href="javascript:;" class="btn btn-default btn-join btn-transparent subscribe-open">Đăng kí nhận thông báo</a> -->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="top32-section">
        <h2>Chào mừng đến với Top 6</h2>
        <div class="top-list">
            @foreach ($top32 as $item)
                <div class="top-item">
                    @if($item->url)
                        <a href="{{ $item->url }}">
                            <div class="overlay"></div>
                        </a>
                    @endif
                    <img src="{{ asset('final/avatar/'.$item->image) }}" class="avatar"/>
                    <a href="{{ $item->linkedin }}" target="_blank"><span class="linkedin"><span
                                    class="fa fa-linkedin-square"></span> </span></a>

                    <div class="top-info">
                        <p class="name">{{ $item->name }}</p>
                        <p class="university">{{ $item->university }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="process-section">
        <img class="background" src="/final/challenger-recruitment.jpg" height="100%" style="display: none;">
        <img class="background" src="/final/challenger-pro.jpg" height="100%" style="display: none;">
        <img class="background" src="/final/challenger-assessors.jpg" height="100%">
        <img class="background" src="/final/challenger-training.jpg" height="100%" style="display: none;">
        <img class="background" src="/final/challenger-connect.jpg" height="100%" style="display: none;">

        <div class="col-md-offset-6 col-sm-6" style="background: #fff;">
            <div class="process-slider">
                <h2>Đêm chung kết</h2>
                <p class="text-description">Chứng kiến bước ngoặt đổi thay cùng Top 6</p>
                <div class="process-slider-content owl-carousel">
                    <div>
                        <!-- <h3>Tuyển dụng</h3> -->
                        <p>Sau Assessment Camp, 6 ứng viên xuất sắc nhất sẽ được chọn lựa để bước vào Đêm Chung kết, diễn ra vào ngày 16/12/2017 - sân khấu nơi họ chứng tỏ bản thân để chinh phục nhà tuyển dụng và chinh phục khán giả.</p>
                        <p>Tham gia đêm Chung kết, bạn sẽ hiểu được hiểu được Nhà tuyển dụng đánh giá những gì ở một Ứng viên và như thế nào là một ứng viên tài năng trong mắt Nhà Tuyển dụng thông qua 3 vòng thi:</p>
                    </div>
                    <div>
                        <h3>Vòng 1: Thử thách Kinh doanh và Đánh giá năng lực chuyên môn</h3>
                        <p>Trước khi trở thành một Ứng viên Tài năng, bản thân họ cần là một ứng viên sáng giá trong ngành nghề mình theo đuổi. Chính vì vậy, trong vòng thi này Top 6 chia làm 2 đội, mỗi đội sẽ tiến hành giải case mà ban tổ chức đưa ra từ trước, sau đó thuyết trình, phản biện lại đội bạn và trả lời câu hỏi của Ban giám khảo.</p>
                    </div>
                    <div>
                        <h3>Vòng 2: Kĩ năng giao tiếp, ứng xử và giải quyết vấn đề liên quan đến con người trong công việc</h3>
                        <p>Với các Nhà tuyển dụng, một Ứng viên Tài năng không chỉ giỏi về năng lực chuyên môn mà còn phải có thái độ làm việc chuyên nghiệp, khéo léo. 6 Ứng viên sẽ phải giải quyết các tình huống về các vấn đề giao tiếp, ứng xử và cộng tác với con người trong công việc. Top 3 ứng viên có điểm số cao nhất sau cả 2 vòng sẽ bước vào vòng 3.</p>
                    </div>
                    <div>
                        <h3>Vòng 3:	Diễn thuyết về con đường tương lai và ý chí theo đuổi con đường đó</h3>
                        <p>Yếu tố quyết định để nhà tuyển dụng lựa chọn một ứng viên cuối cùng, đó chính là nhìn vào định hướng nghề nghiệp, nhìn vào động lực, đam mê, tầm nhìn của ứng viên đối với sự nghiệp của mình. Trong vòng thi này, Top 3 sẽ chia sẻ về định hướng về sự nghiệp và động lực theo đuổi con đường đó.</p>
                    </div>
                    <!-- <div>
                        <h3>Kết nối</h3>
                        <p>Top 32, các bạn sẽ có 2 ngày 1 đêm để giữa những người bạn đồng lứa xuất sắc và những người
                            thầy tận tâm - đội ngũ Senior Managers kinh nghiệm đến từ các đối tác của chúng tôi.</p>
                        <p>Thử thách Nhà chung đã được chứng kiến nhiều tình bạn mới qua những khoảng thời gian thi đầy
                            thử thách. Đặc biệt, phần Appreciation Party sẽ là một đêm để bạn thả lỏng bản thân, hoà vào
                            với những người bạn mới là chính Top 32 và các Assessors.</p>
                    </div> -->
                </div>
            </div>

            <div class="text-center join-box">
                <a href="/joins" class="btn btn-default"> BẮT ĐẦU HÀNH TRÌNH </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="news-section">
        <div class="row">
            <div class="col-md-12">
                <h2>Chuyện gì sẽ xảy ra với Top 6</h2>
                <p class="text-description">Theo dõi hành trình đổi thay của Top 6 và bước ngoặt của họ trong Đêm CK</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="padding: 0;">
                @foreach($latestArticles as $article)
                    <div class="news-item">
                        <div class="thumb">
                            <div class="thumb bg"
                                 style="background-image: url('{{ 'http://uvtn.hrc.com.vn/'.$article->images_url }}');"></div>
                        </div>
                        <div class="news-title">
                            <h3><a href="{{route('newsDetail', [$article->slug])}}">{{$article->title}}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6" style="padding: 0;">
                <iframe width="100%" height="360" src="https://www.youtube.com/embed/RruvqqI-vzY" frameborder="0"
                        gesture="media" allow="encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <br/><br/>
                <a href="/articles" class="btn btn-default btn-join btn-transparent">Xem Tiếp</a>
            </div>
        </div>
    </div>

    <!-- <div class="articles-section">
        <div class="section-header text-center">
            <h2>Vượt cạn Nhà chung</h2>
            <p class="text-description">Các bài viết hỗ trợ bạn chuẩn bị cho các vòng Assessment</p>
        </div>
        <div class="articles">
            <div class="row">
                <div class="col-md-3">
                    <div class="article">
                        <div class="thumb">
                            <img src="/final/news/1.jpg" width="100%"/>
                        </div>
                        <div>
                            <h4>
                                <a href="https://hrc.com.vn/thong-tin/assessment-camp-co-hoi-cua-trai-nghiem-thu-thach-va-toa-sang.html"
                                   class="article-title">Assessment Camp: Cơ hội của trải nghiệm, thử thách và tỏa
                                    sáng</a>
                            </h4>
                            <p>Assessment Centre thực sự là một thử thách lớn và cực kì khó nhắn trên con đường chinh
                                phục những chương trình quản lí tập sự (MT) của các tập đoàn lớn.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="article">
                        <div class="thumb">
                            <img src="/final/news/2.jpg" width="100%"/>
                        </div>
                        <div>
                            <h4>
                                <a href="https://hrc.com.vn/thong-tin/buoc-vao-assessment-camp-moi-thu-ban-can-tu-khi-duoc-bao-do-toi-sau-khi-thi.html"
                                   class="article-title">Bước vào Assessment Camp: Mọi thứ bạn cần từ khi được báo đỗ
                                    tới sau khi thi</a>
                            </h4>
                            <p>Vòng Assessment sẽ không chỉ yêu cầu bạn có năng lực vững vàng mà còn cả bản lĩnh phòng
                                thi...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="article">
                        <div class="thumb">
                            <img src="/final/news/3.jpg" width="100%"/>
                        </div>
                        <div>
                            <h4>
                                <a href="https://hrc.com.vn/thong-tin/cac-loai-assessment-tai-cac-tap-doan-khac-nhau.html"
                                   class="article-title">Các loại Assessment tại các tập đoàn khác nhau</a>
                            </h4>
                            <p>Có một thứ vừa gọi là kinh nghiệm, vừa gọi là những kỷ niệm đáng nhớ hay là những bài học
                                quý giá đầu đời</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="article">
                        <div class="thumb">
                            <img src="/final/news/4.jpg" width="100%"/>
                        </div>
                        <div>
                            <h4>
                                <a href="https://hrc.com.vn/thong-tin/tong-hop-cac-nguon.html"
                                   class="article-title">Tổng hợp các quyển giải case hữu ích ứng dụng cao</a>
                            </h4>
                            <p>Case in Point có thể nói là cuốn sách gối đầu của bất cứ ai có ý định thi vào các công ty
                                tư vấn chiến lược</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="companion-section">
        <div class="col-sm-10 col-sm-push-1">
            <div class="section-header text-center">
                <h3>Đồng hành cùng Ứng viên Tài năng năm 2017</h3>
            </div>
            <br>
            <br>
            <br>
            <div class="col-sm-3 text-center strategic-partner">
                <b>Đối tác kim cương</b> <br><br>
                <img src="/static/user/images/pepsico.png" alt="" width="150px"/>
            </div>
            <div class="col-sm-4 text-center strategic-partner">
                <b>Đối tác chiến lược</b> <br><br>
                <img src="/static/user/images/vp-bank.png" alt="" width="150px"/>
                <img src="/static/user/images/vinataba-philip-morris.png" alt="" width="120px"/>
            </div>
            <div class="col-sm-5 text-center professional-support" style="padding:0;">
                <b>Tài trợ hiện vật</b> <br><br>
                <img src="/static/user/images/icaew.gif" alt="">
                <img src="/static/user/images/alphabooks.png" alt="">
                <img src="/static/user/images/partner/logo/sage.png" alt="">
            </div>
            <div class="clearfix"></div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-sm-2 text-center professional-support" style="padding:0;">
                <b>Nhà tài trợ đồng</b> <br><br>
                <img src="/static/user/images/partner/logo/tiktak.png" alt="">
            </div>
            <div class="col-sm-4 text-center professional-support" style="padding:0;">
                <b>Bảo trợ chuyên môn</b> <br><br>
                <img src="/static/user/images/nielsen.png" alt="">
                <img src="/static/user/images/navigos-search.png" alt="">
                <img src="/static/user/images/p_g.png" alt="" style="max-height: 4em;">
            </div>
            <div class="col-sm-6 text-center communication-support" style="padding:0;">
                <b>Bảo trợ truyền thông</b> <br><br>
                <img src="/static/user/images/partner/ybox.png" alt="">
                <img src="/static/user/images/coccoc.png" alt="">
                <img src="/static/user/images/tm.png" alt="">
                <img src="/static/user/images/partner/brandsvietnam.png" alt="">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="join-section">
        <div class="section-header text-center">
            <h3>Cùng chứng kiến bước ngoặt đổi thay của các ứng viên tài năng</h3>
        </div>
        <br>
        <br>
        <div class="text-center">
            <!-- <a href="javascript:;" class="btn btn-default btn-join btn-lg subscribe-open"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ĐĂNG KÝ THAM DỰ
                CHUNG KẾT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a> -->
            <a href="/joins" class="btn btn-default btn-join btn-lg subscribe-open"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ĐĂNG KÝ THAM DỰ
                CHUNG KẾT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
        </div>
    </div>

@stop
@push('modal')
<div class="modal hrc-dashboard-modal fade" id="subscription-modal" tabindex="-1" role="dialog" aria-labelledby="subscription-modal">
    <div class="modal-dialog" style="width: 650px;" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" id="subscribe-modal-close" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 32px;color: #20a286;opacity: 1;">&times;</button>
                <br/>
                <div class="modal-body-wrapper text-center">
                    <div class="subscribe-form">
                        <h3>Hãy là người đầu tiên chứng kiến sự lộ diện của<br/>
                            Top 6 Ứng viên Tài năng mùa thứ 7!</h3>
                        <p>Đăng ký để cập nhật những diễn biến mới nhất từ Assessment Camp và vòng Chung kết.</p>
                        <input type="text" class="form-control" id="final-subscription-email" style="width: 80%;margin: auto;" placeholder="Email của bạn">
                        <br/>
                        <div class="text-center">
                            <a href="javascript:;" class="btn btn-default btn-lg btn-join submit-final-subscription">Đăng ký thông tin</a>
                        </div>
                    </div>
                    <div class="subscribe-success" style="display: none;">
                        <h3>Cảm ơn bạn đã lựa chọn đổi thay<br/>
                            cùng Ứng viên Tài năng</h3>
                        <p>Thông tin mới nhất về Ứng viên Tài năng sẽ được cập nhật qua email, bạn hãy chú ý kiểm tra hòm thư thường xuyên nhé.</p>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush
@push('styles')
<link rel="stylesheet" href="/bower_components/owlcarousel/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="/bower_components/custom-scroll/jquery.mCustomScrollbar.min.css"/>
<style>
    .btn-transparent {
        background-color: transparent;
        box-shadow: none !important;
        color: white;
    }

    .btn-white, .btn-transparent:hover {
        background-color: #fff;
        color: #495259;
        box-shadow: none !important;
    }

    .final-intro-section {
        background: url(/final/header_background.jpg) no-repeat top right;
        overflow: hidden;
        position: relative;
        height: calc(95vh - 15px);
    }

    .final-intro-section video {
        width: 100%;
        position: absolute;
    }

    .final-intro-section h1 {
        font-size: 50px;
        text-transform: uppercase;
        color: #fff;
        font-weight: bold;
        line-height: 70px;
    }

    .text-description {
        font-weight: bold;
        color: #fff;
        font-size: 18px;
    }

    .top32-section {
        background: #171717;
        padding: 50px 10px;
    }

    .top32-section h2 {
        color: #fff;
        font-weight: bold;
        text-align: center;
        margin-bottom: 50px;
    }

    .top-list {
        overflow: hidden;
    }

    .top-item {
        display: inline-block;
        width: 16.667%;
        float: left;
        padding: 2px;
        position: relative;
    }

    @media screen and (max-width: 767px) {
        .top-item {
            width: 100% !important;
        }
    }

    .top-item .top-info {
        color: #fff;
        background: linear-gradient(
                to bottom,
                transparent,
                black
        );
        padding: 0 5px;
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .top-item:hover .overlay {
        display: block;
    }

    .top-item .overlay {
        position: absolute;
        width: calc(100% - 4px);
        height: calc(100% - 4px);
        background: #ffffff8a;
        z-index: 100;
        display: none;
    }

    .top-info .name {
        font-weight: bold;
        margin-bottom: 0;
    }

    .top-info .university {
        color: #8c8c8c;
        margin-bottom: 3px;
    }

    span.linkedin {
        font-size: 22px;
        color: #fff;
        position: absolute;
        right: 8px;
        top: 2px;
        z-index: 200;
    }

    .process-section .background {
        position: absolute;
        height: 100vh;
    }

    .process-slider {
        margin: 0;
        height: 100vh;
        padding: 50px;
    }

    .owl-dot {
        display: inline-block;
        margin-right: 10px;
    }

    .owl-dot span {
        height: 15px;
        display: inline-block;

        width: 15px;
        border-radius: 100px;
        border: solid 1px #6f6f6f;
    }

    .owl-dot.active span {
        background: #20a286;
    }

    .process-slider h2 {
        font-size: 36px;
        font-weight: bold;
    }

    .process-slider .text-description {
        color: #333;
        font-weight: normal;
        font-size: 20px;
    }

    .process-slider-content {
        margin-top: 60px;
        padding-right: 100px;
    }

    .process-section {
        height: 100vh;
        padding: 0;
        overflow: hidden;
    }

    .process-section p {
        font-size: 18px;
    }

    .process-section .owl-dots {
        margin-top: 20px;
    }

    .news-section {
        background: #171717;
        padding: 50px 10px;
        overflow: hidden;
    }

    .news-section h2 {
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .news-section .text-description {
        color: #8c8c8c;
        text-align: center;
        font-weight: normal;
    }

    .news-section .news-item {
        width: 50%;
        float: left;
        height: 180px;
        position: relative;
    }

    .news-section .news-item .thumb {
        height: 100%;
        position: absolute;
        width: 100%;
        z-index: 0;
    }

    .news-section .text-description {
        font-weight: normal;
        text-align: center;
        margin-bottom: 50px;
    }

    .news-section .news-title {
        position: absolute;
        bottom: 0;
        background: linear-gradient(
                to bottom,
                transparent,
                black
        );
        padding: 0 10px;
    }

    .news-section .news-title h3 {
        font-size: 15px;
        font-weight: bold;
    }

    .articles {
        padding: 0 50px;
    }

    .article h4 {
        font-size: 18px;
    }

    .articles-section .section-header h2 {
        font-weight: bold;
        margin-top: 0;
    }

    .articles-section .section-header .text-description {
        color: #8c8c8c;
        font-weight: normal;
        margin-bottom: 50px;
    }
</style>
@endpush
@push('scripts')
<script type="text/javascript" src="/bower_components/owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/bower_components/custom-scroll/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">

    $.validator.addMethod("validateEmail", function (emailAddress) {
        var pattern = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);
        return pattern.test(emailAddress);
    });


    var owl1 = $('.owl-slider-members');
    var owl2 = $('.process-slider-content');


    owl1.owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        // lazyLoad: true,
        center: true,
        items: 1,
        navText: []
    });
    owl2.owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        dots: true,
        // lazyLoad: true,
        center: true,
        items: 1,
        navText: []
    });

    owl2.on('changed.owl.carousel', function (event) {
        var element = event.target;
        var item = event.item.index;

        $(element).closest('.process-section').find('.background').fadeOut();
        $(element).closest('.process-section').find('.background').eq(item).fadeIn();

    });

    $(document).ready(function () {
        $('.article img').height($('.article img').width() * .667);

//        owl2.find('.owl-item').mCustomScrollbar({
//            setHeight: 220,
//            autoHideScrollbar: true,
//            theme: "dark",
//            scrollInertia: 400,
//            advanced: {
//                updateOnContentResize: true
//            }
//        });

        $('#main-text-intro').height($('.news-section-intro').height());
    });

    var switchtext = ['yêu thương', 'nỗ lực', 'gia đình', 'sự dũng cảm'];
    setInterval(function () {
        $('#switch-text').html(switchtext[Math.floor(Math.random() * 3) + 1]);
    }, 5000);

    $('.subscribe-open').click(function(){
        $("#subscription-modal").modal();
    });

    $('.submit-final-subscription').click(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('submit-final-subscription') }}',
            data: { email: $('#final-subscription-email').val() },
            success: function(response){
                if(response.success){
                    $('.subscribe-success').show();
                    $('.subscribe-form').hide();
                    $('#final-subscription-email').val('');
                } else {
                    alert('Vui lòng kiểm tra lại thông tin hoặc thử lại sau.');
                }
            }
        })
    });

    $("#subscription-modal").on('hidden.bs.modal', function () {
        $('.subscribe-form').show();
        $('.subscribe-success').hide();
    });
</script>
@endpush
