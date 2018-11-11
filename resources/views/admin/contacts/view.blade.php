@extends('admin.layout.app')

@section('header_title')
    @lang('titles.contacts')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        @lang('titles.contacts')
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
                        {!! Form::open(['url' => 'admin/contacts/status-update', 'class' => 'horizontal-form', 'files' => true, 'method' => 'POST']) !!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Responder Contato de: {{$contact->user->name}}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {!! Form::label('subject', 'Assunto', ['class' => 'control-label']) !!}
                                {!! Form::text('subject', "Resposta - " . $contact->subject, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', 'Conteúdo', ['class' => 'control-label']) !!}
                                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            </div>
                            {!! Form::hidden('contact_id', $contact->id) !!}

                            
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
            <br>
            


            <!-- BEGIN PAGE HEADER-->

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="invoice">


                <div class="row">
                  
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3>Contato inicial:</h3>
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
                                <h4>Assunto:</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        {{ $contact->subject }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h4>Conteúdo:</h4>
                                {{$contact->content}}<br/>

                            </div>
                        </div>
                      
                    </div>

                </div>

                <br>
             
                <div class="row">

                    <div class="col-xs-12 invoice-block">
                        <br/>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Responder
                        </button>
                        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                        <h3>Respostas</h3>
                        <table class="table table-striped">
                                <thead>
                                <tr>
                                   <td>Usuário</td>
                                    <td>Assunto</td>
                                    <td>Conteúdo</td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts_answers as $answer)
                                        <tr>
                                            <td>{{ $answer->user->name }}</td>
                                            <td>{{ $answer->subject }}</td>
                                            <td>{{ $answer->content }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->


    </div>
@endsection