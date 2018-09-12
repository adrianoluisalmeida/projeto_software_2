@extends('admin.layout.app')

@section('header_title')
    @lang('titles.categories')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        @lang('titles.categories')
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
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @include("admin.layout.bottons", ["buttons" => ["edit"], "id" => $category->id])
                        @include("admin.layout.bottons", ["buttons" => ["remove"], "id" => $category->id])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection