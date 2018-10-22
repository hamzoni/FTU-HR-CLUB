@php($bodyClasses = 'hrcPageHome')
@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])

@section('content')
    <div class="intro-section">
        <div class="col-sm-push-6 col-sm-6 text-center logo-slogan">
            <div>
                <img src="/static/user/images/logo-slogan.png" alt="" style="width: 65%;"/>
                <br>
                <br>
                <a href="/joins" class="btn btn-default btn-join">Tham gia</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="news-section">
        @foreach($latestArticles as $article)
        <div class="col-sm-3 news-item">
            <div class="row">
                <div class="thumb">
                    <div class="thumb bg" style="background-image: url('{{asset($article->images_url)}}');"></div>
                </div>
                <div>
                    <h3><a href="{{route('newsDetail', [$article->slug])}}">{{$article->title}}</a></h3>
                </div>
            </div>
        </div>
        @endforeach
        <div class="clearfix"></div>
        <div class="news-section-intro">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-md-8 col-md-push-4">
                        <div class="text-intro" id="main-text-intro" style="display: table-cell;vertical-align: middle;">
                            <h3 class="text-primary" style="margin-top:10px;"><b>Bước ngoặt đổi thay</b></h3>
                            <p>Mơ ước. Nỗ lực. Sáng kiến. Từ mùa đầu tiên vào năm 2010, Ứng viên Tài năng đã liên tục
                                tái định nghĩa thế giới của các “cuộc thi sinh viên”, và tái khẳng định những gì người
                                trẻ có thể làm khi họ có một ước mơ.</p>
                            <p>Giây phút bạn sẵn sàng bước ra ngoài cánh cửa đại học trên đôi chân của mình, là bạn đã
                                tạo nên một bước ngoặt đổi thay - đổi thay chính mình cho cuộc sống đang thay đổi trước
                                mắt.</p>
                            <p>Chúng tôi từng mơ tất cả các bạn sẽ có được sự sẵn sàng đó - bước ngoặt đó. Năm nay chúng
                                tôi đã gần hơn với ước mơ ấy. <b style="color: #fff">Lần đầu tiên trong lịch sử của Ứng
                                    viên Tài năng, mọi CV nộp trước mốc 2000 sẽ nhận được comment từ các chuyên gia đối
                                    tác của chúng tôi.</b> Tấm hộ chiếu ra đời của các bạn, hãy tham gia Ứng viên Tài
                                năng để làm hoàn hảo nó. </p>
                            <p>Bên cạnh đó, các vòng Initial Interview, Assessment Camp, và The Final Round của Ứng viên
                                Tài năng mùa 7 cũng sẽ bùng nổ về giá trị tuyển dụng, chuyên môn, và kết nối. </p>
                            <p>Tất cả chúng tôi đang chờ bạn, để tìm thấy trong bước ngoặt của bạn, những bước ngoặt của
                                chính chúng tôi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="padding-right: 0;">
                <img src="/static/user/images/news-section-cover.png" alt=""/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="value-and-change-section">
        <div class="col-sm-10 col-sm-push-1">
            <div class="values">
                <div class="section-header text-center">
                    <h3 class="text-center">Bốn giá trị. Một bước ngoặt đổi thay.</h3>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-3 value">
                        <h4><b>Tuyển dụng</b></h4>
                        <p>Trải nghiệm quy trình tuyển dụng thực tế với 4 vòng thi chuẩn hoá theo mô hình tuyển dụng các
                            tập đoàn lớn trong nước và đa quốc gia.</p>
                    </div>
                    <div class="col-sm-3 value">
                        <h4><b>Chuyên môn</b></h4>
                        <p>Giải quyết các thử thách thuộc chuyên môn Marketing & Sales, Finance, HR, Supply Chain tại
                            Assessment Camp, 2 ngày 1 đêm tại một biệt thự ngoại thành Hà Nội. </p>
                    </div>
                    <div class="col-sm-3 value">
                        <h4><b>Kết nối</b></h4>
                        <p>Sống giữa những người bạn đồng lứa xuất sắc và những người thầy tận tâm - đội ngũ Senior
                            Managers kinh nghiệm đến từ các đối tác của chúng tôi.</p>
                    </div>
                    <div class="col-sm-3 value">
                        <h4><b>Tỏa sáng</b></h4>
                        <p>Tất cả chúng tôi chờ bạn ở đêm Chung kết, để được truyền cảm hứng và tìm thấy trong bước
                            ngoặt của bạn, những bước ngoặt của chính chúng tôi.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="top-members clearfix">
            <div class="col-sm-10 col-sm-push-1">
                <div class="col-sm-5">
                    <img class="big-logo" src="/static/user/images/blue-logo.png" alt=""/>
                </div>
                <div class="col-sm-7">
                    <div class="owl-slider-members owl-carousel">
                        <div>
                            <h3 class="text-primary"><b>Giải nhất</b></h3>
                            <b>10.000.000 VNĐ tiền mặt</b>
                            <ul>
                                <li>01 suất lọt vào vòng Phỏng vấn cuối của chương trình Management Trainee 2018 của
                                    Suntory Pepsico.
                                </li>
                                <li>01 khoá đào tạo Career Consulting trong 1 năm cùng Ms. Mai Thúy Hằng, Giám đốc Giải pháp Nguồn nhân lực tại Navigos Solutions - Navigos Search, trị giá 2000 USD/khoá.
                                </li>
                                <li>01 học bổng toàn phần khoá học Tài Chính, Kế Toán và Kinh Doanh quốc tế trị giá 400 USD/khoá tại ICAEW.</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-primary"><b>Giải nhì</b></h3>
                            <b>7.000.000 VNĐ tiền mặt</b>
                            <ul>
                                <li>01 suất lọt vào vòng Phỏng vấn cuối của chương trình Management Trainee 2018 của
                                    Suntory Pepsico.
                                </li>
                                <li>01 khoá đào tạo Career Consulting trong 1 năm cùng Ms. Mai Thúy Hằng, Giám đốc Giải pháp Nguồn nhân lực tại Navigos Solutions - Navigos Search, trị giá 2000 USD/khoá.
                                </li>
                                <li>01 học bổng toàn phần khoá học Tài Chính, Kế Toán và Kinh Doanh quốc tế trị giá 400 USD/khoá tại ICAEW.</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-primary"><b>Giải ba</b></h3>
                            <b>5.000.000 VNĐ tiền mặt</b>
                            <ul>
                                <li>01 suất lọt vào vòng Phỏng vấn cuối của chương trình Management Trainee 2018 của
                                    Suntory Pepsico.
                                </li>
                                <li>01 khoá đào tạo Career Consulting trong 1 năm cùng Ms. Mai Thúy Hằng, Giám đốc Giải pháp Nguồn nhân lực tại Navigos Solutions - Navigos Search, trị giá 2000 USD/khoá.
                                </li>
                                <li>01 học bổng toàn phần khoá học Tài Chính, Kế Toán và Kinh Doanh quốc tế trị giá 400 USD/khoá tại ICAEW.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="process-section round1">
        <img class="background" src="http://uvtn.dev/static/user/images/process-bg-round1.jpg" width="100%" height="0">
        <img class="background" src="http://uvtn.dev/static/user/images/process-bg-round2.jpg" width="100%" height="0">
        <img class="background" src="http://uvtn.dev/static/user/images/process-bg-round3.jpg" width="100%" height="0">
        <img class="background" src="http://uvtn.dev/static/user/images/process-bg-round4.jpg" width="100%" height="0">
        <div class="col-sm-5">
            <div class=" process-slider owl-carousel">
                <div>
                    <h3><a href="javascript:">Vòng 1: CV & Test Tuyển dụng (30/10/2017 - 19/11/2017)</a></h3>
                    <p>• Sở hữu một hành trang hoàn hảo để bước ra thị trường tuyển dụng: CV được chỉnh sửa, thi thử
                        Test thực tế.</p>
                    <p>• Ứng viên truy cập website www.uvtn.hrc.com.vn để nộp CV đăng ký tham gia cuộc thi theo
                        4 bộ phận Marketing & Sales, Finance, Human Resources, Suppy Chain. 2000 ứng viên đầu tiên nộp CV sẽ nhận
                        được comment cho CV đến từ HRC với chất lượng bảo đảm bởi bảo trợ chuyên môn.</p>
                    <p>• Tất cả ứng viên sẽ được tham gia bài Test tuyển dụng sau khi nộp CV. Bài thi online gồm
                        32 câu hỏi bằng Tiếng Anh để đánh giá năng lực tư duy (Numerical, Logical, Verbal) và
                        mức độ phù hợp tính cách (SJT).</p>
                </div>
                <div>
                    <h3><a href="javascript:">Vòng 2: Phỏng vấn Cá nhân (26/11/2017)</a></h3>
                    <p>• Đã bao giờ bạn tự hỏi: "Tại sao mình không được gọi lại sau cuộc phỏng vấn ấy?"</p>
                    <p>• Top 100 vượt qua vòng 1 sẽ tham gia phỏng vấn 1-1 với các chuyên gia tuyển dụng.
                        Nội dung phỏng vấn bao gồm các câu hỏi đánh giá năng lực và các câu hỏi đánh giá
                        kiến thức chuyên ngành.</p>
                </div>
                <div>
                    <h3><a href="javascript:">Vòng 3: Thử thách Nhà chung (09/12/2017 - 10/12/2017) cùng chuỗi Đào tạo
                            Kỹ năng Chuyên sâu</a></h3>
                    <p>• Vén màn bí mật đằng sau vòng thi thử thách nhất của các tập đoàn hàng đầu tại Việt Nam - Vòng
                        Assessment</p>
                    <p>• Top 32 ứng viên xuất sắc nhất sẽ tham gia chuỗi trải nghiệm 2 ngày 1 đêm với 2 hoạt
                        động chính. Ở phần Đánh giá năng lực với đội ngũ Ban giám khảo là các quản lí và giám
                        đốc đầu ngành, bạn sẽ được trải nghiệm và giải mã vòng thi Assessment nổi tiếng của các tập đoàn
                        lớn như Suntory Pepsico, Vinataba Philip Morris, Unilever, Vinamilk, ...</p>
                    <p>• Phần thứ hai của Nhà chung là các hoạt động networking, gắn kết, truyền cảm hứng để đến
                        gần hơn với đội ngũ ban giám khảo và những ứng viên xuất sắc khác.</p>
                    <p>• Trước thềm Assessment Camp, Top 32 sẽ được tham gia chuỗi Đào tạo Kĩ năng Chuyên sâu
                        (Intensive Training Program) đào tạo các kĩ năng tuyển dụng tầm cao với các trainers
                        đối tác của chương trình.</p>
                </div>
                <div>
                    <h3><a href="javascript:">Vòng 4: Đêm Chung kết (16/12/2017)</a></h3>
                    <p>• Tất cả chúng tôi chờ bạn ở đêm Chung kết, để tìm thấy trong bước ngoặt của bạn,
                        những bước ngoặt của chính chúng tôi.</p>
                    <p>• Top 6 thể hiện khả năng, bản lĩnh qua các vòng thi trực tiếp trên sân khấu lớn dưới sự đánh giá
                        và cho điểm của đội ngũ Ban giám khảo, và trong sự theo dõi của 1000 khán giả, để tìm ra quán
                        quân xứng đáng của Ứng viên Tài năng 2017</p>
                </div>
            </div>

            <div class="text-center join-box">
                <a href="/joins" class="btn btn-default"> BẮT ĐẦU HÀNH TRÌNH </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    {{--<div class="articles-section">
        <div class="section-header text-center">
            <h3>Có những con người đã tạo nên bước ngoặt <br>đổi thay của họ tại Ứng viên Tài năng</h3>
        </div>
        <div class="articles">
            @foreach($highlightArticle as $article)
            <div class="col-sm-4 article">
                <div class="row">
                    <div class="thumb">
                        <a href="{{route('newsDetail', [$article->slug])}}">
                            <img src="{{$article->coverImage ? $article->coverImage->url : '/static/user/images/home-bg1.jpg'}}" alt=""/>
                        </a>
                    </div>
                    <div class="col-xs-12">
                        <h4><a href="{{route('newsDetail', [$article->slug])}}" class="article-title">{{$article->title}}</a></h4>
                        <p>{{$article->description}}</p>
                        <a href="{{route('newsDetail', [$article->slug])}}" class="read-more">Xem thêm</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-sm-4 article">
                <div class="row">
                    <div class="thumb">
                        <img src="/static/user/images/news3.jpg" alt=""/>
                    </div>
                    <div class="col-xs-12">
                        <h4><a href="javascript:" class="article-title">Và còn nhiều những câu chuyện khác nữa</a></h4>
                        <div class="">
                            <a href="/articles" class="btn btn-default btn-join"> &nbsp;&nbsp;&nbsp;ĐỌC TIẾP&nbsp;&nbsp;&nbsp; </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>--}}

    <div class="companion-section">
        <div class="col-sm-10 col-sm-push-1">
            <div class="section-header text-center">
                <h3>Đồng hành cùng Ứng viên Tài năng năm 2017</h3>
            </div>
            <br>
            <br>
            <br>
            <div class="col-sm-6 text-center strategic-partner">
                <b>Đối tác kim cương</b> <br><br>
                <img src="/static/user/images/pepsico.png" alt=""/>
            </div>
            <div class="col-sm-6 text-center strategic-partner">

                <b>Đối tác chiến lược</b> <br><br>
                <img src="/static/user/images/vp-bank.png" alt=""/>
                <img src="/static/user/images/vinataba-philip-morris.png" alt=""/>
            </div>
            <div class="clearfix"></div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-sm-3 text-center professional-support" style="padding:0;">
                <b>Tài trợ hiện vật</b> <br><br>
                <img src="/static/user/images/icaew.gif" alt=""/>
                <img src="/static/user/images/alphabooks.png" alt=""/>
            </div>
            <div class="col-sm-3 text-center professional-support" style="padding:0;">
                <b>Bảo trợ chuyên môn</b> <br><br>
                <img src="/static/user/images/nielsen.png" alt=""/>
                <img src="/static/user/images/navigos-search.png" alt=""/>
                <img src="/static/user/images/p_g.png" alt="" style="max-height: 4em;"/>
            </div>
            <div class="col-sm-6 text-center communication-support" style="padding:0;">
                <b>Bảo trợ truyền thông</b> <br><br>
                <img src="/static/user/images/partner/ybox.png" alt=""/>
				<img src="/static/user/images/coccoc.png" alt=""/>
                <img src="/static/user/images/tm.png" alt=""/>
				<img src="/static/user/images/partner/brandsvietnam.png" alt=""/>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="top-register-cv-section">
        <div class="container">
            <div class="section-header text-center">
                <h3>2000 đăng ký đầu tiên sẽ được comment CV</h3>
            </div>
            <br>
            <br>
            <div class="col-sm-6 text-center">
                <p>Hạn đăng ký tham gia ứng viên tài năng 2017</p>
                <span>17.11.2017</span>
            </div>
            <div class="col-sm-6 text-center">
                <p>Thời gian còn lại cho Bước Ngoặt Đổi Thay</p>
                <div>
                    <div class="countdown-block" style="">
                        <div class="square">
                            <div class="item" id="day">00</div>
                            <span>Ngày</span>
                        </div>
                        <div class="square">
                            <div class="item" id="hour">00</div>
                            <span>Giờ</span>
                        </div>
                        <div class="square">
                            <div class="item" id="min">00</div>
                            <span>Phút</span>
                        </div>
                        <div class="square">
                            <div class="item" id="sec">00</div>
                            <span>Giây</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="join-section">
        <div class="section-header text-center">
            <h3>Đã đến thời điểm cho bước ngoặt đổi thay của bạn</h3>
        </div>
        <br>
        <br>
        <div class="text-center">
            <a href="/joins" class="btn btn-default btn-join btn-lg"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THAM GIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
        </div>
    </div>

