@extends('layouts.admin.application', ['menu' => 'files'] )

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
Files
@stop

@section('breadcrumb')
    <li><a href="{!! action('Admin\FileController@index') !!}"><i class="fa fa-files-o"></i> Files</a></li>
    @if( $isNew )
        <li class="active">New</li>
    @else
        <li class="active">{{ $file->id }}</li>
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
        <form action="{!! action('Admin\FileController@store') !!}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{!! action('Admin\FileController@update', [$file->id]) !!}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
    @endif
            {!! csrf_field() !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">

                    </h3>
                </div>
                <div class="box-body">
                    
                    <div class="form-group @if ($errors->has('url')) has-error @endif">
                        <label for="url">@lang('admin.pages.files.columns.url')</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ old('url') ? old('url') : $file->url }}">
                    </div>

                    <div class="form-group @if ($errors->has('title')) has-error @endif">
                        <label for="title">@lang('admin.pages.files.columns.title')</label>
                        <textarea name="title" class="form-control" rows="5" placeholder="@lang('admin.pages.files.columns.title')">{{{ old('title') ? old('title') : $file->title }}}</textarea>
                    </div>

                    <div class="form-group @if ($errors->has('entity_type')) has-error @endif">
                        <label for="entity_type">@lang('admin.pages.files.columns.entity_type')</label>
                        <input type="text" class="form-control" id="entity_type" name="entity_type" value="{{ old('entity_type') ? old('entity_type') : $file->entity_type }}">
                    </div>

                    <div class="form-group @if ($errors->has('file_category_type')) has-error @endif">
                        <label for="file_category_type">@lang('admin.pages.files.columns.file_category_type')</label>
                        <input type="text" class="form-control" id="file_category_type" name="file_category_type" value="{{ old('file_category_type') ? old('file_category_type') : $file->file_category_type }}">
                    </div>

                    <div class="form-group @if ($errors->has('s3_key')) has-error @endif">
                        <label for="s3_key">@lang('admin.pages.files.columns.s3_key')</label>
                        <input type="text" class="form-control" id="s3_key" name="s3_key" value="{{ old('s3_key') ? old('s3_key') : $file->s3_key }}">
                    </div>

                    <div class="form-group @if ($errors->has('s3_bucket')) has-error @endif">
                        <label for="s3_bucket">@lang('admin.pages.files.columns.s3_bucket')</label>
                        <input type="text" class="form-control" id="s3_bucket" name="s3_bucket" value="{{ old('s3_bucket') ? old('s3_bucket') : $file->s3_bucket }}">
                    </div>

                    <div class="form-group @if ($errors->has('s3_region')) has-error @endif">
                        <label for="s3_region">@lang('admin.pages.files.columns.s3_region')</label>
                        <input type="text" class="form-control" id="s3_region" name="s3_region" value="{{ old('s3_region') ? old('s3_region') : $file->s3_region }}">
                    </div>

                    <div class="form-group @if ($errors->has('s3_extension')) has-error @endif">
                        <label for="s3_extension">@lang('admin.pages.files.columns.s3_extension')</label>
                        <input type="text" class="form-control" id="s3_extension" name="s3_extension" value="{{ old('s3_extension') ? old('s3_extension') : $file->s3_extension }}">
                    </div>

                    <div class="form-group @if ($errors->has('media_type')) has-error @endif">
                        <label for="media_type">@lang('admin.pages.files.columns.media_type')</label>
                        <input type="text" class="form-control" id="media_type" name="media_type" value="{{ old('media_type') ? old('media_type') : $file->media_type }}">
                    </div>

                    <div class="form-group @if ($errors->has('file_size')) has-error @endif">
                        <label for="file_size">@lang('admin.pages.files.columns.file_size')</label>
                        <input type="text" class="form-control" id="file_size" name="file_size" value="{{ old('file_size') ? old('file_size') : $file->file_size }}">
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_enabled" value="1"
                                       @if( $file->is_enabled) checked @endif
                                > @lang('admin.pages.files.columns.is_enabled')
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
