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
    <div class="col-md-12">

        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">

            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['url' => 'admin/reports/status-update', 'class' => 'horizontal-form', 'files' => true, 'method' => 'POST']) !!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Atualização de situação</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {!! Form::label('description', 'Descrição', ['class' => 'control-label']) !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                            {!! Form::hidden('report_id', $report->id) !!}

                            <div class="form-group">
                                {!! Form::label('status', 'Situação * ', ['class' => 'control-label']) !!}
                                {!! Form::select('status', [1 => 'Em Aberto', 2 => 'Em andamento', 3 => 'Concluído'], {{ isset($report) ? $report->status : null }}, ['class' => 'form-control']) !!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        {!! Form::open(['url' => 'admin/reports', 'class' => 'horizontal-form', 'files' => true, 'method' => 'POST']) !!}
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



            <!-- BEGIN PAGE HEADER-->

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="invoice">


                <div class="row">
                    <div class="col-xs-4">
                        <div class="row invoice-logo">
                            <div class="col-xs-12 invoice-logo-space">
                                <img src="{{ asset('/storage/reports/thumb_570_515' . $report->photo) }}" alt=""
                                     class="img-responsive"/>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">


                            <div class="col-xs-12">
                                <h4>Usuário (quem solicitou):</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <b>Nome</b><br/>
                                        {{ $user->name }}
                                    </li>
                                    <li>
                                        <b>E-mail</b><br>
                                        {{ $user->email }}
                                    </li>


                                </ul>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h4>Descrição:</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        {{ $report->description }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h4>Endereço:</h4>
                                <address>

                                    {{$report->address}}<br/>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h4>Reações:</h4>
                                <div class="col-md-3 no-padding">
                                    Positivas:
                                    {{count($report->positives)}}<br/>
                                </div>
                                <div class="col-md-3 no-padding">
                                    Negativas:
                                    {{count($report->negatives)}}<br/>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Atualizar situação
                </button>
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

                <div class="row">
                    <div class="col-xs-12">
                        <h2>Histórico de modificações</h2>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Status
                                </th>

                                <th class="hidden-480">
                                    Descrição
                                </th>

                                <th>
                                    Data
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reportStatus as $status)
                            <tr>
                                <td>
                                    {{ $status->status }}
                                </td>

                                <td class="hidden-480">
                                    {{ $status->description }}
                                </td>

                                <td>
                                    {{ $status->created_at }}
                                </td>

                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Reações</h2>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>


                                <th class="hidden-480">
                                    Usuário
                                </th>
                                <th class="hidden-480">
                                    Comentário
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($report->reactions as $reaction)
                                <tr>
                                    <td>
                                        {{ $reaction->user->name }}
                                    </td>
                                    <td class="hidden-480">
                                        {{ $reaction->comment }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-8 invoice-block">
                        <br/>
                        <a class="btn btn-lg btn-info hidden-print" onclick="javascript:window.print();">Imprimir <i
                                    class="fa fa-print"></i></a>

                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->


    </div>
@endsection