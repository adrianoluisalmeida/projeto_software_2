@extends('admin.layout.app')

@section('header_title')
    @lang('titles.roles')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        @lang('titles.roles')
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
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @include("admin.layout.bottons", ["buttons" => ["edit"], "id" => $role->id])
                        @include("admin.layout.bottons", ["buttons" => ["remove"], "id" => $role->id])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection