@php($bodyClasses = 'job-selection-page white-smoke')
@extends('layouts.user.home.application')

@php
$images = [
'artist' => '/static/user/images/questions/the-artist.png',
'connector' => '/static/user/images/questions/the-connector.png',
'entrepreneur' => '/static/user/images/questions/the-entrepreneur.JPG',
'logistician' => '/static/user/images/questions/the-logistician.JPG',
];
$imageUrl = isset($images[$type]) ? $images[$type] : '';

$thumbImages = [
'connector-feeling' => '/static/user/images/questions/connector2.png',
'connector-practical' => '/static/user/images/questions/connector1.png',
'logistician-practical' => '/static/user/images/questions/professor2.png',
'logistician-thinking' => '/static/user/images/questions/professor1.png',
'entrepreneur-imaginative' => '/static/user/images/questions/analyst2.png',
'entrepreneur-thinking' => '/static/user/images/questions/analyst1.png',
'artist-feeling' => '/static/user/images/questions/artist1.png',
'artist-imaginative' => '/static/user/images/questions/artist2.png',
];
$thumbImageUrl = isset($thumbImages[$type.'-'.$suggest]) ? $thumbImages[$type.'-'.$suggest] : '';
@endphp

@section('og:title'){{ config('hrc.shareFacebook.title') }}@endsection
@section('og:description'){{ config('hrc.shareFacebook.description') }}@endsection
@section('meta:description'){{ config('hrc.shareFacebook.description') }}@endsection
@section('og:image'){{ asset($thumbImageUrl) }}@endsection
@section('og:url'){{ url()->current() }}@endsection

@section('metadata')
@stop

