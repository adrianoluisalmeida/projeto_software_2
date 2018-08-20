@extends('admin.layout.app')

@section('header_title')
    @lang('titles.users') - @lang('titles.edit')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>

    <li class="active">
        @lang('titles.my_user')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        {!! Form::model($row, ['url' => ['admin/users/my', $row->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        @include('admin.users.my_form')
        {!! Form::close() !!}
    </div>
@endsection
