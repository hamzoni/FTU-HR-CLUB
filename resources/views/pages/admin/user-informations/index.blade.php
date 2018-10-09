@extends('layouts.admin.application', ['menu' => 'user_informations'] )

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
UserInformations
@stop

@section('breadcrumb')
<li class="active">UserInformations</li>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <p class="text-right">
                <a href="{!! URL::action('Admin\UserInformationController@create') !!}" class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.create')</a>
            </p>
        </h3>
        {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 10px">ID</th>
                <th>@lang('admin.pages.user-informations.columns.fullname')</th>
                <th>@lang('admin.pages.user-informations.columns.phone_number')</th>
                <th>@lang('admin.pages.user-informations.columns.university')</th>
                <th>@lang('admin.pages.user-informations.columns.graduated_year')</th>
                <th>@lang('admin.pages.user-informations.columns.major')</th>
                <th>@lang('admin.pages.user-informations.columns.major2')</th>
                <th>@lang('admin.pages.user-informations.columns.personality')</th>

                <th style="width: 40px">@lang('admin.pages.user-informations.columns.is_enabled')</th>
                <th style="width: 40px">&nbsp;</th>
            </tr>
            @foreach( $models as $model )
                <tr>
                    <td>{{ $model->id }}</td>
                <td>{{ $model->fullname }}</td>
                <td>{{ $model->phone_number }}</td>
                <td>{{ $model->university }}</td>
                <td>{{ $model->graduated_year }}</td>
                <td>{{ $model->major }}</td>
                <td>{{ $model->major2 }}</td>
                <td>{{ $model->personality }}</td>

                    <td>
                        @if( $model->is_enabled )
                            <span class="badge bg-green">@lang('admin.pages.user-informations.columns.is_enabled_true')</span>
                        @else
                            <span class="badge bg-red">@lang('admin.pages.user-informations.columns.is_enabled_false')</span>
                        @endif
                    </td>
                    <td>
                        <a href="{!! URL::action('Admin\UserInformationController@show', $model->id) !!}" class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.edit')</a>
                        <a href="#" class="btn btn-block btn-danger btn-sm delete-button" data-delete-url="{!! action('Admin\UserInformationController@destroy', $model->id) !!}">@lang('admin.pages.common.buttons.delete')</a>
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