@section('content')

    <div class="section-header dark-header text-center">
        <h2>Test chọn nghề</h2>
    </div>

    <div class="test-intro {{$type && $suggest ? 'hide' : ''}}">
        <div class="container">
            <div class="hidden-xs"><br><br><br><br><br><br><br></div>
            <br><br><br><br>
            Chưa chọn được nghề phù hợp với bản thân? <br>
            Dành ra một phút để thử làm test, và bạn có thể đưa ra lựa chọn ngành nghề tương lai cho mình.
            <br>
            <br>
            <a href="javascript:" class="btn btn-default btn-join" onclick="startTest()">LÀM TEST</a>
            <br><br><br><br>
            <div class="hidden-xs"><br><br><br><br><br><br><br></div>
        </div>
    </div>
    <div class="container">
        <div class="slide test-questions hide" {{$type ? 'style=display:none' : ''}}>
            <div class="hidden-xs"><br/><br/></div>
            <div class="questions col-sm-8 col-sm-push-2">
                <div class="question">
                    <div class="text-center">
                        <p><b>Bạn thường khen người khác:</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="choice text-center">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question1.1.png"/>
                                </div>
                                <p>Chỉ khi bạn thật lòng</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question1.2.png"/>
                                </div>
                                <p>Khi bạn biết lời khen của bạn sẽ làm họ vui mặc dù bạn không có ý đó</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Bạn đang định treo một bức tranh lên tường. Bạn sẽ:</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="choice text-center">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question2.1.png"/>
                                </div>
                                <p>Đo đạc kĩ rồi đóng đinh</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question2.2.png"/>
                                </div>
                                <p>Ngắm bằng mắt rồi đóng đinh</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Bạn nhận được một lời mời làm việc. Yếu tố nào sẽ ảnh hưởng đến quyết định của bạn
                                nhất?</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="choice text-center">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question3.1.png"/>
                                </div>
                                <p>Lương: Nếu họ đề nghị mức lương cao hơn mức lương hiện tại của bạn thì chắc chắn bạn
                                    sẽ đồng ý</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question3.2.png"/>
                                </div>
                                <p>Văn hoá: Bạn sẽ nhận lời nếu văn hoá của công ty phù hợp với bạn</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Bạn còn 100 000 tiền tiêu vặt trong tuần này và Dingtea vừa giảm giá. Bạn sẽ:</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="choice ">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question4.1.png"/>
                                </div>
                                <p>Lập danh sách những khoản tiêu cần thiết trong tuần và nếu còn dư tiền thì mua</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question4.2.png"/>
                                </div>
                                <p>Mua Dingtea ngay lập tức không hết khuyến mãi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Tặng quà sinh nhật cho một người bạn, bạn sẽ:</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="choice ">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question5.1.png"/>
                                </div>
                                <p>Tặng quà mà bạn của bạn có thể dùng được</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question5.2.png"/>
                                </div>
                                <p>Tặng quà mang ý nghĩa tinh thần</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Ở nhà hàng, bạn tính tiền ăn bằng cách:</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="choice text-center">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question6.1.png"/>
                                </div>
                                <p>Tính nhẩm trong đầu</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question6.2.png"/>
                                </div>
                                <p>Ước lượng một con số hợp lí</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Vào những ngày nghỉ cuối tuần, bạn:</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="choice text-center">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question7.1.png"/>
                                </div>
                                <p>Nghỉ ngơi thư giãn</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question7.2.png"/>
                                </div>
                                <p>Học một thứ mới</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Bạn sẽ thích</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="choice text-center">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question8.1.png"/>
                                </div>
                                <p>Tự thiết kế quần áo cho mình</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question8.2.png"/>
                                </div>
                                <p>Tự chế tạo máy tính</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Khi bạn chuẩn bị mua iPhone X, bạn sẽ làm gì đầu tiên</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="choice text-center">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question9.1.png"/>
                                </div>
                                <p>Nghiên cứu trước trên mạng</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question9.2.png"/>
                                </div>
                                <p>Hỏi ý kiến bạn bè đã dùng</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question hide">
                    <div class="text-center">
                        <p><b>Vào buổi sáng, bạn dành hầu hết thời gian:</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="choice text-center">
                                <div class="question-image" data-type="a">
                                    <img src="/static/user/images/questions/question10.1.png"/>
                                </div>
                                <p>Ăn sáng</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center" data-type="b">
                            <div class="choice">
                                <div class="question-image">
                                    <img src="/static/user/images/questions/question10.2.png"/>
                                </div>
                                <p>Bò ra khỏi giường</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="hidden-xs"><br/><br/><br/></div>
            <p class="text-center">
                Câu <span class="hight-light test-progress">1</span>/10
            </p>
            <p class="text-center">
                <button class="btn btn-default question-previous" onclick="">CÂU TRƯỚC</button>
                <button class="btn btn-default" onclick="startTest();">BẮT ĐẦU LẠI</button>
            </p>
        </div>
        <div class="slide test-end-confirm hide">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <br/><br/><br/><br/><br/><br/><br/><br/>
                    <p class="text-center"><b>Để lại email và xem kết quả</b></p>
                    <form action="#" id="emailRegister">

                        <div class="form-group text-center">
                            <input type="email" name="email" class="testedemail subscribe" required
                                   placeholder="Email"/>
                        </div>
                        <div class="text-center">
                            <a role="button" class="btn btn-default btn-join view-test-result-btn">XÁC NHẬN</a>
                        </div>
                    </form>
                    <br/><br/><br/><br/><br/><br/><br/><br/>
                </div>
            </div>
        </div>

        <div class="slide test-result {{$type && $suggest ? '' : 'hide'}}">
            <div class="row">
                <div class="col-sm-7">
                    <div class="human-type">
                        @if($type == 'artist')
                            <div class="type artist">
                                <h2>The Artist</h2>
                                <b>Người nghệ sĩ</b>
                                <p class="type-description">
                                    Bạn là người sáng tạo, không quá cầu kì, và rất thích những thử thách! Bạn có thể
                                    thích ứng tốt, dễ hòa theo cảm xúc chung của mọi người. Đó là yếu tố khiến bạn luôn
                                    được mọi người nhìn nhận là một người đồng đội tốt, nhưng bạn vẫn giữ được những
                                    chất riêng của bản thân.
                                </p>
                            </div>
                        @endif
                        @if($type == 'connector')
                            <div class="type connector">
                                <h2>Connector</h2>
                                <b>Người gắn kết</b>
                                <p class="type-description">
                                    Bạn thích làm việc với con người. Thân thiện, hòa đồng và kiên nhẫn, đó là những
                                    phẩm chất giúp bạn luôn để lại ấn tượng tốt trong mắt mọi người. Bạn thích chia sẻ
                                    những điều bạn biết và giúp đỡ mọi người xung quanh nhiều nhất có thể. Bạn sở hữu
                                    khả năng giao tiếp khéo léo, thấu hiểu tâm lý mọi người xung quanh.
                                </p>
                            </div>
                        @endif
                        @if($type == 'logistician')
                            <div class="type logistician">
                                <h2>The Professor</h2>
                                <b>Giáo sư</b>
                                <p class="type-description">
                                    Bạn sở hữu một bộ não tư duy tổ chức tuyệt vời! Bạn luôn vạch ra trong đầu từng bước
                                    đi cụ thể trong mọi việc, dự trù mọi tình huống có thể xảy ra. Bạn mạnh mẽ và độc
                                    lập, linh hoạt trong các tình huống, thậm chí có thể thay đổi các quy tắc nếu cần
                                    thiết.
                                </p>
                            </div>
                        @endif
                        @if($type == 'entrepreneur')
                            <div class="type entrepreneur">
                                <h2>The Analyst</h2>
                                <b>Nhà phân tích</b>
                                <p class="type-description">
                                    Khả năng phân tích và giải quyết vấn đề của bạn rất tốt. Bởi vậy, bạn luôn làm chủ
                                    những con số, biểu đồ hay những phép tính phức tạp. Là người cẩn thận, chú ý tới
                                    từng chi tiết nhỏ khi làm mọi việc, bạn hoàn toàn có thể tự thiết kế một kết hoạch
                                    tuyệt vời và thực hiện nó.
                                </p>
                            </div>
                        @endif
                    </div>
                    <br>
                    <span>Bạn có thể hợp với:</span>
                    <div class="suggest">
                        @if($type == 'artist' && $suggest == 'imaginative')
                            <div class="artist-imaginative">
                                1. Design (Thiết kế sáng tạo) <br>
                                2. Marketing & Brand Management (Marketing & Quản lý Thương hiệu
                            </div>
                        @endif
                        @if($type == 'artist' && $suggest == 'feeling')
                            <div class="artist-feeling">
                                1. Design (Thiết kế sáng tạo) <br>
                                2. Marketing & Brand Management (Marketing & Quản lý Thương hiệu
                            </div>
                        @endif
                        @if($type == 'connector' && $suggest == 'feeling')
                            <div class="connector-feeling">
                                1. HR Head-hunt (Tuyển dụng cấp cao)<br>
                                2. HR Recruitment (Tuyển dụng)
                            </div>
                        @endif
                        @if($type == 'connector' && $suggest == 'practical')
                            <div class="connector-practical">
                                1. HR Management (Quản trị nhân sự)<br>
                                2. HR Recruitment (Tuyển dụng)
                            </div>
                        @endif
                        @if($type == 'logistician' && $suggest == 'practical')
                            <div class="logistician-practical">
                                1. Supply Chain - Purchasing (thu mua hàng)<br>
                                2. Supply Chain - Logistic (vận chuyển)
                            </div>
                        @endif
                        @if($type == 'logistician' && $suggest == 'thinking')
                            <div class="logistician-thinking">
                                1. Supply Chain - Logistic (vận chuyển)<br>
                                2. Supply Chain - Purchasing (thu mua hàng)
                            </div>
                        @endif
                        @if($type == 'entrepreneur' && $suggest == 'imaginative')
                            <div class="entrepreneur-imaginative">
                                1. Corporate Finance Management (Quản trị tài chính doanh nghiệp)<br>
                                2. Product Supply Finance (Chuỗi cung ứng tài chính)
                            </div>
                        @endif
                        @if($type == 'entrepreneur' && $suggest == 'thinking')
                            <div class="entrepreneur-thinking">
                                1. Financial Risk Management (Quản trị rủi ro tài chính) <br>
                                2. Financial Analyst (Phân tích tài chính)
                            </div>
                        @endif
                    </div>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="javascript:" class="btn btn-default share-result"><i class="fa fa-facebook-square"
                                                                                      style="font-size: 1.3em; position: relative; bottom: -2px"></i>
                            CHIA SẺ</a>
                        <a href="/job-selection-test" class="btn btn-default">BẮT ĐẦU LẠI</a>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="type-image">
                        @if($images)
                            <img class="artist" src="{{$imageUrl}}" alt=""/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')

<script type="text/javascript"
        src="{{ asset('bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>

<script type="text/javascript">
    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }
    // Test
    var testProgress = 0;
    var testResult = [];

    function startTest() {
        testProgress = 1;
        $('.test-intro').addClass('hide');
        $('.test-result').addClass('hide');
        $('.test-questions').removeClass('hide');
        $('.question').addClass('hide');
        $('.question').eq(0).removeClass('hide');
        testResult = [];
        updateProgress();
    }
    {{--@if(!($type && $suggest))
    startTest();
    @endif--}}
    function endTest() {
        var result = getTestResult();

        $('.human-type .type').hide();
        $('.human-type .' + result.type).show();

        $('.type-image img').hide();
        $('.type-image .' + result.type).show();

        $('.suggest>div').hide();
        $('.suggest .' + result.type + '-' + result.suggest).show();

        /*result.suggest.forEach(function(item, index){
         var element = $('.suggest .'+item);
         element.find('.order').html(index+1);
         element.appendTo('.suggest').show();
         });*/

        $('.test-end-confirm').addClass('hide');
        $('.test-result').removeClass('hide');
        $('.share-result').attr('data-share', result.share);
    }

    function endTestConfirm() {
        $('.test-questions').addClass('hide');
        $('.test-end-confirm').removeClass('hide');
    }

    function goToQuestion(index) {
        $('.question').addClass('hide');
        $('.question').eq(index).removeClass('hide');
        testProgress = index + 1;
        updateProgress();
    }

    function goToPreviousQuestion(index) {
        $('.question').addClass('hide');
        $('.question').eq(index).removeClass('hide');
        testProgress = index - 1;
        updateProgress();
    }

    function updateProgress() {
        $('.test-progress').html(testProgress);
        if (testProgress == 1) {
            $('.question-previous').prop('disabled', true);
        } else {
            $('.question-previous').prop('disabled', false);
        }
    }

    $('.question-image').click(function () {
        var index = $('.questions').find('.question').index($(this).parents('.question'));
        testResult[index] = $(this).data('type');

        if (index == 9) {
            endTestConfirm();
            return;
        }

        goToQuestion(index + 1);
    });

    $('.question-previous').click(function () {
        if (testProgress == 1) {
            return;
        }
        goToPreviousQuestion(testProgress);
    });

    function getTestResult() {
        var result = testResult;
        var x = 0;
        var y = 0;

        for (i = 0; i < 5; i++) {
            if (result[i] == 'a') {
                x += -1
            }
            else {
                x += 1
            }
        }

        for (i = 5; i < 10; i++) {
            if (result[i] == 'a') {
                y += 1
            }
            else {
                y += -1
            }
        }

        if (x > 0 && y > 0) {
            if (Math.abs(x) >= Math.abs(y)) {
                return {type: 'connector', suggest: 'feeling', share: 'connector-1'};
            } else {
                return {type: 'connector', suggest: 'practical', share: 'empathetic-1'};
            }
        } else if (x < 0 && y > 0) {
            if (Math.abs(x) > Math.abs(y)) {
                return {type: 'logistician', suggest: 'practical', share: 'achiever-1'};
            } else {
                return {type: 'logistician', suggest: 'thinking', share: 'empathetic-2'};
            }
        } else if (x < 0 && y < 0) {
            if (Math.abs(x) >= Math.abs(y)) {
                return {type: 'entrepreneur', suggest: 'imaginative', share: 'achiever-2'};
            } else {
                return {type: 'entrepreneur', suggest: 'thinking', share: 'high-flyer-1'};
            }
        } else if (x > 0 && y < 0) {
            if (Math.abs(x) > Math.abs(y)) {
                return {type: 'artist', suggest: 'feeling', share: 'initiator-2'};
            } else {
                return {type: 'artist', suggest: 'imaginative', share: 'high-flyer-2'};
            }
        }
    }

    $('.share-result').click(function () {
        var url = window.location.href;
        var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
//        alert(shareUrl);
        window.open(shareUrl);
    });

    var applying = false;
    $('.btn-apply').click(debounce(function () {
        if (applying) return;
        applying = true;
        var button = $(this);

        var validatedArray = [];
        var data = {};
        var round2_join = [];
        $('#apply-form').serializeArray().forEach(function (item, index) {
            if (item.value != '') {
                if (item.name == 'round2_join[]') {
                    round2_join.push(item.value);
                } else {
                    validatedArray.push(item.name);
                    data[item.name] = item.value;
                }
            }
        });
        if (round2_join) {
            validatedArray.push('round2_join');
            data['round2_join'] = round2_join.join(',');
        }

        var validated = (validatedArray.length == 18);

        if (validated) {
            button.addClass('disabled');
            $.ajax({
                type: 'POST',
                url: 'apply',
                data: data,
                success: function () {
                    alert('Chúc mừng em đã hoàn thành vòng đơn của HRC. Kết quả sẽ được cập nhật vào ngày 12/09 qua Fanpage và Email. Em nhớ kiểm tra Email để nhận được những thông báo từ anh chị.');
                    $('#apply-form')[0].reset();
                    button.removeClass('disabled');
                    applying = false;
                },
                error: function () {
                    alert('Có sự cố xảy ra, vui lòng thử lại');
                    button.removeClass('disabled');
                    applying = false;
                }
            });
        } else {
            applying = false;
            alert('Vui lòng nhập đầy đủ thông tin');
        }

        return false;
    }, 1000));

    function auto_grow(element) {
        element.style.height = "50px";
        element.style.height = (element.scrollHeight) + "px";
    }

    $(document).ready(function () {
        var formEmailData = {
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },

            messages: {
                email: {
                    required: 'Vui lòng nhập email',
                    email: 'Email không đúng định dạng.'
                }
            }
        };

        $("#emailRegister").validate(formEmailData);
        $("#emailRegister").submit(function (e) {
            e.preventDefault();
            $('.view-test-result-btn').trigger('click');
        });

        $('.view-test-result-btn').click(function (e) {
            e.preventDefault();
            var $btn = $(this);
            if ($("#emailRegister").valid()) {

                $btn.button('loading');
                var email = $('.testedemail').val();
                if (email) {
                    $.ajax({
                        type: 'POST',
                        url: '/job-selection-test',
                        data: {
                            email: email,
                            result: JSON.stringify(getTestResult())
                        },
                        success: function () {
                            $btn.button('reset');
                            var result = getTestResult();
                            location.href = '/job-selection-test/' + result.type + '/' + result.suggest;
                        },
                        error: function () {
                            $btn.button('reset');
                            alert('Có sự cố xảy ra, vui lòng thử lại');
                        }
                    });
                }
            }
        });
    });
</script>
@endpush
