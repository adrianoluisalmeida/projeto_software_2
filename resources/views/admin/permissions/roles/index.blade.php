@extends('admin.layout.app')

@section('header_title')
    @lang('titles.permissions')
@endsection

@section('navigation')
    <li>
        <a href="{{ url('admin') }}">@lang('titles.home')</a>
    </li>
    <li class="active">
        @lang('titles.permissions')
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
            </div>

            {!! Form::open(['url' => '/admin/permissions/roles']) !!}

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Route</th>
                        @foreach($roles as $role)
                            <th class="text-center">{{ $role->name }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th colspan="{{ count($roles) }}">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($permissions as $permission)
                        <tr>
                            <td width="150">{{ $permission->readable_name }}</td>
                            <td width="150">

                                <small class="label label-info">{{ $permission->name }}</small>
                            </td>
                            @foreach ($roles as $role)



                                <td width="150" class="text-center">
                                    @if ($permission->hasRole($role->name) && $role->name == 'admin')
                                        <input type="checkbox" checked="checked"
                                               name="roles[{{ $role->id}}][permissions][]"
                                               value="{{ $permission->id }}" disabled="disabled">
                                        <input type="hidden" name="roles[{{ $role->id}}][permissions][]"
                                               value="{{ $permission->id }}">
                                    @elseif($permission->hasRole($role->name))
                                        <input type="checkbox" checked="checked"
                                               name="roles[{{ $role->id}}][permissions][]"
                                               value="{{ $permission->id }}">
                                    @else
                                        <input type="checkbox" name="roles[{{ $role->id }}][permissions][]"
                                               value="{{ $permission->id }}">
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="form-actions">
                {!! Form::submit(__('titles.save'), ['class' => 'btn btn-primary pull-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection