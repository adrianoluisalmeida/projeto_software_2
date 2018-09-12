<div class="col-md-5 col-md-offset-3">
    <h3>@lang('titles.entities')</h3>
    <div class="form-group">
        {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>

    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Telefone', ['class' => 'control-label']) !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('phone') }}</span>
    </div>
    <h2>Endereço</h2>
    <div class="form-group">
        {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-10 no-padding">
        {!! Form::label('street', 'Rua', ['class' => 'control-label']) !!}
        {!! Form::text('street', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('street') }}</span>
    </div>
    <div class="form-group col-md-2 no-padding-right">
        {!! Form::label('number', 'Número', ['class' => 'control-label']) !!}
        {!! Form::text('number', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('number') }}</span>
    </div>
    <div class="form-group">
        {!! Form::label('complement', 'Complemento', ['class' => 'control-label']) !!}
        {!! Form::text('complement', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('complement') }}</span>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('email') }}</span>

    </div>

    {!! Form::submit(__('titles.save'), ['class' => 'btn ink-reaction btn-raised btn-primary pull-right']) !!}

</div>
