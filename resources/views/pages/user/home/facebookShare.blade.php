@extends('layouts.user.home.application')

@section('og:title') {{ config('hrc.shareFacebook.title') }} @endsection
@section('og:description') {{ config('hrc.shareFacebook.description') }} @endsection
@section('meta:description') {{ config('hrc.shareFacebook.description') }} @endsection
@section('og:image') {{ $thumbnail_url }} @endsection

@push('metadata')
<meta property="og:image:width" content="{{ $thumbnail_width }}" />
<meta property="og:image:height" content="{{ $thumbnail_height }}" />
@endpush

@push('scripts')
    <script type="text/javascript">
        window.location.href = '{{ route('hrc.index') }}';
    </script>
@endpush