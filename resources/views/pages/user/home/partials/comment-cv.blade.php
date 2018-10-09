<div id="hrc-comment-cv" class="container hide hrc-section">
    <div class="hrc-comment-cv-container">
        <div class="hrc-comment-cv-heading-1">
            SỰ KIỆN <span>COMMENT CV CHUẨN</span> CÙNG CHUYÊN GIA
        </div>

        <div class="hrc-comment-cv-heading-2 color-1">
            Đồng hành cùng Ứng viên Tài năng 2017
        </div>

        <ul class="hrc-comment-cv-list">
            <li>
                Bạn sẽ sở hữu CV theo chuẩn Nhà tuyển dụng
            </li>

            <li>
                Cơ hội cuối cùng và diễn ra duy nhất trong ngày <b class="color-1">07/11</b>
            </li>
        </ul>

        <div class="hrc-comment-cv-heading-3">COMING SOON</div>

        <div id="hrc-comment-cv-clock-container">
            <div id="hrc-comment-cv-clock-countdown"></div>

            <ul class="hrc-comment-cv-clock-label clearfix">
                <li>Ngày</li>
                <li>Giờ</li>
                <li>Phút</li>
                <li>Giây</li>
            </ul>
        </div>

        <div class="hrc-comment-cv-heading-4">Làm thế nào để không bỏ lỡ?</div>

        <a href="#" class="hrc-comment-cv-register-now">ĐĂNG KÝ NGAY</a>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var isLogged = false;

        @if ($authUser)
                isLogged = true;
        @endif

        $(".hrc-comment-cv-register-now").on('click', function (e) {
            e.preventDefault();

            if (isLogged) {
                window.location.href = laroute.route('dashboard.personal');
            } else {
                $("meta[name='redirect_url']").attr('content', laroute.route('dashboard.personal'));
                $("meta[name='redirect_after_auth']").attr('content', laroute.route('dashboard.personal'));

                $("#signInModal2").modal();
            }
        });
    });

    $(document).ready(function () {
        $("#hrc-comment-cv-clock-countdown")
                .countdown("2017/11/07", function(event) {
                    $(this).text(
                            event.strftime('%D.%H:%M:%S')
                    );
                });
    });
</script>
@endpush