@extends('admin.layout.app')

@section('header_title')
    @lang('titles.reports') - @lang('titles.edit')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin/') }}">@lang('titles.home')</a>
    </li>
    <li>
        <a href="{{ url('admin/reports') }}">@lang('titles.reports')</a>
    </li>
    <li class="active">
        @lang('titles.edit')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        {!! Form::model($row, ['url' => ['admin/reports/' . $row->id], 'class' => 'horizontal-form', 'method' => 'PUT', 'files' => true]) !!}
        @include('admin.reports.form')
        {!! Form::close() !!}
    </div>
@endsection
