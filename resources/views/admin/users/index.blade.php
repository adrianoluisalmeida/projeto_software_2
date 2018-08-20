@extends('admin.layout.app')

@section('header_title')
    @lang('titles.roles')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        @lang('titles.users')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        @include("admin.layout.bottons", ["buttons" => ["create"]])
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>E-mail</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @include("admin.layout.bottons", ["buttons" => ["edit"], "id" => $user->id])
                        @include("admin.layout.bottons", ["buttons" => ["remove"], "id" => $user->id])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection