@extends('admin.layout.app')

@section('header_title')
    @lang('titles.entities')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        @lang('titles.entities')
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
                <td>Phone</td>
            </tr>
            </thead>
            <tbody>
            @foreach($entities as $entity)
                <tr>
                    <td>{{ $entity->id }}</td>
                    <td>{{ $entity->name }}</td>
                    <td>{{ $entity->email }}</td>
                    <td>
                        @include("admin.layout.bottons", ["buttons" => ["edit"], "id" => $entity->id])
                        @include("admin.layout.bottons", ["buttons" => ["remove"], "id" => $entity->id])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection