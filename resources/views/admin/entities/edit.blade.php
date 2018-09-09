@extends('admin.layout.app')

@section('header_title')
    @lang('titles.users') - @lang('titles.edit')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin/') }}">@lang('titles.home')</a>
    </li>
    <li>
        <a href="{{ url('admin/users') }}">@lang('titles.users')</a>
    </li>
    <li class="active">
        @lang('titles.edit')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        {!! Form::model($row, ['url' => ['admin/users/' . $row->id], 'class' => 'horizontal-form', 'method' => 'PUT', 'files' => true]) !!}
        @include('admin.users.form')
        {!! Form::close() !!}
    </div>
@endsection
