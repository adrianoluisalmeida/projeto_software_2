@extends('admin.layout.app')

@section('header_title')
    @lang('titles.permissions')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        @lang('titles.permissions')
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
                <td>Nome Legível</td>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->readable_name }}</td>
                    <td>
                        @include("admin.layout.bottons", ["buttons" => ["edit"], "id" => $permission->id])
                        @include("admin.layout.bottons", ["buttons" => ["remove"], "id" => $permission->id])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection