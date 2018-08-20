<div class="col-md-5 col-md-offset-2">
    <h3>@lang('titles.users')</h3>
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

</div>
<div class="col-md-5">
    <h3>Grupos</h3>
    <div class="form-group">

        <div class="col-md-10 no-padding">

            @foreach($roles as $role)


                @if(isset($userRoles))
                    <?php $checked = in_array($role->id, $userRoles); ?>
                @else
                    <?php $checked = ""; ?>
                @endif
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('role[]', $role->id, $checked) !!} {{ $role->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="form-group m-b-0">
        <div class="col-md-7">
            {!! Form::submit(__('titles.save'), ['class' => 'btn ink-reaction btn-raised btn-primary pull-right']) !!}
        </div>
    </div>
</div>
