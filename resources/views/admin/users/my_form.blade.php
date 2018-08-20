<div class="col-md-5 col-md-offset-3">
    <h3>Alterar meu usuário</h3>
    <div class="form-group">
        {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}

        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>

    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}

        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('email') }}</span>

    </div>
    <div class="form-group">
        {!! Form::label('password', 'Senha', ['class' => ' control-label']) !!}

        {!! Form::password('password', ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('password') }}</span>

    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirmar senha', ['class' => 'control-label']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
    </div>

    {!! Form::submit('Salvar', ['class' => 'btn ink-reaction btn-raised btn-primary pull-right']) !!} </div>
</div>
