@extends('admin.layout.app')

@section('header_title')
    @lang('titles.permissions') - @lang('titles.create')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin/') }}">@lang('titles.home')</a>
    </li>
    <li>
        <a href="{{ url('admin/permissions') }}">@lang('titles.permissions')</a>
    </li>
    <li class="active">
        @lang('titles.create')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        {!! Form::open(['url' => 'admin/permissions', 'class' => 'horizontal-form', 'files' => true, 'method' => 'POST']) !!}
        @include('admin.permissions.form')
        {!! Form::close() !!}
    </div>
@endsection
