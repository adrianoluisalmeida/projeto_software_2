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
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">Save changes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- BEGIN PAGE HEADER-->

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="invoice">


                <div class="row">
                    <div class="col-xs-4">
                        <div class="row invoice-logo">
                            <div class="col-xs-12 invoice-logo-space">
                                <img src="{{ asset('/storage/reports/thumb_570_515' . $report->photo) }}" alt="" class="img-responsive"/>
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
                    </div>


                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <h2>Histórico de modificações</h2>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>

                                <th class="hidden-480">
                                    Description
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>

                                <td class="hidden-480">
                                    ...
                                </td>

                            </tr>

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