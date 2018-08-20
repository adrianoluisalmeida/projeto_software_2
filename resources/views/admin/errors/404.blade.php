@extends('admin.layout.app')

@section('header_title')
    @lang('titles.404')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('/admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        404 | @lang('titles.404')
    </li>
@endsection

@section('content')

    <div class="col-md-12 page-403 text-center">
        <div class="number">
            404
        </div>
        <div class="details">
            <h3>@lang('messages.404.title')</h3>
            <p>
                @lang('messages.404.message')
                @lang('messages.more_information_contact')
            </p>

        </div>
    </div>
@endsection