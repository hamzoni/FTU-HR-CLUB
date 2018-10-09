@extends('layouts.admin.application', ['menu' => 'user_tests'] )

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
UserTests
@stop

@section('breadcrumb')
<li class="active">UserTests</li>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <p class="text-right">
                <a href="{!! URL::action('Admin\UserTestController@create') !!}" class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.create')</a>
            </p>
        </h3>
        {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 10px">ID</th>
                <th>@lang('admin.pages.user-tests.columns.user_id')</th>
                <th>@lang('admin.pages.user-tests.columns.city')</th>
                <th>@lang('admin.pages.user-tests.columns.submitted_at')</th>

                <th style="width: 40px">@lang('admin.pages.user-tests.columns.is_enabled')</th>
                <th style="width: 40px">&nbsp;</th>
            </tr>
            @foreach( $models as $model )
                <tr>
                    <td>{{ $model->id }}</td>
                    <td>
                        {{ $model->user_id }}
                    </td>
                <td>{{ $model->city }}</td>
                <td>{{ $model->submitted_at }}</td>

                    <td>
                        @if( $model->is_enabled )
                            <span class="badge bg-green">@lang('admin.pages.user-tests.columns.is_enabled_true')</span>
                        @else
                            <span class="badge bg-red">@lang('admin.pages.user-tests.columns.is_enabled_false')</span>
                        @endif
                    </td>
                    <td>
                        <a href="{!! URL::action('Admin\UserTestController@show', $model->id) !!}" class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.edit')</a>
                        <a href="#" class="btn btn-block btn-danger btn-sm delete-button" data-delete-url="{!! action('Admin\UserTestController@destroy', $model->id) !!}">@lang('admin.pages.common.buttons.delete')</a>
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