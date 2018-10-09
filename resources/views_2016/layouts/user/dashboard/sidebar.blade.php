<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="{{ route('dashboard.index') }}" class="dashboard-hrc-logo">
                {{ strtoupper($authUser->email[0]) }}
            </a>

            <div class="dashboard-user-auth-email">
                {{ $authUser->email }}
            </div>
        </li>

        <li @if (\Route::getCurrentRoute()->getName() == 'dashboard.rules')class="active"@endif>
            <a href="{{ route('dashboard.rules') }}">
                Thể lệ
            </a>
        </li>

        <li @if (\Route::getCurrentRoute()->getName() == 'dashboard.personal' || \Route::getCurrentRoute()->getName() == 'dashboard.editPersonal')class="active"@endif>
            <a href="{{ route('dashboard.personal') }}">
                Thông tin cá nhân
            </a>
        </li>

        <li @if (\Route::getCurrentRoute()->getName() == 'dashboard.testOnline')class="active"@endif>
            <a href="{{ route('dashboard.testOnline') }}">
                Test Online
            </a>
        </li>

        <li @if (\Route::getCurrentRoute()->getName() == 'dashboard.evaluation')class="active"@endif>
            <a href="{{ route('dashboard.evaluation') }}">
                Đánh giá cá nhân
            </a>
        </li>

        <li @if (\Route::getCurrentRoute()->getName() == 'dashboard.introduceMajor')class="active"@endif>
            <a href="{{ route('dashboard.introduceMajor') }}">
                Sơ lược ngành nghề
            </a>
        </li>

        <li>
            <a href="{{ route('hrc.index') }}">
                Quay lại trang chủ
            </a>
        </li>
    </ul>
</div>