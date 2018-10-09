@extends('layouts.admin.application', ['menu' => 'files'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
<script src="{!! \URLHelper::asset('js/delete_item.js', 'admin') !!}"></script>
@stop

@section('title')
@stop

@section('header')
Files
@stop

@section('breadcrumb')
<li class="active">Files</li>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <p class="text-right">
                <a href="{!! URL::action('Admin\FileController@export') !!}" class="btn btn-danger btn-sm">Export</a>
            </p>
        </h3>
        {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 10px">ID</th>
                <th>@lang('admin.pages.files.columns.url')</th>
                <th>Name</th>
                <th>Email</th>
                <th>@lang('admin.pages.files.columns.file_category_type')</th>
                <th>@lang('admin.pages.files.columns.media_type')</th>
                <th>@lang('admin.pages.files.columns.file_size')</th>
                <th>Created At</th>

                <th style="width: 40px">@lang('admin.pages.files.columns.is_enabled')</th>
                <th style="width: 40px">&nbsp;</th>
            </tr>
            @foreach( $models as $model )
                <tr>
                    <td>{{ $model->id }}</td>
                <td>
                    <a href="{{ $model->url }}" target="_blank">
                        {{ $model->url }}
                    </a>
                </td>
                <td>{{ $model->userInformation->fullname or 'N/A' }}</td>
                <td>{{ $model->user->email or 'N/A' }}</td>
                <td>{{ $model->file_category_type }}</td>
                <td>{{ $model->media_type }}</td>
                <td>{{ $model->file_size }}</td>
                    <td>{{ $model->created_at }}</td>

                    <td>
                        @if( $model->is_enabled )
                            <span class="badge bg-green">@lang('admin.pages.files.columns.is_enabled_true')</span>
                        @else
                            <span class="badge bg-red">@lang('admin.pages.files.columns.is_enabled_false')</span>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-block btn-danger btn-sm delete-button" data-delete-url="{!! action('Admin\FileController@destroy', $model->id) !!}">@lang('admin.pages.common.buttons.delete')</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="box-footer">
        {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
    </div>
</div>
@stop