@stop

@push('styles')
<link rel="stylesheet" href="/bower_components/owlcarousel/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="/bower_components/custom-scroll/jquery.mCustomScrollbar.min.css"/>
@endpush
@push('scripts')
<script type="text/javascript">
    // Set the date we're counting down to
    var countDownDate = new Date("Nov 17, 2017 23:59:59").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("day").innerHTML = ('0'+String(days)).slice(-2);
      document.getElementById("hour").innerHTML = ('0'+String(hours)).slice(-2);
      document.getElementById("min").innerHTML = ('0'+String(minutes)).slice(-2);
      document.getElementById("sec").innerHTML = ('0'+String(seconds)).slice(-2);

      // If the count down is finished, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("day").innerHTML = '00';
      document.getElementById("hour").innerHTML = '00';
      document.getElementById("min").innerHTML = '00';
      document.getElementById("sec").innerHTML = '00';
      }
    }, 1000);
</script>
<script type="text/javascript" src="/bower_components/owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/bower_components/custom-scroll/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">

    $.validator.addMethod("validateEmail", function (emailAddress) {
        var pattern = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);
        return pattern.test(emailAddress);
    });



    var owl1 = $('.owl-slider-members');
    var owl2 = $('.process-slider');


    owl1.owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        // lazyLoad: true,
        center: true,
        items: 1,
        navText: [
        ]
    });
    owl2.owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        // lazyLoad: true,
        center: true,
        items: 1,
        navText: [
        ]
    });

    owl2.on('changed.owl.carousel', function(event) {
        var element   = event.target;
        var item      = event.item.index;
        var classes = ['round1','round2','round3','round4'];

        $(element).closest('.process-section').removeClass('round1 round2 round3 round4');
        $(element).closest('.process-section').addClass(classes[item]);

    });

    $(document).ready(function () {
        $('.article img').height($('.article img').width() * .667);

        owl2.find('.owl-item').mCustomScrollbar({
            setHeight: 220,
            autoHideScrollbar: true,
            theme: "dark",
            scrollInertia: 400,
            advanced: {
                updateOnContentResize: true
            }
        });

        $('#main-text-intro').height($('.news-section-intro').height());
    });
</script>
<style type="text/css">
    .square {
        display: inline-block;
        text-align: center;
        margin-left: 5px;
    }
    .countdown-block {
        width: 100%; text-align: center;
        float: left;
    }

    .square .item {
        width: 80px;
        text-align: center;
        background: #fff;
        height: 60px;
        vertical-align: middle;
        display: table-cell;
        border: solid 1px #ddd;
        border-bottom: solid 3px #169c80;
        border-radius: 3px;
        color: #169c80;
        font-size: 30px;
        font-weight: bold;
    }

    .square span {
        padding-top: 10px;
        display: inline-block;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 20px;
    }
    .countdown-block p {
        font-size: 40px;
        font-weight: bold;
        text-align: center;
    }
</style>
@endpush