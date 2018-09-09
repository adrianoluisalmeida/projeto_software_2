@extends('admin.layout.app')

@section('header_title')
    @lang('titles.entities') - @lang('titles.create')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin/') }}">@lang('titles.home')</a>
    </li>
    <li>
        <a href="{{ url('admin/entities') }}">@lang('titles.entities')</a>
    </li>
    <li class="active">
        @lang('titles.create')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        {!! Form::open(['url' => 'admin/entities', 'class' => 'horizontal-form', 'files' => true, 'method' => 'POST']) !!}
        @include('admin.entities.form')
        {!! Form::close() !!}
    </div>
@endsection
