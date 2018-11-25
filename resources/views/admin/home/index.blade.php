@extends('admin.layout.app')
@section('navigation')
    
    <li>
        @lang('titles.home')
    </li>
    
@endsection
@section('content')


    <div class="col-md-12">
            
            <h3 class="page-title">
            Seja bem vindo <small> {{$user->name}}</small>
            </h3>
                 <div class="row stats-overview-cont">
                    <div class="col-md-3">
                        <div class="stats-overview stat-block">
                            
                            <div class="details text-center">
                                <div class="title">
                                    <b>Novas Solicitações</b>
                                </div>
                                <div class="numbers">
                                     {{ $newSolicitations }}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-overview stat-block">
                            <div class="details text-center">
                                <div class="title">
                                    <b>Solicitações Concluídas</b>
                                </div>
                                <div class="numbers">
                                     {{ $closedSolicitations }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-overview stat-block">
                            <div class="details text-center">
                                <div class="title">
                                    <b>Novos Contatos</b>
                                </div>
                                <div class="numbers">
                                    {{ $newContacts}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-overview stat-block">
                            <div class="details text-center">
                                <div class="title">
                                    <b>Contatos Respondidos</b>
                                </div>
                                <div class="numbers">
                                    {{ $newContactsAnswers }}
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
        
    </div>
@endsection