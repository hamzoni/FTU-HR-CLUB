@extends('layouts.admin.application', ['menu' => 'user_tests'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
<script src="{{ \URLHelper::asset('libs/moment/moment.min.js', 'admin') }}"></script>
<script src="{{ \URLHelper::asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js', 'admin') }}"></script>
<script>
$('.datetime-field').datetimepicker({'format': 'YYYY-MM-DD HH:mm:ss'});
</script>
@stop

@section('title')
@stop

@section('header')
UserTests
@stop

@section('breadcrumb')
    <li><a href="{!! action('Admin\UserTestController@index') !!}"><i class="fa fa-files-o"></i> UserTests</a></li>
    @if( $isNew )
        <li class="active">New</li>
    @else
        <li class="active">{{ $userTest->id }}</li>
    @endif
@stop

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if( $isNew )
        <form action="{!! action('Admin\UserTestController@store') !!}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{!! action('Admin\UserTestController@update', [$userTest->id]) !!}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
    @endif
            {!! csrf_field() !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">

                    </h3>
                </div>
                <div class="box-body">
                    
                    <div class="form-group @if ($errors->has('city')) has-error @endif">
                        <label for="city">@lang('admin.pages.user-tests.columns.city')</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') ? old('city') : $userTest->city }}">
                    </div>

                    <div class="form-group">
                        <label for="submitted_at">@lang('admin.pages.user-tests.columns.submitted_at')</label>
                        <div class="input-group date datetime-field">
                        <input type="text" class="form-control" name="submitted_at"
                        value="{{ old('submitted_at') ? old('submitted_at') : \DateTimeHelper::formatDateTime($userTest->submitted_at) }}">
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_enabled" value="1"
                                       @if( $userTest->is_enabled) checked @endif
                                > @lang('admin.pages.user-tests.columns.is_enabled')
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">@lang('admin.pages.common.buttons.save')</button>
                </div>
            </div>
        </form>
@stop
