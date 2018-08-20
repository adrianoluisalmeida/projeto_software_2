@extends('admin.layout.app')

@section('header_title')
    @lang('titles.permissions') - @lang('titles.edit')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin/') }}">@lang('titles.home')</a>
    </li>
    <li>
        <a href="{{ url('admin/permissions') }}">@lang('titles.permissions')</a>
    </li>
    <li class="active">
        @lang('titles.edit')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        {!! Form::model($row, ['url' => ['admin/permissions/' . $row->id], 'class' => 'horizontal-form', 'method' => 'PUT', 'files' => true]) !!}
        @include('admin.permissions.form')
        {!! Form::close() !!}
    </div>
@endsection
