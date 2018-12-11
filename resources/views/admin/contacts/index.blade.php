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

    @foreach($entities as $entity)

    <div class="col-md-12">
        <h2><small>Entidade </small>{{ $entity->name }}</h2>
        @if(sizeof($contacts = $entity->contactsPaginated()) > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Nº</td>
                    <td>Assunto</td>
                    <td>Usuário</td>
                </tr>
                </thead>
                <tbody>

                @foreach($contacts as $contact)
                    <tr>
                        <td @if(!$contact->answered())style="font-weight: bold;"@endif>{{ $contact->id }}</td>
                        <td @if(!$contact->answered())style="font-weight: bold;"@endif>{{ $contact->subject }}</td>
                        <td @if(!$contact->answered())style="font-weight: bold;"@endif>{{ $contact->user->name }}</td>
                        <td>
                            @include("admin.layout.bottons", ["buttons" => ["view"], "id" => $contact->id])
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$contacts->links()}}
        @else
            <p>Nenhuma mensagem.</p>
        @endif
    </div>
    @endforeach
@endsection