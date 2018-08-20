<div class="row">
    <div class="col-md-12">
        <h3 class="form-section">@lang('titles.roles')<br/></h3>
    </div>
    <div class="col-md-4 col-md-offset-4">


        <div class="form-group">
            {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ex.: admin']) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>

        <div class="form-group">
            {!! Form::submit(__('titles.save'), ['class' => 'btn ink-reaction btn-raised btn-primary pull-right']) !!}
        </div>

    </div>

</div>
<div class="clearfix"></div>