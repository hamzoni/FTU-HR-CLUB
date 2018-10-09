<div id="hrc-personality-test" class="container hide hrc-section">
    <div class="hrc-personality-test-container">
        <div class="hrc-personality-heading-1">TÌM KIẾM</div>
        <div class="hrc-personality-heading-2">NGÀNH NGHỀ</div>
        <div class="hrc-personality-heading-3">PHÙ HỢP?</div>

        <div class="hrc-personality-heading-hr"></div>

        <div class="hrc-personality-heading-4">Khám phá bản thân cùng Personality Test</div>

        <a href="#" class="hrc-personality-explore-now">KHÁM PHÁ NGAY</a>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var isLogged = false;

        @if ($authUser)
            isLogged = true;
        @endif

        $(".hrc-personality-explore-now").on('click', function (e) {
            e.preventDefault();

            if (isLogged) {
                window.location.href = laroute.route('dashboard.evaluation');
            } else {
                $("meta[name='redirect_url']").attr('content', laroute.route('dashboard.evaluation'));
                $("meta[name='redirect_after_auth']").attr('content', laroute.route('dashboard.evaluation'));

                $("#signInModal").modal();
            }
        });
    });
</script>
@endpush