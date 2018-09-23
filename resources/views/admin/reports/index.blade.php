@extends('admin.layout.app')

@section('header_title')
    @lang('titles.reports')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        @lang('titles.reports')
    </li>
@endsection

@section('content')

    @foreach($entities as $entity)

    <div class="col-md-12">
        <h2><small>Entidade </small>{{ $entity->name }}</h2>
{{--        @include("admin.layout.bottons", ["buttons" => ["create"]])--}}
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Descrição</td>
                <td>Endereço</td>
            </tr>
            </thead>
            <tbody>
            @foreach($entity->reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->address }}</td>
                    <td>{{ $report->description }}</td>

                    <td>
                        @include("admin.layout.bottons", ["buttons" => ["view"], "id" => $report->id])
{{--                        @include("admin.layout.bottons", ["buttons" => ["remove"], "id" => $report->id])--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
@endsection