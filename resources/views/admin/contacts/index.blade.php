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

        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Assunto</td>
                <td>Usuário</td>
            </tr>
            </thead>
            <tbody>
               
            @foreach($entity->contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->user->name }}</td>

                    <td>
                        @include("admin.layout.bottons", ["buttons" => ["view"], "id" => $contact->id])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
@endsection