<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Using Laravel BoilerPlate
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ \DateTimeHelper::now()->format('Y') }} <a href="{{ route('hrc.index') }}">{{ \Config::get('site.name') }}</a>.</strong> All rights reserved.
</footer>