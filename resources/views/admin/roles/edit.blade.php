@extends('admin.layout.app')

@section('header_title')
    @lang('titles.roles') - @lang('titles.edit')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin/') }}">@lang('titles.home')</a>
    </li>
    <li>
        <a href="{{ url('admin/roles') }}">@lang('titles.roles')</a>
    </li>
    <li class="active">
        @lang('titles.edit')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        {!! Form::model($row, ['url' => ['admin/roles/' . $row->id], 'class' => 'horizontal-form', 'method' => 'PUT', 'files' => true]) !!}
        @include('admin.roles.form')
        {!! Form::close() !!}
    </div>
@endsection
