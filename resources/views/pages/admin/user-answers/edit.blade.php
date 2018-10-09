@extends('layouts.admin.application', ['menu' => 'user_answers'] )

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
UserAnswers
@stop

@section('breadcrumb')
    <li><a href="{!! action('Admin\UserAnswerController@index') !!}"><i class="fa fa-files-o"></i> UserAnswers</a></li>
    @if( $isNew )
        <li class="active">New</li>
    @else
        <li class="active">{{ $userAnswer->id }}</li>
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
        <form action="{!! action('Admin\UserAnswerController@store') !!}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{!! action('Admin\UserAnswerController@update', [$userAnswer->id]) !!}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
    @endif
            {!! csrf_field() !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">

                    </h3>
                </div>
                <div class="box-body">
                    
                    <div class="form-group @if ($errors->has('answer')) has-error @endif">
                        <label for="answer">@lang('admin.pages.user-answers.columns.answer')</label>
                        <input type="text" class="form-control" id="answer" name="answer" value="{{ old('answer') ? old('answer') : $userAnswer->answer }}">
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_enabled" value="1"
                                       @if( $userAnswer->is_enabled) checked @endif
                                > @lang('admin.pages.user-answers.columns.is_enabled')
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
