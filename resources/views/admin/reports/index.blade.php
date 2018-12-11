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
    <div class="form-group">
        <form method="GET" action="{{route('reports.index')}}">
            <label>Exibir</label>
            <select name="status" class="form-control" onchange="this.form.submit()">
                <option value="0" @if(!isset($status)) selected @endif>Todas</option>
                <option value="1" @if(isset($status)&&$status==1) selected @endif>Abertas</option>
                <option value="2" @if(isset($status)&&$status==2) selected @endif>Em andamento</option>
                <option value="3" @if(isset($status)&&$status==3) selected @endif>Concluídas</option>
            </select>
        </form>
    </div>
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
                <td>Situação</td>
                <td>Apoiadores</td>
                <td>Denúncias</td>
            </tr>
            </thead>
            <tbody>
            @foreach($entity->reportsFiltered($status) as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->address }}</td>
                    <td>{{ $report->description }}</td>
                    <td>{{ $report->statusDescr() }}</td>
                    <td>{{ $report->positivesCount() }}</td>
                    <td>{{ $report->negativesCount() }}</td>
                    <td>
                        @include("admin.layout.bottons", ["buttons" => ["view"], "id" => $report->id])
{{--                        @include("admin.layout.bottons", ["buttons" => ["remove"], "id" => $report->id])--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$entity->reportsFiltered($status)->links()}}
    </div>
    @endforeach
@endsection