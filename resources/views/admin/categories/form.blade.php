<div class="col-md-5 col-md-offset-3">
    <h3>@lang('titles.categories')</h3>
    <div class="form-group">
        {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>

    </div>

    <div class="form-group">
        {!! Form::label('status', 'Situação * ', ['class' => 'control-label']) !!}
        {!! Form::select('status', [1 => 'Ativo', 0 => 'Inativo'], null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>

    {!! Form::submit(__('titles.save'), ['class' => 'btn ink-reaction btn-raised btn-primary pull-right']) !!}

</div>
