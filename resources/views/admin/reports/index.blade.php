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

@push('scripts')
    <script type="text/javascript">
        function filter() {
            var status = document.getElementById('select_status').value;
            var category = document.getElementById('select_category').value;
            document.getElementById('hidden_status').value = status;
            document.getElementById('hidden_category').value = category;
            document.getElementById('form_filtro').submit();
        }
    </script>
@endpush

@section('content')
    <form id="form_filtro" method="GET" action="{{route('reports.index')}}">
        <input id="hidden_status" type="hidden" name="status" />
        <input id="hidden_category" type="hidden" name="category" />
    </form>
    <div class="input-group col-md-6" style="margin-left: 15px;padding: 5px;background-color: #e4e4e4;">

        <span class="input-group-addon" title="Situação" id="situacaoLabel"> <i class="fa fa-filter"></i>&nbsp;&nbsp;&nbsp;Situação:&nbsp;</span>
        <select id="select_status" name="status" class="form-control" onchange="filter()">
            <option value="0" @if(!isset($status)||$status==0) selected @endif>Todas</option>
            <option value="1" @if(isset($status)&&$status==1) selected @endif>Abertas</option>
            <option value="2" @if(isset($status)&&$status==2) selected @endif>Em andamento</option>
            <option value="3" @if(isset($status)&&$status==3) selected @endif>Concluídas</option>
        </select>
        <span class="input-group-addon" title="Situação" id="situacaoLabel">Categoria: </span>
        <select id="select_category" name="category" class="form-control" onchange="filter()">
            <option value="0" @if(!isset($category)||$category==0) selected @endif>Todas</option>
            @foreach($categories as $categ)
                <option value="{{$categ->id}}" @if(isset($category)&&$category==$categ->id) selected @endif>{{$categ->name}}</option>
            @endforeach
        </select>
    </div>

    @foreach($entities as $entity)
    <div class="col-md-12">
        <h2><small>Entidade </small>{{ $entity->name }}</h2>
{{--        @include("admin.layout.bottons", ["buttons" => ["create"]])--}}
        @if(sizeof($reports = $entity->reportsFiltered($status, $category)) > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <td style="width: 5%;">Nº</td>
                    <td style="width: 10%;">Categoria</td>
                    <td>Descrição</td>
                    <td>Endereço</td>
                    <td style="width: 12%;">Situação</td>
                    <td style="width: 5%;"><i class="fa fa-thumbs-up"></i></td>
                    <td style="width: 5%;"><i class="fa fa-thumbs-down"></i></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->category->name }}</td>
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
            {{$reports->links()}}
        @else
            <p>Nenhuma solicitação com o filtro selecionado.</p>
        @endif
    </div>
    @endforeach
@endsection