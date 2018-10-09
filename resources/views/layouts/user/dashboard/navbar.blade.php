<div id="dashboard-navbar">
    <a href="{{ route('hrc.index') }}" class="dashboard-navbar-logo"></a>

    <div class="dashboard-navbar-buttons text-center">
        <div class="row">
            <div class="col-lg-6 visible-lg-block text-right">
                <button type="button" class="btn btn-upload-cv">
                    Nộp CV tham dự UVTN
                </button>
            </div>

            <div class="col-lg-6 hidden-lg text-left">
                <button type="button" class="btn btn-upload-cv">
                    Nộp CV tham dự UVTN
                </button>
            </div>

            <div class="visible-md-block visible-sm-block visible-xs-block">
                <br />
            </div>

            <div class="col-lg-6 text-left">
                <button type="button" class="btn btn-discover-yourself">
                    Khám phá bản thân
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-upload-cv").on('click', function (e) {
                e.preventDefault();

                window.location.href = laroute.route('dashboard.personal');
            });

            $(".btn-discover-yourself").on('click', function (e) {
                e.preventDefault();

                window.location.href = laroute.route('dashboard.evaluation');
            });
        });
    </script>
@endpush