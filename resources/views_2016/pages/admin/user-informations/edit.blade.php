@extends('layouts.admin.application', ['menu' => 'user_informations'] )

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
UserInformations
@stop

@section('breadcrumb')
    <li><a href="{!! action('Admin\UserInformationController@index') !!}"><i class="fa fa-files-o"></i> UserInformations</a></li>
    @if( $isNew )
        <li class="active">New</li>
    @else
        <li class="active">{{ $userInformation->id }}</li>
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
        <form action="{!! action('Admin\UserInformationController@store') !!}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{!! action('Admin\UserInformationController@update', [$userInformation->id]) !!}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
    @endif
            {!! csrf_field() !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">

                    </h3>
                </div>
                <div class="box-body">
                    
                    <div class="form-group @if ($errors->has('fullname')) has-error @endif">
                        <label for="fullname">@lang('admin.pages.user-informations.columns.fullname')</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname') ? old('fullname') : $userInformation->fullname }}">
                    </div>

                    <div class="form-group @if ($errors->has('phone_number')) has-error @endif">
                        <label for="phone_number">@lang('admin.pages.user-informations.columns.phone_number')</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : $userInformation->phone_number }}">
                    </div>

                    <div class="form-group @if ($errors->has('university')) has-error @endif">
                        <label for="university">@lang('admin.pages.user-informations.columns.university')</label>
                        <input type="text" class="form-control" id="university" name="university" value="{{ old('university') ? old('university') : $userInformation->university }}">
                    </div>

                    <div class="form-group @if ($errors->has('graduated_year')) has-error @endif">
                        <label for="graduated_year">@lang('admin.pages.user-informations.columns.graduated_year')</label>
                        <input type="text" class="form-control" id="graduated_year" name="graduated_year" value="{{ old('graduated_year') ? old('graduated_year') : $userInformation->graduated_year }}">
                    </div>

                    <div class="form-group @if ($errors->has('major')) has-error @endif">
                        <label for="major">@lang('admin.pages.user-informations.columns.major')</label>
                        <input type="text" class="form-control" id="major" name="major" value="{{ old('major') ? old('major') : $userInformation->major }}">
                    </div>

                    <div class="form-group @if ($errors->has('major2')) has-error @endif">
                        <label for="major2">@lang('admin.pages.user-informations.columns.major2')</label>
                        <input type="text" class="form-control" id="major2" name="major2" value="{{ old('major2') ? old('major2') : $userInformation->major2 }}">
                    </div>

                    <div class="form-group @if ($errors->has('personality')) has-error @endif">
                        <label for="personality">@lang('admin.pages.user-informations.columns.personality')</label>
                        <input type="text" class="form-control" id="personality" name="personality" value="{{ old('personality') ? old('personality') : $userInformation->personality }}">
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_enabled" value="1"
                                       @if( $userInformation->is_enabled) checked @endif
                                > @lang('admin.pages.user-informations.columns.is_enabled')
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
